<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/img/icon/favicon.ico" type="image/ico" sizes="16x16">
    <title>Maniacs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
        }

        body {
            /* font-family: 'Open Sans', sans-serif; */
            font-family: 'Lato', sans-serif;

            /* font-family: 'Poppins', sans-serif; */
        }

        .navbar {
            padding-top: 0px;
            margin: 0px;
        }

        .navbar .nav-item {
            margin: 0 .75rem 0;
        }

        .navbar-brand a {
            box-shadow: 0px 25px 10px -15px rgba(0, 0, 0, 0.08);
        }

        .nav-dropdown {
            border-radius: 10px;
            border: 0;
            padding: 0 1.2rem;
            background: linear-gradient(to right, #8914fe 0%, #8063f5 100%);
            box-shadow: 0px 25px 10px -10px rgba(0, 0, 0, 0.08);
        }

        .nav-dropdown a.dropdown-link {
            color: #f5f5f5 !important;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(to right, #8914fe 0%, #8063f5 100%) !important;
            border-color: #6F42C2 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #906BD4 !important;
            border-color: #906BD4 !important;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 194, .5) !important;
        }

        section {
            padding: 0rem 0rem;
        }

        .section-title {
            margin-bottom: 6rem;
        }

        section img {
            margin-bottom: 2rem;
        }

        .feature-section {
            /* background: url('./assets/img/getty_patient_care.jpg'); */
            background-color: pink;
            background-size: 500px;
            background-repeat: no-repeat;
        }

        .feature-section .card {
            border-radius: 10px;
            box-shadow: 0px 25px 10px -15px rgba(0, 0, 0, 0.08);
            transition: .4s;
        }

        .feature-section .card:hover {
            transform: scale(1.1);
            box-shadow: 0px 25px 10px -15px rgba(0, 0, 0, 0.08);
        }


        .top-scroll {
            padding: 10px 16px;
            background-color: #f2f2f2;
            border-radius: 5px;
            font-size: 20px;
            transition: .3s;
        }

        .top-scroll:hover {
            background-color: #dfdddd;
        }

        img.banner {
            width: 380px !important;
            height: 450px !important;
        }
    </style>
</head>

<body>
    <div class="menu cid-s48OLK6784">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="index.php">
                            <img src="assets/images/logo.jpeg" alt="Mobirise" style="height: 5rem;">
                        </a>
                    </span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown nav-dropdown">
                            <a class="nav-link dropdown-toggle dropdown-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Log In/Sign Up
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#patient">Patient</a>
                                <a class="dropdown-item" href="clinic/login.php">Clinic</a>
                                <a class="dropdown-item" href="doctor/login.php">Doctor</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="feature-section text-center" id="feature">
            <h2 class="section-title">Welcome</h2>
            <div class="container">
                <div class="row slideanim">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.icons8.com/officexs/80/000000/triangular-bandage.png">
                                <h5 class="card-title">Administrator</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.
                                </p>
                                <a href="admin/index.php" class="btn btn-primary">Admin</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.icons8.com/officexs/80/000000/clinic.png">
                                <h5 class="card-title">Clinic</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.
                                </p>
                                <a href="clinic/index.php" class="btn btn-primary">Clinic</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.icons8.com/officexs/80/000000/medical-doctor.png">
                                <h5 class="card-title">Doctor</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.
                                </p>
                                <a href="lab-appointment.php" class="btn btn-primary">Doctor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(window).scroll(function() {
                $(".slideanim").each(function() {
                    var pos = $(this).offset().top;

                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        </script>
</body>

</html>