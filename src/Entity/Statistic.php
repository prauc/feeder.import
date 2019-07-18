<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistic
 *
 * @ORM\Table(name="statistic")
 * @ORM\Entity
 */
class Statistic
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_date", type="date", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="devices", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $devices;

    /**
     * @var int
     *
     * @ORM\Column(name="subscriptions", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $subscriptions;

    /**
     * @var int
     *
     * @ORM\Column(name="users", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $users;

    /**
     * @var int
     *
     * @ORM\Column(name="sessions", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sessions;

    /**
     * @var int
     *
     * @ORM\Column(name="pageviews", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $pageviews;


}
