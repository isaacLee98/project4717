<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// for checking available seats
if(isset($_POST["update_button"])){
$ID = $_POST['update_button'];
$date = $_POST['bookeddate'];
$date = (string)$date;
$time = $_POST['bookedtime'];
$time = (string)$time;

$sql = "SELECT seat from Movie_sales WHERE Movie = $ID and Date = '$date' and Time = '$time'";

if (mysqli_query($conn, $sql)){

  $result = $conn->query($sql);
  $num_result = $result->num_rows;
  $occupied_seats = [];

  for($i = 0; $i < $num_result; $i++){
    $row = $result->fetch_assoc();
    array_push($occupied_seats,$row['seat']);
  }


  $occupied_seats = join(",",$occupied_seats);
  
  //output occupied_seats to javascript 
  $_SESSION['occupied_seats'] = $occupied_seats;
  header('Location: ' . $_SERVER['HTTP_REFERER']);

}
else{
    echo mysqli_error($conn);
}

}

//for booking tickets
else if(isset($_POST['submit_button'])){
$ID = $_POST['submit_button'];
$ID = (int)$ID;
$name = $_POST['name'];

$email = $_POST['email'];

$phonenum = $_POST['phonenum'];
$phonenum = (string)$phonenum;

$date = $_POST['bookeddate'];
$date = (string)$date;

$time = $_POST['bookedtime'];
$time = (string)$time;

$seat = $_POST['bookedseat'];
$seat = join(",",array($seat));


$sql = "INSERT INTO Movie_sales(Name,Email,Phone,Movie,Date,Time,Seat) VALUES('$name','$email','$phonenum',$ID,'$date','$time','$seat')";

$sql2 = "SELECT GROUP_CONCAT(Seat) as 'invalidseats' from Movie_sales where Date = '$date' and Time = '$time'";

if (mysqli_query($conn, $sql2)){
  $result = $conn->query($sql2);
  $row = $result->fetch_assoc();
  $invalidseatstring = $row['invalidseats'];  
  $invalidseatArray = explode(",",$invalidseatstring);
  $bookedseatArray = explode(",",$seat);
  foreach($bookedseatArray as &$bookedseat){  
    if(in_array($bookedseat,$invalidseatArray)){
      echo '<script type="text/javascript">';
      echo 'alert("Please check if seats are available by clicking \"Check Available Seats \"");';
      echo 'window.history.go(-1);';
      echo '</script>';
      return;
    }
  }  
  if(mysqli_query($conn,$sql)){
    header("Location: receipt.php");
    exit();
  }

  else{
    echo mysqli_error($conn);
  }

  }
  
else{
  echo mysqli_error($conn);
} 


}


mysqli_close($conn);
?>