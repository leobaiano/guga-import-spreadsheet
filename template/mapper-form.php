<!-- PAGINA 2 -->
<h2>Map columns to fields</h2>

<form
  id="csvaf-mapper"
  method="POST"
  enctype="multipart/form-data"
  action="<?php echo $action; ?>"
>
  <input
    type="hidden"
    name="<?php echo $noncekey ?>"
    value="<?php echo $noncevalue ?>"
  />
  <input
    type="hidden"
    name="csvaf_posttype"
    value="<?php echo htmlentities($_POST['csvaf_posttype']); ?>"
  />
  <input
    type="hidden"
    name="csvaf_filename"
    value="<?php echo htmlentities($filename); ?>"
  />

  <link rel="stylesheet" href="<?php echo CSVAFURL . 'styles/mapper.css'; ?>" />
  <script type="text/javascript">
    <?php
    $jsonfields = array();

    foreach ($fields as $field) {
      $jsonfields[$field['key']] = $field;
    }
    ?>
    var CSVAFFIELDS = (<?php echo json_encode($jsonfields); ?>)
    var CSVAFTYPES  = (<?php echo json_encode(array_keys($posttypes)); ?>)
  </script>
  <script
    type="text/javascript"
    src="<?php echo CSVAFURL . 'scripts/mapper.js'; ?>">
  </script>

  <table>
    <?php foreach ($headers as $column => $header): ?>
      <?php
      $idprefix = 'csvaf_column_' . $column . '_';
      $lookup   = false;
      $format   = false;
      ?>
    <tr>
      <td>
        <label for="<?php echo $idprefix; ?>field">
          <strong><?php echo $column; ?></strong>: <?php echo $header; ?>
        </label>
      </td>

      <td>
        <select
          class="column_field"
          data-column-id="<?php echo $column; ?>"
          name="<?php echo $idprefix; ?>field"
        >
          <option value="" selected="selected">DO NOT INSERT</option>
          <?php foreach ($fields as $field): ?>
          <option value="<?php echo $field['key']; ?>">
            <?php echo $field['name']; ?>
          </option>
          <?php endforeach; ?>
        </select>
        <!-- deve ser aqui -->
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <input type="submit" name="submit" value="Upload" />

  <script type="text/javascript">
    csvafmapperform()
  </script>
</form>
