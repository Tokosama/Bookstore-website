<!-- Permet de voir tous les utilisateurs -->

<?php


include('connexion_bdd.php');

// Fonctionnalité de suppresion d'utilisateur
if (isset($_GET['action']) && $_GET['action'] === 'retirer' && isset($_GET['id'])) {
    $userId = $_GET['id'];

 
    $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = $userId";

    if (mysqli_query($connexion, $sql)) {
        header('Location: ../pages/admin.php');
        exit();
    } else {
        header('Location: ../pages/admin.php?error=1');
        exit();
    }
}

$req = 'SELECT * FROM utilisateurs';
$res = mysqli_query($connexion, $req);

// Affichage des utilisateurs 
echo '<div class="container-fluid m-2 mt-3 rounded-2" style="width: 99%; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px -2px 6px 0px rgba(0, 122, 138, 0.11) inset; backdrop-filter: blur(2px);">';
echo '<div class="row">';
echo '<div class="col-12 fw-bold ps-3 py-2" style="font-size: 32px;">';
echo 'Utilisateurs';
echo '</div>';

while ($utilisateur = mysqli_fetch_assoc($res)) {
    echo '<div class="col-2 d-flex mb-3 p-2 align-align-center position-relative "  style="color:var(--text-color); background:var(--admin-cube-color); margin-left: 20px; margin-right: 20px; border-radius:6px; box-shadow: var(--admin-cube-shadow); overflow: hidden;">';
    echo '<div class="fw-bold d-flex align-items-center me-auto" style="width: auto; font-size: 15px;">';
    echo $utilisateur['Nom'] .' '. $utilisateur['Prenom'] . '</br>';
    echo $utilisateur['Email'];
    echo '</div>';
    echo '<a href="../pages/admin.php?action=retirer&id=' . $utilisateur['id_utilisateur'] . '" class="delete-icon my-auto " style="text-decoration: none; color: red;"><img class="delete mt-1 me-3 " src="../assets/icons/corbeil.svg " id="userviewBigger" alt=""></a>';
    echo '</div>';
}

echo '</div>';
echo '</div>';
?>
