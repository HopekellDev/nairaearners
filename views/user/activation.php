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
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <script src="https://js.paystack.co/v1/inline.js"></script> 
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