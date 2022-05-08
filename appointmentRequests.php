<!DOCTYPE html>

<head>
    <meta charset = "utf-8">
    <title>View Requests</title>
    <link rel="stylesheet" href="styles/datatable.css">
</head>
<body>
    
  <div class="navbar">
    <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logout icon"> </a>
    <a href="managerContactUs.php">Contact us</a>
    <a href="allReviews.php"> Reviews</a>
    <a href="previousAppointments.php"> Previous</a>
    <a href="upcomingAppointments.php"> Upcoming</a>
      <a href="appointmentRequests.php"> Requests</a>
    <a href="Services.php">Services</a>
    <a href="ManagerAboutUs.php">About Us</a>
 <a href="managerHomePage.html">Home</a> 

</div> 
    <table class="content-table" id= "center">
      <br>
      <h2>Appointment Requests:</h2>
      <thead>
        <tr>
          <th>Pet name</th>
          <th>Service</th>
          <th>Date</th>
          <th>Time</th>
          <th>Requests</th>
          <th>Contact Owner</th>
        </tr>
      </thead>
      <tbody>
        
          <?php
  
 

  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );
$query="SELECT * FROM appointments_requests WHERE status IS NULL";
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
  
       print("<tr>     
       <th scope='row'><p>  <a href='managerPetProfile.php?owner_email=".$data[2]." && pet_name=".$data[0]."'> ".$data[0]." </a></p>
       <td>".$data[1]."</td>
       <td>".$data[2]."</td>
       <td>".$data[3]."</td>
       <th><a href=\"addToUpcomingAppointments.php?id=".$data[7]."\"><input type='button' name='accept' value='Accept' style ='background-color:rgb(88, 194, 88);'></a>
       <a href=\"declineAppointments.php?id=".$data[7]."\"> <input type='button' name='decline' value='Decline' style ='background-color:rgb(255, 8, 8);'></a> </th>
       <th>  <a href="."mailto:".$data[4].""."> Contact ".$data[0]. "'s Owner  </a> </th>  </tr>");
   }
}

  ?>
  
      </tbody>
    </table>
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
</body>
</html>