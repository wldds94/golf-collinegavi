<?php
namespace GolfGavi\Base;

class Base
{
    public function __construct()
    {
        $this->version = '1.0.0';

        $this->site_url = get_site_url();

        $this->theme_style_uri = get_stylesheet_uri();
        $this->theme_uri = get_stylesheet_directory_uri();
        $this->template_directory_uri = get_template_directory_uri();

        $this->inc_path = get_template_directory() . '/inc';
        $this->class_path = $this->inc_path . '/Class';
        $this->views_path = $this->inc_path . '/views';
        
    }
}