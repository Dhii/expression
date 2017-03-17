<?php

namespace Dhii\Expression\Context;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * A composite context implementation that provides array access and iterator features.
 *
 * @since [*next-version*]
 */
class ArrayContext extends AbstractBaseCompositeContext implements ArrayAccess, Iterator, Countable
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

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->hasValue($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->getValue($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->setValue($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->removeValue($offset);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function current()
    {
        return current($this->_getValues());
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function key()
    {
        return key($this->_getValues());
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function next()
    {
        return next($this->_getValues());
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function rewind()
    {
        return rewind($this->_getValues());
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function valid()
    {
        return valid($this->_getValues());
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function count()
    {
        return count($this->_getValues());
    }
}
