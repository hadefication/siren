<?php

namespace Hadefication\Siren;

use Hadefication\Siren\Support\SirenBag;

class Siren
{
    /**
     * Collect messages
     *
     * @param   string  $type                               the type of message to store
     * @param   string  $message                            the message to store
     * @param   string  $title                              the title of the message to store
     * @param   boolean $important                          flag if the message is important
     * @return  void
     */
    public function collect($type, $message, $title = 'Notification', $important = false)
    {
        session()->push('siren', (object)[
            'type' => $type,
            'message' => $message,
            'title' => $title,
            'important' => $important,
        ]);
    }

    /**
     * Store a success message
     *
     * @param   string  $message                            the message
     * @param   string  $title                              the title
     * @param   boolean $important                          flag if the message is important
     * @return  void
     */
    public function success($message, $title = 'Success', $important = false)
    {
        $this->collect('success', $message, $title, $important);
    }

    /**
     * Store an error message
     *
     * @param   string  $message                            the message
     * @param   string  $title                              the title
     * @param   boolean $important                          flag if the message is important
     * @return  void
     */
    public function error($message, $title = 'Error', $important = false)
    {
        $this->collect('error', $message, $title, $important);
    }

    /**
     * Store a warning message
     *
     * @param   string  $message                            the message
     * @param   string  $title                              the title
     * @param   boolean $important                          flag if the message is important
     * @return  void
     */
    public function warning($message, $title = 'Warning', $important = false)
    {
        $this->collect('warning', $message, $title, $important);
    }

    /**
     * Store an info message
     *
     * @param   string  $message                            the message
     * @param   string  $title                              the title
     * @param   boolean $important                          flag if the message is important
     * @return  void
     */
    public function info($message, $title = 'Info', $important = false)
    {
        $this->collect('info', $message, $title, $important);
    }

    /**
     * Get all messages
     *
     * @return  SirenBag
     */
    public function messages()
    {
        return new SirenBag(session('siren'));
    }

    /**
     * Render all collected messages
     *
     * @param   string  $view                               the custom view to render that handles the render of all collected messages
     * @return  string
     */
    public function render($view = '')
    {
        $this->flush();
        return view((view()->exists($view) ? $view : 'siren::render'))->render();
    }

    /**
     * Flush all messages
     *
     * @return  void
     */
    public function flush()
    {
        session()->forget('siren');
    }
}
