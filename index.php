<?php
include("function.php");
$data = show_dept_manager();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>

<body>

    <h1>Liste des departements :</h1>
    <table width="1000" height="500" class="table table-bordered">
        <tr>
            <td>Id</td>
            <td>Nom departements</td>
            <td>Manager</td>
        </tr>
        <?php foreach($data as $d){?>
        <tr>
            <td> <?= $d["id"]?></td>
            <td> <a href="employe.php?id=<?=$d["id"]?>"><?= $d["nom"]?></a></td>

            <td> <?= $d["first_name"]?> <?= $d["last_name"]?> </td>
        </tr>
        <?php } ?>
    </table>
    <h1>=><a href="formulaire.php">Formulaire de recherche</a></h1>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>