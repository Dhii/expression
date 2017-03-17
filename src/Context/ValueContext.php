<?php

namespace Dhii\Expression\Context;

/**
 * A context implementation that simply provides a preset context value.
 *
 * @since [*next-version*]
 */
class ValueContext extends AbstractBaseValueContext
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The new context value. Default: null
     */
    public function __construct($value = null)
    {
        $this->_setValue($value);
    }
}
