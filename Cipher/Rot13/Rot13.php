<?php

namespace Cipher\Rot13;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rot13
 *
 * @author john-vostro
 */
use Cipher\Caesar\Caesar;

class Rot13 extends Caesar
{

    public function __construct()
    {
        $this->setMap([]);
    }

    public function setMap(array $map)
    {
        parent::setMap([
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
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm'
        ]);
        return $this;
    }
}