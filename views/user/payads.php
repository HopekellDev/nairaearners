<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Pay For Advert 30 Days Duration</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h5 class="text-center"><b>Wallet Balance: </b><?php echo $app->currency_symbol . GetBalance($id);?></h5>
                </div>
                <hr>
                <center>
                    <form action="" method="post" id="paymentForm">
                        <button type="submit" class="btn btn-info"><i class="fa fa-wallet"></i> Pay With Wallet</button>
                        <button type="submit" class="btn btn-success" onclick="payWithPaystack()"><i class="fa fa-credit-card"></i> Pay with Bank/Card</button>
                    </form>
                </center>
            </div>
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