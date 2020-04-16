<?php
 require('config.php');
 session_start();
 
 if(isset($_POST["add_to_cart"]))  
 {
if(isset($_SESSION['username']) )
 
 {
    // echo "Welcome  :".$_SESSION['username']; 
   try {  
    $id= $_SESSION['ID'] ;
     $id_pr=$_GET["id"] ;
     $q = $_POST["quantity"];
     $prix = $_POST["hidden_price"];
     $sql = "INSERT INTO panier (client, produit, prix, quantite)
    VALUES ($id,$id_pr,$prix,$q)";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "New record created successfully";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
 }
 else
 {
      header('Location:login_signup.php') ;
   
     
     exit();
 }
  
 }
 

 

?>

<!DOCTYPE html>
<html>
<title>Acceuil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<body id="myPage">

<!-- Sidebar on click -->


<!-- Navbar -->
<div class="w3-top">
 <div class=" w3-theme-d2 w3-left-align">
  <a ><img src="image\17.jpg" style="width: 200px; height: 100px;"></a>
  


 <!-- <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Logo</a>-->
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Acceuil</a>
  <a href="#Produits" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Produits</a>
  <a href="login_signup.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log In</a>
  
  <a href="Commmandes.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white"><i class="fa fa-shopping-cart w3-margin-right"></i> </a>

  </div>
<!--  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>-->
 </div>

 

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="image\15.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
   
  </div>
</div>
<!--<div class="w3-display-container w3-container">-->
<!--    <img src="image\15.jpg" alt="Jeans" style="width:100%">-->
<!--    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">-->
<!--      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>-->
<!--      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>-->
<!--      <h1 class="w3-hide-small">COLLECTION 2016</h1>-->
<!--      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>-->
<!--    </div>-->
<!--  </div>-->
<!-- First Photo Grid-->
<div class=" w3-padding-64" >


  <h3 class="w3-center">PRODUITS</h3>
  <p class="w3-center"><em>Trouver vos chaussures parfaites</em></p><br>

<div class="w3-main" style="margin-left:200px ; margin-right:200px">

  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
    <a > <img src="image\21.jpg" alt="Norway"  style="width:300px;height:310px" class="w3-hover-opacity"></a> 
      <div class="w3-container w3-white">
    <p><b>COLLECTION </b></p>
    
          <span>FEMME</span>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="image\1.jpg" alt="Norway"  style="width:300px;height:310px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>COLLECTIONS</b></p>
        <span>ENFANTS</span>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="image\22.jpg" alt="Norway"  style="width:300px;height:310px"class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>COLLECTIONS</b></p>
        <p>HOMME</p>
       
      </div>
    </div>
  </div>
</div>  
</div>
<!--second grid-->
<!--<div class="w3-content w3-container w3-padding-64" id="portfolio">-->
<!--  <h3 class="w3-center">Produits Populaire</h3>-->
<!--  <p class="w3-center"><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>-->

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
<!--  <div class="w3-row-padding w3-center">-->
<!--        <div class="w3-col m3">-->
         
<!--          <img src="image\11.jpg" style="width:150px;height:150px">-->
         
<!--            <button class="w3-button w3-black">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>-->
          
        
        <!--<p>Model_BC<br><b>$14.99</b></p>-->
<!--      </div>-->


<!--    <div class="w3-col m3">-->
   
<!--          <img src="image\11.jpg" style="width:150px;height:150px">-->
         
<!--            <button class="w3-button w3-black">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>-->
          
      
        <!--<p>Model_BC<br><b>$14.99</b></p>-->
<!--      </div>-->

<!--    <div class="w3-col m3">-->
    
<!--          <img src="image\11.jpg" style="width:150px;height:150px">-->
         
<!--            <button class="w3-button w3-black">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>-->
          
        
        <!--<p>Model_BC<br><b>$14.99</b></p>-->
<!--      </div>-->
<!--</div>-->
<!--    <div class="w3-col m3">-->
    
<!--          <img src="image\11.jpg" style="width:150px;height:150px">-->
         
<!--            <button class="w3-button w3-black">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>-->
          
        
        <!--<p>Model_BC<br><b>$14.99</b></p>-->
<!--      </div>-->
<!--</div>-->


<div class="w3-content w3-container w3-padding-64" id="Produits">
  <h3 class="w3-center">Produits Populaires</h3>
  <p class="w3-center"><em><br></em></p><br>

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <!--<div class="w3-row-padding w3-center">-->
  <!--  <div class="w3-col m3">-->
    <?php  
                 $stmt = $conn->prepare("select * from produits");
                  $stmt->execute();
                  
                //  $user_image = $data['NOM_DE_TON_CHAMPS_IMAGE_DANS_LA_BASE'];

    // set the resulting array to associative
   // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $repertoire = "/image/";
              while ($row = $stmt->fetch()) {
                  $user_image = $row['image'];
                ?>  
                
             
                <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>" >  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $repertoire.$user_image ; ?>" class="img-responsive" style="width:200px;height:200px"><br />  
                               
                               <h4 class="text-info"><?php echo $row["nom"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["prix"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                
                ?>  

    </div>

  <!--  <div class="w3-col m3">-->
  <!--   <img src="image\11.jpg" style="width:150px;height:150px">-->
         
  <!--          <button class="w3-button w3-black"><a href="Commande.php">Ajouter Au Panier </a></button>-->
          
      
  <!--      <p>Model_BC<br><b>$30.99</b></p>-->
  <!--  </div>-->

  <!--  <div class="w3-col m3">-->
  <!--    <img src="image\12.jpg" style="width:150px;height:150px">-->
         
  <!--          <button class="w3-button w3-black"><a href="Commande.php">Ajouter Au Panier </a></button>-->
          
      
  <!--      <p>Model_CD<br><b>$34.99</b></p>-->
  <!--  </div>-->

  <!--  <div class="w3-col m3">-->
  <!--     <img src="image\13.jpg" style="width:150px;height:150px">-->
         
  <!--          <button class="w3-button w3-black"><a href="Commande.php">Ajouter Au Panier </a></button>-->
          
      
  <!--      <p>Model_EF<br><b>$14.99</b></p>-->
  <!--  </div>-->
  <!--</div>-->
</div>

</div>
 

 <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>S'abonner</h1>
    <p>Pour obtenir des offres spéciales et un traitement VIP:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Entrez e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">S'abonner</button>
  </div>




    <footer >
      <p></p>
    </footer>
  </div>
</div>



<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
