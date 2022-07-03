<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
    <input type="textbox" name="name" id="name" placeholder="Enter your name" /><br /><br />
    <input type="textbox" name="amt" value="5" id="amt" placeholder="Enter amt" /><br /><br />
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
    <style>
        i#powered-by {
            z-index: -9999 !important; 
        }
    </style>
</form>

<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();

        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: "amt=" + amt + "&name=" + name,
            success: function(result) {
                var options = {
                    "key": "rzp_test_zr0e0xCtwZpA90", //demo api key
                    // "key": "rzp_live_zei2DdhKHtojQ4", //live api key
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "https://mohd-kamleen.web.app/image/kamleen.png",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thank_you.php?p_id=" + result;
                            }


                        });
                    },
                    "prefill": {
                        "name": "Gaurav Kumar",
                        "email": "gaurav.kumar@example.com",
                        "contact": "9999999999"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#bff39f"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
</script>