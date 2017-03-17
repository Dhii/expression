<?php

namespace Dhii\Expression\Context;

/**
 * A simple composite context that provides a set of preset values.
 *
 * @since [*next-version*]
 */
class CompositeContext extends AbstractBaseCompositeContext
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
