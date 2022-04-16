<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="style2.css">



</head>
<style type="text/css">
  #inputbtn:hover {
    cursor: pointer;
  }

  .card {
    background: #f8f9fa;
    border-top-left-radius: 5% 5%;
    border-bottom-left-radius: 5% 5%;
    border-top-right-radius: 5% 5%;
    border-bottom-right-radius: 5% 5%;
  }
</style>

<body style="background: -webkit-linear-gradient(left, #f70596, #cd7777); background-size: cover;">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="index.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
              <h6>HOME</h6>
            </a>
          </li>

          <!-- <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="services.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
              <h6>ABOUT US</h6>
            </a>
            
          </li> -->

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
              <h6>Query</h6>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="container-fluid" style="margin-top:60px;margin-bottom:60px;color:#34495E;">
    <div class="row">

      <div class="col-md-6" style="margin-top: auto;left: auto; right:auto">
        <div class="card" style="font-family: 'IBM Plex Sans', sans-serif;">
          <div class="card-body">
            <center>

              <h3 style="margin-top: 10%">User Login</h3><br>
              <form class="form-group" method="POST" action="func.php">
                <div class="row" style="margin-top: 10%">
                  <div class="col-md-4"><label>Email-ID: </label></div>
                  <div class="col-md-8"><input type="text" name="email" class="form-control" placeholder="enter email ID" required /></div><br><br>
                  <div class="col-md-4" style="margin-top: 8%"><label>Password: </label></div>
                  <div class="col-md-8" style="margin-top: 8%"><input type="password" class="form-control" name="password2" placeholder="enter password" required /></div><br><br><br>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-left: 160px;margin-top: 10%">
                    <center><input type="submit" id="inputbtn" name="patsub" value="Login" class="btn btn-primary"></center>
                  </div>
                  <div class="col-md-8" style="margin-top: 10%">
                    <a href="labs.html" class="btn btn-primary">signup</a>
                  </div>
                </div>
              </form>
            </center>
          </div>
        </div>
      </div>


    </div>
  </div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>