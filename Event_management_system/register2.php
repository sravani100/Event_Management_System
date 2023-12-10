<?php
// Include the database connection file
require_once('connection.php');

// Check if the form is submitted
if(isset($_POST['regs']))
{
    // Retrieve form data
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
    $typeofevent = mysqli_real_escape_string($con, $_POST['typeofevent']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $noofguests = mysqli_real_escape_string($con, $_POST['noofguests']);
   
    // Check if any field is empty
    if (empty($email) || empty($contactno) || empty($typeofevent) || empty($date) || empty($venue) || empty($food) || empty($noofguests))
    {
        echo '<script>alert("Please fill all the fields")</script>';
    }
    else
    {
        // Check if the email already exists in the database
        $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
        $result_check_email = mysqli_query($con, $sql_check_email);

        if (mysqli_num_rows($result_check_email) > 0)
        {
            echo '<script>alert("Email already exists. Press OK to login.")</script>';
            echo '<script>window.location.href = "index.php";</script>';
        }
        else
        {
            // Insert data into the database
            $sql_insert = "INSERT INTO users (email, contactno, typeofevent, date, venue, food, noofguests) VALUES ('$email', '$contactno', '$typeofevent', '$date', '$venue', '$food', '$noofguests')";
            $result_insert = mysqli_query($con, $sql_insert);

            if ($result_insert)
            {
                echo '<script>alert("Registration successful. Press OK to login.")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
            else
            {
                echo '<script>alert("Please check the connection")</script>';
            }
        }
    }
}
?>

  <style>
      body{
        background-size: auto;
         background-position:unset;
         background: url("bgi.jpg") center/cover no-repeat;
         text-align: center;
         /* background-repeat: ; */
      }
      input#psw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
.cont{
  width: 400px;
  height: 650px;
  text-align: center;
  background-color: rgb(145, 227, 227);
  margin-top: 150px;
  margin-left: 550px;
  opacity: 0.85;
  border-radius: 10px;
}
input#cpsw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  
  width: 400px;
  margin-left:1000px;
  margin-top: -500px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
  .btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #aee7eb;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
}</style> 

<div class="main">
    <div class="register">
        <h2>CONTACT HERE</h2>

        <form id="register" action="register2.php" method="POST">
            <!-- ... (your existing form fields) -->

            <label>TYPE OF EVENT: </label>
            <br>
            <select name="typeofevent" required>
                <option value="">Select Event Type</option>
                <option value="BIRTH DAY CELEBRATION">BIRTH DAY CELEBRATION</option>
                <option value="MARRIAGE">MARRIAGE</option>
                <option value="BUSINESS MEETINGS">BUSINESS MEETINGS</option>
            </select>
            <br><br>

            <label>DATE: </label>
            <br>
            <input type="date" name="date" required>
            <br><br>

            <label>SELECT YOUR VENUE: </label>
            <br>
            <select name="venue" required>
                <option value="">Select Venue</option>
                <option value="ANITS CONVENTION">ANITS CONVENTION</option>
                <option value="THAGARAPUVLASA FUNCTION HALL">THAGARAPUVLASA FUNCTION HALL</option>
                <option value="NARAYANA KALYANAMANDAPAM">NARAYANA KALYANAMANDAPAM</option>
            </select>
            <br><br>
<label><b>EMAIL :</b> </label>
            <br>
            <input type ="email" name="email"
            id="name" placeholder="Enter Your email" required>
            <br><br>

            <label><b>CONTACT NO:</b> </label>
            <br>
            <input type ="text" name="contactno"
            id="name" placeholder="Enter your contact no" required>
            <br><br>
<label><b>NO.OF GUESTS: </b></label>
            <br>
            <input type="text" name="noofguests" 
            id="noofguests" placeholder="Enter NO.OF GUESTS" required>
            <br><br>
          

            <input type="submit" class="btnn" name="regs" value="REGISTER" style="background-color: #0091ff;color: white">
        </form>
    </div>
</div>


</body>
</html>
