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

$today = date('Y-m-d');

?>

<div id="add-exercise-log-form">
  <h2 class="form-title">Enter Exercise Log</h2>
  <form id="add-form" method="post">

    <div class="form-field">
      <label>Date<label>
      <input id="field-timestamp" value="<?php print $today; ?>" type="text" />
    </div>

    <div class="form-field">
      <label>Exercise<label>
      <select id="field-exercise">
        <?php print $exerciseOptions; ?>
      </select>
    </div>

    <div class="form-field">
      <label>Quantity<label>
      <input id="field-quantity" value="" placeholder="10" type="text" />
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
