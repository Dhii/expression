<?php

namespace Dhii\Expression\Term;

use Dhii\Data\ValueAwareInterface;

/**
 * Implementation of a term that represents a literal value.
 *
 * Literal values do not depend on the context given during evaluation and always evaluate to their preset value.
 *
 * @since [*next-version*]
 */
class LiteralTerm extends AbstractBaseValueTerm
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The literal value.
     */
    public function __construct($value)
    {
        $this->_setValue($value);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _evaluate(ValueAwareInterface $ctx = null)
    {
        return $this->_getValue();
    }
}
