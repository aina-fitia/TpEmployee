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
    <h1>Liste des departements:</h1>
    <table width="1000" height="500">
        <tr>
            <td class="border" >Id</td>
            <td class="border">Nom</td>
            <td class="border">Manager</td>
        </tr>
        <?php foreach($data as $d){?>
        <tr>
            <td class="border"> <?= $d["id"]?></td>
            <td class="border"> <a href="employe.php?id=<?=$d["id"]?>"><?= $d["nom"]?></a></td>
            
            <td class="border"> <?= $d["last_name"]?></td>
        </tr>
        <?php } ?>
    </table>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>