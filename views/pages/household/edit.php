
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/household/edit/<?php echo $data->id?>">
    <div class="form-group">
      <label>Số nhà</label>
      <input name="house_no" class="form-control" placeholder="Ví dụ: Số 308 " value="<?php echo $data->house_no?>">
    </div>
    <div class="form-group">
      <label>Phố</label>
      <select name="house_street" class="form-control" value="<?php echo $data->house_street?>">
        <option value="Quang trung">Quang trung</option> 
        <option value="Nguyễn Trãi">Nguyễn Trãi</option> 
      </select>
    </div>
    <div class="form-group">
      <label>Huyện</label>
      <select name="house_ward" class="form-control" value="<?php echo $data->house_ward?>">
        <option value="Ứng Hoà">Ứng Hoà</option> 
        <option value="Thanh Xuân">Thanh Xuân</option> 
      </select>
    </div>
    <div class="form-group">
      <label>Thành phố</label>
      <select name="house_city" class="form-control" value="<?php echo $data->house_city?>">
        <option value="Hà Nội">Hà Nội</option> 
        <option value="Hồ Chí Minh">Hồ Chí Minh</option> 
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Save change</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>