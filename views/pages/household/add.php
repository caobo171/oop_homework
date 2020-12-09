
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Hộ dân</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/household/add">
    <div class="form-group">
      <label>Số nhà</label>
      <input name="house_no" class="form-control" placeholder="Ví dụ: 308 ">
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>