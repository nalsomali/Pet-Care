<?php
    session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>My Pets</title>
    <link rel="stylesheet" href="styles/ownerHeader.css" >
    <link rel="stylesheet" href="styles/datatable.css">
    <link rel="stylesheet" href="styles/myPets.css">

  </head>

  <body>
     


    <div class="navbar">
      <a href = "ownerProfile.php"><img src = "images/Profile1.png"  class= "profile"  alt= "Profile image" ></a>     
      <a href="ownercontactUs.php">Contact Us</a>

      <a href = "myPets.php">My Pets</a>
      <a href = "AppointmentRequest.php">My Appointments</a>
      <a href = "newAppointment.php">Book Appointment</a>
      <a href="ownerServices.php" class= "active"> Services</a>
      <a href="OwnerAboutUs.php">About us</a>
      <a href="ownerHomePage.html">Home</a>

       </div> 
       <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >

       <form action="myPets.php" method="POST" enctype="multipart/form-data" >
      <table class="content-table" id= "center">
        <br>
        <h2>My Pets:</h2>
      <thead>
      <tr>
        <th scope="col">Pet photo</th>
        <th scope="col">Pet name</th>
        <th scope="col">Pet profile</th>
        <th scope="col">Delete</th>
 
      </tr>
    </thead>
  
      
         <?php
  
  
     if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
     die( "<p>Could not connect to database</p>" );
   
     if ( !mysqli_select_db($database, "Pet_care" ) )
      die( "<p>Could not open URL database</p>" );

    $OwnerEmail = $_SESSION["OwnerEmail"];

    $query="SELECT * FROM pet WHERE owner_email =  '$OwnerEmail' " ;
   $result=mysqli_query($database, $query);
   
  
   if ($result) {
     //retrives owner's pet, needs session
      while ($row = mysqli_fetch_row($result)) {
        ?>
        <tr>
          <td> <?php  echo "<p> <img src= 'images/" .$row[1]. "' class= 'petPic' alt='Pet Picture'>  </p>"; ?> </td>
          <td> <?php echo $row[0]; ?> </td>
          <td> <a href="petProfile.php"> Pet Profile </a> </td>
      </tr>
      <?php
      }
   }

     ?>
 
     </table>
     </form>

    <div class="addPetbut">
    <a href="addPet.php"><button type="button">Add pet</button></a>
  </div>
  </body>
</html>
