<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body {font-family: "Lato", sans-serif; color: black;
 background-image: url("../pictures/statistics.jpg");

  min-height: 700px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
   }

* {box-sizing: border-box;}
 .buton form input{width:300px;height:35px;margin-bottom:40px;margin-left: -10px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}

#piechart {
  padding-left: 350px;

}
h1{
font-family: "Lucida Handwriting", Cursive;
color: white;
font-size: 30px;
text-align: center;
margin-top: 20px;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}


</style>
</head>
<body>
<h1>Statistică privind sumele încasate în funcție de închirierile bicicletelor pentru o anumită categorie de vârstă</h1>
<div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        //se deseneaza diagrama si se seteaza valorile corespunzatoare
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['categorie', 'suma'],
            <?php  
            //conectare la baza de date
            $conn = mysqli_connect("localhost","root","","centrubiciclete3");

            $date = "SELECT b.Categorie_Varsta AS categorie, sum(det.Suma_De_Plata) AS suma FROM biciclete b JOIN client_inchiriere cl ON b.ID_Bicicleta = cl.ID_Bicicleta JOIN detalii_inchiriere det ON cl.ID_Inchiriere = 
              det.ID_Inchiriere GROUP BY b.Categorie_Varsta";
              $rezultat = $conn->query($date);
  
                 while ($chart=$rezultat -> fetch_assoc()){
                  //afisarea datelor in chart
                  echo "[' ".$chart['categorie']." ',".$chart['suma']."], ";
                 }
            ?>
        ]);
        //caracteristici diagrama
        var options = { backgroundColor:{ fill: "white" }, 'width':800, 'height':500};
        //afisarea diagramei
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        </script>

  
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/bikes.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ;
</body>
</html> 
