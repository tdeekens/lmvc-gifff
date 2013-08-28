<?php

namespace forms;

use Scandio\lmvc\modules\form\Form;

class Gif extends Form
{
    public $url = [
        'mandatory' => ['message' => 'Eine Url zum Gif braucht es schon!'],
        'check-url' => ['message' => 'Die Url: "%s" ist nicht valide!']
    ];

    protected function checkurl($url)
    {
        if (!empty($this->request()->$url) || ! preg_match('#(http://[^"]+\.(jpg|gif|png))#is', $this->request()->$url)) {
            $this->setError($url, array($this->request()->$url));
        }
    }
}