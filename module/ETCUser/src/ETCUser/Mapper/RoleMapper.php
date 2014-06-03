<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 6/2/14
 * Time: 9:43 PM
 */

namespace EtcUser\Mapper;

use EtcUser\Entity\Role as Role;

class RoleMapper 
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
     * @return Role
     */
    public function findById($id)
    {
        $hydrator = new ClassMethods();

        $sql = <<<SQL
select id, name, context, is_proxy, proxy_role_id
    from etc_user.public.user_role
    where id = :id
SQL;

        $stmt = $this->db->createStatement($sql);
        $stmt->prepare();

        $results = $stmt->execute(array('user_id' => $id));

        if ($results['is_proxy']) {
            $role = new Role(); //TODO: convert to DI using service manager
            $hydrator->hydrate($result, $role);
        } else {
            $role = new Proxy(); //TODO: convert to DI using service manager
            unset($result['context']);
            $hydrator->hydrate($result, $role);

        }

        return $role;
    }
} 