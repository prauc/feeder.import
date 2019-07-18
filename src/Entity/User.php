<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=false)
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=50, nullable=false)
     */
    private $salt;

    /**
     * @var bool
     *
     * @ORM\Column(name="securelevel", type="boolean", nullable=false)
     */
    private $securelevel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastLogIn", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastlogin = 'CURRENT_TIMESTAMP';


}
