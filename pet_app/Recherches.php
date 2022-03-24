<?php
session_start();

 if (!isset($_SESSION["username"])) {
header('Location: http://localhost/Cabinet_Veterinaire/');
}
     require_once('database/conn.php');
           
?>
<html lang="en">

<head>
    <meta charset="utf-8">
  <title>Cabinet Veterinaire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  



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
    <!-- Topbar Start -->
   
	<?php
		include_once("./templates/nav.php");
		
	?>
    <!-- Topbar End -->



    </nav>
    <!-- Navbar End -->


    <!-- Contact Start -->
  <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
               
				<h1 class="display-7 text-uppercase mb-0">Recherche </h1>
               
            </div>
			 
                  
                 
            <div class="row g-10">
                <div class="col-lg-10">
             
                        <div class="row g-9">
                            <div class="col-12">
							
    
    <div class="testbox">
           
                                      <form method="post">
										<h6 class="text-danger text-uppercase"> Recherche Par  Nom Prenom , Nom D'animal , N° Téléphone...</h6>
             
                <table style="width:100%">
                  <tr>
                    <td>
                      <div class="item">
                        <div class="name-item">
                          <input type="input" name="Recherche" id="Recherche" maxlength="8" autocomplete="off" required class="form-control bg-light border-2 px-0" placeholder=" Recherche">
                        </div>
                      </div>
                    </td>
                    <td>
                      <input type="submit" name="search3" id="search3"  value="Recherche" autocomplete="off" class="btn btn-success">
                      
                    </td>
                  </tr>
                </table>
				 </form>
				<center><table class="table table-hover table-bordered"></center>
		    <thead>
		      <tr>
		       
 
			       <th><center>N°</th></center>
				     <th><center>Nom Prenom</th></center>
				<th ><center>Address</th></center>			
		        <th><center>N° Tel</th></center>
				
		   <th><center>Nom Animal</th>
   <th><center>Categorie</th>
   <th><center>sexe</th>
      <th><center>Date Naissance</th>  
       <th><center>Couleur Animal</th>     
			
               <?php
         include("database/conn.php");
            if (isset($_POST['search3'])) {

              $Recherche = $_POST['Recherche'];
             

              $query = mysqli_query($mysqli, "SELECT *   FROM pets where ((tel LIKE '$Recherche%' or nom LIKE '$Recherche%' or prenom LIKE '$Recherche%' or nom_a LIKE '$Recherche%') )");
              $count = mysqli_num_rows($query);

              if ($count == "0") {  
			  
            ?>
                <div class="testbox">

                  <div class="alert alert-danger samuel animated shake" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> </strong><?php echo 'Rien à Afficher'; ?>
                  </div>
                </div>
              <?php
              }
           $n=1;
              while ($row = mysqli_fetch_array($query)) {
				  
				   
              ?>
			  
			  

                      </div>
					  
					 
						     	     <tbody id="get_invoices_details">
							
                    <tr>
          <td><center><?php echo $n;?></center></td>           
<td><center><?php echo $row['nom'];?> <?php echo $row["prenom"]; ?></td>
<td><center><?php echo $row['Adresse'];?></center></td>
<td><center><?php echo $row['tel'];?></center></td>
<td><center><?php echo $row['nom_a'];?></center></td>
<td><center><?php echo $row['type_a'];?></center></td>
<td><center><?php echo $row['sexe'];?></center></td>
<td><center><?php echo $row['Date_naissance'];?></center></td>
<td><center>  <input readonly type="color" id="head" name="head"
           value="<?php echo $row['couleur'];?>"></td>
   </tr> 

  
   
        
                    </tbody>


              

            <?php
		$n++;

            }
            ?>
			</table>
			<tr>
			    <?php  if ($count >0) {  
				   ?>
		 <td  ><button  class="btn btn-outline-danger btn-lg" onClick="window.location.href=window.location.href">Refresh      <i class="bi bi-arrow-clockwise"></i></a></td>
		 	</tr>
			   <?php
			  }
			  ?>
			 <?php
	exit();
            }  ?>
			
          </div>
		  
        </div>  </div>
                
           
                </div>
		   </div>



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