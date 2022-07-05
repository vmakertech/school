<?php
session_start();
include('conn.php');


$qu = mysqli_query($conn, "select * from collage where id = " . $_GET['id']);
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



        <br><br><br><br><button class="btn btn-dark d-block m-auto btn-primary">
          <b>Continue and Payment </b>
        </button>
      </div>
 
      <br><br><br>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>

  </html>


<?php
} //this is for fetch data bracket 
 
?>