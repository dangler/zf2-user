<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/23/14
 * Time: 10:10 AM
 */

namespace EtcUser\Mapper;

use Zend\Db\Adapter\Adapter as Adapter;

class UserMapper implements IMapper
{
    /**
     * @var \Zend\Db\Adapter\Adapter
     */
    private $db;

    public function __construct()
    {

    }

    public function setDbAdapter(Adapter $adapter)
    {
        $this->db = $adapter;
    }

    public function get($id)
    {
        $result = $this->db->query('select * from public.user where id = ' . $id);
        print_r($result);
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