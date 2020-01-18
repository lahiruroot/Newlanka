<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #000;
	color:#FFF;
}

/*contact form */
input[type=text], select, textarea {
  width: Auto;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}
/* Button */
input[type=submit]:hover {
  background-color: #008CBA;
}
/* Button */

/* Form Effect */
input[type=text]:focus {
  background-color: lightgreen;
}
/* Form Effect */

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}
/*contact form */

</style>
</head>
<body>

<div class="footer">
  <!--<h2>Footer</h2>-->
  <!--contact-->
  
<div class="container">
  <div style="text-align:Center">
    <h2>Contact Us</h2>
  </div>

  <div class="row">
    <div class="column">
    
      <form action="index.php" method="POST">
      <table>
        <tr>
        <th><label for="fname">Your Name</label></th>
        <th><input type="text" id="fname" name="uname" placeholder="Your name..."></th>
        </tr>
        <tr>
        <th><label for="email">Your Email</label></th>
        <th><input type="text" id="Email" name="uemail" email="Your Email"placeholder="Your Email..."></th>
        <th><input type="submit" value="Submit"></th>
        </tr>
        </table>
      </form>
    </div>
    <div style="float: right;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.008188171564!2d79.87359051459259!3d6.8896216950215585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a2d3e1a1f1b%3A0xe505e16b84fb506e!2sLanka%20Hospitals!5e0!3m2!1sen!2slk!4v1577604997737!5m2!1sen!2slk" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
  </div>
  

</body>
</html>