<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    public function acf($value = '') {
        if(empty($value))
            return get_post_meta($this->ID);
        else return get_field($value, $this->ID);
    }
}
