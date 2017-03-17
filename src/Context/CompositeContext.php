<?php

namespace Dhii\Expression\Context;

use Dhii\Expression\CompositeContextInterface;

/**
 * A simple composite context that provides a set of preset values.
 *
 * @since [*next-version*]
 */
class CompositeContext extends AbstractBaseCompositeContext implements CompositeContextInterface
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param array $values The context values.
     */
    public function __construct(array $values = array())
    {
        $this->_setValues($values);
    }
}
