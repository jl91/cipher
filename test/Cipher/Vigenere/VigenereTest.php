<?php

namespace test\Cipher\Vigenere;

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
use Cipher\Vigenere\Vigenere;

class VigenereTest extends PHPUnit_Framework_TestCase
{

    public function testShouldInstantiateVigenereCipherClass()
    {
        $cipher = new Vigenere('batata');

        $expected = '\Cipher\Vigenere\Vigenere';
        $this->assertInstanceOf($expected, $cipher,
            'Class has been instantiated correctly');
    }

    public function testShouldBuildCorrectMap()
    {
        $cipher = new Vigenere('batata');

        $cipher->buildDefaultMap();

        $expected = '\Cipher\Vigenere\Vigenere';
        $this->assertInstanceOf($expected, $cipher,
            'Class has been instantiated correctly');
    }

    public function testBuildDefaultMapShouldReturnInstanceOfItSelf()
    {
        $cipher = new Vigenere('batata');

        $actual = $cipher->buildDefaultMap();

        $expected = '\Cipher\Vigenere\Vigenere';
        $this->assertInstanceOf($expected, $actual,
            'Class has been instantiated correctly');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThrowInvalidArgumentExceptionOnSetMapIsOneDimensionalArray()
    {

        $cipher = new Vigenere('batata');
        $cipher->setMap([]);
    }

    public function testShouldEncryptWithDefaultMap()
    {
        $cipher = new Vigenere('limao');
        $actual = $cipher
            ->encrypt('atacarbasesul');

        $expected = strtolower('LBMCOCJMSSDCX');
        $this->assertEquals($expected, $actual);
    }

    public function testShouldDecryptWithDefaultMap()
    {
        $cipher = new Vigenere('limao');
        $actual = $cipher
            ->decrypt(strtolower('LBMCOCJMSSDCX'));

        $expected = 'atacarbasesul';
        $this->assertEquals($expected, $actual);
    }
}