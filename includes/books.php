<!-- Fichier Qui permet de d'afficher les livres par domaine--> <?php
include('connexion_bdd.php');


$req_livre = 'SELECT * FROM livres';
$res_livre = mysqli_query($connexion, $req_livre);


$req_domaine = 'SELECT * FROM domaines';
$res_domaine = mysqli_query($connexion, $req_domaine);


// Soumettre le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Email']) && $compte['Nb_D\'emprunt'] < 3) {

    $userid = $compte['id_utilisateur'];
    $livreid = $_POST['book_id']; 

    
    $check_sql = "SELECT * FROM emprunts WHERE id_utilisateur = $userid AND id_livre = $livreid";
    $check_result = mysqli_query($connexion, $check_sql);

    if (mysqli_num_rows($check_result) > 0 ) {
        
        echo "Vous avez déjà emprunté ce livre.";
    } else {
        // Vérifier si le livre est dispo 
        $exp_dispo_sql = "SELECT exemplaires_disponibles FROM livres WHERE id_livre = $livreid";
        $exp_dispo_result = mysqli_query($connexion, $exp_dispo_sql);
        $livre_data = mysqli_fetch_assoc($exp_dispo_result);
        $exemplaires_disponibles = $livre_data['exemplaires_disponibles'];

        if ($exemplaires_disponibles > 0) {
          
            $sql = "INSERT INTO emprunts (id_utilisateur, id_livre) VALUES ($userid, $livreid)";
            $result = mysqli_query($connexion, $sql);

            $sql_nb_emprunt = "UPDATE livres SET exemplaires_disponibles = exemplaires_disponibles - 1 WHERE id_livre = $livreid";
            $result_nb_emprunt = mysqli_query($connexion, $sql_nb_emprunt);

           
            $sql_nb_emprunte = "UPDATE utilisateurs SET `Nb_D'emprunt` = `Nb_D'emprunt` + 1 WHERE id_utilisateur = $userid";
            $result_nb_emprunte = mysqli_query($connexion, $sql_nb_emprunte);

            echo "L'emprunt a été effectué avec succès.";
        } else {
           
            echo "Ce livre n'est plus disponible pour le moment.";
        }
    } 
} 


//Soumission de la recherche
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {

    $search_query = mysqli_real_escape_string($connexion, $_GET['query']);
  
    
    $sql_search = "SELECT * FROM livres WHERE Titre LIKE '%$search_query%' OR Auteur LIKE '%$search_query%'";
    $result_search = mysqli_query($connexion, $sql_search);
  
    
    if (mysqli_num_rows($result_search) > 0) {

        echo '<div class=" ms-5 d-flex flex-column mt-2  ps-0" style="width: 230px;" id="cardCss">';
      while ($livre_trv = mysqli_fetch_assoc($result_search)) {
        echo '<div class=" p-0 m-0  rounded-3" style=" height: 290px ; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25);">
        <a href="../includes/detail_livre.php?action=modifier&id=' . $livre_trv['id_livre'] . '"
        <img class="m-0 p-0 rounded-3" src="../assets/covers/' . $livre_trv['Affiche'] . '" alt="" style=" height: 290px ; width:100%  ; "></a>
        </div>
        <div class=" d-flex flex-column justify-content-center my-3 rounded-3" style=" box-shadow: 0px 1px 10px 0px rgba(0, 122, 138, 0.25);">
        <p class="m-0 p-0 fw-bold ms-2 flex-nowrap" style=" height:60px; overflow:hidden; font-size: 20px; text-overflow: ellipsis;">' . $livre_trv['Titre'] . '</p>
            <p class="m-0 p-0 ms-2" style="font-size: 15px;">' . $livre_trv['Auteur'] . '</p>
            <form action="" method="post" class="d-flex flex-column justify-content-center " >
            <input type="hidden" name="book_id" value="' . $livre_trv['id_livre'] . '">
                <button type="submit" class="emprunter-btn border-0 my-2 rounded-2 text-white fw-bold" 
                        style="margin-left: auto; margin-right: auto; width:92%; font-size: 15px; "  id="modifier-button">
                    <img class="mb-1" src="../assets/icons/Add.svg" alt=""> Emprunter
                </button>
            </form>

        </div>';
    }
    echo'</div>';
    } 
  }

?>


<!-- Afficher les livres par domaines--> 
<?php
echo '<div class="col-12 mt-4 ms-4 ">';
while ($domaine = mysqli_fetch_assoc($res_domaine)) {
    echo '<div class="container">
    <div class="row ">';
    echo '<div class="col-auto  fw-bold ps-3 " id="' . $domaine['nom_domaine'] . '" style="font-size: 32px; ">' . $domaine['nom_domaine'] . '</div>';
    echo '<div class="row ps-3 flex-nowrap py-4 " style=" overflow-x: auto;">';

 
    $req_livre = "SELECT * FROM livres WHERE id_domaine = {$domaine['id_domaine']}";
    $res_livre = mysqli_query($connexion, $req_livre);

    while ($livre = mysqli_fetch_assoc($res_livre)) {
        
        echo '<div class="col-2 d-flex flex-column mt-2 ps-0 mx-2 " style="width: 230px;" id="cardCss">';

        if ($domaine['id_domaine'] == $livre['id_domaine']) {
            echo '<div class="p-0 m-0  rounded-3" style=" height: 290px ; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25);">
            <a href="../includes/detail_livre.php?action=modifier&id=' . $livre['id_livre'] . '">
            <img class="m-0 p-0 rounded-3" src="../assets/covers/' . $livre['Affiche'] . '" alt="" style=" height: 290px ; width:100%  ; "></a>
            </div>
            <div class=" d-flex flex-column justify-content-center my-3 rounded-3" style=" box-shadow: 0px 1px 10px 0px rgba(0, 122, 138, 0.25);">
            <p class="m-0 p-0 fw-bold ms-2 flex-nowrap" style=" height:60px; overflow:hidden; font-size: 20px; text-overflow: ellipsis;">' . $livre['Titre'] . '</p>
            <p class="m-0 p-0 ms-2" style="font-size: 15px;">' . $livre['Auteur'] . '</p>';

            if (isset($_SESSION['Email'])) {
                // Afficher  si l'utilisateur est connecté
                echo '<form action="" method="post" class="d-flex flex-column justify-content-center " >

                    <input type="hidden" name="book_id" value="' . $livre['id_livre'] . '">
                    <button type="submit" class="emprunter-btn border-0 my-2 rounded-2 text-white fw-bold" 
                            style="margin-left: auto; margin-right: auto; width:92%; font-size: 15px; "  id="modifier-button">
                        <img class="mb-1" src="../assets/icons/Add.svg" alt=""> Emprunter
                    </button>
                </form>';
            } else {
                //redirection vers la connection
                echo '<a href="../pages/login.php" class="btn text-white fw-bold" id="modifier-button">S\'inscrire pour Emprunter</a>';
            }
            echo '</div>';
        }
        echo '</div>'; 
    }

    echo '
    <div class="container-fluid flex-nowrap ">
    </div>
    </div>
    </div> 
    </div>';
}
?>
</div>
</div>




