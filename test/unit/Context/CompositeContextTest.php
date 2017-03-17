<?php

namespace Dhii\Expression\Test\Context;

use Dhii\Expression\Context\CompositeContext;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Context\CompositeContext}.
 *
 * @since [*next-version*]
 */
class CompositeContextTest extends TestCase
{
    /**
     * Tests the constructor without arguments.
     *
     * @since [*next-version*]
     */
    public function testConstructorNoArgs()
    {
        $subject = new CompositeContext();

        $this->assertEmpty($subject->getValue(), 'Constructor did not set the correct value internally.');
    }

    /**
     * Tests the constructor with arguments.
     *
     * @since [*next-version*]
     */
    public function testConstructorWithArgs()
    {
        $subject = new CompositeContext($expected = array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $this->assertEquals($expected, $subject->getValue(), 'Constructor did not set the correct value internally.');
    }

    /**
     * Tests the retrieval of all values.
     *
     * @since [*next-version*]
     */
    public function testGetValue()
    {
        $subject = new CompositeContext($expected = array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $this->assertEquals($expected, $subject->getValue(), 'Subject did not return the correct values.');
    }

    /**
     * Tests the retrieval of single values.
     *
     * @since [*next-version*]
     */
    public function testGetValueOf()
    {
        $subject = new CompositeContext(array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $this->assertEquals('five', $subject->getValueOf(5), 'Getter did not return the correct value for numeral index "5".');
        $this->assertEquals('foobar', $subject->getValueOf('test'), 'Getter did not return the correct value for index "test".');
        $this->assertNull($subject->getValueOf('nothing'), 'Getter did not return null for a non-existing index.');
    }

    /**
     * Tests the value existence check functionality.
     *
     * @since [*next-version*]
     */
    public function testHasValue()
    {
        $subject = new CompositeContext(array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $this->assertTrue($subject->hasValue(5), 'hasValue() did not return true for numeral index "5".');
        $this->assertTrue($subject->hasValue('test'), 'hasValue() did not return true for index "test".');
        $this->assertFalse($subject->hasValue('nothing'), 'hasValue() did not return false for a non-existing index.');
    }

    /**
     * Tests the setting of single values without a value argument.
     *
     * @since [*next-version*]
     */
    public function testSetValueNoValue()
    {
        $subject = new CompositeContext($expected = array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $return = $subject->setValue('new');

        $this->assertNull($subject->getValueOf('new'), 'Subject did not correctly set index "new" to null.');
        $this->assertEquals($subject, $return, 'Subject did not return a reference to itself.');
    }

    /**
     * Tests the setting of single values.
     *
     * @since [*next-version*]
     */
    public function testSetValueWithValue()
    {
        $subject = new CompositeContext($expected = array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $return = $subject->setValue('new', 123456);

        $this->assertEquals(123456, $subject->getValueOf('new'), 'Subject did not correctly set index "new" to null.');
        $this->assertSame($subject, $return, 'Subject did not return a reference to itself.');
    }

    /**
     * Tests the setting of multiple values.
     *
     * @since [*next-version*]
     */
    public function testSetValues()
    {
        $subject = new CompositeContext(array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $return = $subject->setValues($expected = array(
            'test' => 'lyrics',
            'so'   => 'tell me what you want',
            'what' => 'you really really want'
        ));

        $this->assertEquals($expected, $subject->getValue(), 'Subject did not correctly set the values internally.');
        $this->assertSame($subject, $return, 'Subject did not return a reference to itself.');
    }

    /**
     * Tests the removal of single values.
     *
     * @since [*next-version*]
     */
    public function testRemoveValue()
    {
        $subject = new CompositeContext(array(
            5        => 'five',
            'foobar' => 'crowbar',
            'test'   => 'unit'
        ));

        $return1 = $subject->removeValue(5);
        $return2 = $subject->removeValue('foobar');
        $return3 = $subject->removeValue('nothing');

        $this->assertArrayNotHasKey(5, $subject->getValue(), 'Subject did not remove value with key "5".');
        $this->assertArrayNotHasKey('foobar', $subject->getValue(), 'Subject did not remove value with key "foobar".');
        $this->assertEquals(array(
            'test' => 'unit'
        ), $subject->getValue(), 'Subject has invalid values.');

        $this->assertSame($subject, $return1, 'Subject did not return a reference to itself.');
        $this->assertSame($return1, $return2, 'Subject did not consistently return the same reference.');
        $this->assertSame($return2, $return3, 'Subject did not consistently return the same reference.');
    }

    /**
     * Tests the clearing of all values.
     *
     * @since [*next-version*]
     */
    public function testClearValues()
    {
        $subject = new CompositeContext(array(
            5      => 'five',
            'test' => 'foobar'
        ));

        $return = $subject->clearValues();

        $this->assertEmpty($subject->getValue(), 'Subject did not correctly clear the values internally.');
        $this->assertSame($subject, $return, 'Subject did not return a reference to itself.');
    }
}
