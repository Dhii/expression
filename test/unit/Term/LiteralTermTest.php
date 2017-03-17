<?php

namespace Dhii\Expression\Test\Term;

use Dhii\Expression\Context\ValueContext;
use Dhii\Expression\Term\LiteralTerm;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Term\LiteralTerm}.
 *
 * @since [*next-version*]
 */
class LiteralTermTest extends TestCase
{
    /**
     * Tests the constructor.
     *
     * @since [*next-version*]
     */
    public function testConstructor()
    {
        $subject = new LiteralTerm('test');

        $this->assertEquals('test', $subject->getValue(), 'Constructor did not correctly set the value internally.');
    }

    /**
     * Tests the getter and setter methods for the value.
     *
     * @since [*next-version*]
     */
    public function testValueGetterAndSetter()
    {
        $subject = new LiteralTerm(0);

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
        $subject = new LiteralTerm(55);

        $this->assertEquals(55, $subject->evaluate());
    }

    /**
     * Tests the evaluation with a context.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithContext()
    {
        $subject = new LiteralTerm(55);

        $this->assertEquals(55, $subject->evaluate(new ValueContext('test')));
    }
}
