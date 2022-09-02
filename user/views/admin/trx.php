<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Withdrawal Info</h2>
            </div>
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p><b>User:</b> <?php echo $trx['name'];?></p>
                    </li>
                    <li class="nav-item">
                        <p><b>Amount:</b> <?php echo $trx['amount'];?></p>
                    </li>
                    <li class="nav-item">
                        <p><b>Date:</b> <?php echo $trx['created_at'];?></p>
                    </li>
                    <li class="nav-item"><p><b>Status:</b> <?php echo $trx['name'];?></p></li>
                    <li class="nav-item">
                        <p><b>Ref:</b> #<?php echo $ref?></p>
                    </li>
                    <li class="nav-item"></li>
                </ul>
                <p><b>Withdrawal Info:</b></p>
                <?php 
                $user_id = $trx['user_id'];
                $result=$conn->query("SELECT * FROM bank_accounts WHERE user_id='$user_id'");
                if($result->num_rows > 0)
                {
                    $bank = $result->fetch_assoc();
                    extract($bank);
                    ?>
                <div class="alert alert-info">
                    <p><b>Bank name: </b><?php echo $bank_name;?></p>
                    <p><b>Account Name: </b><?php echo $beneficiary;?></p>
                    <p><b>Account Number: </b><?php echo $account_number;?></p>
                </div>
                    <?php
                }
                ?>
                <hr>
                <?php 
                
                if ($trx['status'] === '1') {
                    ?>
                    <div class="alert alert-success text-center">Withdrawal Approved</div>
                    <?php
                }elseif($trx['status'] === '2'){
                    ?>
                    <div class="alert alert-danger text-center">Withdrawal Declined</div>
                    <?php
                }else{
                    ?>
                    <center>
                        <a href="?ref=<?php echo $ref .'&approve=true';?>" class="btn btn-success btn-sm">Approve Withdrawal</a>
                        <a href="?ref=<?php echo $ref .'&decline=true&user=' . $user_id . '&coin='. $trx['amount'];?>" class="btn btn-danger btn-sm">Decline Withdrawal</a>
                    </center>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>