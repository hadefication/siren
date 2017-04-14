<?php

namespace Hadefication\Siren;

class Siren
{
    public function collect($type, $message, $title = 'Notification', $important = false)
    {
        session()->push('siren', (object)[
            'type' => $type,
            'message' => $message,
            'title' => $title,
            'important' => $important,
        ]);
    }

    public function success($message, $title = 'Success', $important = false)
    {
        $this->collect('success', $message, $title, $important);
    }

    public function error($message, $title = 'Error', $important = false)
    {
        $this->collect('error', $message, $title, $important);
    }

    public function warning($message, $title = 'Warning', $important = false)
    {
        $this->collect('warning', $message, $title, $important);
    }

    public function info($message, $title = 'Info', $important = false)
    {
        $this->collect('info', $message, $title, $important);
    }

    public function render()
    {
        $messages = collect(session('siren'));
        session()->forget('siren');
        return view('siren::render', compact('messages'))->render();
    }
}
