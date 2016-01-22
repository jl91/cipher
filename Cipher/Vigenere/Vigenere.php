<?php

namespace Cipher\Vigenere;

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

class Vigenere implements MappedCipherInterface
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
    private $secretKey  = null;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function buildDefaultMap()
    {

        $map = [];
        for ($i = 0; $i < 26; $i++) {
            $keyI = $this->defaultMap[$i];

            for ($j = 0; $j < 26; $j++) {
                $startPosition = array_search($keyI, $this->defaultMap);

                $leftPart = array_slice($this->defaultMap, $startPosition,
                    count($this->defaultMap));

                $rightPart = array_slice($this->defaultMap, 0, $startPosition);

                $map[$keyI] = array_merge($leftPart, $rightPart);
            }
        }

        $this->map = $map;
        return $this;
    }

    public function decrypt($string)
    {

        if (!$this->hasMap()) {
            $this->buildDefaultMap();
        }

        $return    = null;
        $strLength = strlen($string);
        $secretKey = $this->buildKey($strLength);


        for ($i = 0; $i < $strLength; $i++) {
            $currentLetter = $string[$i];
            $line          = $secretKey[$i];

            if (isset($this->map[$line])) {

                $column = array_search($currentLetter, $this->map[$line]);

                if (
                    $column !== false &&
                    isset($this->defaultMap[$column])
                ) {

                    $currentLetter = $this->defaultMap[$column];
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

    private function buildKey($length)
    {
        $currentKey = $this->secretKey;

        if (strlen($currentKey) < $length) {

            while (strlen($currentKey) < $length) {
                $currentKey .= $currentKey;
            }

            $charsToRemove = strlen($currentKey) - $length;

            if ($charsToRemove > 0) {
                $currentKey = substr($currentKey, 0, $charsToRemove * -1);
            }
        }

        return $currentKey;
    }

    public function encrypt($string)
    {
        if (!$this->hasMap()) {
            $this->buildDefaultMap();
        }

        $return    = null;
        $strLength = strlen($string);
        $secretKey = $this->buildKey($strLength);

        for ($i = 0; $i < $strLength; $i++) {
            $currentLetter = $string[$i];
            $line          = $secretKey[$i];

            if (isset($this->map[$line])) {

                $column = array_search($currentLetter, $this->defaultMap);

                if (
                    $column !== false &&
                    isset($this->map[$line][$column])
                ) {

                    $currentLetter = $this->map[$line][$column];
                }
            }

            $return .= $currentLetter;
        }

        return $return;
    }

    public function setMap(array $map)
    {
        if (count($map) < 1) {
            throw new \InvalidArgumentException('The $map Attribute Can\'t be empty ');
        }

        $isBidimensional = false;

        array_walk($map,
            function($current) use(&$isBidimensional) {
            if (is_array($current)) {
                $isBidimensional = true;
            }
        });

        if ($isBidimensional === false) {
            throw new \InvalidArgumentException('The $map must be an bi-dimensional Array');
        }

        $this->map = $map;
    }
}