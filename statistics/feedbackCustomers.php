<html>
<head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
 
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
        </style>
    </head>
    <body>
<p style='font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px;font-size:25px; text-align: center;'>Mai jos este un tabel care conține numărul de utilizatori care au dat feedback și numărul de utilizatori pentru fiecare tip de feedback.</p><br><p style='font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px;font-size:25px;text-align: center;'> Prin alegerea operației RATING se va deschide o statistică legată de calitatea serviciilor oferite de centrul de închiriere a bicicletelor.</p>
        <table>
          <th>Total</th>
            <th>1 stele</th>
            <th>2 stele</th>
            <th>3 stele</th>
            <th>4 stele</th>
            <th>5 stele</th>
            <th>Operație</th>

    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");

    $date = "SELECT ID_Client,
    count(*) AS total,
    sum(case when Feedback = 1 then 1 else 0 end) AS star1,
    sum(case when Feedback = 2 then 1 else 0 end) AS star2,
    sum(case when Feedback = 3 then 1 else 0 end) AS star3,
    sum(case when Feedback = 4 then 1 else 0 end) AS star4,
    sum(case when Feedback = 5 then 1 else 0 end) AS star5
FROM clienti where Feedback != 0";
    $rezultat = $conn->query($date);
  

      
             while ($row = $rezultat -> fetch_assoc())
        {  //afisarea valorilor si link-ul pentru operatia de rating(plus valorile curente) 
            echo "<tr><td>". $row["total"]. "</td><td>". $row["star1"]. "</td><td>".  $row["star2"]. "</td><td>". 
             $row["star3"]. "</td><td>". $row["star4"]. "</td><td>". $row["star5"]."</td>
             <td><a href = 'feedbackCustomersChart.php?tot=$row[total]&
             st1=$row[star1]&
             st2=$row[star2]&
             st3=$row[star3]&
             st4=$row[star4]&
             st5=$row[star5]'>Rating</td></tr>";
            
        }
        //buton de intoarcere la pagina anterioara
        echo "</table>";
       echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/customers.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
 
    $conn->close();
    ?>
    </table>

    </body>
</head>
</html>