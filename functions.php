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

add_action('wp_ajax_exercise_log_delete', 'exerciseLogDelete');
add_action('wp_ajax_nopriv_exercise_log_delete', 'exerciseLogDelete');

function exerciseLogDelete() {

  $postId = $_POST['id'];
  wp_delete_post( $postId );
  $response = new stdClass;
  $response->code = 200;
  wp_send_json_success( $response );
}
