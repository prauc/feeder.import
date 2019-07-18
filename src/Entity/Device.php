<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 *
 * @ORM\Table(name="device", uniqueConstraints={@ORM\UniqueConstraint(name="deviceHash_type", columns={"deviceHash", "type"})}, indexes={@ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class Device
{
    /**
     * @var int
     *
     * @ORM\Column(name="deviceId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deviceid;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", length=25, nullable=true)
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localization", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $localization;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceHash", type="string", length=64, nullable=false)
     */
    private $devicehash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registrationId", type="string", length=183, nullable=true)
     */
    private $registrationid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="hardwareName", type="string", length=50, nullable=false)
     */
    private $hardwarename;

    /**
     * @var string
     *
     * @ORM\Column(name="hardwareVersion", type="string", length=10, nullable=false)
     */
    private $hardwareversion;

    /**
     * @var string
     *
     * @ORM\Column(name="appVersion", type="string", length=10, nullable=false)
     */
    private $appversion;

    /**
     * @var bool
     *
     * @ORM\Column(name="alert", type="boolean", nullable=false, options={"default"="1"})
     */
    private $alert = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="sound", type="boolean", nullable=false, options={"default"="1"})
     */
    private $sound = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="push", type="boolean", nullable=false)
     */
    private $push = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
