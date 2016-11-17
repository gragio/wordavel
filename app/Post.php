<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    public function acf($key = '') {
        if(empty($key))
            return get_post_meta($this->ID);
        else return get_field($key, $this->ID);
    }

    public function setMeta($key, $value) {
        return update_post_meta($this->ID, $key, $value);
    }
}
