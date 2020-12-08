
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm loại thu</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/receipttype/add">
    <div class="form-group">
      <label>Tên</label>
      <input name="type_name" class="form-control" >
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