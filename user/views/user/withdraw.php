          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-wallet"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Wallet Balance</span>
                    <span class="info-box-number"><?php echo $app->currency_symbol . GetBalance($id);?></span>
                    <a class="text-info" href="withdraw">Withdraw now <i class="fa fa-arrow-right"></i></a>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
            <div class="col-md-6 col-sm-6 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Withdraw funds</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                <div class="input-group input-group-md">
                  <div class="input-group-prepend">
                    <select name="method" id="" class="form-control rounded-0" required>
                      <option value="">Select Method</option>
                      <option value="Bank">Bank</option>
                      <option value="USDT">USDT-Bep20</option>
                      <option value="BUSD">BUSD-Bep20</option>
                    </select>
                  </div>
                  <input type="text" class="form-control" name="amount" placeholder="<?php echo $app->min_withdraw;?>" required />
                  <span class="input-group-append">
                    <button type="submin" name="withdraw" class="btn btn-info btn-flat">withdraw now!</button>
                  </span>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Withdrawal Log</h5>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>TX ID</th>
                      <th>Amount</th>
                      <th>Method</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM withdrawals WHERE user_id = '$id' ORDER BY id DESC");
                    if ($result->num_rows > 0) {
                      while ($trow = $result->fetch_assoc()) {
                        extract($trow);
                        ?>
                    <tr>
                      <td>#<?php echo $ref;?></td>
                      <td><?php echo $app->currency_symbol . number_format($amount,0,'.',',');?></td>
                      <td>
                        <?php echo $method; ?>
                      </td>
                      <td>
                        
                      <?php
                        if ($status =='1') {
                        echo ' <span class="badge badge-success">Success</span>';
                        }else{
                          echo ' <span class="badge badge-warning">Pending</span>';
                        }
                      ?>
                      </td>
                      <td><?php echo date('F d, Y (g:iA)', strtotime($updated_at));?></td>
                    </tr>
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>TX ID</th>
                      <th>Amount</th>
                      <th>Method</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
            </div>
          </div>
        </div>