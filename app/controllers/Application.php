<?php

namespace controllers;

use Scandio\lmvc\modules\security\AnonymousController;

class Application extends AnonymousController
{
    public static function index()
    {
        return static::render();
    }
}