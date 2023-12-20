<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactcss.css">
</head>
<body>
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="minor_project";

    $conn=mysqli_connect( $servername,$username,$password,$database);

    if(!$conn){
      die("Sorry we failed to connect".mysqli_connect_error());
    }
      else{

     // echo "Connection was successful";
      $sql="INSERT INTO `contact_us` (`Name`, `Email`, `Phone`, `Message`) VALUES ('$name', '$email', '$phone', '$message')";

      $result=mysqli_query($conn,$sql);

      if($result){
        echo '<script>alert("Record inserted successfully")</script>';
      }
      else{
        echo '<script>alert("Sorry! record is not entered due to server error")</script>';
      }
    }
  }
?>
    <div class="container">  
        <form id="contact" action="/Minor Project College/contactus.php" method="post">
          <h3>Contact Us</h3>
          <h4>Bengal Delights</h4>
          <fieldset>
            <input name="name" placeholder="Your name" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input name="email" placeholder="Your Email Address" type="email" tabindex="2" required>
          </fieldset>
          <fieldset>
            <input name="phone" placeholder="Your Phone Number" type="tel" tabindex="3" required>
</fieldset>
            <textarea name="message" placeholder="Type your message here...." tabindex="5" required></textarea>
          </fieldset>
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
          <p class="copyright">Designed by BCA Batch 2022</p>
        </form>
      </div>
</body>
</html>