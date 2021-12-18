<?php
session_start();
// news内容を表示
require_once '../../config.php';
require_once 'model/sql/CRUD.php';
require_once 'model/sql/PDF.php';

$sql = new PDF;
$data = $sql->getContents($_GET['pdfId']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/import.css">
</head>

<body>
    <p><?php echo $data['content'] ?></p>
</body>

</html>