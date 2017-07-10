<!DOCTYPE html>
<html>

<head>
  <title>Welcome to Resume Template</title>
  <link rel="stylesheet" type="text/css" href="template.css">
  <link rel="stylesheet" type="text/css" href="templatecontact.css">
</head>

<body>
<section class="" ="sec1">
  <div class="cdiv1">
   <a href="index.html">RANDY PETTERSON</a>
   <a href="portfolio.html">PORTFOLIO</a>
   <a href="contact.php">CONTACT</a>
   <a href="resume.html">RESUME</a> 
  </div></section></br>
  
</section>


<h3>Contact Form</h3>

<div class="container">
  <form action="submit.php" method="POST">
    <label for="fname">Name:</label>
    <input type="text" id="fname" name="name" placeholder="Your name.." value="<?php if (isset($_POST['send'])) { echo $_POST['name']; } ?>" required>

    
    <label for="lname">Email Id:</label>
    <input type="text" id="lname" name="email" placeholder="Your email id.." value="<?php if (isset($_POST['send'])) { echo $_POST['email']; } ?>" required>

    <label for="country">Country:</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject:</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required><?php if (isset($_POST['send'])) { echo $_POST['subject']; } ?></textarea>

    <center><input type="submit" name="send" value="Submit"></center>
  </form>
</div>



<section>
  
</section>

</body>
</html>