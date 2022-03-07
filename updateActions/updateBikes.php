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
            <th>Marcă</th>
            <th>Culoare</th>
            <th>Categorie Vârsta</th>
            <th>Grosime Roată</th>
            <th>Preț Oră</th>
            <th>Operație</th>

    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    
    $date = "SELECT ID_Bicicleta,Marca,Culoare,Categorie_Varsta,Grosime_Roata, Pret_Ora from biciclete";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {

        while ($row = $rezultat -> fetch_assoc())
        {   //afisarea valorilor si link-ul pentru operatia de editare(plus valorile curente) 
            echo "<tr>
                  <td>". $row["Marca"]. "</td>
                  <td>".  $row["Culoare"]. "</td>
                  <td>". $row["Categorie_Varsta"]. "</td>
                  <td>". $row["Grosime_Roata"]. "</td>
                  <td>". $row["Pret_Ora"]."</td>
                  <td><a href = 'updateBike.php?rn=$row[ID_Bicicleta]&mar=$row[Marca]&cul=$row[Culoare]&cat=$row[Categorie_Varsta]&gro=$row[Grosime_Roata]&pret=$row[Pret_Ora]'>Editare</td>
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
             
        <br><br><form method:"post" action="../menuActions/bikes.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    ?>
    </table>

    </body>
    </html>