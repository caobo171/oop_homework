
<?php require APPROOT . '/views/inc/header.php'; ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Khoản thu</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/receipt/add" >
                Thêm khoản thu &nbsp;
                <i class="fa fa-plus"></i>
				</a>
            </div>
          </div>
          <div class="table-responsive focus">
                <div class="row" id="filter">
                    <div class="col col-8">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="type">Loại phí</span>
                            </div>
                            <select class="form-control" name = "type_id">
                                <?php foreach($data->types as $item) :?>
                                    <option value="null">Tất cả</option>
                                    <option value="<?php echo $item->id;?>" <?php echo isset($data->queries['type_id']) && $data->queries['type_id'] == $item->id ? 'selected' : ''?>
                                    >
                                        <?php echo $item->type_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="type">Hộ dân</span>
                            </div>
                            <select class="form-control" name = "household_id">
                                <option value="null">Tất cả</option>
                                <?php foreach($data->households as $item) :?>
                                    <option value="<?php echo $item->id;?>" <?php echo isset($data->queries['household_id']) && $data->queries['household_id'] == $item->id ? 'selected' : ''?>
                                    >
                                        <?php echo $item->house_no ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group  mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Bắt đầu</span>
                            </div>
                            <input type="date" class="form-control" name="start_date" 
                            value="<?php echo isset($data->queries['start_date']) ? $data->queries['start_date'] : "" ?>">
                        </div>
                        <div class="input-group  mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Kết thúc</span>
                            </div>
                            <input type="date" class="form-control" name="end_date"
                            value="<?php echo isset($data->queries['end_date']) ? $data->queries['end_date'] : "" ?>">
                        </div>
                                    
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
                console.log($(this).val() != "null")
                console.log($(this).val());
                if ($(this).val() != "null") {
                    queryParams.set($(this).attr('name'), $(this).val());
                } else {
                    queryParams.delete($(this).attr('name'));
                }
                
                window.location.search = queryParams.toString();
            })
        </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
