<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl " >
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajouter un Propriétaire</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
          <div class="modal-body">
        <form id="ajout_client" onsubmit="return false">
		<div class="container-fluid">
		<h3>

  <small class="text-muted"><p style="color:#1d2192 ;font-family:courier;"> Informations Propriétaire</p></small>
</h3>
		      <div class="row">
            <div class="col-md-3">
     
              <label>Nom</label>
              <input type="text" class="form-control" name="Nom_c" id="Nom_c" autocomplete="off"required placeholder="Nom" />
            </div>
            <div class="col-md-3">
              <label>Prenom</label>
              <input type="text" class="form-control" name="Prenom_c" autocomplete="off"id="Prenom_c" required placeholder="Prenom" required>
            </div>
         
		  
		  
		  
         <div class="col-md-6">
            <label> N° TEL</label>
            <input type="text" maxlength="8"  class="form-control" name="tel" id="tel1" autocomplete="off" required placeholder="Enter N° Telephone">
            
          </div>
		   </div><br>
        		      <div class="row">
            <div class="col-md-6">
      
              <label>Adresse</label>
              <input type="text" class="form-control" name="adresse" autocomplete="off" id="adresse" placeholder="Adresse" />
            </div>
			
			
			
            <div class="col-md-6">
              <label>Date_Suivi </label>
              <input type="date" class="form-control" name="Date_suv" id="Date_suv" placeholder="Enter Product Date" required 						max=<?php
         echo date('Y-m-d');
	     ?>  />
            </div>
         
		  
		  
	
		   </div>
          <br>  <br>  <br>
		  <h6 >

		   
  		  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
		
				  				<center><h3> <p style="color:#1d2192;font-family:courier;">Informations sur les Animaux </p></h3></center>
				  				<table align="center" style="width:950px;">
		                            <thead>
		                            
										<th style="text-align:center;" >Type d'animal</th>
		                                <th style="text-align:center;"> Nom d'animal</th>
		                                <th style="text-align:center;">Age</th>
		                                <th style="text-align:center;">Sexe</th>
		                                <th style="text-align:center;">Date de naissance</th>
										 <th style="text-align:center;">Couleur</th>
		                            
		                              </tr>
		                            </thead>
		                            <tbody id="invoice_item">
		<tr>
		    <td hidden ><b  class="number">1</b></td>
		    <td>
		         <?php
           
                    $query1 = "SELECT type FROM type_animals";
                    $result1 = mysqli_query($mysqli, $query1);
					
                    ?>
					  <select   type="text" class="form-control bg-light"  id="type_a" name="type_a[]"   required >
			 					     <option value="" > Choisissez s'il vous plaît  </option  > 
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
		
                   <option  >       <?php echo $row1['type'];?>
				   
				   
				   </option>
                        <?php endwhile;?>
                       
                       </select>
		    </td>
		    <td> <input type="text" class="form-control" name="nom_a[]" autocomplete="off" id="nom_a" placeholder="Nom d'animal" required></td>   
		    <td><input type="text" class="form-control" maxlength="3" name="jma[]" autocomplete="off" id="jma"  placeholder="age" required>
  <select class="form-select" required id="age" name="age">
    <option value="" selected>Choisir...</option>
    <option value="Jours">Jours</option>
    <option value="Mois">Mois</option>
    <option value="Ans">Ans</option>
  </select></td>
		    <td><select   class="form-control" required name="sexe[]" id="sexe">
       <option value="">Choisissez s'il vous plaît </option>
    <option value="Male">Male </option>
    <option  value="Femelle">Femelle </option>
   
  </select></td>
  
  	    <td> <input type="Date" class="form-control" autocomplete="off" name="date_v[]"  id="date_v"   max=<?php
         echo date('Y-m-d');
	     ?>  /></td>
		  
		  
		  <td> <input type="color" class="form-control bg-light border-2 px-4 py-2" name="couleur[]" id="couleur" required placeholder="Couleur" ></td>
		  
		  
		</tr>
		                            </tbody>
		                        </table> <!--Table Ends-->
		                        <center style="padding:10px;">
		          
									
									<button type="button"  id="adds" class="btn btn-outline-success">Ajouter</button>
									<button type="button" id="remove" class="btn btn-outline-danger">Annuler</button>
								
		                        </center>
				  			</div> <!--Crad Body Ends-->
				  		</div> 

		   
		   
	<!--	   
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Est-ce que ce client a un autre animal de compagnie</label>
</div>
 -->
	
		   <br>
         <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
    
      </div>
   </div>
      <!-- Modal footer -->
         <div class="modal-footer">
       
        <button   type="submit"  class="btn btn-outline-primary">Envoyer</button>
	
		  </form>
      </div>
    </div>
  </div>
</div>