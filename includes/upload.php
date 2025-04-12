<!-- Ajouter les livres a la bdd--><?php
include('../includes/connexion_bdd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Titre = $_POST["titre"];
    $Auteur = $_POST["auteur"];
    $Couverture = $_FILES['couverture'];
    $Description = $_POST["description"];
    $Nb_pages = $_POST["nb_pages"];
    $exemplaires_disponibles = $_POST["exemplaires_disponibles"];
    $fichier_pdf = $_FILES['fichier_pdf'];
    $id_domaine = $_POST["id_domaine"];
    $couverture_name = $Couverture['name'];

    $destination_couverture = '../assets/covers/' . $couverture_name;
    $destination_pdf = '../assets/pdfs/' . $fichier_pdf['name'];

    move_uploaded_file($Couverture['tmp_name'], $destination_couverture);
    move_uploaded_file($fichier_pdf['tmp_name'], $destination_pdf);

    $query = sprintf("INSERT INTO livres (Titre, Auteur, Affiche, Description, Nb_pages, exemplaires_disponibles, fichier_pdf, id_domaine) VALUES ('%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d')",
        mysqli_real_escape_string($connexion, $Titre),
        mysqli_real_escape_string($connexion, $Auteur),
        mysqli_real_escape_string($connexion, $couverture_name),
        mysqli_real_escape_string($connexion, $Description),
        mysqli_real_escape_string($connexion, $Nb_pages),
        mysqli_real_escape_string($connexion, $exemplaires_disponibles),
        mysqli_real_escape_string($connexion, $fichier_pdf['name']),
        mysqli_real_escape_string($connexion, $id_domaine)
    );

    mysqli_query($connexion, $query);
    header("Location: ../pages/admin.php");
}


?>
