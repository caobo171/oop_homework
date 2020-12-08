
<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h3"><?php echo $data->household->house_no ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/people/add" >
                Thêm nhân khẩu
                <i class="fa fa-plus"></i>
				</a>
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