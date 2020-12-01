<?php

register_post_type(
  'exercise_log',
  [
    'label' => 'Exercise Log',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'publicly_queryable' => true
  ]
);
