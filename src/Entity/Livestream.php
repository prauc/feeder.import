<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livestream
 *
 * @ORM\Table(name="livestream", uniqueConstraints={@ORM\UniqueConstraint(name="livestreamSourceId", columns={"livestreamSourceId"})})
 * @ORM\Entity
 */
class Livestream
{
    /**
     * @var int
     *
     * @ORM\Column(name="livestreamId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $livestreamid;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=100, nullable=false)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="livestreamSourceId", type="string", length=20, nullable=false)
     */
    private $livestreamsourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=false)
     */
    private $thumbnail;


}
