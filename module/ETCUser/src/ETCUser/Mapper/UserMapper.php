<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/23/14
 * Time: 10:10 AM
 */

namespace EtcUser\Mapper;

use EtcUser\Entity\Proxy;
use EtcUser\Entity\Role;
use EtcUser\Hydrator\Strategy\DbEmailStrategy;
use Zend\Db\Adapter\Adapter as Adapter;
use Zend\Db\Sql as Sql;
use EtcUser\Entity\User;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserMapper
{
    /**
     * @var \Zend\Db\Adapter\Adapter
     */
    private $db;

    /**
     * @var \Zend\Db\Sql\Sql
     */
    private $sql;

    public function __construct()
    {

    }

    public function setDbAdapter(Adapter $adapter)
    {
        $this->db = $adapter;
        $this->sql = new Sql\Sql($this->db);
    }

    /**
     * @param string $id
     * @return User
     */
    public function findById($id)
    {
        $user = $this->getUser($id);

        $user->addRoles($this->getUserRoles($user));

        return $user;
    }

    /**
     * @param $id
     * @return User
     */
    private function getUser($id)
    {
        $sql = <<<SQL
select id, first_name, middle_name, last_name, domain, array_to_json(emails) as emails
    from etc_user.public.user
    where id = :id
SQL;

        // setup, execute query, and get a single row
        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();
        $results = $stmt->execute(array('id' => $id))->current();

        // setup hydrator and add custom strategy to handle emails
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('emails', new DbEmailStrategy());

        // hydrate the object
        $user = new User(); //TODO: convert to DI using service manager
        $hydrator->hydrate($results, $user);

        return $user;
    }

    /**
     * @param User $user
     * @return Role[]
     */
    private function getUserRoles(User $user)
    {
        $roles = array();
        $hydrator = new ClassMethods();

        $sql = <<<SQL
select id, name, context, is_proxy, proxy_role_id
    from etc_user.public.user_role
    where user_id = :user_id
SQL;

        // setup and execute query
        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();
        $results = $stmt->execute(array('user_id' => $user->getId()));

        // iterate over results and build object
        foreach ($results as $result) {

            if ($result['is_proxy']) {
                $role = new Proxy(); //TODO: convert to DI using service manager
                $hydrator->hydrate($result, $role);

                $role->setRole($this->getRole($result['proxy_role_id']));
            } else {
                $role = new Role(); //TODO: convert to DI using service manager
                $hydrator->hydrate($result, $role);
            }

            $role->setUser($user);

            $roles[] = $role;
        }

        return $roles;
    }

    /**
     * @param int $id
     * @return Role
     */
    private function getRole($id)
    {
        $hydrator = new ClassMethods();

        $sql = <<<SQL
select id, name, context, user_id
    from etc_user.public.user_role
    where id = :id
SQL;

        // setup, execute query, and get a single row
        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();
        $results = $stmt->execute(array('id' => $id))->current();

        // hydrate the object
        $role = new Role(); //TODO: convert to DI using service manager
        $hydrator->hydrate($results, $role);

        // set user for role
        $user = $this->getUser($results['user_id']);
        $role->setUser($user);

        return $role;
    }
}