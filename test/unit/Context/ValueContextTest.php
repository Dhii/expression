<?php

namespace Dhii\Expression\Test\Context;

use Dhii\Expression\Context\ValueContext;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Context\ValueContext}.
 *
 * @since [*next-version*]
 */
class ValueContextTest extends TestCase
{
    /**
     * Tests the constructor without arguments.
     *
     * @since [*next-version*]
     */
    public function testConstructorNoArgs()
    {
        $subject = new ValueContext();

        $this->assertNull($subject->getValue());
    }

    /**
     * Tests the constructor with arguments.
     *
     * @since [*next-version*]
     */
    public function testConstructorWithArgs()
    {
        $subject = new ValueContext(17);

        $this->assertEquals(17, $subject->getValue(), 'Constructor did not set the correct value internally.');
    }

    /**
     * Tests the value getter.
     *
     * @since [*next-version*]
     */
    public function testGetValue()
    {
        $subject = new ValueContext(12);

        $this->assertEquals(12, $subject->getValue(), 'Getter did not return the correct value.');
    }

    /**
     * Tests the value setter.
     *
     * @since [*next-version*]
     */
    public function testSetValue()
    {
        $subject = new ValueContext();

        $return = $subject->setValue(99);

        $this->assertEquals(99, $subject->getValue(), 'Setter did not set the correct value internally.');
        $this->assertSame($subject, $return, 'Subject did not return a reference to itself.');
    }
}
