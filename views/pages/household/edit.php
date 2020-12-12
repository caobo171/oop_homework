
<?php require APPROOT . '/views/inc/header.php'; ?>
<h2>Chỉnh sửa</h2>
<div class="row">
<div class="col mt-4 focus">
  <form method="POST" action="<?php echo URLROOT; ?>/household/edit/<?php echo $data->household->id?>">
    <div class="form-group">
      <label>Số nhà</label>
      <input name="house_no" class="form-control" placeholder="Ví dụ: Số 308 " value="<?php echo $data->household->house_no?>">
    </div>
    <div class="form-group">
      <label>Chủ hộ *</label>
      <select name="householder_id" class="form-control" value="<?php echo $data->household->householder_id?>">
        <?php foreach($data->people as $item) :?>
        <option value="<?php echo $item->id; ?>" selected ="<?php echo $item->id == $data->household->householder_id ? 'selected': ''; ?>" >
            <?php echo $item->name ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Phố</label>
      <input readonly name="house_street" class="form-control" value="<?php echo $data->settings ? $data->settings->street: "" ?>" />
    </div>
    <div class="form-group">
      <label>Huyện</label>
      <input readonly name="house_ward" class="form-control" value="<?php echo $data->settings ? $data->settings->ward: "" ?>" />
    </div>
    <div class="form-group">
      <label>Thành phố</label>
      <input readonly name="house_city" class="form-control" value="<?php echo $data->settings ? $data->settings->city: "" ?>">
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
  </form>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>