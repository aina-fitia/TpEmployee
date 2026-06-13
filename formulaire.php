<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement_formulaire.php" method="get">
        <h1>Formulaire de recherche</h1>
        <h3>Departements : <input type="text" name="dept" value="Sales"></h3>
        <h3>Nom employee : <input type="text" name="emp_name" value="Shaw"></h3>
        <h3>Age min : <input type="number" name="min_age" value="25"></h3>
        <h3>Age max : <input type="number" name="max_age" value="65"></h3>
        <input type="submit" value="Rechercher">
    </form>
</body>

</html>