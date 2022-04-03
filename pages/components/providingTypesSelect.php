  <?php

  require_once __DIR__ . '/../../database/connection.php';

  $q = "SELECT * FROM `providing_types`";
  $types = $conn->query($q)->fetchAll();

  $selected = $_SESSION['old']['providing_type_id'] ?? '';

  ?>

  <div class="form-group">
    <label for="providing_type_id">Do you provide services or products?</label>
    <select class="form-control" id="providing_type_id" name="providing_type_id">

      <?php foreach ($types as $type) : ?>
        <option value="<?= $type['id'] ?>" <?= $selected == $type['id'] ? 'selected' : ''; ?>><?= ucfirst($type['type']) ?></option>
      <?php endforeach ?>

    </select>
  </div>