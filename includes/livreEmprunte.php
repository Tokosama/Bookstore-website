<?php
include('connexion_bdd.php');

$userid = $compte['id_utilisateur'];

// Selection des livres empruntés
$req_livre_emprunte = "SELECT * FROM livres 
                          INNER JOIN emprunts ON livres.id_livre = emprunts.id_livre
                          WHERE emprunts.id_utilisateur = $userid";
$res_livre_emprunte = mysqli_query($connexion, $req_livre_emprunte);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Email'])) {

    $userid = $compte['id_utilisateur'];
    $livreid = $_POST['book_id']; 


    
    $sql_nb_emprunt = "UPDATE livres SET exemplaires_disponibles = exemplaires_disponibles + 1 WHERE id_livre = $livreid";
    $result_nb_emprunt = mysqli_query($connexion, $sql_nb_emprunt);

    
    $sql_nb_emprunte = "UPDATE utilisateurs SET `Nb_D'emprunt` = `Nb_D'emprunt` - 1 WHERE id_utilisateur = $userid";
    $result_nb_emprunte = mysqli_query($connexion, $sql_nb_emprunte);

    // retourner le livre
    $sql_delete_emprunt = "DELETE FROM emprunts WHERE id_livre = $livreid AND id_utilisateur = $userid";
    $result_delete_emprunt = mysqli_query($connexion, $sql_delete_emprunt);

    if ( $result_nb_emprunt) {
        echo "retour reussi";
        }


        if (!$result) {
            echo "Erreur a l'emprunt: " . mysqli_error($connexion);
        }
    }
    ?>
            <!--affichage des livres empruntés-->
    <div class="col-12 mt-4 ms-4">
        <div class="container">
            <div class="row ">
                <div class="col-auto mx-auto my-2 fw-bold ps-3 " style="font-size: 32px; "> Mes Emprunts </div>
                    <div class="container-fluid flex-nowrap ">
                        <div class="row ps-3 flex-nowrap d-flex justify-content-center  " style="">
                            <?php
                                while ($livre = mysqli_fetch_assoc($res_livre_emprunte)) {
                                    echo '<div class="col-2 d-flex flex-column mt-2 ps-0 mx-2 " style="width: 230px;" id="cardCss">
                                            <div class="p-0 m-0  rounded-3" style=" height: 290px ; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25);">
                                            <a href="../assets/pdfs/' . $livre['fichier_pdf'] . '" target="_blank">
                                                <img class="m-0 p-0 rounded-3" src="../assets/covers/' . $livre['Affiche'] . '" alt="" style=" height: 290px ; width:100%  ; "></a>
                                            </div>
                                            <div class=" d-flex flex-column justify-content-center my-3 rounded-3" style=" box-shadow: 0px 1px 10px 0px rgba(0, 122, 138, 0.25);">
                                            <p class="m-0 p-0 fw-bold ms-2 flex-nowrap" style=" height:60px; overflow:hidden; font-size: 20px; text-overflow: ellipsis;">' . $livre['Titre'] . '</p>
                                            <p class="m-0 p-0 ms-2" style="font-size: 15px;">' . $livre['Auteur'] . '</p>
                                                <form action="" method="post" class="d-flex flex-column justify-content-center ">
                                                <input type="hidden" name="book_id" value="' . $livre['id_livre'] . '">
                                                <button type="submit" class="emprunter-btn border-0 my-2 rounded-2 text-white fw-bold" 
                                                        style="margin-left: auto; margin-right: auto; width:92%; font-size: 15px;" id="modifier-button">
                                                    <img class="mb-1" src="../assets/icons/Add.svg" alt=""> Retourner
                                                </button>
                                            </form>
                                            </div>
                                    </div>';
                                }               
                            ?>
                        </div>
                    </div>


