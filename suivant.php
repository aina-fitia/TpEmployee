<?php 
include("function.php");
$dept = $_GET['dept'];
$nom = $_GET['emp_name'];
$min_age = $_GET['min_age'];
$max_age = $_GET['max_age'];

$data = recherche_suivant($dept,$nom,$min_age,$max_age);
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
    <h1>Resultats:</h1>
    <table class="table table-bordered">
        <tr>
            <td>Departements</td>
            <td>Nom employee</td>
            <td>Age </td>

        </tr>
        <tr>
            <?php foreach ($data as $d){ ?>
            <td><?= $d['dept_name'] ?></td>
            <td><?= $d['first_name'] ?> <?= $d['last_name'] ?></td>
            <td><?= $d['age'] ?></td>

        </tr>
        <?php } ?>
    </table>
    <h3><a href="traitement_formulaire.php?dept=<?=$dept?>&&emp_name=<?=$nom?>&&min_age=<?=$min_age?>&&max_age=<?=$max_age?>">Precedent</a></h3>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>