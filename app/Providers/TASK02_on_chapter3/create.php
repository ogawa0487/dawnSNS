<?php
$name = $_POST["username"];
$mail = $_POST["mail"];

// PDO接続先の設定
require_once("common.php");
try {
    $sql = "insert into users(username,mail) values(:name,:mail)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":mail", $mail, PDO::PARAM_STR);

$stmt->execute();

    header("Location: list.php");
    exit;
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
