
<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h3">Hộ dân:&nbsp;<?php echo $data->household->house_no ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
				<button class="btn btn-sm btn-outline-secondary" onclick="window.history.back()">Quay lại</button>
				<a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/people/add?household_id=<?php echo $data->household->id;?>">
					Thêm nhân khẩu
				</a>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/household/edit/<?php echo $data->household->id; ?>">   
                	Sửa hộ dân
                <i class="fa fa-edit"></i></a>
              </div>
    
            </div>
          </div>
		  <div class="container mt-4 mb-4 focus" style="max-width:800px;">
		  		<div class="row">
					  <div class="col ">
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
					<div class="col ">
						<div class="label mb-2">Lịch sử hành động</div>
						<ul class="list-group">
							<?php foreach($data->actionlogs as $item) :?>
								<li class="list-group-item"><?php echo $item->name  ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

          </div>
          <div class="table-responsive focus">
			<?php if (count($data->people) > 0): ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Số CMND</th>
                  <th>Tên</th>
				  <th>Quan hệ với chủ hộ</th>
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
				<td><?php echo $item->householder_relationship != '' ? $item->householder_relationship : '<span class="text-danger">Chưa điền</span>' ?></td>
				<td><?php echo $item->sex ? 'Nam' : 'Nữ' ?></td>
				<td><?php echo date('d/m/Y',strtotime($item->birth_day)) ?></td>
				<td>
					<div class="dropdown">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/people/detail/<?php echo $item->id?>">Chi tiết</a>   
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/people/edit/<?php echo $item->id?>">Sửa nhân khẩu</a>   
							<form action="<?php echo URLROOT;?>/people/delete/<?php echo $item->id ?>" method="post">
								<input  class="dropdown-item" type="submit" value="Chuyển nhân khẩu đi" >
							</form>
     
						</div>
					</div>    
				</td>
              </tr>

              <?php endforeach; ?>
                
              </tbody>
			</table>
				<?php else: ?>
					<div class="empty">
						<img src="<?php echo URLROOT; ?>/static/image/empty.png"/>
					</div>
				<?php endif; ?>
		  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>