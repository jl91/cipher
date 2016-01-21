<?php

namespace Cipher\Caesar;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caesar
 *
 * @author desenvolvimento-01
 */
use Cipher\MappedCipherInterface;

class Caesar implements MappedCipherInterface
{
    private $defaultMap = [
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
    ];
    private $map        = [];

    public function decrypt($string)
    {
        if (!$this->hasMap()) {
            throw new \InvalidArgumentException('You should set the map to Caesar');
        }

        $return = null;

        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; $i++) {
            $currentLetter = $string[$i];

            $positionAtMap = array_search($currentLetter, $this->map);

            if ($positionAtMap !== false) {
                if (isset($this->defaultMap[$positionAtMap])) {

                    $currentLetter = $this->defaultMap[$positionAtMap];
                }
            }
            $return .= $currentLetter;
        }

        return $return;
    }

    private function hasMap()
    {
        return count($this->map) > 0;
    }

    public function encrypt($string)
    {

        if (!$this->hasMap()) {
            throw new \InvalidArgumentException('You should set the map to Caesar');
        }

        $return = null;

        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; $i++) {
            $currentLetter = $string[$i];

            $positionAtMap = array_search($currentLetter, $this->defaultMap);

            if ($positionAtMap !== false) {
                if (isset($this->map[$positionAtMap])) {

                    $currentLetter = $this->map[$positionAtMap];
                }
            }
            $return .= $currentLetter;
        }

        return $return;
    }

    public function setMap(array $map)
    {
        if (count($map) <= 0) {
            throw new \InvalidArgumentException('The $map param should be setted');
        }

        array_walk($map,
            function($current) {
            if (is_array($current)) {
                throw new \InvalidArgumentException('The $map param should be an one-dimensional Array');
            }
        });

        $this->map = $map;
        return $this;
    }
}