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
        <?php include_once("middle.php");

    require_once("functions.php");
    $pfs=getAllPfes();
    //$nom_etd=getEtudiantById(1);
    //echo $nom_etd;
    foreach ($pfs as $k=>$v){

        //echo $v->id_etd;
      //  foreach($nom_etd as $k1=>$v1){
        //    echo $v1;
        //}
    
        echo "<tr>";
        echo "<td>".$v->id."</td>";
        echo "<td>".$v->titre."</td>";
        echo "<td>".$v->nom_etd."</td>";
        echo "<td>".$v->nom_ens."</td>";
        echo "<td>".$v->types."</td>";
        echo "<td><a class='btn btn-danger' href='del.php?id={$v->id}'>Supp</a></td>";
        echo "</tr>";
    }
    ?>
            
            

        </div>
    </div>
               
      
        

</body>
</html>