
<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Hộ dân</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/household/add" >
                Thêm hộ dân
                <i class="fa fa-plus"></i>
				</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
				  <th>Số nhà</th>
				  <th>Chủ hộ</th>
                  <th>Phố</th>
                  <th>Huyện/ Thị xã</th>
				  <th>Tỉnh/ Thành phố</th>
				  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($data as $item) :?>
              <tr>
				<td>#<?php echo $item->id ?></td>
				<td><?php echo $item->house_no ?></td>
				<td><?php echo $item->householder_name ? $item->householder_name : '<span class="text-danger">Chưa có chủ hộ</span>' ?></td>
				<td><?php echo $item->house_street ?></td>
				<td><?php echo $item->house_ward ?></td>
				<td><?php echo $item->house_city ?></td>
				<td>
					<div class="dropdown">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo URLROOT;?>/household/detail/<?php echo $item->id?>">Sửa</a>
							<a class="dropdown-item" href="<?php echo URLROOT;?>/household/edit/<?php echo $item->id?>">Sửa</a> 
							<form action="<?php echo URLROOT;?>/household/delete/<?php echo $item->id ?>" method="post">
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