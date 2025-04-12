<?php
// Verification du nom de la page
$current_page = basename($_SERVER['PHP_SELF']);
session_start();
include('../includes/connexion_bdd.php');

// Vérifier si l'utilisateur est connecté 
if (isset($_SESSION['Email'])) {
    $user = $_SESSION["Email"];
    $sql = "SELECT * FROM utilisateurs WHERE Email='$user'";
    $result = mysqli_query($connexion, $sql);
    $compte = mysqli_fetch_assoc($result);
 

    // Fonctionnalité de déconnexion 
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>

<!-- Structure de la sidebar avec les liens -->

<div class="col-2 d-flex flex-column fw-bold" style="font-size: 20px; height: 100vh; box-shadow: 3px 0px 20px -5px rgba(0, 122, 138, 0.25);">
    <nav class="nav flex-column mb-auto mt-3">
        <a style="color:<?php echo ($current_page === 'home.php') ? '#00B1C9' : 'var(--text-color)'; ?>; " class="nav-link d-flex align-items-center" href="home.php"><img class="me-2" style="width:30px; height:30px;" src="<?php echo ($current_page === 'home.php') ? '../assets/icons/acceuilblue.svg' : '../assets/icons/acceuil.svg'; ?>" alt="">Accueil</a>
        <?php
        if (isset($_SESSION['Email'])) {
            echo '<a style="color:' . (($current_page === 'emprunt.php') ? '#00B1C9' : 'var(--text-color)') . ';" class="nav-link d-flex align-items-center" href="emprunt.php"><img class="me-2" style="width:30px; height:30px;" src="' . (($current_page === 'emprunt.php') ? '../assets/icons/bookmarkblue2.svg' : '../assets/icons/bookmark2.svg') . '" alt="">Emprunt</a>';
        }
        ?>
    </nav>

    <div class="row justify-content-center mb-4">
        <div class="text-center row" style="font-size: 24px;">
            <?php
            if (isset($_SESSION['Email']) && $compte !== null) {
                echo '@' . $compte['Nom'] . ' ' . $compte['Prenom'];
                echo '<a href="?action=logout" class="btn text-white fw-bold" id="modifier-button">Se déconnecter</a>';
            } else {
                echo '<a href="../pages/login.php" class="btn text-white fw-bold m-1 w-auto" id="modifier-button">Connexion</a>';
                echo '<a href="../pages/signup.php" class="btn text-white fw-bold m-1 w-auto" id="modifier-button">Inscription</a>';
            }
            ?>
        </div>
    </div>
</div>
