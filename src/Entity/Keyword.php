<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keyword
 *
 * @ORM\Table(name="keyword")
 * @ORM\Entity
 */
class Keyword
{
    /**
     * @var int
     *
     * @ORM\Column(name="keywordId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $keywordid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentKeywordId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $parentkeywordid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="typeId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $typeid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;


}
