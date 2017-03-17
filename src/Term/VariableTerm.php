<?php

namespace Dhii\Expression\Term;

use Dhii\Data\ValueAwareInterface;
use Dhii\Expression\CompositeContextInterface;

/**
 * Implementation of a term that represents a variable.
 *
 * Variables have a value that represents their identifier.
 * Furthermore, they depend on a composite context. The evaluation for variable terms is the value in the composite
 * context that is associated with an index matching the variable term's value (identifier).
 *
 * @since [*next-version*]
 */
class VariableTerm extends AbstractBaseValueTerm
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The variable identifier value.
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
        if (!$ctx instanceof CompositeContextInterface) {
            throw $this->_createEvaluationException(
                sprintf('Given context is not a composite context. %s given.', get_class($ctx))
            );
        }

        $key = $this->_getValue();

        if (!$ctx->hasValue($key)) {
            throw $this->_createEvaluationException(
                sprintf('Given context does not have a value for index "%s".', $key)
            );
        }

        return $ctx->getValueOf($key);
    }
}
