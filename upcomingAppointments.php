<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upcoming Appointments </title>
    <link rel="stylesheet" href="styles/datatable.css">
   </head>
    
    
<body>

  <div class="navbar">
    <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logout icon"> </a>
    <a href="managerContactUs.html">Contact us</a>
    <a href="allReviews.html"> Reviews</a>
    <a href="previousAppointments.php"> Previous</a>
    <a href="upcomingAppointments.php"> Upcoming</a>
      <a href="appointmentRequests.php"> Requests</a>
    <a href="Services.html">Services</a>
    <a href="ManagerAboutUs.php">About Us</a>
 <a href="managerHomePage.html">Home</a> 

</div> 
  <table class="content-table" id= "center">
    <br>
    <h2>Upcoming Appointments:</h2>
    <thead>

      <tr>
        <th scope="col">Pet name</th>
        <th scope="col">Service</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col"> Contact Owner</th>
        <th scope="col"> Done</th>

         
      </tr>
    </thead>
    <tbody>
      
      <?php
  


  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );

$query="SELECT * FROM appointments_requests WHERE status='accepted'";
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print("<tr>      
       <th scope='row'><p>".$data[0]."</p>
       <td>".$data[1]."</td>
       <td>".$data[2]."</td>
       <td>".$data[3]."</td>
       <th>  <a href="."'".$data[4]."'"."> Contact ".$data[0]. "'s Owner  </a> </th>
       <th><a href=\"addToPreviousAppointments.php?id=".$data[7]."\"><img src= 'images/check.png'></a></th></tr>");
   }
}
else
echo "An error occured while completing your request.";

  ?>
  
    
    </tbody>
  </table>
</body>
  <img src="images/logo.png" class="logo" alt= "logo of pet care"  >
  <html>

  