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

        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}
            
           ul {
              background: #2C3E50;
              padding: 20px;
              margin-left: 500px;
              margin-right: 500px;
            }

            ul.b {
              list-style-type: none;
            }
            ul li {
              background: #eaeded;
              margin-left:15px;
               margin-top:5px;
                margin-bottom:5px;
              font-family:  "Lucida Handwriting", Cursive;
            }

            li:before {
              content: "\f219";
              color:white;
              font-family: FontAwesome;
              display: inline-block;
              font-size: 25px;
              margin-left: -1.3em; 
              width: 1.3em;

            }
         </style>
    </head>
    <body>

    <h1 style="margin-top: 20px; color: white; font-size:30px">Defecțiunea/Defecțiunile întâlnită/e cel mai des la biciclete</h1>
               
    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
   
    $date ="SELECT def.Descriere_def as des from defectiuni def join bicicleta_defectiune bd on def.Id_Def = bd.ID_Defectiune
      group by def.Descriere_def
      having count(*) = (select count(def1.Id_Def) from defectiuni def1 join bicicleta_defectiune bd1 on def1.ID_def = bd1.ID_Defectiune group by def1.Descriere_def order by count(def1.ID_def) desc limit 1)";

    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
        //afisarea datelor in casute
        while ($row = $rezultat -> fetch_assoc())
        {
             echo '<ul class="b">
              <li> '.$row["des"].'</li>
             
            </ul>';
        }
    }
    else

    {
        echo "0 result";
    }
    //buton de intoarcere la pagina anterioara
    echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/malfunctions.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    

    ?>
    
  
    
    </body>
    </html>
