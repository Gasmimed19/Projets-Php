<?php
function getConnexion(){
return new PDO ('mysql:host=localhost;dbname=gestionpfe' , 'root', '' );
}

function getAllEtudiants(){
    $tab=[];
    $cnx=getConnexion();
    $req=$cnx->query("select * from etudiant");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while($ligne=$req->fetch()){
$tab[]=$ligne;
    }
    return $tab;
}


function getAllEnseignants(){
    $tab=[];
    $cnx=getConnexion();
    $req=$cnx->query("select * from enseignant");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while($ligne=$req->fetch()){
$tab[]=$ligne;
    }
    return $tab;
}




function addPfe($titre,$id_etd,$id_ens,$id_spec){
    $cnx=getConnexion();
    $req=$cnx->prepare("insert into pfe values(null,?,?,?,?)");
    $req->bindParam(1,$titre);
    $req->bindParam(2,$id_etd);
    $req->bindParam(3,$id_ens);
    $req->bindParam(4,$id_spec);
$req->execute();
}

function getAllPfes(){
    $tab=[];
    $cnx=getConnexion();
    $req=$cnx->query("SELECT * FROM pfe 
                        INNER JOIN etudiant ON pfe.id_etd=etudiant.id_etd
                        INNER JOIN specialite ON pfe.id_spec=specialite.id_type
                        INNER JOIN enseignant ON pfe.id_ens=enseignant.id_ens");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while($row=$req->fetch()){
        $tab[]=$row;
    }
    return $tab;
}

function deletePfe($id){
    $cnx=getConnexion();
    $req=$cnx->prepare("delete from pfe where id=?");
    $req->bindParam(1,$id);
$req->execute();
}
function getEtudiantById($id){
    $cnx=getConnexion();
    $req=$cnx->prepare("select * from etudiant where id_etd=?");
    $req->bindParam(1,$id);
$req->execute();

}
function getEnseignantById($id){
    $cnx=getConnexion();
    $req=$cnx->prepare("select nom from enseignant where id_ens=?");
    $req->bindParam(1,$id);
$req->execute();

}
function getAllSpecialites(){

    $tab=[];

    $cnx=getConnexion();

    $req=$cnx->query("select types from specialite");

    $req->setFetchMode(PDO::FETCH_OBJ);

    while($ligne=$req->fetch()){
        $tab[]=$ligne;

    }

    return $tab;

}
function getAllPfesBySpecId($id){
    $cnx=getConnexion();
    $req=$cnx->query("select * from pfe where spec_id={$id}");
    $tab=[];
    $req->setFetchMode(PDO::FETCH_OBJ);
    while($ligne=$req->fetch()){
        $tab[]=$ligne;

    }
    return $tab;
}



    function getPfeByType($t){
        $tab=[];
        $conn=getConnexion();
        $req=$conn->prepare("SELECT * FROM pfe 
                            INNER JOIN etudiant ON pfe.id_etd=etudiant.id_etd
                        INNER JOIN specialite ON pfe.id_spec=specialite.id_type
                        INNER JOIN enseignant ON pfe.id_ens=enseignant.id_ens
                            WHERE id_spec = (SELECT id_type FROM specialite WHERE types=?)");
        $req->execute([$t]);
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }

  
function getNumAllPfes(){
    return sizeof(getAllPfes());
}


function countsByType($t){
    return sizeof(getPfeByType($t));
}


?>
