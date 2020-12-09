
<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4">
        <h2>Thông tin</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" onclick="window.history.back()">Quay lại</button>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/people/edit/<?php echo $data->person->id; ?>">   
                    Chỉnh sửa
                <i class="fa fa-edit"></i></a>
              </div>
            </div>
          </div>
          <div class="container mt-4">
             <div class="row">
                 <div class="col col-1"> </div>
                 <div class="col col-5 col2">
                     <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-address-book mr-2" aria-hidden="true"></i>
                         Họ và tên: </span>
                         <span class="value"><?php echo $data->person->name; ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-id-card mr-2" aria-hidden="true"></i>
                         Số CMND: </span>
                         <span class="value"><?php echo $data->person->id_card_no; ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-heart-o mr-2" aria-hidden="true"></i>
                         Nghề nghiệp: </span>
                         <span class="value"><?php echo $data->person->job; ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-umbrella mr-2" aria-hidden="true"></i>
                         Quan hệ với chủ hộ: </span>
                         <span class="value"><?php echo $data->person->householder_relationship; ?></span>
                    </div>
                </div>
                 <div class="col  col-5 col2">
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-male mr-2" aria-hidden="true"></i>
                         Giới tính: </span>
                         </span>
                         <span class="value"><?php echo $data->person->sex ? 'Nam': 'Nữ'; ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                         Ngày sinh: </span>
                         <span class="value"><?php echo date('d/m/Y', strtotime($data->person->birth_day)); ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>
                         Nơi làm việc: </span>
                         <span class="value"><?php echo $data->person->job_place; ?></span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-home mr-2" aria-hidden="true"></i>
                         Hộ dân: </span>
                         <span class="value"><?php echo $data->household->house_no; ?></span>
                    </div>
                </div>
                <div class="col col-1 "> </div>
            </div>
          </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>