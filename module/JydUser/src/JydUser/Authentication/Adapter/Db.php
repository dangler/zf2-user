<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 6/4/14
 * Time: 3:49 PM
 */

namespace JydUser\Authentication\Adapter;


use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Db\Sql;

class Db extends AbstractAdapter
{
    private $username;

    private $password;

    function __construct($username, $password)
    {
        // TODO: Implement __construct() method.
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        return true;
    }
} 