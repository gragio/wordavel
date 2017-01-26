<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    public function acf($key = null) {
        if(empty($key))
            return get_post_meta($this->ID);
        else return get_field($key, $this->ID);
    }

    public function setAcf($key, $value) {
        return update_field($key, $value, $this->ID);
    }

    public function setMeta($key, $value) {
        return update_post_meta($this->ID, $key, $value);
    }

    public function getMeta($key = null, $single = false) {
        return get_post_meta($this->ID, $key, $single);
    }

    public function link() {
        return get_permalink($this->ID);
    }

    public function template() {
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', get_page_template_slug($this->ID));
    }

}
