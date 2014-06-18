<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:57 PM
 */

namespace JydUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Role
 *
 * @package JydUser\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="role")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="descr", type="string")
 * @ORM\DiscriminatorMap({"role"="Role", "proxy"="Proxy"})
 */
class Role
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $context;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="roles")
     *
     * @var User
     */
    private $user;

    /**
     * @param $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param &User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Returns a string that describe the role with context.
     *
     * @return string
     */
    public function getDescription()
    {
        $description = '';

        if ($this->getUser() !== null ) {
            $description .= $this->getUser()->getName() . ' as ';
        }

        $description .= $this->getName();

        if ($this->getContext() !== null) {
            $description .= ' in ' . $this->getContext();
        }

        return $description;
    }
} 