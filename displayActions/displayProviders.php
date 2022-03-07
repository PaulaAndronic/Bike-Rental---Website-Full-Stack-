<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
 
        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}
            table 
            {
                border-collapse: collapse;
                width: 50%;
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
            tr:nth-child(odd){ background-color: white }
            body {
                background-image: url("../pictures/statistics.jpg");

                min-height: 700px;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
   }
        </style>
    </head>
    <body>

        <table>
            <th>Marcă</th>
            <th>Culoare</th>
            
    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    //se verifica ca a fost apasat butonul de catre utilizator   
    if(isset($_POST["search2"])) {
    //se tine cont de alegerea utilizatorului
    $nume_furnizor = $_POST["search1"];
    //select din tabelele biciclete si furnizori
    $date = "SELECT DISTINCT b.Marca,b.Culoare from biciclete b join furnizori f on f.ID_Bicicleta = b.ID_Bicicleta AND f.nume_firma = '$nume_furnizor' ";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
        //afisarea datelor in tabel
        while ($row = $rezultat -> fetch_assoc())
        {
            echo "<tr><td>". $row["Marca"]. "</td><td>".  $row["Culoare"]. "</td></tr>";
        }
        echo "</table>";
    }
    else

    {
        echo "0 result";
    }
    //buton de intoarcere la pagina anterioara
    echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/providers.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    }
    
    ?>
    </table>

    </body>
    </html>