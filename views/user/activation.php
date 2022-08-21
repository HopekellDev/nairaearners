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
                    key: 'pk_test_80918e95a8c6c6b3179746faf7fd06d2031de9f0', // Replace with your public key
                    email: '<?php echo $email;?>',
                    amount: 1000 * 100,
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
                    public_key: "FLWPUBK_TEST-42616d4e9b3c70cce8ddaf618879d912-X",
                    tx_ref: "<?php echo uniqid(); ?>",
                    amount: 1000,
                    currency: "NGN",
                    payment_options: "card, banktransfer, ussd",
                    redirect_url: "./activate?id=<?php echo base64_encode($id);?>&state=<?php echo base64_encode('success');?>",
                    meta: {
                        consumer_id: 23,
                        consumer_mac: "92a3-912ba-1192a",
                    },
                    customer: {
                        email: "rose@unsinkableship.com",
                        phone_number: "08102909304",
                        name: "Rose DeWitt Bukater",
                    },
                    customizations: {
                        title: "Naira Earners",
                        description: "Payment for account activation",
                        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
                    },
                    });
                }
                </script>