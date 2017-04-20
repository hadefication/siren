<?php

namespace Hadefication\Siren\Support;

class SirenBag
{
    protected $messages;

    function __construct($messages = [])
    {
        $this->messages = collect($messages);
    }

    public function any()
    {
        return $this->messages->isNotEmpty();
    }

    public function all()
    {
        return $this->messages->all();
    }
}
