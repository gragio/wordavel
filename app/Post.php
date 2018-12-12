<?php

namespace App;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    /**
     * Get specific ACF field or an array with all fields
     *
     * @param string $key
     * @return array|string|bool|object field for specific $key
     */
    public function getAcf(string $key = null) {
        if ($key !== null)
            return get_fields($this->ID);

        return get_field($key, $this->ID);
    }

    /**
     * Set an ACF field
     *
     * @param string $key
     * @param array|string|bool $value
     */
    public function setAcf($key, $value) {
        return update_field($key, $value, $this->ID);
    }

    /**
     * Get an post meta or an array with all post metas
     *
     * @param string $key
     * @return array|string|bool field for specific $key
     */
    public function getMeta($key = null, $single = false) {
        return get_post_meta($this->ID, $key, $single);
    }

    /**
     * Set an post meta
     *
     * @param string $key
     * @param array|string|bool $value
     */
    public function setMeta($key, $value) {
        return update_post_meta($this->ID, $key, $value);
    }

    /**
     * Get post link
     *
     * @return string|false URL post
     */
    public function link() {
        return get_permalink($this->ID);
    }

    /**
     * Get post template
     *
     * @return string template name
     */
    public function template() {
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', get_page_template_slug($this->ID));
    }

    /**
     * Get all taxonomies and terms post
     *
     * @return array template name
     */
    public function getTaxTerms() {
        $tax = [];
        foreach ($this->getTermsAttribute() as $key => $value)
            $tax[$key] = array_values($value);
        return $tax;
    }

    /**
     * Render post thumbnail
     *
     * @param string $size 'post-thumbnail' is default
     * @param array|string $attr false is default
     * @return string html tag
     */
    public function thumbnail($size = 'post-thumbnail', $attr = []) {
        return get_the_post_thumbnail( $this->ID, $size, $attr);
    }

    /**
     * Get post thumbnail in array
     *
     * @param string $size 'thumbnail' is default
     * @param bool $icon false is default
     * @return null|array [string url, string width, string height, bool resized]
     */
    public function thumbnailArray($size = 'thumbnail', $icon = false) {
        $thumbnail_id = get_post_thumbnail_id( $this->ID );
        if(!empty($thumbnail_id)) {
            $output = wp_get_attachment_image_src( $thumbnail_id, $size, $icon );
            return [
                'url' => $output[0],
                'width' => $output[1],
                'height' => $output[2],
                'resized' => $output[3]
            ];
        } else {
            return null;
        }
    }

}
