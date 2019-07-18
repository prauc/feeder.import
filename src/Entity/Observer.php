<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observer
 *
 * @ORM\Table(name="observer")
 * @ORM\Entity
 */
class Observer
{
    /**
     * @var int
     *
     * @ORM\Column(name="observerId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $observerid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="post_parameter", type="string", length=255, nullable=true)
     */
    private $postParameter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
