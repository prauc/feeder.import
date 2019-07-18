<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backend
 *
 * @ORM\Table(name="backend")
 * @ORM\Entity
 */
class Backend
{
    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uri;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="group", type="string", length=50, nullable=true)
     */
    private $group;

    /**
     * @var int
     *
     * @ORM\Column(name="securelevel", type="integer", nullable=false)
     */
    private $securelevel;

    /**
     * @var int
     *
     * @ORM\Column(name="inNavigation", type="integer", nullable=false)
     */
    private $innavigation;

    /**
     * @var int
     *
     * @ORM\Column(name="ext", type="integer", nullable=false)
     */
    private $ext = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="default", type="integer", nullable=false)
     */
    private $default = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="sort", type="float", precision=10, scale=0, nullable=true)
     */
    private $sort;


}
