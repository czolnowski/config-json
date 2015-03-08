<?php
namespace Mindweb\ConfigJson;

use JMS\Serializer;
use Mindweb\Config;

class Configuration extends Config\Configuration
{
    protected  function init()
    {
        if ($this->isInitialized()) {
            return;
        }

        $serializer = Serializer\SerializerBuilder::create()->build();

        $this->entries = $serializer->deserialize(
            file_get_contents($this->path),
            'array',
            'json'
        );

        $this->setAsInitialized();
    }
}