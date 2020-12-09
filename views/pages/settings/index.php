
<?php require APPROOT . '/views/inc/header.php'; ?>
<h2>Cài đặt</h2>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/settings/edit">
    <div class="form-group">
      <label>Phố</label>
      <input name="street" class="form-control" value="<?php echo $data?$data->street :"" ?>" />
    </div>
    <div class="form-group">
      <label>Huyện</label>
      <input name="ward" class="form-control" value="<?php echo $data?$data->ward :"" ?>" />
    </div>
    <div class="form-group">
      <label>Thành phố</label>
      <input name="city" class="form-control" value="<?php echo $data?$data->city :"" ?>" />
    </div>
    <button type="submit" class="btn btn-primary">Save change</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>