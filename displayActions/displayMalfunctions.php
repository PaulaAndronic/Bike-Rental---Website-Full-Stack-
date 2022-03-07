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
                width: 90%;
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
            <th>Data Producerii Defecțiunii</th>
            <th>Descrierea Defecțiunii</th>
            <th>Bicicleta</th>
          <th>Categoria De Vârstă</th>

    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    //select din tabelele defectiuni, bicicleta_defectiune si biciclete
    $date = "SELECT d.Data_Producerii_Def, d.Descriere_Def, concat(B.Marca,' ',B.Culoare) as mar, B.Categorie_Varsta from defectiuni d join bicicleta_defectiune bd on d.Id_def = bd.ID_Defectiune join biciclete b on b.id_bicicleta = bd.id_bicicleta";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
         //afisarea datelor in tabel
        while ($row = $rezultat -> fetch_assoc())
        {
            echo "<tr><td>". $row["Data_Producerii_Def"]. "</td>
            <td>".  $row["Descriere_Def"]. "</td>
            <td>".  $row["mar"]. "</td>
            <td>".  $row["Categorie_Varsta"]. "</td>
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
             
        <br><br><form method:"post" action="../menuActions/malfunctions.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    ?>
    </table>

    </body>
    </html>