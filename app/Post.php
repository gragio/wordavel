<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    public function acf() {
        return get_post_meta($this->ID);
    }
}
