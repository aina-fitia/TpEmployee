<?php
include("function.php");
$id = $_GET['id'];

$data = lien($id);
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
    <h1>Liste des employees </h1>
    <table width="1000" height="500" class="table table-bordered">
        <tr>
            <td >Id</td>
            <td >Nom</td>
            <td >Employees</td>
        </tr>
        <?php foreach($data as $d){?>
        <tr>
            <td > <?= $d["id"]?></td>
            <td > <?= $d["nom"]?></a></td>
            <td > <?= $d["last_name"]?></td>
        </tr>
        <?php } ?>
    </table>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>