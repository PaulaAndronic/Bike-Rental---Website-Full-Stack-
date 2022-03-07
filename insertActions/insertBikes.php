<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>

<div class="loginbox1">
    <form method="post" action="insertBike.php">
    <h1>Adăugare Bicicletă</h1>
        <p>Marcă</p>
        <input type="text" name="Marca">
        <p>Culoare</p>
        <input type="text" name="Culoare">
        <p>Grosime Roată</p>
        <input type="text" name="Grosime_Roata">
         <p>Categorie Vârstă</p><br>
        <select name="Categorie_Varsta" style="color:black; font-size:20px;">
            <option value="3-5">3-5</option>
            <option value="5-10">5-10</option>
            <option value="10-15">10-15</option>
            <option value=">15">>15</option>
          </select><br><br>
         <p>Preț Oră</p>
        <input type="text" name="Pret_Ora">
        <input type="submit" name="save" value="Salvează">
    </form>
</div>
</body>
</html>