<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Import
 *
 * @ORM\Table(name="import")
 * @ORM\Entity
 */
class Import
{
    /**
     * @var int
     *
     * @ORM\Column(name="importId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $importid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=0, nullable=true)
     */
    private $source;

    /**
     * @var int
     *
     * @ORM\Column(name="processId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $processid;

    /**
     * @var string
     *
     * @ORM\Column(name="response", type="string", length=0, nullable=false)
     */
    private $response;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
