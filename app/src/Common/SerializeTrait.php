<?php
namespace VundorTheEncampment\Common;

trait SerializeTrait
{
    public function serialize()
    {
        return json_encode(get_object_vars($this));
    }

    public function unserialize($serialized)
    {
        $serializedObject = json_decode($serialized, true);
        foreach ($serializedObject as $propertyName => $value) {
            $this->$propertyName = $value;
        }
    }
}