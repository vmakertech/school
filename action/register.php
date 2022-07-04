<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>




<?php
session_start();
include('conn.php');


if (isset($_POST['submit'])) {
    $class = $_POST['class'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $candidatePicture = $_FILES['candidatePicture']['name'];
    $tmpCandidatePicture = $_FILES['candidatePicture']['tmp_name'];
    $folder = '../assest/candidatePicture/' . $candidatePicture;
    move_uploaded_file($tmpCandidatePicture, $folder);


    $candidateSignature = $_FILES['candidateSignature']['name'];
    $tmpCandidateSignature = $_FILES['candidateSignature']['tmp_name'];
    $folder = '../assest/candidateSignature/' . $candidateSignature;
    move_uploaded_file($tmpCandidateSignature, $folder);




    $candidateContact = $_POST['candidateContact'];
    $candidateEmail = $_POST['candidateEmail'];
    $gander = $_POST['gander'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $fatherName = $_POST['fatherName'];
    $fatherProfession = $_POST['fatherProfession'];
    $fatherQualification = $_POST['fatherQualification'];
    $fatherContact = $_POST['fatherContact'];
    $fatherEmail = $_POST['fatherEmail'];
    $motherName = $_POST['motherName'];
    $motherProfession = $_POST['motherProfession'];
    $motherQualification = $_POST['motherQualification'];
    $motherContact = $_POST['motherContact'];
    $motherEmail = $_POST['motherEmail'];
    $cast = $_POST['cast'];

    $isEws = $_POST['isEws'];
    $isEws == "" ? $isEws = "False" : $isEws = "True";

    $isDisbled = $_POST['isDisabled'];
    $isDisbled == "" ? $isDisbled = "False" : $isDisbled = "True";

    $anySiblings = $_POST['anySiblings'];
    $siblingName = $_POST['siblingName'];
    $siblingClass = $_POST['siblingClass'];
    if ($anySiblings == "") {
        $anySiblings = "False";
        $siblingName = "Unavailable";
        $siblingClass = "0";
    } else {
        $anySiblings = "True";
    }

    $aadharNumber = $_POST['aadharNumber'];
    $bloodGroup = $_POST['bloodGroup'];
    $fees = $_POST['class'] . "00";
    $paymentStatus = "pending";
    $registerOn = date('Y-m-d h:i:s');
    $paymentId = "pending";


    $query = mysqli_query($conn, "INSERT INTO `collage` (`class`, `firstName`, `lastName`, `candidatePicture`, `candidateSignature`, `candidateContact`, `candidateEmail`, `gander`, `dob`, `address`, `fatherName`, `fatherProfession`, `fatherQualification`, `fatherContact`, `fatherEmail`, `motherName`, `motherProfession`, `motherQualification`, `motherContact`, `motherEmail`, `cast`, `isEws`, `isDisabled`, `anySiblings`, `siblingName`, `siblingClass`, `aadharNumber`, `bloodGroup`, `fees`, `paymentStatus`, `registerOn`, `paymentId`) VALUES ('$class','$firstName','$lastName','$candidatePicture','$candidateSignature','$candidateContact','$candidateEmail','$gander','$dob','$address','$fatherName','$fatherProfession','$fatherQualification','$fatherContact','$fatherEmail','$motherName','$motherProfession','$motherQualification','$motherContact','$motherEmail','$cast','$isEws','$isDisbled','$anySiblings','$siblingName','$siblingClass','$aadharNumber','$bloodGroup','$fees','$paymentStatus','$registerOn','$paymentId')");
    if ($query) {
        $_SESSION['OID'] = mysqli_insert_id($conn);
?>

        <script>
            var options = {
                "key": "rzp_test_zr0e0xCtwZpA90", //demo api key
                // "key": "rzp_live_zei2DdhKHtojQ4", //live api key
                "amount": <?php echo $class; ?>,
                "currency": "INR",
                "name": "Acme Corp",
                "description": "Test Transaction",
                "image": "https://mohd-kamleen.web.app/image/kamleen.png",
                "handler": function(response) {
                    jQuery.ajax({
                        type: 'post',
                        url: '<?php $_SERVER['PHP_SELF'] ?>',
                        data: "payment_id=" + response.razorpay_payment_id,
                        success: function(result) {
                            window.location.href = "document.php?id=" + <?php echo $_SESSION['OID']; ?>;
                        }
                    });
                },
                "prefill": {
                    "name": "<?php echo $firstName; ?>",
                    "email": "<?php echo $candidateEmail; ?>",
                    "contact": "<?php echo $candidateContact; ?>"
                },
                "theme": {
                    "color": "#bff39f"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        </script>;
<?php

    } else {
        echo "Network issu .......";
    }
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($conn, "update collage set paymentStatus='success',paymentId='$payment_id' where id='" . $_SESSION['OID'] . "'");
}

?>