<?php

namespace Dhii\Expression\Test\Term;

use Dhii\Expression\Context\CompositeContext;
use Dhii\Expression\Context\ValueContext;
use Dhii\Expression\Term\VariableTerm;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Term\VariableTerm}.
 *
 * @since [*next-version*]
 */
class VariableTermTest extends TestCase
{
    /**
     * The class name of the evaluation exception thrown when an error occurs during evaluation.
     *
     * @since [*next-version*]
     */
    const EVALUATION_EXCEPTION_CLASSNAME = 'Dhii\\Evaluable\\EvaluationExceptionInterface';

    /**
     * Tests the constructor.
     *
     * @since [*next-version*]
     */
    public function testConstructor()
    {
        $subject = new VariableTerm('test');

        $this->assertEquals('test', $subject->getValue(), 'Constructor did not correctly set the value internally.');
    }

    /**
     * Tests the getter and setter methods for the value.
     *
     * @since [*next-version*]
     */
    public function testValueGetterAndSetter()
    {
        $subject = new VariableTerm(0);

        $return = $subject->setValue(7);

        $this->assertEquals(7, $subject->getValue(), 'Getter/Setter did not return/set the correct value.');
        $this->assertSame($subject, $return, 'Setter did not return a reference to the subject.');
    }

    /**
     * Tests the evaluation without a context.
     *
     * @since [*next-version*]
     */
    public function testEvaluateNoContext()
    {
        $subject = new VariableTerm('var');

        $this->setExpectedException(static::EVALUATION_EXCEPTION_CLASSNAME);

        $subject->evaluate();
    }

    /**
     * Tests the evaluation with a context.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithContext()
    {
        $subject = new VariableTerm('var');
        $context = new CompositeContext(array(
            3     => 'three',
            'foo' => 'bar',
            'var' => 55
        ));

        $this->assertEquals(55, $subject->evaluate($context), 'Subject did not evaluate to the expected result.');
    }

    /**
     * Tests the evaluation with an invalid context.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithContextInvalid()
    {
        $subject = new VariableTerm('var');
        $context = new ValueContext('foobar');

        $this->setExpectedException(static::EVALUATION_EXCEPTION_CLASSNAME);

        $subject->evaluate($context);
    }

    /**
     * Tests the evaluation with a context that does not have the variable index.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithContextNoIndex()
    {
        $subject = new VariableTerm('var');
        $context = new CompositeContext(array(
            3     => 'three',
            'foo' => 'bar'
        ));

        $this->setExpectedException(static::EVALUATION_EXCEPTION_CLASSNAME);

        $subject->evaluate($context);
    }
}
