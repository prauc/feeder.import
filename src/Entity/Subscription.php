<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription", uniqueConstraints={@ORM\UniqueConstraint(name="matchId_deviceId_2", columns={"matchId", "deviceId"})}, indexes={@ORM\Index(name="matchId_deviceId", columns={"matchId", "deviceId"})})
 * @ORM\Entity
 */
class Subscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="subscriptionId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subscriptionid;

    /**
     * @var int
     *
     * @ORM\Column(name="matchId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $matchid;

    /**
     * @var int
     *
     * @ORM\Column(name="deviceId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $deviceid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
