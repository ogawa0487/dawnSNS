<?php
require_once("common.php");

$id = intval($_GET["id"]);

try {
   $sql = "DELETE FROM users WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

$stmt->execute();
    header("Location: list.php");
    exit;
} catch (Exception $e) {
    echo $e->getMessage();
}
