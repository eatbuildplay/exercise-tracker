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

  // enq script here with wp-util
  wp_enqueue_script(
    'app',
    get_template_directory_uri() . '/js/app.js',
    ['jquery', 'wp-util'],
    '1.0.0',
    true
  );

});

add_action('wp_ajax_exercise_log_delete', 'exerciseLogDelete');
add_action('wp_ajax_nopriv_exercise_log_delete', 'exerciseLogDelete');

function exerciseLogDelete() {

  $postId = $_POST['id'];
  wp_delete_post( $postId );
  $response = new stdClass;
  $response->code = 200;
  $response->item = $postId;
  wp_send_json_success( $response );
}

/************* CREATE *************/

add_action('wp_ajax_exercise_log_create', 'exerciseLogCreate');
add_action('wp_ajax_nopriv_exercise_log_create', 'exerciseLogCreate');

function exerciseLogCreate() {

  $date  = $_POST['date'];
  $exerciseId   = $_POST['exercise'];
  $quantity   = $_POST['quantity'];
  $unit   = $_POST['unit'];

  $postId = wp_insert_post(
    [
      'post_type'  => 'exercise_log',
      'post_status' => 'publish',
      'post_title' => 'Created by SPA'
    ]
  );

  update_post_meta( $postId, 'exercise', $exerciseId );
  update_post_meta( $postId, 'date', $date );
  update_post_meta( $postId, 'quantity', $quantity );
  update_post_meta( $postId, 'unit', $unit );

  // form response
  $exercisePost = get_post( $exerciseId );
  $exercise = new stdClass;
  $exercise->id = $exerciseId;
  $exercise->title = $exercisePost->post_title;

  $response = new stdClass;
  $response->code = 200;

  $response->item = new stdClass;
  $response->item->postId = $postId;
  $response->item->date = $date;
  $response->item->exercise = $exercise;
  $response->item->quantity = $quantity;
  $response->item->unit = $unit;

  wp_send_json_success( $response );

}


/************* UPDATE *************/

add_action('wp_ajax_exercise_log_update', 'exerciseLogUpdate');
add_action('wp_ajax_nopriv_exercise_log_update', 'exerciseLogUpdate');

function exerciseLogUpdate() {

  $postId = $_POST['postId'];
  $date  = $_POST['date'];
  $exerciseId   = $_POST['exercise'];
  $quantity   = $_POST['quantity'];
  $unit   = $_POST['unit'];

  $postId = wp_update_post(
    [
      'ID' => $postId,
      'post_type'  => 'exercise_log',
      'post_status' => 'publish',
      'post_title' => 'Created by SPA'
    ]
  );

  update_post_meta( $postId, 'exercise', $exerciseId );
  update_post_meta( $postId, 'date', $date );
  update_post_meta( $postId, 'quantity', $quantity );
  update_post_meta( $postId, 'unit', $unit );

  // form response
  $exercisePost = get_post( $exerciseId );
  $exercise = new stdClass;
  $exercise->id = $exerciseId;
  $exercise->title = $exercisePost->post_title;

  $response = new stdClass;
  $response->code = 200;

  $response->item = new stdClass;
  $response->item->id = $postId;
  $response->item->date = $date;
  $response->item->exercise = $exercise;
  $response->item->quantity = $quantity;
  $response->item->unit = $unit;

  wp_send_json_success( $response );

}

/************* LOAD *************/

add_action('wp_ajax_exercise_log_load', 'exerciseLogLoad');
add_action('wp_ajax_nopriv_exercise_log_load', 'exerciseLogLoad');

function exerciseLogLoad() {

  $postArgs = [
    'post_type' => 'exercise_log',
    'numberposts' => -1
  ];
  $posts = get_posts( $postArgs );

  $objects = [];
  foreach( $posts as $post ) {
    $obj = new stdClass;
    $obj->id = $post->ID;
    $obj->date = get_post_meta( $post->ID, 'date', 1 );

    $exerciseId = get_post_meta( $post->ID, 'exercise', 1 );
    $exercisePost = get_post( $exerciseId );
    $obj->exercise = new stdClass;
    $obj->exercise->id = $exercisePost->ID;
    $obj->exercise->title = $exercisePost->post_title;

    $obj->quantity = get_post_meta( $post->ID, 'quantity', 1 );
    $obj->unit = get_post_meta( $post->ID, 'unit', 1 );
    $objects[] = $obj;
  }

  $response = new stdClass;
  $response->code = 200;
  $response->objects = $objects;

  wp_send_json_success( $response );

}
