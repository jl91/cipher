<?php
/**
 * Simple Cipher interface
 *
 * @author John Lennon de Melo Fernandes
 */

namespace Cipher;

interface CipherInterface
{

    public function encrypt($string);

    public function decrypt($string);
}