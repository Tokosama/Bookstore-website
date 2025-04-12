<!-- Mettre a jour les livres-->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    if (isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['description']) && isset($_POST['nb_pages']) && isset($_POST['id_domaine']) && isset($_POST['exemplaires_disponibles'])) {
        require('connexion_bdd.php');
        
     
        $id_livre = $_REQUEST['id'];
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $description = $_POST['description'];
        $nb_pages = $_POST['nb_pages'];
        $id_domaine = $_POST['id_domaine'];
        $exemplaires_disponibles = $_POST['exemplaires_disponibles'];

        $req = sprintf('UPDATE livres SET Titre = "%s", Auteur = "%s", Description = "%s", Nb_pages = "%s", id_domaine = "%s", exemplaires_disponibles = "%s" WHERE id_livre = "%d"', $titre, $auteur, $description, $nb_pages, $id_domaine, $exemplaires_disponibles, $id_livre);
        $res = mysqli_query($connexion, $req);

        if ($res) {
          
            header('Location: ../pages/admin.php');
            exit;
        } else {
           
            echo 'Failed to update the book.';
        }
    } else {
       
        echo 'Missing form fields.';
    }
} else {
    
    header('Location: index.php');
    exit;
}
?>
