<?php

namespace controllers;

use Scandio\lmvc;
use models\Gif;

class Application extends lmvc\controller
{
   public static function index($offset = 0, $length = 50)
   {
      $offsetNext       = $offset + $length;
      $offsetPrevious   = ( $offset >= $length ) ? $offset - $length : false;

      return static::render([
         'offsetNext' => $offsetNext,
         'length' => 50,
         'offsetPrevious' => $offsetPrevious,
         'gifs' => Gif::findAll(['id DESC'], $length, $offset)->all()
      ]);
   }
}