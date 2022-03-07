<!DOCTYPE html>
    <html>
    <head>
    	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
 body {background-image: url("../pictures/statistics.jpg");

  top: -30px;
  left: -10px;
  overflow: hidden;}
        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}
            
            table 
            {
                border-collapse: collapse;
                width: 80%;
                color: black;
                font-family: "Lucida Handwriting", Cursive;
                font-size: 20px;
                text-align: center;
                margin:0 auto;
                margin-top: 15px;

            }
            th
            {
                background-color: #2C3E50;
                color: white;
                font-size: 25px;
            }
            tr:nth-child(even){ background-color: #EAEDED  }
            ul {
			  background: #2C3E50;
			  padding: 20px;
              margin-left: 580px;
              margin-right: 580px;
			}

			ul.b {
			  list-style-type: none;
			}
			ul li {
			  background: #eaeded;
			  margin-left:20px;
              margin-top: 10px;
              margin-bottom: 10px;
              margin-right: 20px;
              font-family:  "Lucida Handwriting", Cursive;
              font-size: 30px;
			}

			li:before {
			  color:white;
			  font-family: FontAwesome;
			  display: inline-block;
			  margin-left: -1.3em; 
			  width: 1.3em;

			}
            h1{
            font-family: "Lucida Handwriting", Cursive;
            color: white;
            font-size: 30px;
            text-align: center;
            margin-top: 20px;
}
        </style>
    </head>
    <body>
    <h1>Statistică privind numărul de biciclete defecte în anul</h1><h1><?php echo $_POST["search5"]?></h1>
            

    <?php
    //conectare la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    if(isset($_POST["search6"])) {
            $an = $_POST["search5"];
    $date = "SELECT B.ID_Bicicleta, count(*) as nr, YEAR(def.Data_Producerii_Def) as data_prod from biciclete B, defectiuni def, (select bd.ID_Defectiune from bicicleta_defectiune bd join defectiuni d on bd.Id_Defectiune=d.ID_Def where YEAR(d.Data_Producerii_Def)='$an') as sub where YEAR(def.Data_Producerii_Def)='$an' AND B.ID_Bicicleta in ( select ID_Bicicleta from bicicleta_defectiune where ID_Bicicleta = B.ID_Bicicleta) AND def.ID_Def in (select ID_Defectiune from bicicleta_defectiune where ID_Defectiune = def.ID_Def) group by B.ID_Bicicleta, def.Data_Producerii_Def";
   
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {

        if ($row = $rezultat -> fetch_assoc())
        {   //afisarea rezultatului in casute
            echo '<ul class="b">
			  <li> '.$row["nr"].'</li>
			 
			</ul>';
        }
       
    }

    else

    {
        echo "0 result";
    }
}
    //buton de intoarcere la pagina anterioara
    echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/malfunctions.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
        
    ?>
 
  
    </body>
    </html>