<?php
session_start();

 if (!isset($_SESSION["username"])) {
header('Location: http://localhost/Cabinet_Veterinaire/');
}
     require_once('database/conn.php');
           
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
  <title>Cabinet Veterinaire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
	


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



    <!-- Navbar Start -->
   
	<?php
		include_once("./templates/nav.php");
		
	?>


    <!-- Navbar End -->

   
       <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        
                <h1 class="display-7 text-uppercase mb-0">Ordonnance</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
                                                         <form method="post" action="Ordonnancepdf.php">
                <h6 class="text-primary text-uppercase">ici vous pouvez rédiger votre ordonnance</h6>
                <table style="width:100%">
                 
                         
    <textarea name="ord" rows="16"   autocomplete="off" class="form-control bg-light border-4 px-6" placeholder=" ici vous pouvez rédiger votre ordonnance">    </textarea>
	
	
                        </div>
                      </div>
                    </td>
					  </tr>
					
                    <tr><br><br>
					 <td>
                     
<center><button type="submit" name="create" class="btn btn-primary">Impression</center>

                      </div>
                    </td>
                  </tr>
                </table>
              </form>
                </div>
                <div class="col-lg-5 mb-5 mb-lg-9" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 " src="img/pet66.jpeg" style="object-fit: cover;">
                    </div>
                </div>
                </div>
            </div>
        </div>

	
    <br><br>
     <div class="container-fluid bg-dark text-white-30 py-4">
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

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
	    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
	   <script src="js/ajouter.js"></script>
	   
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
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 
  


</body>

</html>