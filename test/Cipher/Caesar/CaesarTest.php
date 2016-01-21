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
            ['john', 'john'],
            ['lennon', 'lennon'],
            ['melo', 'melo'],
            ['fernandes', 'fernandes'],
            ['abc', 'abc'],
            ['abcdefghijklmnopqrstuvxyz', 'abcdefghijklmnopqrstuvxyz'],
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

    public function testShouldEncryptStringCorrectly()
    {

        $cipher = new Caesar();
        $map    = [
            'z',
            'y',
            'x',
            'w',
            'v',
            'u',
            't',
            's',
            'r',
            'q',
            'p',
            'o',
            'n',
            'm',
            'l',
            'k',
            'j',
            'i',
            'h',
            'g',
            'f',
            'e',
            'd',
            'c',
            'b',
            'a',
        ];

        $cipher->setMap($map);

        $actual   = $cipher->encrypt('john');
        $expected = 'qlsm';
        $this->assertEquals($expected, $actual);
    }

    public function testShouldEncryptStringCorrectly2()
    {

        $cipher = new Caesar();
        $map    = [

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
            'a',
            'b',
            'c',
        ];

        $cipher->setMap($map);

        $actual   = $cipher->encrypt('a ligeira raposa marrom saltou sobre o cachorro cansado');
        $expected = strtolower('D OLJHLUD UDSRVD PDUURP VDOWRX VREUH R FDFKRUUR FDQVDGR');
        $this->assertEquals($expected, $actual);
    }
}