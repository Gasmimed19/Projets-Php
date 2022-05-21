<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<title>Liste des PFEs</title>



</head>


<body>
    <div class="card bg-primary text-white">
    <?php include_once("top.php");?>

    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-3">
        <?php include_once("left.php");?>

        </div>
        <div class="col-9">
        <div class="card">
        <div class="card-header bg-info text-white">
<h3>Ajouter un PFE</h3>
</div>
<div class="card-body">
<?php
 if(isset($_SESSION["message"])){
    echo "<div class='alert alert-{$_SESSION["type"]}'>";
    echo $_SESSION["message"];
    echo "</div>";
unset($_SESSION["message"]);
 }
?>
        <form method="get" action="rep_ajouter.php">


            <div class="form-group">
            <div class="form-group">
            <label>Titre</label><br>
            <input type="text" class="form-control" name="titre" >
        </div>




            <label>Etudiant </label><br>
         <select class="form-control" name="etudiant">
<?php
require_once("functions.php");
$Etudiants=getAllEtudiants();
foreach ($Etudiants as $k=>$v){
    echo "<option value='{$v->id_etd}'>{$v->nom_etd}</option>";
}
?>
         </select>



         <label>Enseignant </label><br>
         <select class="form-control" name="enseignant">
<?php
require_once("functions.php");
$Enseignants=getAllEnseignants();
foreach ($Enseignants as $k=>$v){
    echo "<option value='{$v->id_ens}'>{$v->nom_ens}</option>";
}
?>
         </select>



         <label>Type</label><br>
         <select class="form-control" name="type">
<?php
require_once("functions.php");
$spec=getAllSpecialites();
foreach ($spec as $k=>$v){
    echo "<option value='{$v->id_spec}'>{$v->types}</option>";
}
?>
         </select>





        </div>


        <div><input type="submit" value="Enregistrer" class="btn btn-success"></div>
        </form>
  



</div>
</div>           
            
            

        </div>
    </div>
               
      
        

</body>
</html>