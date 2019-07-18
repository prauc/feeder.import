<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertisingMobile
 *
 * @ORM\Table(name="advertising_mobile", uniqueConstraints={@ORM\UniqueConstraint(name="type_category", columns={"typeId", "category"})}, indexes={@ORM\Index(name="type", columns={"typeId"})})
 * @ORM\Entity
 */
class AdvertisingMobile
{
    /**
     * @var int
     *
     * @ORM\Column(name="advertisingId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $advertisingid;

    /**
     * @var int
     *
     * @ORM\Column(name="typeId", type="integer", nullable=false)
     */
    private $typeid;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50, nullable=false)
     */
    private $category = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="topbanner", type="boolean", nullable=false)
     */
    private $topbanner;

    /**
     * @var bool
     *
     * @ORM\Column(name="bottombanner", type="boolean", nullable=false)
     */
    private $bottombanner;

    /**
     * @var bool
     *
     * @ORM\Column(name="livebanner", type="boolean", nullable=false)
     */
    private $livebanner;

    /**
     * @var bool
     *
     * @ORM\Column(name="interstitial", type="boolean", nullable=false)
     */
    private $interstitial;


}
