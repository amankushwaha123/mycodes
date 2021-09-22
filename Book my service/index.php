<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/all.min.css">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>BMS</title>
</head>

<body>
  <!--  Nav-->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top" >
  <div  style="display:flex!important;justify-content:space-around!important;">
    <div><a href="index.php" class="navbar-brand">BMS</a>
    <span class="navbar-text">Customer's Happiness is our Aim</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button></div>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
      </ul>
    </div>
    </div>
  </nav>

  <header class="jumbotron back-image" style="background-image: url(images/bn6.jpg);">
    <div class="myclass mainHeading text-right">
      <h1 class="text-uppercase text-danger font-weight-bold">Welcome to BMS</h1>
      <p class="font-italic text-success">Customer's Happiness is our Aim</p>
      <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
      <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header>

  <div class="container">
    <div class="jumbotron">
      <h3 class="text-center">BMS Services</h3>
      <p>
        BMS Services is India’s leading chain of multi-brand Electronics and Electrical service
        workshops offering
        wide array of services. We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service centres and fully trained mechanics, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book
        your service online by doing Registration.
      </p>

    </div>
  </div>
  <!-- Services -->
  <div class="container text-center border-bottom" id="Services">
    <h2>Our Services</h2>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
        <h4 class="mt-4">Electronic Appliances</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
        <h4 class="mt-4">Fault Repair</h4>
      </div>
    </div>
  </div> 
  <!-- Regi.  -->
  <?php include('userRegistration.php') ?>
   
  <!--Contact-->
  <div class="container" id="Contact">
    
    <h2 class="text-center mb-4">Contact Us</h2> 
    <div class="row">
    <div class="col-2"></div>

     
      <?php include('contactform.php'); ?>
        </div> 
          </div>
  
    <!-- Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2">Contact Us: </span>
          <a href="#"  class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#"  class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#"  class="pr-2 fi-color"><i class="fab fa-instagram"></i></a>
          <a href="#"  class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#"  class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> 

        <div class="col-md-6 text-right">
          
                    </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
        </div> 
      </div> 
    </div> 
  </footer> 

  
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>