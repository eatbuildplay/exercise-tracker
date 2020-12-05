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

<div id="edit-exercise-log-form" class="form-wrap">

  <div>X-CLOSE</div>
  <h2 class="form-title">Edit Exercise Log</h2>
  
  <form id="edit-form" method="post">

    <div class="form-group">
      <label>Date</label>
      <input id="field-timestamp" class="form-control" type="text" />
    </div>

    <div class="form-group">
      <label>Exercise</label>
      <select id="field-exercise" class="form-control">
        <?php print $exerciseOptions; ?>
      </select>
    </div>

    <div class="form-group">
      <label>Quantity</label>
      <input id="field-quantity" class="form-control" type="text" />
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

    <div class="form-group">
      <input class="btn btn-block btn-success" type="submit" value="SAVE" />
    </div>

  </form>
</div>
