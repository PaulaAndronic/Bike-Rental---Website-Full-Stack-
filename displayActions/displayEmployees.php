<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
        
        /*stilizarea butoanelor si tabelului folosit*/ 
        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;;text-indent:5px;padding:2.5px}
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
        </style>
    </head>
    <body>
	
        <table>
            <th>Nume</th>
            <th>Prenume</th>
            <th>CNP</th>
            <th>Salariu</th>
            <th>Sex</th>
            <th>Strada</th>
            <th>Telefon</th>
            <th>Data Angajării</th>

    <?php
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
	//preluarea datelor necesare formarii tabelului
    $date = "SELECT Nume,Prenume,CNP,Salariu,Sex,Strada,
    Telefon,Data_Angajarii from angajati";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
	//afisarea datelor preluate din baza de date
        while ($row = $rezultat -> fetch_assoc())
        {
            echo "<tr><td>". $row["Nume"]. "</td><td>".  $row["Prenume"]. "</td><td>". $row["CNP"]. "</td><td>". 
             $row["Salariu"]. "</td><td>". $row["Sex"]. "</td><td>". $row["Strada"]."</td><td>". $row["Telefon"]."</td><td>". $row["Data_Angajarii"]."</td><td>";
        }
        echo "</table>";
    }
    else

    {
        echo "0 result";
    }
    //butonul de intoarcere in pagina anterioara
    echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/employees.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
     //inchiderea conexiunii la baza de date
    $conn->close();
    ?>
    </table>

    </body>
    </html>