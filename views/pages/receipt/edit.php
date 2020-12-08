
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm khoản thu</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/receipt/edit/<?php echo $data->receipt->id?>">
    <div class="form-group">
      <label>Hộ dân</label>
      <select class="form-control" name = "household_id" value="<?php echo $data->receipt->household_id; ?>">
      <?php foreach($data->households as $item) :?>
        <option value="<?php echo $item->id; ?>" selected ="<?php echo $item->id == $data->person->household_id ? 'selected': ''; ?>" >
            <?php echo $item->house_no ?>
        </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
      <label>Loại khoản thu</label>
      <select class="form-control" name = "type_id" value="<?php echo $data->receipt->type_id; ?>">
        <?php foreach($data->types as $item) :?>
            <option value="<?php echo $item->id; ?>" selected ="<?php echo $item->id == $data->receipt->type_id ? 'selected': ''; ?>" >
                <?php echo $item->type_name ?>
            </option>
            <?php endforeach; ?>
        </select>

    </div>
    <div class="form-group">
      <label>Tổng số tiền</label>
      <input name="amount" class="form-control" value="<?php echo $data->receipt->amount; ?>">
    </div>
    <div class="form-group">
      <label>Ngày nhận</label>
      <input name="receive_date" class="form-control" type='date' value="<?php echo date('Y-m-d',strtotime($data->receipt->receive_date)); ?>">
    </div>
    <div class="form-group">
      <label>Ghi chú</label>
      <textarea name="description" class="form-control" value="<?php echo $data->receipt->description; ?>"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>