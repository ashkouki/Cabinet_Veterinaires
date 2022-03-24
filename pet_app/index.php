
<?php
session_start();

 if (!isset($_SESSION["username"])) {
header('Location: http://localhost:8080/Cabinet_Veterinaires/');
}
     require_once('database/conn.php');
           
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
  <title>Cabinet Veterinaire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>



	<?php
		include_once("./templates/nav.php");
		
	?>



    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/pet6.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">Bonjour <?php  echo $_SESSION['username']?> </h6>
                   <h1 class="display-5 text-uppercase mb-0">Nous gardons vos animaux heureux tout le temps</h1> 
                    </div>
                   
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                        
                  
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                                      <div class="row">
									        <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">Statistiques Rapides </h6>
            
                    </div>
              <!-- Start counter item -->   
			
			  <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa-sign-out-alt"></span>
                  <h4 class="counter">50</h4>
                  <p>Clients</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">60</h4>
                  <p>Animaux</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-list-alt"></span>
                  <h4 class="counter">9</h4>
                  <p>Chat </p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
          <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-globe"></span>
                  <h4 class="counter">51</h4>
                  <p>Chiene</p>
                </div>
              </div>
			  
              <!-- End counter item -->
            </div>  
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Accès rapide</h6>
          
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-house display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">PENSION </h5>
                            <p>Allez vers PENSION</p>
                            <a class="text-primary text-uppercase" href="">Aller vers<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-food display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Alimentation </h5>
                            <p>Allez vers Alimentation</p>
                            <a class="text-primary text-uppercase" href="">Aller vers<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-grooming display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Toilettage </h5>
                            <p>Allez vers Toilettage</p>
                            <a class="text-primary text-uppercase" href="">Aller vers<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-cat display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Dressage </h5>
                            <p>Allez vers Dressage</p>
                            <a class="text-primary text-uppercase" href="">Aller vers<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
				  <!-- About End
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-dog display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Exercice </h5>
                            <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                            <a class="text-primary text-uppercase" href="">Aller vers<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-vaccine display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Traitement </h5>
                            <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                            <a class="text-primary text-uppercase" href="">Aller vers <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
				 -->
            </div>
        </div>
    </div>
   
 	    
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">Issam Rayhani</a>. All Rights Reserved.</p>
                </div>
             
            </div>
        </div>
    </div>

		<?php
		include_once("./templates/client.php");
			include_once("./templates/type_animal.php");
	?>

   
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
	    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
	
	   
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/app.js"></script>
  <script src="assets/js/jquery.min.js"></script>  
    <script src="js/iao-alert.jquery.js"></script>
	 <script src="../pet_app/js/sweetalert2.all.min.js"></script>
<link href="assets/css/iao-alert.css" rel="stylesheet" type="text/css">

  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
     <script src="js/ajouter.js"></script>
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 


</body>

</html>