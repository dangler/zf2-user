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
use EtcUser\Entity\User as User;
use Zend\Stdlib\Hydrator\ClassMethods;

class User
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

        $sql = <<<SQL
select id, name, context, is_proxy, proxy_role_id
    from etc_user.public.user_role
    where user_id = :user_id
SQL;

        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();

        $results = $stmt->execute(array('user_id' => $user->getId()));

        foreach ($results as $role) {

            $role = new Role($role['id'], $role['name'], $role['context']);

            $role->setUser($user);

            $user->addRole($role);
        }

        return $user;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
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

        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();

        $results = $stmt->execute(array('id' => $id))->current();

        $hydrator = new ClassMethods();
        $hydrator->addStrategy('emails', new DbEmailStrategy());

        $user = new User();
        $hydrator->hydrate($results, $user);

        echo '<pre>'; print_r($user);

        $data = $hydrator->extract($user);
        print_r($data);

        die();


        return $user;
    }
}