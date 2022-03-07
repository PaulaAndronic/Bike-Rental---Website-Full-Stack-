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
              margin-left: 500px;
              margin-right: 500px;
			}

			ul.b {
			  list-style-type: none;
			}
			ul li {
			  background: #eaeded;
			  margin:5px;
              font-family:  "Lucida Handwriting", Cursive;
			}

			li:before {
			  content: "\f09d";
			  color:white;
			  font-family: FontAwesome;
			  display: inline-block;
			  margin-left: -1.3em; 
			  width: 1.3em;

			}
        </style>
    </head>
    <body>
    <h1 style="margin-top: 20px; color: white; font-size:30px">Pentru clienții care apar pe mai mult de trei facturi de închiriere există un card de fidelitate cu ajutorul căruia aceștia pot beneficia de o reducere la viitoarele închirieri</h1>
            

    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");

    $date = "SELECT concat(C.Nume,' ',C.Prenume) as nume, count(*) as Nr from clienti C JOIN detalii_inchiriere D ON C.ID_Client = D.ID_Client group by C.ID_Client having count(*) > 3";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {

        while ($row = $rezultat -> fetch_assoc())
        {   //afisarea valorilor in casute
            echo '<ul class="b">
			  <li> '.$row["nume"].'</li>
			 
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
             
        <br><br><form method:"post" action="../menuActions/customers.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
        
    ?>
 
  
    </body>
    </html>