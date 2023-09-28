<?php
require_once("common.php");

$id = intval(h($_POST["id"]));
$name = h($_POST["username"]);
$mail = h($_POST["mail"]);

try {
    $sql = "UPDATE users SET username=:name , mail=:mail WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: list.php");

    exit;
} catch (Exception $e) {
    echo $e->getMessage();
}
