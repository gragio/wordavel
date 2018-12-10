<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    protected $postType = 'post';

    public function acf(string $key = null) {
        if($key === null) {
            return get_post_meta($this->ID);
        }

        return get_field($key, $this->ID);
    }

    public function setMeta($key, $value) {
        return update_post_meta($this->ID, $key, $value);
    }

    public function setAcf($key, $value) {
        return update_field($key, $value, $this->ID);
    }
}
