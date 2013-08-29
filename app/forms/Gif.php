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
        if (empty($this->request()->$url) || preg_match_all('#https://.*\.com/([\w-]+=\w\d{2,3})#iU', $this->request()->$url, $match, PREG_SET_ORDER)) {
            $this->setError($url, array($this->request()->$url));
        }
    }
}