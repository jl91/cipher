<?php

namespace Cipher;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MappedCipher
 *
 * @author desenvolvimento-01
 */
use Cipher\CipherInterface;

class MappedCipher extends CipherInterface
{

    public function setMap(array $map);
}