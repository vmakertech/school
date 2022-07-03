<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 10px 30px 10px !important;
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
            background: url(assert/image/gallary.png) center;
            background-size: cover;
        }

        #siblingsDetail {
            display: none;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center py-3"> Application For Regitration </h3>
                <form action="action/register.php" method="POST" enctype="multipart/form-data">


                    <div class="col-md-4 mb-3">
                        <b>In which class do you want to study :</b>
                        <select class="form-control" require>
                            <option value="1">Class One</option>
                            <option value="2">Class Two</option>
                            <option value="3">Class Three</option>
                            <option value="4">Class Four</option>
                            <option value="5">Class Five</option>
                            <option value="6">Class Six</option>
                            <option value="7">Class Seven</option>
                            <option value="8">Class Eight</option>
                            <option value="9">Class Nine</option>
                            <option value="10" disabled>Class Ten</option>
                            <option value="11">Class Eleven</option>
                            <option value="12" disabled>Class Twelve</option>
                        </select>
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
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-md-12  mb-3 ">
                                    <b>Last Name :</b>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-5 mb-3 ">
                                <div class="row d-flex justify-content-around">
                                    <div>
                                        <b>Upload Image </b>
                                        <div onclick="document.getElementById('filePicture').click()" id="candidatePicture" class="imgContainer"></div>
                                        <input type="file" name="candidatePicture" id="filePicture" onchange="changePicture(this)" style="display: none;">
                                        <script>
                                            function changePicture(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById("candidatePicture").style.backgroundImage = "url(" + e.target.result + ")";
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div>
                                        <b>Upload Signature </b>
                                        <div onclick="document.getElementById('fileSignature').click()" id="candidateSignature" class="imgContainer"></div>
                                        <input type="file" name="candidateSignature" id="fileSignature" onchange="changeSignature(this)" style="display: none;">
                                        <script>
                                            function changeSignature(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById("candidateSignature").style.backgroundImage = "url(" + e.target.result + ")";
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="row mx-0">
                            <div class="col-md-7  mb-3 ">
                                <b>Contact Number :</b>
                                <input type="text" class="form-control" require>
                            </div>

                            <div class="col-md-5  mb-2 ">
                                <b>Gander :</b> <br>
                                <label style="font-weight: 500;" class="pt-2"><input type="radio" name="gander"> Male</label> &nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="radio" name="gander"> Female</label> &nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="radio" name="gander"> Other</label> &nbsp;
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="row  mx-0">

                            <div class="col-md-7">
                                <b>Email :</b>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-md-5">
                                <b> Date Of Birth :</b>
                                <input type="date" class="form-control">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row mx-0">
                            <div class="col-md-12  mb-2 ">
                                <b>Address :</b>
                                <textarea type="text" class="form-control"></textarea>
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
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-6  mb-3 ">
                                <b>Profession:</b>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <b>Qualification:</b>

                                <input placeholder="Select Qualification" list="father-qualification" class="form-control">
                                <datalist id="father-qualification">
                                    <option>High or Inter School</option>
                                    <option>Diploma</option>
                                    <option>Graduate</option>
                                    <option>Post Graduate</option>

                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6  mb-3 ">
                                <b>Contact Number:</b>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <b>Email :</b>
                                <input type="text" placeholder="Optional" class="form-control">
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
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-6  mb-3 ">
                                <b>Profession:</b>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <b>Qualification:</b>
                                <select class="form-control">
                                    <option>Select Qualification</option>
                                    <option>High or Inter School</option>
                                    <option>Diploma</option>
                                    <option>Graduate</option>
                                    <option>Post Graduate</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6  mb-3 ">
                                <b>Contact Number:</b>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <b>Email :</b>
                                <input type="text" placeholder="Optional" class="form-control">
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
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="cast"> GEN </label> &nbsp;&nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="cast"> OBC </label> &nbsp; &nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="cast"> SC </label> &nbsp;&nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="cast"> ST </label> &nbsp;
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <b>Ews and Disabled :</b> <br>
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="ews"> EWS </label> &nbsp; &nbsp;
                                <label style="font-weight: 500;" class="pt-2"><input type="checkbox" name="disabled"> Disabled S.G. Child </label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label><b>Are there any siblings who studying in Ahad Inernational Academy <input type="checkbox" onchange="checkSiblings(this.checked)"></b> </label>
                        <script>
                            function checkSiblings(e) {
                                e ? document.getElementById("siblingsDetail").style.display = 'flex' : document.getElementById("siblingsDetail").style.display = 'none';
                            }
                        </script>
                        <div id="siblingsDetail" class="row ">
                            <div class="col-md-8 mb-3">
                                <b>Sibling Name :</b>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <b>Class :</b>
                                <select class="form-control">
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">Class 4</option>
                                    <option value="5">Class 5</option>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10" disabled>Class 10</option>
                                    <option value="11">Class 11</option>
                                    <option value="12" disabled>Class 12</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6  mb-3 ">
                                <b>Aadhar Card Number:</b>
                                <input type="tel" class="form-control" minlength="12" maxlength="12">
                            </div>
                            <div class="col-md-6">
                                <b>Blood Group :</b>
                                <select class="form-control">
                                    <option disabled> Optional </option>
                                    <option value="A+">A RhD positive (A+)</option>
                                    <option value="A-">A RhD negative (A-)</option>
                                    <option value="B+">B RhD positive (B+)</option>
                                    <option value="B-">B RhD negative (B-)</option>
                                    <option value="O+">O RhD positive (O+)</option>
                                    <option value="A-">O RhD negative (O-)</option>
                                    <option value="AB+">AB RhD positive (AB+)</option>
                                    <option value="AB-">AB RhD negative (AB-)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset> 
 
            <br><br><br><br><button type="submit" class="btn btn-dark w-50 d-block m-auto btn-primary"><h4>Continue and Pay</h4></button>
             
        </form>  
        </div>

        <br><br><br>
    </div>
    </div>
 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>