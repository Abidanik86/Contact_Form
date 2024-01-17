<?php require "config.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form | Bee Code</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet"  href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script type="text/javascript">
     window.onload = function() {
            var status = <?php echo json_encode($_GET['status']); ?>;
            if (status === "success") {
                alert("Data inserted successfully!");
                // Redirect to remove the status parameter from the URL
                window.location.replace("home.php");
            } else if (status === "failed") {
                alert("Error inserting message. Please try again.");
            }
        };
  </script>
</head>
<body>
  <div class="wrapper">
    <header>Send Us A Message</header>
    <form action="message.php" method="POST">
      <div class="dbl-field">
        <div class="field">
          <input type="text" name="name" placeholder="Enter your name" required>
          <i class='fas fa-user'></i>
        </div>
        <div class="field">
          <input type="text" name="email" placeholder="Enter your email" required>
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="dbl-field">
        <div class="field">
          <input type="text" name="phone" placeholder="Enter your phone" required>
          <i class='fas fa-phone-alt'></i>
        </div>
        <div class="field">
          <input type="text" name="website" placeholder="Enter your website" required>
          <i class='fas fa-globe'></i>
        </div>
      </div>
      <div class="message">
        <textarea placeholder="Write your message" name="message" required></textarea>
        <i class="material-icons">message</i>
      </div>
      <div class="button-area">
        <button type="submit"  onclick="submitForm()" name="save" class="btn btn-primary" value="Save">Send Message</button> 
        <span></span>
      </div>
    </form>
  </div>
    <footer>
        &copy; 2024 by Abid Hasan Anik
        <a href="mailto:" style="color: lightpink;">abidanik86@gmail.com</a> 
    </footer>
</body>
</html>

