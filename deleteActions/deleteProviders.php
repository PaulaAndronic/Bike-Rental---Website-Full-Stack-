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
            <th>Nume Furnizor</th>
            <th>Telefon</th>
            <th>Data Începerii Contractului</th>
            <th>Operație</th>
    <?php
    //conexiunea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");

    $date = "SELECT DISTINCT Nume_Firma,Telefon,Data_Incepere_Contract from furnizori";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
        //afisarea datelor si a link-ului catre urmatoarea pagina(+datele curente necesare stergerii)
        while ($row = $rezultat -> fetch_assoc())
        {   
            echo "<tr>
                  <td>". $row["Nume_Firma"]. "</td>
                  <td>".  $row["Telefon"]. "</td>
                  <td>". $row["Data_Incepere_Contract"]. "</td>
                  <td><a href = 'deleteProvider.php?rn=$row[Nume_Firma]'>Ștergere</td>
                  </tr>";
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
    ?>
    </table>

    </body>
    </html>