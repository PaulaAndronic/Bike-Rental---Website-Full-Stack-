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

#column {
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

<h1>Statistică privind numărul de biciclete defecte adresate fiecărei categorii de vârstă</h1>
<div id="column"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        //se deseneaza diagrama si se seteaza valorile corespunzatoare
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['cat', 'numărul de biciclete defecte'],
            <?php  
            //conectarea la baza de date
            $conn = mysqli_connect("localhost","root","","centrubiciclete3");

            $date = "SELECT b.categorie_varsta as cat, count(b.ID_Bicicleta) AS nr FROM biciclete b join bicicleta_defectiune def on b.ID_Bicicleta = def.Id_Bicicleta group by b.categorie_varsta";
              $rezultat = $conn->query($date);
              //afisarea valorilor calculate in chart
                 while ($chart=$rezultat -> fetch_assoc()){
                  echo "[' ".$chart['cat']." ',".$chart['nr']."], ";
                 }
        
            ?>
        ]);
        //caracteristici diagrama
        var options = { backgroundColor:{ fill: "white" }, 'width':800, 'height':500};
        //afisarea diagramei
        var chart = new google.visualization.ColumnChart(document.getElementById('column'));
        chart.draw(data, options);
        }
        </script>

      
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/malfunctions.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ;
</body>
</html> 
