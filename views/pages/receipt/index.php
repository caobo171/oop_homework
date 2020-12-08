
<?php require APPROOT . '/views/inc/header.php'; ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Khoản thu</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/receipt/add" >
                Thêm khoản thu
                <i class="fa fa-plus"></i>
				</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Household_id</th>
                    <th>Tiền thu</th>
                    <th>Mô tả</th>
                    <th>Ngày thu</th>
				    <th></th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($data->receipts as $item) :?>
              <tr>
				<td>#<?php echo $item->id ?></td>
				<td><?php echo $data->households_array[$item->household_id]->house_no ?></td>
                <td><?php echo money_format('%i đ',$item->amount) ?></td>
                <td><?php echo $item->description ?></td>
				<td><?php echo $item->receive_date ?></td>
				<td>
					<div class="dropdown">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo URLROOT;?>/receipt/detail/<?php echo $item->id?>">Chi tiết</a>  
                        <a class="dropdown-item" href="<?php echo URLROOT;?>/receipt/edit/<?php echo $item->id?>">Sửa</a>  
                        <form action="<?php echo URLROOT;?>/receipt/delete/<?php echo $item->id ?>" method="post">
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