
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h2">Chỉnh sửa</h1>
<div class="row">
<div class="col-3"></div>
<div class="col-6 mt-4">
  <form method="POST" action="<?php echo URLROOT; ?>/people/edit/<?php echo $data->person->id?>">
    <div class="form-group">
      <label>Họ và tên *</label>
      <input name="name" class="form-control" value="<?php echo $data->person->name?>" >
    </div>
    <div class="form-group">
      <label>Hộ khẩu</label>
      <select class="form-control" name = "household_id" value=<?php echo $data->person->household_id?>>
      <?php foreach($data->households as $item) :?>
        <option value="<?php echo $item->id; ?>" selected ="<?php echo $item->id == $data->person->household_id ? 'selected': ''; ?>" >
            <?php echo $item->house_no ?>
        </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
      <label>Số CMND *</label>
      <input name="id_card_no" class="form-control" value="<?php echo $data->person->id_card_no?>">
    </div>
    <div class="form-group row col">
        <label>Giới tính</label>
         <div class="form-check ml-2">
          <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="1" <?php echo $data->person->sex == 1? 'checked': ''?>>
          <label class="form-check-label" for="gridRadios1">
            Nam
          </label>
        </div>
        <div class="form-check ml-2">
          <input class="form-check-input"   type="radio" name="sex" id="gridRadios2" value="0" <?php echo $data->person->sex == 0? 'checked': ''?>>
          <label class="form-check-label" for="gridRadios2">
            Nữ
          </label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label>Nghệ nghiệp</label>
            <input name="job" class="form-control" value="<?php echo $data->person->job?>" >
        </div>
        <div class="form-group col">
            <label>Nơi làm việc</label>
            <input name="job_place" class="form-control" value="<?php echo $data->person->job_place?>" >
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col">
            <label>Ngày sinh</label>
            <input name="birth_day" class="form-control"  type="date" value="<?php echo date("Y-m-d", strtotime($data->person->birth_day));?>" >
        </div>
        <div class="form-group col">
            <label>Nơi sinh</label>
            <input name="native_place" class="form-control" value="<?php echo $data->person->native_place?>">
        </div>
    </div>


    <button type="submit" class="btn btn-primary mb-4">Lưu</button>
  </form>
</div>
<div class="col-3">
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>