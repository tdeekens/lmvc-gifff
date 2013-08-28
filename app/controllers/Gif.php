<?php

namespace controllers;

use Scandio\lmvc;
use models;

class Gif extends lmvc\controller
{
   public static function index($id)
   {
      $gif = models\Gif::findById($id)->one();

      return static::render([
         'gif' => $gif
      ]);
  }

  public static function postGif()
  {
      $gifForm = new \forms\Gif();
      $gifForm->validate(static::request());

      if ($gifForm->isValid()) {
         $gif = new models\Gif;

         $gif->url    = static::request()->url;
         $gif->loves  = 0;

         $gif->insert();

         return static::redirect('Application::index');
      } else {
         return static::render([
            'errors'    => $gifForm->getErrors(),
            'url'       => static::request()->url
         ]);
      }
   }

   public static function postLove()
   {
      $gif = models\Gif::findById(static::request()->id)->one();

      if ($gif) {
         $gif->loves++;

         $gif->save();

         return static::renderJSON([
            'errors'    => false,
            'loves'     => $gif->loves
         ]);
      } else {
         return static::renderJSON([
            'errors'    => 404,
         ]);
      }
   }
}