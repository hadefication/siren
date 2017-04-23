<?php

namespace Hadefication\Siren\Support;

use Illuminate\Support\Collection;

class SirenBag
{
    /**
     * Messages container
     *
     * @var     Collection
     */
    protected $messages;

    /**
     * Constructor
     *
     * @param array $messages
     */
    function __construct($messages = [])
    {
        $this->messages = new Collection($messages);
    }

    /**
     * Check if messages has the specified key (error, success, warning and info/notice)
     * @param   string  $type                           the type of message to look for
     * @return  boolean
     */
    public function has($type)
    {
        return $this->messages->where('type', $type)->isNotEmpty();
    }

    /**
     * Check if there are errors in the bag
     *
     * @return  boolean
     */
    public function hasErrors()
    {
        return $this->has('error');
    }

    /**
     * Check if there are warnings in the bag
     *
     * @return  boolean
     */
    public function hasWarnings()
    {
        return $this->has('warning');
    }

    /**
     * Check if there are notices in the bag
     *
     * @return  boolean
     */
    public function hasNotices()
    {
        return $this->has('info');
    }

    /**
     * Check if there are infos in the bag. This is an alias of hasNotices.
     *
     * @return  boolean
     */
    public function hasInfos()
    {
        return $this->hasNotices();
    }

    /**
     * Check if there are successes in the bag
     *
     * @return  boolean
     */
    public function hasSucesses()
    {
        return $this->has('success');
    }

    /**
     * Check if there's any in the bag
     *
     * @return  boolean
     */
    public function any()
    {
        return $this->messages->isNotEmpty();
    }

    /**
     * Get all messages in the bag
     *
     * @return  Collection
     */
    public function all()
    {
        return $this->messages->all();
    }

    /**
     * Get all error messages in the bag
     *
     * @return  Collection
     */
    public function errors()
    {
        return $this->messages->where('type', 'error');
    }

    /**
     * Get all info messages in the bag
     *
     * @return  Collection
     */
    public function infos()
    {
        return $this->messages->where('type', 'info');
    }

    /**
     * Get all info messages in the bag
     *
     * @return  Collection
     */
    public function notices()
    {
        return $this->infos();
    }

    /**
     * Get all warning messages in the bag
     *
     * @return  Collection
     */
    public function warnings()
    {
        return $this->messages->where('type', 'warning');
    }

    /**
     * Get all successes messages in the bag
     *
     * @return  Collection
     */
    public function successes()
    {
        return $this->messages->where('type', 'success');
    }
}
