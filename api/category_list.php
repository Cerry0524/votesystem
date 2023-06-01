<?php
$sql_categories = "SELECT `category`,`description` from `categories`";

$categories = $pdo->query($sql_categories)->fetchAll(PDO::FETCH_ASSOC);
?>