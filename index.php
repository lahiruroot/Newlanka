<!DOCTYPE html>
<html lang="en">
<head>
<title>New Lanka Hospital</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Style the body */
body {
    font-family: Arial;
    margin: 0;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #495057 !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}

/* Style the header */
.header {
    padding: 10px;
    text-align: center;
    background: #0066ff;
    color: white;
}

/* Increase the font size of the h1 element */
.header h1 {
    font-size: 40px;
}

/* Column container */
.row {  
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 30%;
    background-color: #f1f1f1;
    padding: 20px;
}

/* Main column */
.main {   
    flex: 70%;
    background-color: white;
    padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width:100%;
    }
}

/*img {vertical-align: middle; height:600px; width:100%;}*/

/* Slideshow container */
.slideshow-container {
  padding-bottom:10px;
}

section.section1 {
		background-image:url(img/cover2.jpg);
		background-size:100% 600px;
	}
section.section2 {
		background-image:url(img/Consultants.jpg);
		background-size:100% 600px;
	}
section.section3 {
		background-image:url(img/Machine-In-Future-Hospital.jpg);
		background-size:100% 600px;
	}
section.section4 {
		background-image:url(img/iStock_000010369325Medium-1000x300.jpg);
		background-size:100% 600px;
	}
section.section1, section.section2, section.section3, section.section4 {
		height:600px; width:100%;
	}

#prev,
#next {
  position: absolute;
  z-index: 9999;
  display: block;
  top: 250px;
  width: 100px;
  height: 100px;
  text-indent: -9999px;
}

#prev {
  left: 10px;
  background: url(Back.png);
  background-size: 100px 100px;
  background-repeat: no-repeat;
}

#next {
  right: 10px;
  background: url(next.png);
  background-size: 100px 100px;
  background-repeat: no-repeat;
}
h1.slidetext {
		padding-left:150px;
		padding-top:200px;
		margin:0;
		font-size:48px;
	}
h1.slidetext2 {
		padding-left:150px;
		margin:0;
		font-size:48px;
	}
h4.slidetext3 {
		padding-left:150px;
		margin:0;
		font-size:14px;
	}
input.DATE {
		background-position:inherit;
	}

  /* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #FFF;
}

/* Style the navigation bar links */
.navbar a {
    float: right;
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}
</style>

<script src="jquery-3.3.1.min.js"></script>
<script src="js/slidshow.js"></script>
</head>
<body>

<header>
  <?php include 'header.php'; ?>
</header>

<nav>
	<?php include 'navbar.php'; ?>
</nav>

<div>
	<?php include 'slideshow.php'; ?>
</div>

<div>
  <?php include 'content.php'; ?>
</div>

<footer>
	<?php include 'footer.php'; ?>
</footer>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>