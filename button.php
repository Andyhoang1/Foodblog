<?php
    include'connection.php';
    $id = $_GET["id"];
    $querylike = "UPDATE posts SET likes = likes +1 WHERE id = $id";
    echo $querylike;
    $likes = $PDO->query($querylike);
    header("Location: index.php");
    $likeresultaat = $likes->fetchAll(PDO::FETCH_ASSOC);
?>