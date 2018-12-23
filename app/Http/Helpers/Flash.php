<?php

namespace App\Http\Helpers;

/**
 * Fluent Api to create flash message
 * @package https://sweetalert.js.org/
 * @see bootstrap/helpers.php@flash
 */
class Flash
{
    /**
     * Supported types of message
     * @link https://sweetalert.js.org/docs/#icon
     * @var array
     */
    protected $types = ['info', 'success', 'warning', 'error'];
    /**
     * push the message to the session
     * @param  string $title
     * @param  string $message
     * @param  string|null $type
     * @return void
     */
    public function message($title, $message, $type = 'info')
    {
        session()->flash('flash_message', compact('title', 'message', 'type'));
    }

    /**
     * magic call method to Handle flash message
     * @param  string $method
     * @param  array $arguments
     * @return void
     */
    public function __call($method, $arguments)
    {
        $title = $arguments[0];
        $message = $arguments[1];
        // the method name is represent the type
        $type = in_array($method, $this->types) ? $method: 'info'; // default for unsupported types
        $this->message($title, $message, $type);
    }
}
