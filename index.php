<html>
<head>
<meta charset="utf-8">
<title>FromLogin</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
        body {
                background-image: url("pictures/meniu.jpg");

                min-height: 700px;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
        }
     h{text-align: right;color:black;font-family: Lato; font-size: 20px;}
    .buton1 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton1 form input:last-Child{background-color:#FDEDEC;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton1 form input:last-Child:hover{background-color:#CB4335}

    .buton2 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton2 form input:last-Child{background-color:#FADBD8;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton2 form input:last-Child:hover{background-color:#CB4335}

    .buton3 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton3 form input:last-Child{background-color:#F5B7B1;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton3 form input:last-Child:hover{background-color:#CB4335}

    .buton4 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton4 form input:last-Child{background-color:#F1948A;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton4 form input:last-Child:hover{background-color:#CB4335}

      .buton5 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton5 form input:last-Child{background-color:#EC7063;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton5 form input:last-Child:hover{background-color:#CB4335}

      .buton6 form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;text-indent:5px;padding:2.5px}
    .buton6 form input:last-Child{background-color:#CD6155;border:none;width:310px;height:40px;font-size:20px;color:black;cursor:pointer;transition:0.3s}
    .buton6 form input:last-Child:hover{background-color:#CB4335}


</style>
</head>
    <body>
         <?php
         //formarea paginii de login si casutelor pentru introducerea datelor utilizatorilor
        session_start();
        if(!isset($_SESSION["ID"]))
        {echo '
<div class="loginbox2">
    <img src="pictures/Logo1.png" class="avatar">
    <form method="post" action="register.php">
    <h1 style="color:black">Login Here</h1>
        <p style="color:black">Username</p>
        <input type="text"  name="username" placeholder="Enter Username"required>
        <p style="color:black">Password</p>
        <input type="password"  name="password" placeholder="Enter Password"required>
        <input type="submit" name="save" value="Log in">
        <h style="color: black">New to site? </h><a href="create.html"><h style="color: black">Create New Account</h></a>
    </p>
        </form>';
if (isset($_GET['info']) && $_GET['info'] == 'gresit') {
                    echo '<p style="text-align: center; color: white; font-size: 20px;">Date incorecte</p>';
                }
                echo'
</div>
        ';}
        else {
        //meniul principal + numele utilizatorului in functie de username-ul si parola introduse
        echo "<h1> Bine ai venit, {$_SESSION["nume"]}!</h1>" ;
        echo'
       <div class="buton1">

        <form method:"post" action="menuActions/bikes.php" style="text-align: center;">
                <input type="submit" value="Biciclete">
                </form>
        </div>

        <div class="buton2">
        <form method:"post" action="menuActions/malfunctions.php" style="text-align: center;">
                <input type="submit" value="Defecțiuni">
                </form>
        </div>
        <div class="buton3">
        <form method:"post" action="menuActions/employees.php" style="text-align: center;">
                <input type="submit" value="Angajați">
                </form>
         </div>
         <div class="buton4">
         
        <form method:"post" action="menuActions/customers.php" style="text-align: center;">
                <input type="submit" value="Clienți">
                </form>
                </div>
          <div class="buton5">
          
        <form method:"post" action="menuActions/providers.php" style="text-align: center;">
                <input type="submit" value="Furnizori">
                </form>
                </div>
                
          <div class="buton6">
        <form method:"post" action="logout.inc.php" style="text-align: center;">
                <input type="submit" value="Log Out">
                </form>
                </div>
    
        ';
    }
        ?>
</body>

</html>