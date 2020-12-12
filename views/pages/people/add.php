
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Thêm nhân khẩu</h1>
<div class="row">
<div class="col focus mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/people/add">
    <div class="form-group">
      <label>Họ và tên *</label>
      <input name="name" class="form-control" >
    </div>

    <div class="form-group">
      <label>Hộ khẩu *</label>
      <select class="form-control" name = "household_id">
        <?php foreach($data->households as $item) :?>
          <option value="<?php echo $item->id; ?>" <?php echo ($data->household != null && $data->household->id == $item->id) ? 'selected' :''; ?> >
              <?php echo $item->house_no ?>
          </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
      <label>Số CMND</label>
      <input name="id_card_no" class="form-control" >
    </div>
    <div class="form-group row col">
        <label>Giới tính</label>
         <div class="form-check ml-2">
          <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="1" checked>
          <label class="form-check-label" for="gridRadios1">
            Nam
          </label>
        </div>
        <div class="form-check ml-2">
          <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="0">
          <label class="form-check-label" for="gridRadios2">
            Nữ
          </label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label>Nghề nghiệp</label>
            <input name="job" class="form-control">
        </div>
        <div class="form-group col">
            <label>Nơi làm việc</label>
            <input name="job_place" class="form-control" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label>Ngày sinh</label>
            <input name="birth_day" class="form-control"  type="date">
        </div>
        <div class="form-group col">
            <label>Nơi sinh</label>
            <input name="native_place" class="form-control" >
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Thêm nhân khẩu</button>
  </form>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>