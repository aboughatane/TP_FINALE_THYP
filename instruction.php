<?php 
include("pdo.php");


$sqlQuery = 'select count(id) as compt from website';  // récuperer le nombre d'id dans la table
$count = $mysqlClient->prepare($sqlQuery); 
$count->execute(); 	
$booksCount = $count->fetchAll();


$page = $_GET["page"];
$elementsPerPage = 3;  // Nombre d'élément par page
$pagesCount=ceil($booksCount[0]["compt"]/$elementsPerPage);  // pagesCount est le nombre de page qu'on va avoir -  ceil permet d'arrondir le nombre pour un avoir un nombre entier
$start = ($page-1) * $elementsPerPage;  // l'element par lequel commencer


// On récupère tout le contenu de la table website
$sqlQuery = 'SELECT * FROM website limit :start,:elementsPerPage';
$booksStatement = $mysqlClient->prepare($sqlQuery);
$booksStatement->bindValue('elementsPerPage',$elementsPerPage,PDO::PARAM_INT);
$booksStatement->bindValue('start',$start,PDO::PARAM_INT);
$booksStatement->execute();
$images = $booksStatement->fetchAll();


// Gerer la suppression des elements de la table website 
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(!empty($id) && is_numeric($id)){
        $deleteQuerry = $mysqlClient->prepare('DELETE FROM website WHERE id=:num');
        $deleteQuerry->bindValue(':num', $_GET['id'], PDO::PARAM_INT);
        $executed = $deleteQuerry->execute();

        header("Location:show.php?page=1"); // redirection vers show.php
    }
}
?>