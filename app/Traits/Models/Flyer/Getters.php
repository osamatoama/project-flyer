<?php

namespace App\Traits\Models\Flyer;

trait Getters
{
    /**
     * sanitize the description against the malicious HTML tags(e.g: script)
     * @param  string $description
     * @return string
     */
    public function getDescriptionAttribute($description)
    {
        return \Purify::clean($description);
    }
}
