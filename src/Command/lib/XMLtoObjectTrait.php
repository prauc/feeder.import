<?php


namespace App\Command\lib;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;
use SimpleXMLElement;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

trait XMLtoObjectTrait
{
    protected function deserializeData(SimpleXMLElement $element, String $class): SourceEntityInterface {
        $serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder()]);
        return $serializer->deserialize($element->asXML(), $class, 'xml');
    }

    protected function deserializeArrayData(SimpleXMLElement $element, String $class): SourceEntityInterface {
        $serializer = new Serializer([new GetSetMethodNormalizer(), new ArrayDenormalizer()], [new XmlEncoder()]);
        return $serializer->deserialize($element->asXML(), $class, 'xml');
    }
}