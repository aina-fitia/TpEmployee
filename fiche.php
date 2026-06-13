<?php
include("function.php");
$id = $_GET['id'];

$data = fiche_employee($id);
// var_dump($data);
$age = calculer_age($data[0]['first_name']);
echo $age[0]['age'];
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
    <h1>Fiche   employees avec historique salarial </h1>
    <table class="table table-bordered">
        <tr>
            <td>Id</td>
            <td>Nom </td>
            <td>Date d'embauche</td>
            <td> Date d'anniversairee</td>
            <td>Genre</td>
            <td>Salaire</td>
            <td>Du</td>
            <td>Jusqu'a</td>
        </tr>
        <?php foreach($data as $d){?>
        <tr>
            <td> <?= $d["id"]?></td>
            <td> <?= $d["first_name"]?> <?= $d["last_name"]?> </td>
            <td><?=$d["hire_date"]?></td>
            <td><?=$d["birth_date"]?></td>
            <td><?=$d["gender"]?></td>
            <td><?=$d["salary"]?>$</td>
            <td><?=$d["from_date"]?></td>
            <td><?=$d["to_date"]?></td>
        </tr>
        <?php } ?>
    </table>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>