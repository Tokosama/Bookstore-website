<!-- Fichier Qui permet de voir tous les livres et d'agir sur eux--> 
<?php
include('connexion_bdd.php');

if (isset($_GET['action']) && $_GET['action'] === 'supprimer' && isset($_GET['id'])) {
    $id_livre = $_GET['id'];
    $req = sprintf("DELETE FROM livres WHERE id_livre = '%d'", $id_livre);
    $result = mysqli_query($connexion, $req);
}


$req = 'SELECT * FROM livres';
$res = mysqli_query($connexion, $req);

echo '<div class="container-fluid m-2 mt-3 rounded-2 ps-3">';
echo '<div class="row">';

    echo '<div class="col-12 fw-bold ps-3 py-2" style="font-size: 32px;">Livres</div>';
    echo '<div class="col-12 ps-3">';
    echo '<div class="container-fluid  rounded-3  " style=" background: var( --admin-cube-color); box-shadow:0px 4px 4px 0px rgba(0, 0, 0, 0.25);">';
    echo '<div class="row" style=" max-height:700px; overflow-y:auto" > ';
    while ($livre = mysqli_fetch_assoc($res)) {
         echo '<div class="col-11 mx-auto     d-flex py-2" style="width: 98%; border-bottom: var(--border-bottom);">';
    echo '<div class="p-0 m-0 rounded-3" style="width: 125px; height: 99%px; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25);">';
    echo '<img class="m-0 p-0 rounded-3" src="../assets/covers/' . $livre['Affiche'] . '" alt="" style="height: 100%; width: 100%;">';
    echo '</div>';
    echo '<div class="d-flex flex-column ms-2 justify-content-center rounded-3">';
    echo '<p class="m-0 p-0 fw-bold my-auto" style="font-size: 32px;">' . $livre['Titre'] . '</p>';
    echo '<p class="m-0 p-0 my-auto" style="font-size: 24px;">' . $livre['Auteur'] . '</p>';
    echo '<p class="m-0 p-0 mb-2" style="font-size: 24px;">' . $livre['Nb_pages'] . ' Pages</p>';
    echo '</div>';
    echo '<div class="d-flex flex-column ms-auto justify-content-between py-2">';
    echo '<a href="../includes/modifierlivre.php?action=modifier&id=' . $livre['id_livre'] . '" class="" style="text-decoration:none">';
    echo '<button class="border-0 fw-bold fs-5 text-white px-4 my-2 py-1 rounded-2 d-flex align-items-center" style=" width:200px;  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" id="modifier-button">';
    echo '<img class="mt-1 me-3" src="../assets/icons/pencil.svg" alt="">Modifier</button></a>';
    echo '<a href="../includes/detail_livre.php?action=modifier&id=' . $livre['id_livre'] . '" class="" style="text-decoration:none">';
    echo '<button data-bs-toggle="modal" data-bs-target="#myModalShow"class=" border-0 my-2   text-white fw-bold fs-5   px-4 py-1 rounded-2 d-flex align-items-center " style=" width:200px;  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"  id="modifier-button">';
    echo '<img class=" mt-1 me-3 " src="../assets/icons/details.svg " alt=" ">Details</button></a>';
    echo '<a href="admin.php?action=supprimer&id=' . $livre['id_livre'] . '" class="" style="text-decoration:none"> ';
    echo '<button class="  fw-bold fs-5   px-4 py-1 my-2 rounded-2 d-flex align-items-center " style=" width:200px; background: var( --admin-cube-color); color:var(--text-color); border:solid 1px #00B1C9; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); "id="delete-button" >';
    echo '<img class="delete mt-1 me-3 " src="../assets/icons/corbeil.svg " alt="">Supprimer</button></a>';
    
 echo '</div>';
    echo '</div>';}
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

echo '</div>';
echo '</div>';
echo '<div class="col-12 my-4">';
echo '<button type="button" data-bs-toggle="modal" data-bs-target="#myModalAdd"  class=" border-0 rounded-3 fw-bold d-flex align-items-center justify-content-center"  style="  width: 100%; height: 42px; font-size: 24px; box-shadow:0px 4px 4px 0px rgba(0, 0, 0, 0.25); " id="custom-button">';
echo ' <img  id="addBook" class="  img me-3" src="../assets/icons/addBook.svg" alt="">Ajouter un Livre</button>';
echo '</div>';
include('../includes/ajoutForm.php');
?>
