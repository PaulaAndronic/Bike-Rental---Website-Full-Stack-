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
  background-image: url("../pictures/defectiuni.jpg");

  height: 700px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
   
}

.sidebar {
  height: 100%;
  width: 24%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #2C3E50;
  overflow-x: hidden;
  padding-top: 180px;
  padding-left: 10px;
 
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #F5CBA7;
  display: block;
  font-family: "Lucida Handwriting", Cursive;
}

.sidebar a:hover {
  color: black;
}
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: right;
  width: 20%;
  padding: 10px;
  background: #F5CBA7;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: black;
}
.example1{
    width: 80%;
    padding: 10px;
      border: 1px solid grey;
  float: left;

  background: #f1f1f1;
}
form.example::after {
  content: "";
  clear: both;
  display: table;
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
  <a href="../displayActions/displayMalfunctions.php"><i class="fas fa-bicycle" ></i> Afișare</a>
  <a><i class="fas fa-bicycle" ></i> Căutare</a>
    <form class="example" action="../statistics/searchMalfunctions.php" style="margin:auto;max-width:250px" method="POST">
  <select class="example1" name="search5" style="color:black; font-size:16px;">
            <option value="2020">2020</option>
            <option value="2019">2019</option>
          </select>
  <button type="submit" name="search6"><i class="fa fa-search"></i></button>

</form>

<br>
<a href="../statistics/frequentMalfunctions.php"><i class="fas fa-bicycle" ></i> Defecțiune frecventă</a>
<a href="../statistics/ageStatisticsMalfunctions.php"><i class="fas fa-bicycle" ></i> Categorie Vârstă</a>
  <a href="../index.php"><i class="fas fa-bicycle"></i> Înapoi</a>
</div>  
</div>     
</body>
</html> 
