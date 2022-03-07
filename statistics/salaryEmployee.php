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
              content: "\f0d6";
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

    <h1 style="margin-top: 20px; color: white; font-size:30px">Statistică privind angajații care au salariile peste media salariilor tuturor angajaților</h1>
               
    <?php
    //conectare la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
   
    $date ="SELECT concat(A.Nume,' ',A.Prenume) as nume_a, AVG(A.Salariu) as media from angajati A where A.Salariu > (select AVG(Salariu) from Angajati) group by concat(A.Nume,' ',A.Prenume)";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
        //afisarea valorilor in casute
        while ($row = $rezultat -> fetch_assoc())
        {
             echo '<ul class="b">
              <li> '.$row["nume_a"].'</li>
             
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
             
        <br><br><form method:"post" action="../menuActions/employees.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    

    ?>
    
  
    
    </body>
    </html>
