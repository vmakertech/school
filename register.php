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
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
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
                <h3 class="text-center py-3">Regitration form for addmission</h3>
                <form action="action/register.php" method="POST">

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
                                        <input type="text" class="form-control">
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
                    </fieldset> <br>




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
                    </fieldset><br>



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
                                        <input type="text" class="form-control">
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


                    <br><button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>











    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>