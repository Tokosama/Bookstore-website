<!-- Permet de voir tous les emprunts de tous les utilisateurs--><?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Email']) && $compte['Nb_D\'emprunt'] < 3) {

}

$sql_borrowed_books = "SELECT e.id_emprunt, l.Titre, l.Auteur, l.Affiche, u.Nom AS Nom_utilisateur, u.Prenom AS Prenom_utilisateur 
                      FROM emprunts e
                      INNER JOIN livres l ON e.id_livre = l.id_livre
                      INNER JOIN utilisateurs u ON e.id_utilisateur = u.id_utilisateur";
$result_borrowed_books = mysqli_query($connexion, $sql_borrowed_books);

if (mysqli_num_rows($result_borrowed_books) > 0) {
    echo '<div class="container-fluid ps-3 mx-2 my-5 rounded-3" style="width: 99%; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px -2px 6px 0px rgba(0, 122, 138, 0.11) inset; backdrop-filter: blur(2px);">';
    echo '<div class="row">';
    echo '<div class="col-auto fw-bold ps-3" style="font-size: 32px;">Emprunt</div>';
    echo '<div class="container-fluid flex-nowrap">';
    echo '<div class="row ps-3 flex-nowrap" style="overflow-x: auto;">';

    while ($borrowed_book = mysqli_fetch_assoc($result_borrowed_books)) {
        echo '<div class="col-2 d-flex flex-column mt-2 ps-0" style="width: 230px;">';

        echo '<div class="p-0 m-0 rounded-3" style="height: 290px; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25);">';
        echo '<img class="m-0 p-0 rounded-3" src="../assets/covers/' . $borrowed_book['Affiche'] . '" alt="" style="height: 290px; width: 100%;">';
        echo '</div>';

        echo '<div class="d-flex flex-column justify-content-center my-3 rounded-3 position-relative" style="background: rgb(117, 117, 117); box-shadow: 0px 1px 10px 0px rgba(0, 122, 138, 0.25); overflow: hidden;">';
        echo '<p class="m-0 p-0 fw-bold ms-2 flex-nowrap" style=" height:60px; overflow:hidden; font-size: 20px; text-overflow: ellipsis;">' . $borrowed_book['Titre'] . '</p>';
        echo '<p class="m-0 p-0 ms-2" style="font-size: 15px;">' . $borrowed_book['Auteur'] . '</p>';

        echo '<div class="d-flex mb-3 p-1 mx-auto" style="background:var(--admin-cube-color); width:92%; border-radius:6px; box-shadow:0px 4px 4px 0px rgba(0, 0, 0, 0.25); overflow: hidden;">';
        echo '<div class="fw-bold d-flex align-items-center me-auto" style="width: auto; font-size: 15px;">' . $borrowed_book['Nom_utilisateur'] . ' ' . $borrowed_book['Prenom_utilisateur'] . '</div>';
        echo '</div>';

        echo '</div>';

        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>No books have been borrowed yet.</p>';
}

?>


