<!-- FORM UPLOAD -->
<div class="wrap">
  <?php echo $headblock; ?>
  <form
    id="csvaf-upload"
    method="POST"
    enctype="multipart/form-data"
    action="<?php echo $action; ?>"
  >
    <input
      type="hidden"
      name="<?php echo $noncekey ?>"
      value="<?php echo $noncevalue ?>"
    />
    <label for="csvaf_data">
      <?php _e('Select spreadsheet file:', 'csvaf'); ?>
    </label>
    <input type="file" name="csvaf_data" />
    <select name="csvaf_posttype">
      <?php foreach ($posttypes as $posttype): ?>
        <option value="<?php echo $posttype; ?>">
          <?php echo $posttype; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Upload" />
  </form>
  <?php echo $footblock; ?>
</div>
