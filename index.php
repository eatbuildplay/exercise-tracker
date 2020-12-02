<?php

$ajaxUrl = admin_url( 'admin-ajax.php' );
print '<script type="text/javascript">';
print 'var ajaxUrl = "' . $ajaxUrl . '"';
print '</script>';

$postArgs = [
  'post_type' => 'exercise_log',
  'postnumber' => -1
];
$posts = get_posts( $postArgs );

$objects = [];
foreach( $posts as $post ) {
  $obj = new stdClass;
  $obj->id = $post->ID;
  $obj->title = $post->post_title;
  $obj->date = '2020-11-15';
  $obj->exercise = 'Bodyweight Squats';
  $objects[] = $obj;
}

$exerciseLogJson = json_encode( $objects );

print '<script type="text/javascript">';
print 'var exerciseLogJson = ' . $exerciseLogJson .';';
print '</script>';

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Exercise Tracker</title>

  <?php wp_head(); ?>

</head>

<body>

  <!-- Header -->
  <header>
    <img src="https://picsum.photos/50" />
  </header>

  <div id="app-body">

    <!-- Add New Log Entry -->
    <div id="add-log-entry">
      <button id="add-log-entry-button">Add Log Entry</button>
    </div>

    <!-- Exercise Log Table -->
    <table id="exercise-log-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Exercise</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

  </div>

  <!-- Footer -->
  <footer>
    <img src="https://picsum.photos/50" />
  </footer>

  <?php
    require_once( get_template_directory() . '/php/add_exercise_log_form.php');
    require_once( get_template_directory() . '/php/edit_exercise_log_form.php');
  ?>

  <script type="text/javascript" src="<?php print get_template_directory_uri(); ?>/js/app.js"></script>

  <?php wp_footer(); ?>

</body>

</html>
