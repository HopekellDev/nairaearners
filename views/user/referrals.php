<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="img-circle"><img src="<?php if ($avatar!=null) { echo $avatar;}else { echo './assets/dist/img/avatar.png';} ?>" alt="<?php echo $username;?>" width="100%"></div>
                <hr>
                <h5 class="text-muted text-center"><?php echo $name;?></h5>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card" style="height:50vh;">
            <div class="card-body"></div>
        </div>
    </div>
</div>
<div class="row">
    <?php if ($refs->num_rows > 0) {
        while ($ref = $refs->fetch_assoc()) {
           ?>
    
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <div class="img-circle"><img src="<?php if ($ref['avatar']!=null) { echo $ref['avatar'];}else { echo './assets/dist/img/avatar.png';} ?>" alt="<?php echo $ref['username'];?>" width="100%"></div>
                <hr>
                <h5 class="text-muted text-center"><?php echo $name;?> </h5>
                
                    <?php
                    if ($ref['status']=='1') {
                        echo '<span class="badge badge-success">Activated</span>';
                    }else{
                        echo '<span class="badge badge-danger">Not Activated</span>';
                    }
                    ?>
                    <p><a href="tel:<?php echo $ref['phone'];?>" title="Call <?php echo $ref['name'];?>"><i class="fa fa-phone"></i> <?php echo $ref['phone'];?></a></p>

            </div>
        </div>
    </div>       
           <?php
        }
    }
    ?>
</div>