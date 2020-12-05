<?php

$ajaxUrl = admin_url( 'admin-ajax.php' );
print '<script type="text/javascript">';
print 'var ajaxUrl = "' . $ajaxUrl . '"';
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
      <button class="btn btn-primary" id="add-log-entry-button">Add Log Entry</button>
    </div>

    <!-- Exercise Log Table -->
    <table id="exercise-log-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th>Date</th>
          <th>Exercise</th>
          <th>Quantity</th>
          <th>Unit</th>
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

  <?php wp_footer(); ?>

</body>

</html>
