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

<div id="add-exercise-log-form" class="form-wrap">

  <div>X-CLOSE</div>
  <h2 class="form-title">Enter Exercise Log</h2>

  <form id="add-form" method="post">

    <div class="form-group">
      <label for="field-timestamp">Date</label>
      <input id="field-timestamp" class="form-control" value="<?php print $today; ?>" type="text" />
    </div>

    <div class="form-group">
      <label>Exercise</label>
      <select id="field-exercise" class="form-control">
        <?php print $exerciseOptions; ?>
      </select>
    </div>

    <div class="form-group">
      <label>Quantity</label>
      <input id="field-quantity" class="form-control" value="" placeholder="10" type="text" />
    </div>

    <div class="form-group">
      <label>Unit</label>
        <select id="field-unit" class="form-control">
          <option value="reps">Reps</option>
          <option value="miles">Miles</option>
          <option value="kms">KM's</option>
          <option value="minutes">Minutes</option>
          <option value="seconds">Seconds</option>
        </select>
    </div>

    <input class="btn btn-block btn-success" type="submit" value="SAVE" />

  </form>
</div>
