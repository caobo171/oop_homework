
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm khoản thu</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/receipt/add">
    <div class="form-group">
      <label>Hộ dân</label>
      <select class="form-control" name = "household_id">
      <?php foreach($data->households as $item) :?>
        <option value="<?php echo $item->id; ?>" >
            <?php echo $item->house_no ?>
        </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
      <label>Loại khoản thu</label>
      <select class="form-control" name = "type_id">
        <?php foreach($data->types as $item) :?>
            <option value="<?php echo $item->id; ?>" >
                <?php echo $item->type_name ?>
            </option>
            <?php endforeach; ?>
        </select>

    </div>
    <div class="form-group">
      <label>Tổng số tiền</label>
      <input name="amount" class="form-control" >
    </div>
    <div class="form-group">
      <label>Ngày nhận</label>
      <input name="receive_date" class="form-control" type='date'>
    </div>
    <div class="form-group">
      <label>Ghi chú</label>
      <textarea name="description" class="form-control" ></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>