<?php

namespace test\Cipher\Caesar;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CaesarTest
 *
 * @author desenvolvimento-01
 */
use PHPUnit_Framework_TestCase;
use Cipher\Caesar\Caesar;

class CaesarTest extends PHPUnit_Framework_TestCase
{

    public function testShouldInstantiateCaesarCipherClass()
    {
        $cipher = new Caesar();

        $expected = '\Cipher\Caesar\Caesar';
        $this->assertInstanceOf($expected, $cipher,
            'Class has been instantiated correctly');
    }

    public function testShouldVerifyIfCaesarCipherClassIsInstanceOfMappedCipherInterface()
    {
        $cipher = new Caesar();

        $expected = '\Cipher\MappedCipherInterface';
        $this->assertInstanceOf($expected, $cipher,
            'Yes i\'m instance of \Cipher\MappedCipherInterface');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThowInvalidArgumentExceptionExceptionOnTryToCallDecryptWithoutSetMap()
    {
        $cipher = new Caesar();
        $cipher->encrypt('');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThowInvalidArgumentExceptionExceptionOnTryToCallDecryptWithAEmptyMapArraySetted()
    {
        $cipher = new Caesar();
        $cipher->setMap([]);
        $cipher->encrypt('');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThowInvalidArgumentExceptionExceptionOnTryToCallDecryptWithABiDimensionalArraySetted()
    {
        $cipher = new Caesar();
        $cipher->setMap([[]]);
        $cipher->encrypt('');
    }

    public function providerStrings()
    {
        return [
            ['john', 'john']
        ];
    }

    /**
     * @dataProvider providerStrings
     */
    public function testShouldReturnIdenticalStringWhenTheMapIsAlphabeticallyOrdered($actual,
                                                                                     $expected)
    {
        $cipher = new Caesar();
        $cipher->setMap([
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
        ]);

        $actual = $cipher->encrypt($actual);
        $this->assertEquals($expected, $actual);
    }
}