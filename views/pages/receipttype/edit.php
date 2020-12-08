
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm loại thu</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/receipttype/edit/<?php echo $data->id; ?>">
    <div class="form-group">
      <label>Tên</label>
      <input name="type_name" class="form-control" value="<?php echo $data->type_name?>" >
    </div>
    <div class="form-group">
      <label>Ghi chú</label>
      <textarea name="description" class="form-control" value="<?php echo $data->description?>"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>