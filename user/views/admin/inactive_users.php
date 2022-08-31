            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inactive Users </h3>
                            <span class="float-right"><a href="javascript:Void(0);" class="btn btn-primary btn-sm"  style="float: right"><i class="fa fa-plus"></i> Add New User</a></span>
                        </div>
                        <div class="card-body">
                        <table id="example2" class="table table-striped table-hover">
                            <thead>
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $conn->query("SELECT * FROM users WHERE status = '0' AND user_role='user' ORDER BY id DESC");
                            if ($result->num_rows > 0) {
                            while ($urow = $result->fetch_assoc()) {
                                extract($urow);
                                ?>
                            <tr>
                            <td><b><?php echo $name;?></b></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo date('F d, Y', strtotime($regdate)); ?></td>
                            <td>
                                
                            <?php
                                if ($status =='1') {
                                echo ' <span class="badge badge-success">Active</span>';
                                }elseif($status =='0'){
                                echo ' <span class="badge badge-warning">Inactive</span>';
                                }else{
                                    echo ' <span class="badge badge-danger">Blocked</span>';
                                }
                            ?>
                            </td>
                            <td><a href="user?id=<?php echo base64_encode($id);?>" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> View User</a></td>
                            </tr>
                                <?php
                            }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Join Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>