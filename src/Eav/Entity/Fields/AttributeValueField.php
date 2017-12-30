<?php

declare(strict_types=1);

namespace MsgPhp\Eav\Entity\Fields;

use MsgPhp\Eav\{AttributeIdInterface, AttributeValueIdInterface};
use MsgPhp\Eav\Entity\{Attribute, AttributeValue};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait AttributeValueField
{
    private $attributeValue;

    public function getAttributeValue(): AttributeValue
    {
        return $this->attributeValue;
    }

    final public function getAttributeValueId(): AttributeValueIdInterface
    {
        return $this->getAttributeValue()->getId();
    }

    final public function getAttribute(): Attribute
    {
        return $this->getAttributeValue()->getAttribute();
    }

    final public function getAttributeId(): AttributeIdInterface
    {
        return $this->getAttributeValue()->getAttributeId();
    }

    final public function getValue()
    {
        return $this->getAttributeValue()->getValue();
    }
}
