<?php

session_start();
require('config.php');

 

 if(isset($_SESSION['username']) )
 
 {?>
      <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body> 
      <div class="pen-title">
  <span>
    
     <a  href="index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white"> ><img src="image\17.jpg" style="width: 200px; height: 100px;"></a>
     
  </span>
</div>
      <div class="container" style="width:700px;"> 
     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Produit</th>  
                               <th width="10%">Prix</th>  
                               <th width="20%">Quantite</th>  
                               
                               
                          </tr>  
                          
                       
                          <?php
                          try{
  $sql = "SELECT panier.client , panier.prix , panier.quantite ,produits.nom
FROM panier
INNER JOIN produits ON produits.id= panier.produit WHERE panier.client = :id";
    $stmt = $conn->prepare($sql);
    $id = $_SESSION['ID'] ;
    //Bind value.
    $stmt->bindValue(':id', $id);
  // $stmt->bindValue(':password', $password);
    
    //Execute.
     $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $total = 0;
    while ($row = $stmt->fetch()) {
        
        
        ?>
         <tr>  
                               <td><?php echo $row["nom"]; ?></td>  
                               <td>$ <?php echo $row["prix"]; ?></td>  
                               <td><?php echo $row["quantite"]; ?></td>  
                              
                              
                          </tr>  
          
           <?php  
           
           $total = $total + ($row["quantite"] * $row["prix"]);  
    }
                          ?>  
          
          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
  <?php  
 }catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
     
 else
 {
     header('Location:login_signup.php') ;
   
     exit();
 }
 
  

 ?>
 </table>
 </div>
 </body>
 </html>