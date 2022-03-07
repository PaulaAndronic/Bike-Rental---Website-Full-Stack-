<?php
//Conectarea la baza de date
session_start();
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verica aparitia erorilor la conectare
if(!$conn){
    die ('Conectarea la baza de date nu a reusit!');
}
//se preiau valorile transmise prin link-ul din pagina anterioara
$tot = $_GET['tot'];
$st1 = $_GET['st1'];
$st2 = $_GET['st2'];
$st3 = $_GET['st3'];
$st4 = $_GET['st4'];
$st5 = $_GET['st5'];
//se calculeaza procentele pentru fiecare tip de feedback
$pro1 = $_GET['st1']/$_GET['tot']*100;
$style_t1 = 'float: left; width: ' . $pro1 . '%; height:18px;';
$pro2 = $_GET['st2']/$_GET['tot']*100;
$style_t2 = 'float: left; width: ' . $pro2 . '%; height:18px;';
$pro3 = $_GET['st3']/$_GET['tot']*100;
$style_t3 = 'float: left; width: ' . $pro3 . '%; height:18px;';
$pro4 = $_GET['st4']/$_GET['tot']*100;
$style_t4 = 'float: left; width: ' . $pro4 . '%; height:18px;';
$pro5 = $_GET['st5']/$_GET['tot']*100;
$style_t5 = 'float: left; width: ' . $pro5 . '%; height:18px;';
$average = (1*$_GET['st1']+2*$_GET['st2']+3*$_GET['st3']+4*$_GET['st4']+5*$_GET['st5'])/$_GET['tot'];
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
.buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
.buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
.buton form input:last-Child:hover{background-color:#EAEDED;color:black}
body {
  background: url(../pictures/statistics.jpg);
  background-size: cover;
  font-family: "Lucida Handwriting", Cursive;
  margin: 0 auto; /* Center website */
  max-width: 800px; /* Max width */
  padding: 20px;

}

.heading {
  font-size: 35px;
  margin-right: 25px;
  color: white;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
  color: white;
  font-size: 20px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
  color: white;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: <?php echo $style_t5;?>; height: 18px; background-color: #4CAF50;}
.bar-4 {width: <?php echo $style_t4;?>; height: 18px; background-color: #2196F3;}
.bar-3 {width: <?php echo $style_t3;?>; height: 18px; background-color: #00bcd4;}
.bar-2 {width: <?php echo $style_t2;?>; height: 18px; background-color: #ff9800;}
.bar-1 {width: <?php echo $style_t1;?>; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>
<form method="post" action="">
<span class="heading">Rating</span>

<p style = "color: white; font-size: 20px"><b><?php echo round($average,3);?> medie bazată pe <?php echo "$tot"?> păreri</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 stele</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$st5"?></div>
  </div>
  <div class="side">
    <div>4 stele</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$st4"?></div>
  </div>
  <div class="side">
    <div>3 stele</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$st3"?></div>
  </div>
  <div class="side">
    <div>2 stele</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$st2"?></div>
  </div>
  <div class="side">
    <div>1 stele</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$st1"?></div>
  </div>
</div>
</form>

       <div class="buton">
             
        <br><br><form method:"post" action="feedbackCustomers.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
</body>
</html>