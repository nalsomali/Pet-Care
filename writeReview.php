<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Write Review</title>
    <link rel="stylesheet" href="styles/writeReview.css">

  </head>

  <body>
    <div class="navbar">
    <a href = "ownerProfile.php"><img src = "images/Profile1.png"  class= "profile"  alt= "Profile image" ></a>
      <a href="ownercontactUs.php">Contact Us</a>
      <a href = "myPets.php">My Pets</a>
      <a href = "AppointmentRequest.php">My Appointments</a>
      <a href = "bookAppointment.php">Book Appointment</a>
      <a href="ownerServices.php" class= "active"> Services</a>
      <a href="OwnerAboutUs.php">About us</a>
      <a href="ownerHomePage.html">Home</a>
       </div> 
    <br>
    
 <div class = "container" > 

    <img src="images/lulu.png"  class="petPic" alt= "Picture of Luna" >
    <p id ="p">Thank you for visiting <br> please leave under your review on luna's care!</p>
      <?php
      $id = $_GET['id'];
      $pet_name = $_GET['pet_name'];
      $owner_email = $_GET['owner_email'];?>
      <form method = "POST" action = <?php echo "\"writeReview.php?id=".$id."&pet_name=".$pet_name."&owner_email=".$owner_email."\"" ?>>
      <label id= "label"> Review: </label>
      <input name = "review" type = "text"> 
        <div class="loginbut">    
      <a href="ownerPreviousAppointment.php"><Button type="submit">submit</Button></a>
     </div>

</form>

   
</div>
<?php
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                    die( "<p>Could not connect to database</p>" );

                 if ( !mysqli_select_db( $database, "Pet_care") )
                    die( "<p>Could not open URL database</p>" );
                    $id = $_GET['id'];
                    $pet_name = $_GET['pet_name'];
                    $owner_email = $_GET['owner_email'];
                    $photo  =NULL;
                    $review = $_POST['review'];   
                 $query="INSERT INTO review (review_id,pet_name, owner_email, review , photo ) VALUES ('".$id."','".$pet_name."','".$owner_email."','".$review."','".$photo."');";
                 $result=mysqli_query($database, $query);
                 if($result)
                 header("location:ownerPreviousAppointment.php");
                

               
             }
        ?>
    
    <br>
    <br>
    <br>

   
    <br>
    <br> <br>
    <br>
    <br> <br>
    <br>
    <br> <br></div>
</p>
<img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>