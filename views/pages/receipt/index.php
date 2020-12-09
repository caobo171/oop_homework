
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
                <div class="row" id="filter">
                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="type">Loại phí</span>
                        </div>
                        <select class="form-control" name = "type_id">
                            <option>Lọc</option>
                            <?php foreach($data->types as $item) :?>
                                <option value="<?php echo $item->id; ?>" 
                                >
                                    <?php echo $item->type_name ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <div class="input-group mb-3 col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Bắt đầu</span>
                        </div>
                        <input type="date" class="form-control" name="start_date" 
                        value="<?php echo isset($data->queries['start_date']) ? $data->queries['start_date'] : "" ?>">
                    </div>
                    <div class="input-group mb-3 col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Kết thúc</span>
                        </div>
                        <input type="date" class="form-control" name="end_date"
                        value="<?php echo isset($data->queries['end_date']) ? $data->queries['end_date'] : "" ?>">
                    </div>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Số nhà</th>
                    <th>Mô tả</th>
                    <th>Ngày thu</th>
                    <th>Tiền thu</th>
				    <th></th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($data->receipts as $item) :?>
              <tr>
				<td>#<?php echo $item->id ?></td>
				<td><?php echo $data->households_array[$item->household_id]->house_no ?></td>
                <td><?php echo $item->description ?></td>
                <td><?php echo date("d/m/Y", strtotime($item->receive_date)); ?></td>
                <td><?php echo money_format('%i đ',$item->amount) ?></td>
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
              <tr>
				<td></td>
				<td></td>
                <td></td>
                <td>Tổng tiền</td>
				<th> 
                    <?php echo money_format('%i đ',array_sum(
                        array_map(function($e) {
                            return $e->amount;
                        }, $data->receipts)
                    )); ?>
                </th>
                <td></td>
              </tr>
              </tbody>
            </table>
          </div>
          <script>
            
            $('#filter input').change(function(e) {
                var queryParams = new URLSearchParams(window.location.search);
                queryParams.set($(this).attr('name'), $(this).val());
                window.location.search = queryParams.toString();
            })

            $('#filter select').change(function(e) {
                var queryParams = new URLSearchParams(window.location.search);
                queryParams.set($(this).attr('name'), $(this).val());
                window.location.search = queryParams.toString();
            })
        </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
