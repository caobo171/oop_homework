
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm loại thu</h1>
<div class="row">
<div class="col-6 mt-4 focus">
  <form method="POST" action="<?php echo URLROOT; ?>/receipttype/add">
    <div class="form-group">
      <label>Tên</label>
      <input name="type_name" class="form-control" placeholder="Tên loại khoản thu">
    </div>
    <div class="form-group">
      <label>Ghi chú</label>
      <textarea name="description" class="form-control" placeholder="Mô tả"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>