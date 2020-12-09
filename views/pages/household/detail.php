
<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h3"><?php echo $data->household->house_no ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" onclick="window.history.back()">Quay lại</button>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/household/edit/<?php echo $data->household->id; ?>">   
                Sửa hộ dân
                <i class="fa fa-edit"></i></a>
              </div>
    
            </div>
          </div>
          <div class="container mt-4 mb-4">
             <div class="row">
                 <div class="col col-5">
                     <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-address-book mr-2" aria-hidden="true"></i>
                         Chủ nhà: </span>
                         <span class="value">
                             <?php echo $data->household->householder_name ? $data->household->householder_name : '<span class="text-danger">Chưa có chủ hộ</span>' ?>
                        </span>
                    </div>
                    <div class="row mb-2">
                         <span class="label">
                         <i class="fa fa-id-card mr-2" aria-hidden="true"></i>
                         Số nhà: </span>
                         <span class="value"><?php echo $data->household->house_no; ?></span>
                    </div>
                </div>
                 <div class="col  col-5 col2">
                   
                </div>
                <div class="col col-1 "> </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Số CMND</th>
                  <th>Tên</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
				  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($data->people as $item) :?>
              <tr>
				<td><?php echo $item->id_card_no ?></td>
                <td><?php echo $item->name ?></td>
				<td><?php echo $item->sex ? 'Nam' : 'Nữ' ?></td>
				<td><?php echo date('d/m/Y',strtotime($item->birth_day)) ?></td>
				<td>
					<div class="dropdown">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/people/detail/<?php echo $item->id?>">Chi tiết</a>   
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/people/edit/<?php echo $item->id?>">Sửa</a>   
							<form action="<?php echo URLROOT;?>/people/delete/<?php echo $item->id ?>" method="post">
								<input  class="dropdown-item" type="submit" value="Xoá" >
							</form>
     
						</div>
					</div>    
				</td>
              </tr>

              <?php endforeach; ?>
                
              </tbody>
            </table>
          </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>