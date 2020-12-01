<?php

register_post_type(
  'exercise',
  [
    'label' => 'Exercise',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'publicly_queryable' => true
  ]
);
