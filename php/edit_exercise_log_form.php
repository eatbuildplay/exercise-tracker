<?php

$posts = get_posts([
  'post_type' => 'exercise',
  'numberposts' => -1
]);

$exerciseOptions = '';
foreach( $posts as $post ) {
  $option = '<option value="' . $post->ID . '" />';
  $option .= $post->post_title;
  $option .= '</option>';
  $exerciseOptions .= $option;
}

?>

<div id="edit-exercise-log-form">
  <h2 class="form-title">Edit Exercise Log</h2>
  <form id="edit-form" method="post">

    <div class="form-field">
      <label>Date<label>
      <input id="field-timestamp" type="text" />
    </div>

    <div class="form-field">
      <label>Exercise<label>
      <select id="field-exercise">
        <?php print $exerciseOptions; ?>
      </select>
    </div>

    <div class="form-field">
      <label>Quantity<label>
      <input id="field-quantity" type="text" />
    </div>

    <div class="form-field">
      <label>Unit<label>
        <select id="field-unit">
          <option value="reps">Reps</option>
          <option value="miles">Miles</option>
          <option value="kms">KM's</option>
          <option value="minutes">Minutes</option>
          <option value="seconds">Seconds</option>
        </select>
    </div>

    <input type="submit" value="SAVE" />

  </form>
</div>
