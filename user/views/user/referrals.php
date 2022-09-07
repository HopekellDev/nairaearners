<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-radius: 50%;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 140px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -75px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.img-circle {
    max-width: 100px;
    margin: auto;
}
</style>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="img-circle"><img src="<?php if ($avatar!=null) { echo './uploads/user/' . $avatar;}else { echo './assets/dist/img/avatar.png';} ?>" alt="<?php echo $username; ?>" width="100%"></div>
                <hr>
                <h5 class="text-muted text-center"><?php echo $name; ?></h5>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card" style="height:50vh;">
            <div class="card-body">
                <?php
                if ($status == '1') {
                ?>
                <h3 class="text-moted">You have <span class="text-info">[<?php echo $refs->num_rows; ?>]</span>
                    Referrals
                </h3>
                <hr />
                <h5 class="text-muted">Use the referal Link below to Invite your friends</h5>
                <div class="input-group input-group-md">
                    <input type="text" class="form-control" id="refLink"
                        value="<?php echo $url . '?ref=' . base64_encode($username); ?>" readonly />
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-flat" onclick="copyLink()" onmouseout="outFunc()">
                            <span class="tooltiptext" id="myTooltip">Copy Link</span>
                        </button>
                    </span>
                </div>
                <?php

                } else {
                ?>
                <p class="text-center">Activate your account to start referrring <a href="./account-activation"
                        class="btn btn-success btn-sm"> Activate now</a></p>
                <?php
                }
                ?>
            </div>
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
                <div class="img-circle">
                    <img src="<?php if ($ref['avatar']!=null) { echo './uploads/user/' . $ref['avatar'];}else { echo './assets/dist/img/avatar.png';} ?>" alt="<?php echo $ref['username']; ?>" width="100%">
                </div>
                <hr>
                <h5 class="text-muted text-center"><?php echo $ref['name']; ?> </h5>

                <?php
                        if ($ref['status'] == '1') {
                            echo '<span class="badge badge-success">Activated</span>';
                        } else {
                            echo '<span class="badge badge-danger">Not Activated</span>';
                        }
                        ?>
                <p><a href="tel:<?php echo $ref['phone']; ?>" title="Call <?php echo $ref['name']; ?>"><i
                            class="fa fa-phone"></i> <?php echo $ref['phone']; ?></a></p>

            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>
<script>
function copyLink() {
    var copyText = document.getElementById("refLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Link Copied";
}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copy Link";
}
</script>