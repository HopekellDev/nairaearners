<?php
if ($country ==null) {
    ?>
    <script>
        alert('Please Complete your profile to continue')
        window.location.href="./my-profile";
    </script>
    <?php
}

?>
            
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <?php
                        if($status === '1'){
                            ?>
                        <div class="bg-success">
                            <h2 class="text-center text-white">
                                Account Activated
                            </h2>
                            <hr>
                            <svg width="100%" height="auto" version="1.1" viewBox="0 0 752 752" xmlns="http://www.w3.org/2000/svg">
                                <g fill="#fff">
                                <path d="m595.46 304.39h-4.332c-15.016-44.18-44.18-83.453-82.59-110.6l21.66-37.254c0.57812-0.86719 0.57812-2.0195 0-2.8867-0.57812-0.86719-1.4453-1.4453-2.3086-1.4453h-50.824c-2.3086 0-2.5977 1.4453-11.84 17.039-27.145-11.262-56.02-17.324-86.055-17.324-29.742 0-58.621 5.7734-86.055 17.324l-9.2422-15.883c-0.57812-0.86719-1.4453-1.4453-2.3086-1.4453-52.844 0-51.977-0.86719-53.422 1.4453-0.57813 0.86719-0.57813 2.0195 0 2.8867l21.656 36.961c-52.262 37.543-86.336 95.297-92.98 159.12-9.2383 10.684-14.727 24.832-14.727 40.137 0 19.637 8.9531 36.961 23.102 48.512 27.434 90.672 112.04 158.82 213.98 158.82h0.28906c58.043 0 114.35-23.102 156.22-63.816 0.28906-0.28906 0.28906-0.57812 0.57812-0.57812 34.074-33.496 57.465-77.68 64.684-127.64 5.4883-2.0195 9.2422-7.5078 9.2422-13.57v-75.371c-0.28906-8.0859-6.9297-14.438-14.727-14.438zm-116.95-146.41h44.469l-108.29 184.23h-19.348c-5.7734-9.5312-2.8867-4.9102-12.996-21.945zm-99.051 436.33c-0.28516 0-0.28516 0 0 0h-0.28906c-54.867 0-107.13-21.082-146.98-57.465h294.25c-41.578 37.828-94.133 57.465-146.98 57.465zm-0.28516-209.07c39.562 0 73.059 31.766 73.059 73.059 0 40.426-32.918 73.059-73.059 73.059-40.141 0-73.059-32.633-73.059-73.059 0-40.715 32.918-73.059 73.059-73.059zm43.023 7.2188c-26.566-17.324-60.641-16.75-86.055 0l0.003906-38.406c0-2.8867 1.7344-5.1992 4.6211-6.0625l4.6211 8.0859c-2.3086 2.0195-3.4648 4.9102-3.4648 7.7969 0 6.0625 4.9102 10.684 10.684 10.684h52.844c6.0625 0 10.684-4.9102 10.684-10.684 0-6.0625-4.9102-10.684-10.684-10.684l-3.4648-0.003906-3.1758-5.4883h17.324 0.28906c3.4648 0 6.0625 2.8867 6.0625 6.3516v38.41zm-71.324-27.145c0.57812 0.86719 1.4453 1.4453 2.3086 1.4453h51.977c0.28906 0 0.57813 0 0.86719-0.28906h0.28906c0.28906 0 0.28906-0.28906 0.57813-0.28906 0.28906 0 0.28906-0.28906 0.28906-0.57812 0 0 0-0.28906 0.28906-0.28906l0.28906-0.28906s2.0195-3.1758 2.3086-4.043c2.3086 3.4648-0.28906 8.0859-4.332 8.0859h-53.133c-2.8867 0-5.1992-2.3086-5.1992-5.1992 0-1.1562 0.28906-2.0195 0.86719-2.8867zm28.301-207.34c28.875 0 56.887 5.4883 83.164 16.461l-83.164 140.34-83.168-140.34c26.277-10.973 54.289-16.461 83.168-16.461zm-99.34 0c129.37 218.31 86.918 146.98 120.42 203.29h-45.336c-12.418-21.082-103.67-176.73-119.26-203.29zm-132.25 234.48c0-31.477 25.699-57.176 57.176-57.176 31.477 0 57.176 25.699 57.176 57.176 0 31.477-25.699 57.176-57.176 57.176-31.477 0-57.176-25.699-57.176-57.176zm57.176 62.664c34.363 0 62.664-28.012 62.664-62.664 0-34.363-28.012-62.664-62.664-62.664-15.883 0-30.32 6.0625-41.582 15.883 8.375-59.199 40.426-112.33 89.52-147.27l85.188 144.96c-4.332 1.7344-7.2188 6.0625-7.2188 10.973v42.449c-19.059 15.016-30.031 37.539-30.031 61.797 0 33.207 20.504 61.508 49.668 73.059l-123.89 0.003907c-23.969-23.391-42.738-52.266-53.711-85.188 9.2422 5.1992 20.215 8.6641 32.055 8.6641zm327.46 76.234h-124.17c56.309-22.234 67.281-97.316 19.637-134.86v-42.449c0-4.9102-2.8867-8.9531-7.2188-10.973l85.188-144.96c36.672 26.277 64.684 63.527 79.41 105.98h-109.73c-8.0859 0-14.438 6.6406-14.438 14.438v75.367c0 7.2188 5.1992 12.996 11.84 14.148 0 29.453-0.86719 30.609 1.4453 31.766 0.86719 0.57812 2.0195 0.28906 2.8867-0.28906l39.852-31.188h77.68c-6.9375 48.227-29.75 90.676-62.379 123.02zm72.191-137.16c0 4.9102-4.043 8.9531-8.9531 8.9531h-79.41c-0.57813 0-1.1562 0.28906-1.7344 0.57812l-36.098 28.301v-26.277c0-1.4453-1.1562-2.8867-2.8867-2.8867-4.9102 0-8.9531-4.043-8.9531-8.9531l0.003907-75.086c0-4.9102 4.043-8.9531 8.9531-8.9531l120.12 0.003906c4.9102 0 8.9531 4.043 8.9531 8.9531z"/>
                                <path d="m372.82 553.59c0-1.4453-1.1562-2.8867-2.8867-2.8867h-66.707c-1.4453 0-2.8867 1.1562-2.8867 2.8867 0 1.4453 1.1562 2.8867 2.8867 2.8867h66.996c1.4414-0.28906 2.5977-1.4414 2.5977-2.8867z"/>
                                <path d="m378.02 553.59c0 1.4453 1.1562 2.8867 2.8867 2.8867h10.973c1.4453 0 2.8867-1.1562 2.8867-2.8867 0-1.4453-1.1562-2.8867-2.8867-2.8867h-10.973c-1.7305 0-2.8867 1.4453-2.8867 2.8867z"/>
                                <path d="m401.12 556.19h7.2188c1.4453 0 2.8867-1.1562 2.8867-2.8867 0-1.4453-1.1562-2.8867-2.8867-2.8867h-7.2188c-1.4453 0-2.8867 1.1562-2.8867 2.8867 0.28516 1.7344 1.4414 2.8867 2.8867 2.8867z"/>
                                <path d="m385.53 567.17c0 1.4453 1.1562 2.8867 2.8867 2.8867h66.996c1.4453 0 2.8867-1.1562 2.8867-2.8867 0-1.4453-1.1562-2.8867-2.8867-2.8867l-66.996-0.003906c-1.7305 0-2.8867 1.1562-2.8867 2.8906z"/>
                                <path d="m377.73 564.28h-10.973c-1.4453 0-2.8867 1.1562-2.8867 2.8867 0 1.4453 1.1562 2.8867 2.8867 2.8867h10.973c1.4453 0 2.8867-1.1562 2.8867-2.8867-0.28906-1.7305-1.4414-2.8867-2.8867-2.8867z"/>
                                <path d="m357.23 564.28h-7.2188c-1.4453 0-2.8867 1.1562-2.8867 2.8867 0 1.4453 1.1562 2.8867 2.8867 2.8867h7.2188c1.4453 0 2.8867-1.1562 2.8867-2.8867-0.28516-1.7305-1.4414-2.8867-2.8867-2.8867z"/>
                                <path d="m359.54 465.23c-9.5312 29.164-11.262 30.609-8.6641 32.633 0.86719 0.57812 2.3086 0.57812 3.1758 0l25.121-18.191 25.121 18.191c2.3086 1.7344 5.4883-0.86719 4.043-3.4648l-9.5312-28.875 25.121-18.191c0.86719-0.57812 1.4453-2.0195 0.86719-3.1758-0.28906-1.1562-1.4453-2.0195-2.5977-2.0195l-30.895-0.007813-9.5273-29.742c-0.28906-1.1562-1.4453-2.0195-2.5977-2.0195-1.1562 0-2.3086 0.86719-2.5977 2.0195l-9.5312 29.453h-31.188c-1.1562 0-2.3086 0.86719-2.5977 2.0195-0.28906 1.1562 0 2.3086 0.86719 3.1758zm9.5273-17.613c1.1562 0 2.3086-0.86719 2.5977-2.0195l7.5078-23.391 7.5078 23.391c0.28906 1.1562 1.4453 2.0195 2.5977 2.0195h24.547l-19.926 14.438c-0.86719 0.57812-1.4453 2.0195-0.86719 3.1758l7.5078 23.391-19.926-14.438c-0.86719-0.57812-2.3086-0.57812-3.1758 0l-19.926 14.438 7.5078-23.391c0.28906-1.1562 0-2.3086-0.86719-3.1758l-19.926-14.438z"/>
                                <path d="m570.92 356.65c0-0.28906 0.86719-1.4453 1.1562-2.0195 3.1758-4.6211 2.8867-7.2188-2.0195-10.395-0.57812-0.28906-1.4453-0.86719-1.7344-1.1562 0-0.28906 0.28906-1.4453 0.28906-2.0195 2.3086-9.8164-5.1992-8.0859-8.0859-9.2422-0.28906-0.28906-0.28906-1.4453-0.57812-2.0195-1.4453-8.9531-6.6406-6.0625-10.973-5.4883-0.28906-0.28906-0.86719-1.1562-1.1562-1.7344-5.4883-8.6641-9.5312-1.7344-12.418-0.86719-2.8867-0.57813-6.9297-7.7969-12.418 0.86719-0.28906 0.57812-0.86719 1.4453-1.1562 1.7344-3.1758 0-9.2422-3.7539-10.973 5.7734 0 0.57812-0.28906 1.7344-0.28906 2.0195-0.28906 0.28906-1.4453 0.28906-2.0195 0.57812-9.8164 1.7344-5.4883 8.0859-5.4883 10.973-0.28906 0.28906-1.1562 0.86719-1.7344 1.1562-8.6641 5.4883-1.7344 9.5312-0.86719 12.418-0.57812 2.8867-7.7969 6.9297 0.86719 12.418 0.57812 0.28906 1.4453 0.86719 1.7344 1.1562 0.57812 2.8867-4.6211 9.2422 5.7734 10.973 0.57812 0 1.7344 0.28906 2.0195 0.28906 0.28906 0.28906 0.28906 1.4453 0.57813 2.0195 1.4453 8.9531 6.6406 6.0625 10.973 5.4883 0.28906 0.28906 0.86719 1.1562 1.1562 1.7344 5.4883 8.6641 9.5312 1.7344 12.418 0.86719 2.8867 0.57812 6.9297 7.7969 12.418-0.86719 0.28906-0.57812 0.86719-1.4453 1.1562-1.7344 3.1758 0 9.2422 3.7539 10.973-5.7734 0-0.57812 0.28906-1.7344 0.28906-2.0195 0.28906-0.28906 1.4453-0.28906 2.0195-0.57812 9.8164-1.7344 5.4883-8.0859 5.4883-10.973 0.28906-0.28906 1.1562-0.86719 1.7344-1.1562 8.375-5.4883 1.4414-9.8203 0.86719-12.422zm-2.3125 6.3555c-2.8867 2.5977-7.2188 2.5977-5.4883 10.395 0 0.57812 0.28906 1.4453 0.28906 1.7344-2.5977 0.86719-4.9102 0.28906-6.9297 2.3086-2.0195 2.0195-1.4453 4.332-2.3086 6.9297-0.57812 0-1.1562-0.28906-1.7344-0.28906-6.6406-1.4453-7.2188 1.1562-10.105 5.4883-2.5977-1.1562-3.4648-3.1758-6.6406-3.1758-2.8867 0-4.332 2.0195-6.6406 3.1758-0.28906-0.28906-0.86719-1.1562-1.1562-1.7344-4.043-6.6406-7.2188-3.7539-10.973-3.4648-0.86719-2.5977-0.28906-4.6211-2.3086-6.9297-2.0195-2.0195-4.332-1.4453-6.9297-2.3086 0.28906-3.7539 3.1758-6.9297-3.4648-10.973-0.57812-0.28906-1.1562-0.86719-1.7344-1.1562 0.28906-0.28906 0.57812-1.1562 1.1562-1.4453 4.6211-6.3516 0.57812-8.6641-1.1562-11.551 0.28906-0.28906 1.1562-0.86719 1.7344-1.1562 6.6406-4.043 3.7539-7.5078 3.4648-10.973 2.5977-0.86719 4.9102-0.28906 6.9297-2.3086s1.4453-4.332 2.3086-6.9297c2.5977 0 4.6211 1.4453 7.2188 0.28906 2.8867-1.1562 3.1758-3.4648 4.9102-5.4883 0.28906 0.28906 1.1562 0.57813 1.4453 1.1562 6.3516 4.6211 8.0859 0.86719 11.551-1.1562 1.7344 2.0195 2.0195 4.332 4.9102 5.4883 2.5977 1.1562 4.9102-0.28906 7.2188-0.28906 0.86719 2.5977 0.28906 4.9102 2.3086 6.9297s4.332 1.4453 6.9297 2.3086c0 0.57813-0.28906 1.4453-0.28906 1.7344-1.7344 7.7969 2.5977 7.7969 5.4883 10.395-0.28906 0.28906-0.57812 1.1562-1.1562 1.4453-4.6211 6.6406-0.57812 8.6602 1.1523 11.551z"/>
                                <path d="m535.4 334.71c-12.129 0-21.945 9.8164-21.945 21.945s9.8164 21.945 21.945 21.945 21.945-9.8164 21.945-21.945c0-12.125-9.8164-21.945-21.945-21.945zm0 38.117c-8.9531 0-16.461-7.2188-16.461-16.461 0-8.9531 7.2188-16.461 16.461-16.461 9.2422 0 16.461 7.2188 16.461 16.461 0 9.2422-7.5078 16.461-16.461 16.461z"/>
                                <path d="m243.46 363.59c-4.043-4.043-11.551-4.043-15.594 0l-38.117 37.828-10.684-10.684c-10.395-10.395-25.988 5.1992-15.594 15.594l18.48 18.48c4.332 4.332 11.262 4.332 15.594 0l45.625-45.625c4.6211-4.332 4.6211-11.266 0.28906-15.594zm-4.043 11.551-45.625 45.914c-2.0195 2.0195-5.7734 2.0195-7.7969 0l-18.48-18.48c-5.1992-5.1992 2.5977-12.996 7.7969-7.7969l12.418 12.418c1.1562 1.1562 2.8867 1.1562 4.043 0l39.848-39.852c2.0195-2.0195 5.7734-2.0195 7.7969 0 2.3086 2.3086 2.3086 5.7734 0 7.7969z"/>
                                </g>
                            </svg>
                        </div>
                            <?php
                        }else{
                            ?>
                        <div style="padding:20px">
                            <h3 class="text-center text-muted">Activation Fee: 1000</h3>
                            <p class="text-center">Select Method of payment</p>
                        </div>
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#paystack" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Paystack</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Flutterwave</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#bank-payment" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Bank Transfer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#crypto-payment" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Crypto Payment</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="paystack" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <form action="" id="paymentForm">
                                        <button class="btn btn-success" type="submit" onclick="payWithPaystack()">Pay 1000 NGN With Paystack</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                <form>
                                    <button type="button" class="btn btn-warning" onclick="makePayment()">Pay 1000 NGN With Flutter wave</button>
                                </form>
                                </div>
                                <div class="tab-pane fade" id="bank-payment" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <h6 class="text-muted text-center">Pay to below bank details and send prove to our whatsapp channel</h6>
                                    <?php if($app->bank_details != null){ ?>
                                    <div style="width: 98%; margin:auto; border:solid thin #bbb; background:#ddd; padding:20px; border-radius: 5px">
                                        <?php echo $app->bank_details;?>
                                    </div>
                                    <br>
                                    <center><a target="blank" href="https://wa.me/%2B2348100739036?text=I%20%20want%20to%20activate%20my%20account%20y%20username%20is%3A%20<?php echo $username;?>%20and%20my%20payment%20proof%20follows." class="btn btn-success btn-sm text-center"><i class="fab fa-whatsapp"></i> Send Proof on Whatsapp</a></center>
                                    <?php }?>
                                </div> 
                                <div class="tab-pane fade" id="crypto-payment" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <h6 class="text-muted text-center">Send Crypto to below wallets and send prove to our whatsapp channel</h6>
                                    <?php 
                                    if ($app->usdt_wallet != null) {
                                       ?>
                                    <div style="padding: 10px; border:solid thin teal; margin-bottom:20px;">
                                       <label for="" class="text-info"><b>USDT-Bep20</b></label>
                                       <div class="input-group input-group-md">
                                        <input type="text" class="form-control" id="usdtWallet" value="<?php echo $app->usdt_wallet;?>" readonly />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" onclick="copyUsdt()" onmouseout="outFunc()">
                                                <span class="tooltiptext" id="usdtTooltip">Copy Address</span>
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                       <?php
                                    }
                                    ?>
                                    <?php 
                                    if ($app->busd_wallet != null) {
                                       ?>
                                    <div style="padding: 10px; border:solid thin teal; margin-bottom:20px;">
                                       <label for="" class="text-info"><b>BUSD-Bep20</b></label>
                                       <div class="input-group input-group-md">
                                        <input type="text" class="form-control" id="busdWallet" value="<?php echo $app->busd_wallet;?>" readonly />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" onclick="copyBusd()" onmouseout="outFunc()">
                                                <span class="tooltiptext" id="busdTooltip">Copy Address</span>
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                       <?php
                                    }
                                    ?>
                                    <center><a target="blank" href="https://wa.me/%2B2348100739036?text=I%20%20want%20to%20activate%20my%20account%20y%20username%20is%3A%20<?php echo $username;?>%20and%20my%20payment%20proof%20follows." class="btn btn-success btn-sm text-center"><i class="fab fa-whatsapp"></i> Send Proof on Whatsapp</a></center>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <script src="https://js.paystack.co/v1/inline.js"></script> 
            <script src="https://checkout.flutterwave.com/v3.js"></script>
            <script>
                const paymentForm = document.getElementById('paymentForm');
                paymentForm.addEventListener("submit", payWithPaystack, false);
                function payWithPaystack(e) {
                e.preventDefault();

                let handler = PaystackPop.setup({
                    key: '<?php echo $app->pstk_public_key;?>', // Replace with your public key
                    email: '<?php echo $email;?>',
                    amount: <?php echo $app->ads_fee * 100;?>,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function(){
                    alert('Window closed.');
                    },
                    callback: function(response){
                    let message = 'Payment complete! Click OK for activation';
                    alert(message);
                    window.location.href="activate?id=<?php echo base64_encode($id);?>&state=<?php echo base64_encode('success');?>";
                    }
                });

                handler.openIframe();
                }
            </script>
            <script>
              function makePayment() {
                FlutterwaveCheckout({
                  public_key: "<?php echo $app->flw_public_key;?>",
                  tx_ref: "<?php echo uniqid();?>",
                  amount: <?php echo $app->ads_fee;?>,
                  currency: "NGN",
                  payment_options: "card, banktransfer, ussd",
                  redirect_url: "./activate?id=<?php echo base64_encode($id);?>&state=<?php echo base64_encode('success');?>",
                  meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                  },
                  customer: {
                    email: "<?php echo $email;?>",
                    phone_number: "08102909304",
                    name: "Rose DeWitt Bukater",
                  },
                  customizations: {
                    title: "<?php echo $app->site_name;?>",
                    description: "Payment for Account Activation",
                    logo: "<?php echo $app->site_url . '/images/' . $front->icon;?>.png",
                  },
                });
              }
            </script>



<script>
function copyUsdt() {
  var copyText = document.getElementById("usdtWallet");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("usdtTooltip");
  tooltip.innerHTML = "Wallet Copied";
}

function outFunc() {
  var tooltip = document.getElementById("usdtTooltip");
  tooltip.innerHTML = "Copy Address";
}
</script>


<script>
function copyBusd() {
  var copyText = document.getElementById("busdWallet");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("busdTooltip");
  tooltip.innerHTML = "Wallet Copied";
}

function outFunc() {
  var tooltip = document.getElementById("busdTooltip");
  tooltip.innerHTML = "Copy Address";
}
</script>