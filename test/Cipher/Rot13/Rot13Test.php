<?php

namespace test\Rot13\Rot13;

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
use Cipher\Rot13\Rot13;

class Rot13Test extends PHPUnit_Framework_TestCase
{

    public function testShouldInstantiateRot13CipherClass()
    {
        $cipher = new Rot13();

        $expected = '\Cipher\Rot13\Rot13';
        $this->assertInstanceOf($expected, $cipher,
            'Class has been instantiated correctly');
    }

    public function testShouldInstantiateCaesarCipherClass()
    {
        $cipher = new Rot13();

        $expected = '\Cipher\Caesar\Caesar';
        $this->assertInstanceOf($expected, $cipher,
            'Class has been instantiated correctly');
    }

    public function testShouldVerifyIfCaesarCipherClassIsInstanceOfMappedCipherInterface()
    {
        $cipher   = new Rot13();
        $expected = '\Cipher\MappedCipherInterface';
        $this->assertInstanceOf($expected, $cipher,
            'Yes i\'m instance of \Cipher\MappedCipherInterface');
    }

    public function testShouldReturnInstanceOfRout13WhenSetMapIsCalled()
    {
        $cipher   = new Rot13();
        $actual   = $cipher->setMap([]);
        $expected = '\Cipher\Rot13\Rot13';
        $this->assertInstanceOf($expected, $actual);
    }

    public function testShouldEncryptString()
    {
        $cipher   = new Rot13();
        $actual   = $cipher->encrypt('abcdefghijklmnopqrstuvwxyz');
        $expected = 'nopqrstuvwxyzabcdefghijklm';
        $this->assertEquals($expected, $actual);
    }

    public function testShouldDecryptString()
    {
        $cipher   = new Rot13();
        $actual   = $cipher->decrypt('nopqrstuvwxyzabcdefghijklm');
        $expected = 'abcdefghijklmnopqrstuvwxyz';
        $this->assertEquals($expected, $actual);
    }
}