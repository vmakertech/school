<?php
session_start();
error_reporting(1);
include('conn.php');

if (isset($_POST['submit'])) {
    $class = $_POST['class'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $candidatePicture = $_FILES['candidatePicture']['name'];
    $candidatePicture = $firstName . $candidatePicture;
    $tmpCandidatePicture = $_FILES['candidatePicture']['tmp_name'];
    $folder = '../assest/candidatePicture/' . $candidatePicture;
    move_uploaded_file($tmpCandidatePicture, $folder);


    $candidateSignature = $_FILES['candidateSignature']['name'];
    $candidateSignature =  $firstName . $candidateSignature;
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

        $qu = mysqli_query($conn, "select * from collage where id = " . $_SESSION['OID']);
        while ($res = mysqli_fetch_array($qu)) {
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Registration Form</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
                <style>
                    input,
                    textarea {
                        /* border: none !important; */
                        background: transparent !important;
                        outline: none;
                    }

                    fieldset.scheduler-border {
                        border: 1px groove #ddd !important;
                        padding: 0 10px 20px 10px !important;
                        margin: 20px !important;
                        -webkit-box-shadow: 0px 0px 0px 0px #000;
                        box-shadow: 0px 0px 0px 0px #000;
                    }

                    legend.scheduler-border {
                        width: inherit;
                        padding: 0 10px;
                        border-bottom: none;
                    }

                    .imgContainer {
                        height: 120px;
                        width: 120px;
                        border: 2px solid gray;
                    }

                    #siblingsDetail {
                        display: none;
                    }
                </style>
            </head>

            <body class="bg-light">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">LoGo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  text-light" href="#">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  text-light" href="#">Services</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center py-3"> Application For Regitration </h3>

                            <div class="col-md-4 mb-3">
                                <b>In which class do you want to study :</b>
                                <input class="form-control" value="<?php echo $res['class']; ?>" disabled>
                            </div>
                        </div>

                        <!-- Candidate details here  -->
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <h5>Candidate's Details </h5>
                            </legend>
                            <div class="row">

                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-7 ">
                                            <div class="col-md-12  mb-3 ">
                                                <b>First Name :</b>
                                                <input class="form-control" disabled value="<?php echo $res['firstName']; ?>">
                                            </div>

                                            <div class="col-md-12  mb-3 ">
                                                <b>Last Name :</b>
                                                <input class="form-control" disabled value="<?php echo $res['lastName']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-5 mb-3 ">
                                            <div class="row d-flex justify-content-around">
                                                <div>
                                                    <b>Upload Image </b>
                                                    <div class="imgContainer" style="background: url(../assest/candidatePicture/<?php echo $res['candidatePicture']; ?>) center;background-size: cover;"></div>
                                                </div>
                                                <div>
                                                    <b>Upload Signature </b>
                                                    <div class="imgContainer" style="background: url(../assest/candidateSignature/<?php echo $res['candidateSignature']; ?>) center;background-size: cover;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="row mx-0">
                                        <div class="col-md-7  mb-3 ">
                                            <b>Contact Number :</b>
                                            <input class="form-control" disabled value="<?php echo $res['candidateContact']; ?>">
                                        </div>

                                        <div class="col-md-5  mb-2 ">
                                            <b>Gander :</b> <br>
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" value="male" name="gander">
                                                Male</label> &nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" value="female" name="gander">
                                                Female</label> &nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" value="other" name="gander">
                                                Other</label> &nbsp;
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="row  mx-0">

                                        <div class="col-md-7 mb-3">
                                            <b>Email :</b>
                                            <input disabled value="<?php echo $res['candidateEmail']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-5">
                                            <b> Date Of Birth :</b>
                                            <input disabled value="<?php echo $res['dob']; ?>" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row mx-0">
                                        <div class="col-md-12  mb-2 ">
                                            <b>Address :</b>
                                            <textarea disabled class="form-control"><?php echo $res['address']; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>



                        <!-- father details here  -->
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <h5>Father Details </h5>
                            </legend>
                            <div class="row mx-0">
                                <div class="col-md-12 mb-3">
                                    <b>Name:</b>
                                    <input class="form-control" disabled value="<?php echo $res['fatherName']; ?>">
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Profession:</b>
                                            <input disabled class="form-control" value="<?php echo $res['fatherProfession']; ?>">
                                        </div>
                                        <div class="col-md-6  mb-3 ">
                                            <b>Qualification:</b>
                                            <input class="form-control" disabled value="<?php echo $res['fatherQualification']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Contact Number:</b>
                                            <input class="form-control" disabled value="<?php echo $res['fatherContact']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <b>Email :</b>
                                            <input class="form-control" disabled value="<?php echo $res['fatherEmail']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>



                        <!-- Mother details here  -->
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <h5>Mother Details </h5>
                            </legend>
                            <div class="row mx-0">
                                <div class="col-md-12 mb-3">
                                    <b>Name:</b>
                                    <input class="form-control" disabled value="<?php echo $res['motherName']; ?>">
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Profession:</b>
                                            <input class="form-control" disabled value="<?php echo $res['motherProfession']; ?>">
                                        </div>
                                        <div class="col-md-6  mb-3 ">
                                            <b>Qualification:</b>
                                            <input class="form-control" disabled value="<?php echo $res['motherQualification']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Contact Number:</b>
                                            <input class="form-control" disabled value="<?php echo $res['motherContact']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <b>Email :</b>
                                            <input disabled value="<?php echo $res['motherEmail']; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        <!-- Other details here  -->
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <h5>Other Details </h5>
                            </legend>
                            <div class="row mx-0">

                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Do you belong to :</b> <br>
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" name="cast" value="GEN"> GEN
                                            </label> &nbsp;&nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" name="cast" value="OBC"> OBC
                                            </label> &nbsp; &nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" name="cast" value="SC"> SC
                                            </label> &nbsp;&nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="radio" name="cast" value="ST"> ST
                                            </label> &nbsp;
                                        </div>
                                        <div class="col-md-6  mb-3 ">
                                            <b>Ews and Disabled :</b> <br>
                                            <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="isEws"> EWS
                                            </label> &nbsp; &nbsp;
                                            <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="isDisabled">
                                                Disabled S.G. Child </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <b>Are there any siblings who studying in Ahad Inernational Academy <input name="anySiblings" type="checkbox" onchange="checkSiblings(this.checked)"></b>

                                    <div id="siblingsDetail" class="row ">
                                        <div class="col-md-8 mb-3">
                                            <b>Sibling Name :</b>
                                            <input class="form-control" disabled value="<?php echo $res['siblingName']; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <b>Class :</b>
                                            <input class="form-control" disabled value="<?php echo $res['siblingClass']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Aadhar Card Number:</b>
                                            <input class="form-control" disabled value="<?php echo $res['aadharNumber']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <b>Blood Group :</b>
                                            <input class="form-control" disabled value="<?php echo $res['bloodGroup']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>



                        <!-- Payment details here  -->
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <h5>Payment Details </h5>
                            </legend>
                            <div class="row mx-0">
                                <div class="col-md-12 mb-3">
                                    <b>Payment Fees:</b>
                                    <input class="form-control" disabled value="<?php echo $res['fees']; ?>">
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Payment Status:</b>
                                            <input disabled class="form-control" value="<?php echo $res['paymentStatus']; ?>">
                                        </div>
                                        <div class="col-md-6  mb-3 ">
                                            <b>Register On:</b>
                                            <input class="form-control" disabled value="<?php echo $res['registerOn']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6  mb-3 ">
                                            <b>Contact Number:</b>
                                            <input disabled class="form-control" value="<?php echo $res['candidateContact']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <b>Email :</b>
                                            <input disabled class="form-control" value="<?php echo $res['candidateEmail']; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>



                        <br><br><br><br><button id="submit" class="btn btn-dark d-block m-auto btn-primary">
                            <b>Continue and Payment </b>
                        </button>
                    </div>

                    <script>
                        document.getElementById("submit").addEventListener("click", function() {
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
                        })
                    </script>;

                    <br><br><br>
                </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script> 
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
            </body>

            </html>
<?php
        } //this is for fetch data bracket
    } else {
        echo "Network issue .......";
    }
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    $currentDate = date('Y-m-d h:i:s');
    mysqli_query($conn, "update collage set paymentStatus='success',paymentId='$payment_id',paymentOn = '$currentDate' where id='" . $_SESSION['OID'] . "'");
}

?>