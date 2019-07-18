<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertisingMobileType
 *
 * @ORM\Table(name="advertising_mobile_type", uniqueConstraints={@ORM\UniqueConstraint(name="internal", columns={"internal"})})
 * @ORM\Entity
 */
class AdvertisingMobileType
{
    /**
     * @var int
     *
     * @ORM\Column(name="typeId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeid;

    /**
     * @var string
     *
     * @ORM\Column(name="internal", type="string", length=50, nullable=false)
     */
    private $internal;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="categorization", type="boolean", nullable=false)
     */
    private $categorization;

    /**
     * @var bool
     *
     * @ORM\Column(name="childs", type="boolean", nullable=false)
     */
    private $childs;


}
