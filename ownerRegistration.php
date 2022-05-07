<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles/Registration.css">

  </head>

  <body>   
    <div class="navbar"> <a href="Pet Care.html">Home</a></div>
    <div class="container">
      <h3>Register</h3>
        <form method="post">
            <input type="text" name="Fname" id="Fname" placeholder="First name">
            <input type="text" name="Lname" id="Lname" placeholder="Last name">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone number">
            <input type="password" name="pass" id="pass" placeholder="Password">
             
            <div class="content">
              <div class="radio">
               <label for="gender">Gender:</label>
                  <input type="radio" name="gender" id="gender" value="male" required>
                  <label for="male">male</label>
                  <input type="radio" name="gender" id="gender" value="female" required>
                  <label for="female">female</label>
              </div></div>
          

            <p>Add profile photo (optional)</p>
            <input type="file" id="profilePhotoFile" name="profilePhotoFile" accept="image/*">

           <div class="registerbut">
            
            <a href="ownerHomePage.html"><button type="submit">Register</button></a>
           </div>
           
        
        </form>
        
   
 
    </div>
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (!( $database = mysqli_connect( "localhost", "root", "" )))
         die( "<p>Could not connect to database</p>" );
 
      if (!mysqli_select_db( $database, "Pet_care" ))
         die( "<p>Could not open URL database</p>" );
   
         $Fname=$_POST['Fname'];  
         $Lname=$_POST['Lname'];
         $email=$_POST['email']; 
         $phonenumber=$_POST['phonenumber']; 
         $pass=$_POST['pass']; 
         $gender=$_POST['gender']; 
         $profilePhotoFile=$_POST['profilePhotoFile']; 


         $query = "INSERT INTO pet_owner ".
         "(email, password, Fname, Lname, gender, phone#, photo ) "."VALUES ".
         "('$email','$pass','$Fname','$Lname','$gender','$phonenumber','$profilePhotoFile')";

        
        if(mysqli_query($database, $query))
           header("location: ownerHomePage.html");
         
        else  
           echo "<script>alert('an error occurred, could not add pet.')</script>";  
     }  
 ?>
  </body>

</html>
