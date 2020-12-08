
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Loại Khoản thu</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/receipttype/add" >
                Thêm loại khoản thu
                <i class="fa fa-plus"></i>
				</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
				    <th></th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($data as $item) :?>
              <tr>
				<td>#<?php echo $item->id ?></td>
				<td><?php echo $item->type_name ?></td>
				<td><?php echo $item->description ?></td>
				<td><?php echo date('d/m/Y',$item->since) ?></td>
				<td>
					<div class="dropdown">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/receipttype/detail/<?php echo $item->id?>">Chi tiết</a>  
                            <a class="dropdown-item" href="<?php echo URLROOT;?>/receipttype/edit/<?php echo $item->id?>">Sửa</a>  
							<form action="<?php echo URLROOT;?>/receipttype/delete/<?php echo $item->id ?>" method="post">
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