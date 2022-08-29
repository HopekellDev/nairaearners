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
            <div class="col-md-9 col-sm-6 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wallet History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>TX ID</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $result = $conn->query("SELECT * FROM transactions WHERE user_id = '$id' ORDER BY id DESC");
                  if ($result->num_rows > 0) {
                    while ($trow = $result->fetch_assoc()) {
                      extract($trow);
                      ?>
                  <tr>
                    <td>#<?php echo $tx_ref;?></td>
                    <td><?php echo $app->currency_symbol . number_format($amount,0,'.',',');?></td>
                    <td>
                      <?php
                      if ($type =='1') {
                       echo ' <span class="badge badge-primary">Credit</span>';
                      }else{
                        echo ' <span class="badge badge-info">Debit</span>';
                      }
                     ?>
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
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- ./col -->
        </div>