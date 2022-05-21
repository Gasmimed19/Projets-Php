<?php
require_once("functions.php");
$titre=$_GET["titre"];
$id_etd=$_GET["etudiant"];
$id_ens=$_GET["enseignant"];
$id_spec=$_GET["specialite"];


addPfe($titre,$id_etd,$id_ens,$id_spec);
header("location:accueil.php");
 ?>  
