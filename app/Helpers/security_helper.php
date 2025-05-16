<?php

function __randomString($pType = 'ALPHANUM', $pLength = 8)
{
  switch ($pType) {
    case 'BASIC':
      return mt_rand();
      break;
    case 'ALPHA':
    case 'ALPHANUM':
    case 'NUM':
    case 'NOZERO':
      $seedings = array();
      $seedings['ALPHA'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $seedings['ALPHANUM'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $seedings['NUM'] = '0123456789';
      $seedings['NOZERO']   = '123456789';

      $pool = $seedings[$pType];

      $str = '';
      for ($i = 0; $i < $pLength; $i++) {
        $str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
      }

      return $str;
      break;

    case 'UNIQUE':
    case 'MD5':
      return md5(uniqid(mt_rand()));
      break;
  }
}


if (!function_exists('__encryptPassword')) {
  function __encryptPassword($pPassword, $pSecurityString)
  {
    $options = [
      'cost' => 12
    ];

    return password_hash($pPassword . $pSecurityString, PASSWORD_BCRYPT, $options);
  }
}

if (!function_exists('__verifyPassword')) {
  function __verifyPassword($pPassword, $pHash)
  {

    if (password_verify($pPassword, $pHash)) {
      return true;
    }

    return false;
  }
}
