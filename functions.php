<?php

add_action('init', function() {
  require_once( get_template_directory() . '/php/post_type_exercise.php');
  require_once( get_template_directory() . '/php/post_type_exercise_log.php');
});


add_action('wp_enqueue_scripts', function() {

  wp_enqueue_style(
    'app',
    get_template_directory_uri() . '/style.css',
    [],
    '1.0.0'
  );

});
