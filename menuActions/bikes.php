<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body {font-family: "Lato", sans-serif; color: black;}

* {box-sizing: border-box;}

.bg-img {
  /* The image used */
  background-image: url("../pictures/biciclete.jpg");

  min-height: 700px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
   
}

.sidebar {
  height: 100%;
  width: 20%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #2C3E50;
  overflow-x: hidden;
  padding-top: 180px;
  padding-left: 30px;
 
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 30px;
  color: #F5CBA7;
  display: block;
  font-family: "Lucida Handwriting", Cursive;
}

.sidebar a:hover {
  color: black;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
  }
</style>
</head>
<body>

<div class="bg-img">
<div class="sidebar">
  <a href="../displayActions/displayBikes.php"><i class="fas fa-bicycle" ></i> Afișare</a>
  <a href="../insertActions/insertBikes.php"><i class="fas fa-bicycle"></i> Inserare</a>
  <a href="../updateActions/updateBikes.php"><i class="fas fa-bicycle"></i> Editare</a>
  <a href="../deleteActions/deleteBikes.php"><i class="fas fa-bicycle"></i> Ștergere</a>
  <a href="../statistics/premiumBikes.php"><i class="fas fa-bicycle"></i> Premium</a>
  <a href="../statistics/maxProfitBikes.php"><i class="fas fa-bicycle"></i> Încasări</a>
  <a href="../index.php"><i class="fas fa-bicycle"></i> Înapoi</a>
</div>  
</div>     
</body>
</html> 
