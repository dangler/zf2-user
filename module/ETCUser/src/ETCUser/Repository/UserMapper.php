<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/23/14
 * Time: 10:10 AM
 */

namespace EtcUser\Mapper;

use Zend\Db\Adapter\Adapter as Adapter;
use Zend\Db\Sql as Sql;
use EtcUser\Entity\User as User;

class UserMapper implements IMapper
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

    public function get($id)
    {
        $sql = <<<SQL
select id, first_name, middle_name, last_name, domain, array_to_json(emails) as emails
    from etc_user.public.user
    where id = :id
SQL;
        $data = array(
            'id' => $id
        );

        $stmt = $this->db->createStatement($sql);
        $stmt->prepare($sql);

        $results = $stmt->execute($data)->current();

        $user = new User(
            $results['id'],
            $results['first_name'],
            $results['middle_name'],
            $results['last_name'],
            $results['domain']
        );

        $user->setEmails(json_decode($results['emails']));

        return $user;
    }

    public function create($object)
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
}