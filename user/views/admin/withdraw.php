<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#withdrawRequest" data-toggle="tab">Withdrawal Requests</a></li>
                  <li class="nav-item"><a class="nav-link" href="#withdrawLog" data-toggle="tab">Withdrawal Logs</a></li>
                </ul>
            </div>
            <div class="card-body">
            <div class="tab-content">
                  <div class="active tab-pane" id="withdrawRequest">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT u.*, w.* FROM withdrawals w, users u WHERE w.status ='0' AND u.id = w.user_id ORDER BY w.id DESC");
                            if($result->num_rows > 0)
                            {
                                while($withd = $result->fetch_assoc())
                                {
                                    extract($withd);
                            ?>
                            <tr>
                                <td><?php echo $name;?></td>
                                <td><?php echo $amount;?></td>
                                <td><?php echo $method;?></td>
                                <td><i class="badge badge-warning">Pending</i></td>
                                <td><?php echo date('F d, Y / g:iA', strtotime($created_at));?></td>
                                <td><a href="trx?ref=<?php echo $ref;?>" class="btn btn-primary btn-sm btn-block">View Request</a></td>
                            </tr>
                            <?php
                                }
                            }else{
                                ?>
                            <tr>
                                <td colspan="6">
                                    <center>No withdrawal request at this time</center>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="withdrawLog">
                  <table id="example2"  class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT u.*, w.* FROM withdrawals w, users u WHERE u.id = w.user_id ORDER BY w.id DESC");
                            if($result->num_rows > 0)
                            {
                                while($withd = $result->fetch_assoc())
                                {
                                    extract($withd);
                            ?>
                            <tr>
                                <td><?php echo $name;?></td>
                                <td><?php echo $amount;?></td>
                                <td><?php echo $method;?></td>
                                <td>
                                    <?php
                                    if ($status == "0") {
                                        echo '<i class="badge badge-warning">Pending</i>';
                                    }elseif ($status == "1") {
                                        echo '<i class="badge badge-success">Approved</i>';
                                    }elseif ($status =="2") {
                                        echo '<i class="badge badge-danger">Rejected</i>';
                                    }
                                    ?>
                                </td>
                                <td><?php echo date('F d, Y / g:iA', strtotime($created_at));?></td>
                                <td><a href="trx?ref=<?php echo $ref;?>" class="btn btn-primary btn-sm btn-block">View Request</a></td>
                            </tr>
                            <?php
                                }
                            }else{
                                ?>
                            <tr>
                                <td colspan="6">
                                    <center>No withdrawal request at this time</center>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>