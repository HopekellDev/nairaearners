        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-wallet"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Wallet Balance</span>
                    <span class="info-box-number">1,410</span>
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
                  <tr>
                    <td>#H7ey778JJbKlOi9G</td>
                    <td><?php echo $app->currency_symbol . number_format(700,0,'.',',');?></td>
                    <td><span class="badge badge-success">Credit</span></td>
                    <td>Success</td>
                    <td>Aug 14, 2022</td>
                  </tr>
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