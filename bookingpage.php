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
// if(isset($_GET['movie_id'])) {
//   echo $_GET['movie_id'];
//  }
$ID = $_GET['submit_button'];

$sql = "SELECT * FROM Movie WHERE ID = $ID";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$Name = $row['Name'];
$Image_path = $row['Image_path'];
$Length = $row['Length'];
$Language = $row['Language'];
$Casting = $row['Casting'];
$Rating = $row['Rating'];


mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomePage</title>
    <link rel = "stylesheet" href = 'background.css'>
    <link rel = "stylesheet" href = 'seat.css'>
  </head>
  <style>
    #bookingdetail{
      width:80%;
      align-items:center;
    }
    #movietable{
      margin:auto;
    }
    #movietable td{
      width:30%;
    }
    .seat {
      background-color: #444451;
      height: 12px;
      width: 15px;
      margin: 3px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;    
    }
  .seat.selected{
    background-color: #6feaf6;
    }
    .seat:nth-of-type(2) {
  margin-right: 18px;
}
.seat.occupied{
  background-color: #fff;
}
.seat:not(.occupied):hover {
  cursor:pointer;
  transform:scale(1.2);
}

.seat:nth-last-of-type(2) {
    margin-left: 18px;
}
.row {
  display:flex;
}
.container {
    perspective: 1000px;
    margin-bottom: 30px;
}
.screen {
  background-color: #123456;
  text-align: center;
  font-size: 40px;
  height: 70px;
  width: 100%;
  margin:15px 0;
  transform:rotatex(-45deg);
  box-shadow:0 3px 10px rgba(255,255,255,0.3);
}
p.text span{
  color: #6feaf6
}

  </style>
  <body>
    <header>
      <a href = "index.html"><img src="logo.jpg" alt="Logo"/></a>
      <a href="login.html"><p id="login">Login/Sign Up</p></a>
    </div>
    </header>
    <div class="topnav">
      <a href="nowshowing.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <br>
    <div id="booking">
      <img src = <?= $Image_path ?> width="200" height="300">
      <h3><?= $Name ?></h3>
      <form action='booking.php' method='POST'>
        <table>
          <tr>
            <td>Your Name: </td>
            <td><input type="text" name="name" id="name"></td>
</tr>
<tr>
            <td>Your Email: </td>
            <td><input type="email" name="email" id="email"></td>
</tr>
<tr>
            <td>Your Phone Number: </td>
            <td><input type="tel" name="phonenum" id="phonenum"></td>
</tr>
          <tr>
            <td>Select your date: </td>
            <td><input type='date' name='bookeddate' id="bookeddate"></td>
      </tr>
      <tr>
        <td>Select your time: </td>
        <td><select id='bookedtime' name='bookedtime'>
        <option id='8am' value="8:00AM">8:00 AM</option>
        <option id='9am' value="9:00AM">9:00 AM</option>
        <option id='10am' value="10:00AM">10:00 AM</option>
        <option id='11am' value="11:00AM">11:00 AM</option>
          <option id='12pm' value="12:00PM">12:00 PM</option>
          <option id='1pm' value="1:00PM">1:00 PM</option>
          <option id='2pm'value="2:00PM">2:00 PM</option>
          <option id='3pm'value="3:00PM">3:00 PM</option>
          <option id='4pm' value="4:00PM">4:00 PM</option>
          <option id='5pm' value="5:00PM">5:00 PM</option>
          <option id='6pm'value="6:00PM">6:00 PM</option>
          <option id='7pm'value="7:00PM">7:00 PM</option>
          <option id='8pm' value="8:00PM">8:00 PM</option>
          <option id='9pm' value="9:00PM">9:00 PM</option>
          <option id='10pm'value="10:00PM">10:00 PM</option>
          <option id='11pm'value="11:00PM">11:00 PM</option>
          <option id='12am' value="12:00AM">12:00 AM</option>
          <option id='1am' value="1:00AM">1:00 AM</option>
          <option id='2am'value="2:00AM">2:00 AM</option>
        </select></td>
      </tr>
      <tr>
        <td></td>
        <td>
      <button type='submit' name="update_button" onclick="return validateDate();"value=<?= $ID ?>>Check Available Seats</button>
</td>
<script>
    function dateInPast(firstDate, secondDate) {
      if(firstDate.setHours(0,0,0,0) < secondDate.setHours(0,0,0,0)){
        return true;
      }
      return false;
    }

  function validateDate(){
    //check if date is filled
    var bookeddate = document.getElementById('bookeddate').value;
    datevalue = new Date(bookeddate);
    var todayDate = new Date();

    //check if date is entered
    if(!Date.parse(bookeddate)){
      alert("Please enter a valid date!");
      return false;
    }    
    else if(dateInPast(datevalue,todayDate)){
      alert("Cannot book for past dates!");
        return false;
    }
    else{
    return true;
    }
  }

  function validateName(){

  }

  function validateEmail(){

  }

  function validatePhone(){

  }

  function validateTime(){
    
  }


    function validateForm(){
      return validateDate() && validateName() && validateEmail() && validatePhone() && validateTime();
    }

  </script>
</tr>
      <tr>
      <td>Select your seat: </td>
      <td>
        <div class="container">
          <div class = "screen">SCREEN</div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
        </div>
      </td>
</tr>
<tr>
  <td><input type ='text' style="display:none" name="bookedseat" id="bookedseat"></td>
  <td><button type="submit" name="submit_button" onclick="return validateForm()" value=<?= $ID ?>>Book</td>
</tr>
      </table>

      <p class="text">You have selected <span id="count">0</span> Seats for a price of $<span id="total">0</span></p>
      </form>
    </div>
    <script>
      var container = document.querySelector(".container");
      var seats = document.querySelectorAll(".row .seat");
      var count = document.getElementById("count");
      var total = document.getElementById("total");

    //check for occupied
    var occupiedseatstring = "<?php echo $_SESSION['occupied_seats']?>";
    var occupieddate = "<?php echo $date ?>";
    var occupiedtime = "<?php echo $time ?>";
      var occupiedseats = occupiedseatstring.split(","); 
      occupiedseats = occupiedseats.map(string => parseInt(string));

      populateUI();



      //Update Number of Selected Seats and Total Price
      function updateCount(){
        selectedSeats = container.querySelectorAll(".row .seat.selected");
        count.textContent = selectedSeats.length;
        total.textContent = selectedSeats.length * 10;
        var bookedseat = document.getElementById('bookedseat');
        seatsIndex = [...selectedSeats].map(function(seat){
          return [...seats].indexOf(seat);
        });
        bookedseat.value = seatsIndex;
        localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
      }

      function populateUI(){        
        if(occupiedseats !== null && occupiedseats.length > 0){
          seats.forEach(function(seat,index){
            if(occupiedseats.indexOf(index) != -1) {
              seat.classList.add("occupied");
            }
          })
        }
      }


      container.addEventListener("click", function(e){
        if(e.target.classList.contains("seat") && !e.target.classList.contains("occupied")){
          e.target.classList.toggle("selected");
          updateCount();
        }
      });
      updateCount();
      


      </script>
<!-- <script>
let getRoundedDate = (minutes, d=new Date()) => {

let ms = 1000 * 60 * minutes; 
let roundedDate = new Date(Math.round(d.getTime() / ms) * ms);

return roundedDate;
}
var defaultdate = document.getElementById('bookeddate').valueAsDate = new Date();


var option1 = document.getElementById('closesttonow');
var option2 = document.getElementById('hour1');
var option3 = document.getElementById('hour2');
var option4 = document.getElementById('hour3');

var interval = 30 * 60 * 1000;
var option1time = new Date(Math.ceil(new Date().getTime()/interval)* interval);
var option2time = new Date();
option2time.setHours(option1time.getHours() + 1);
option2time = getRoundedDate(30,option2time);
var option3time = new Date();
option3time.setHours(option1time.getHours() + 2);
option3time = getRoundedDate(30,option3time);
var option4time = new Date();
option4time.setHours(option1time.getHours() + 3);
option4time = getRoundedDate(30,option4time);


option1.innerHTML = option1time.toLocaleTimeString();
option2.innerHTML = option2time.toLocaleTimeString();
option3.innerHTML = option3time.toLocaleTimeString();
option4.innerHTML = option4time.toLocaleTimeString();






</script>    -->
  </body>
  <footer></footer>
</html>