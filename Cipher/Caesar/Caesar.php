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
    private $map = [];

    public function decrypt($string)
    {
        $return = null;
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

            $positionAtMap = array_search($currentLetter, $this->map);

            if ($positionAtMap !== false) {
                $currentLetter = $this->map[$positionAtMap];
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