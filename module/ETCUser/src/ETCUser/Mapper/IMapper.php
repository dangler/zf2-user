<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/18/14
 * Time: 2:16 PM
 */

namespace EtcUser\Mapper;


interface IMapper
{
    public function get($id);
    public function getAll();

    public function findAll(array $criteria);
    public function findOne(array $criteria);

    public function create($object);
    public function update($object);
    public function delete($object);
}