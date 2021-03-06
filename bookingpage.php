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

session_destroy();
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomePage</title>
    <link rel = "stylesheet" href = 'background.css'>
  </head>
  <style>
    #booking img{
      float:left;
      width: 280px;
      height: 400px;
    }
    #bookingtable{
      padding-left:30px;
      font-family: "Helvetica Neue",Arial,sans-serif; font-size: 16px; font-weight: 300; line-height: 1.5625; margin-bottom: 15px;
    }

    #movietitle{
      text-align:center;
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


p.text{
  font-size:20px;
}

p.text span{
  color: #6feaf6
}

  </style>
  <body>
    <header>
      <a href = "index.html"><img src="logo.jpg" alt="Logo"/></a>
    </header>
    <div class="topnav">
      <a href="index.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <br>
    <div id="booking">
      <img src = <?= $Image_path ?> width="200" height="300">

      <form action='booking.php' method='POST'>
        <table id="bookingtable">
          <tr>
            <td id="movietitle" colspan="2"><h3><?= $Name ?></h3></td>
          </tr>
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
        <option id='8am' value="8:00:00">8:00 AM</option>
        <option id='9am' value="9:00:00">9:00 AM</option>
        <option id='10am' value="10:00:00">10:00 AM</option>
        <option id='11am' value="11:00:00">11:00 AM</option>
          <option id='12pm' value="12:00:00">12:00 PM</option>
          <option id='1pm' value="13:00:00">1:00 PM</option>
          <option id='2pm'value="14:00:00">2:00 PM</option>
          <option id='3pm'value="15:00:00">3:00 PM</option>
          <option id='4pm' value="16:00:00">4:00 PM</option>
          <option id='5pm' value="17:00:00">5:00 PM</option>
          <option id='6pm'value="18:00:00">6:00 PM</option>
          <option id='7pm'value="19:00:00">7:00 PM</option>
          <option id='8pm' value="20:00:00">8:00 PM</option>
          <option id='9pm' value="21:00:00">9:00 PM</option>
          <option id='10pm'value="22:00:00">10:00 PM</option>
          <option id='11pm'value="23:00:00">11:00 PM</option>
          <option id='12am' value="00:00:00">12:00 AM</option>
          <option id='1am' value="1:00:00">1:00 AM</option>
          <option id='2am'value="2:00:00">2:00 AM</option>
        </select></td>
      </tr>
      <tr>
        <td></td>
        <td>
      <button type='submit' name="update_button" onclick="return validateDateTime();"value=<?= $ID ?>>Check Available Seats</button>
</td>
<script>
    function dateInPast(firstDate, secondDate) {
      if(firstDate.setHours(0,0,0,0) < secondDate.setHours(0,0,0,0)){
        return true;
      }
      return false;
    }

    function validateDateTime(){
      return validateDate() && validateTime();
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
    var name = document.getElementById("name").value;
    if(name == ""){
      alert("Please enter a name!");
      return false;
    }
    return true;
  }

  function validateEmail(){
    var email = document.getElementById("email").value;
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if(email == ""){
      alert("Please provide your email!");
      return false
    }
    else{
      if(!re.test(String(email).toLowerCase())){
        alert("invalid email format!");
        return false;
      }
      return true;
    }
    }

  function validatePhone(){
    var phonenumber = document.getElementById("phonenum").value;
    const re = /^\d{8}$/;
    if(phonenumber == ""){
      alert("Please provide your phone number!");
      return false;
    }
    else{
      if(!re.test(phonenumber)){
        alert("Provide phone number (SG) without country code!");
        return false;
      }
      return true;

    }


  }

  function validateTime(){
      var bookedtime = document.getElementById("bookedtime").value;
      var bookeddate = document.getElementById('bookeddate').value;
      var [hours, minutes,seconds] = bookedtime.split(":");
      var todaydate = new Date();
      bookeddatetime = new Date(bookeddate);
      bookeddatetime.setHours(+hours); 
      bookeddatetime.setMinutes(minutes); 
      bookeddatetime.setSeconds(seconds);

      if(bookeddatetime <= todaydate){
        alert("Cannot book past time!")
        return false;
      }
      else{
        return true;
      }
  }
  function validateBookedSeat(){
    var bookedseat = document.getElementById('bookedseat').value;
    if(bookedseat == ""){
      alert("Please select the seat(s) you want to book");
      return false
    }
    return true;

  }

    function validateForm(){
      return validateName() && validateEmail() && validatePhone() && validateDate() && validateTime() && validateBookedSeat();

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
  </body>
  <footer></footer>
</html>
