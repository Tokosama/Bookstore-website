<?php
session_start();
include('../includes/connexion_bdd.php');

// Check if the user is logged in
if (isset($_SESSION['Email'])) {
    $user = $_SESSION["Email"];
    $sql = "SELECT * FROM utilisateurs WHERE Email='$user'";
    $result = mysqli_query($connexion, $sql);
    $compte = mysqli_fetch_assoc($result);
    echo "Welcome, " . $compte['Nom'] . "!";
} else {
    // The user is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}

// Logout functionality
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<?php include('../includes/head.php'); ?>

<div class="col-12 p-0" style="max-height: 100vh; overflow: hidden; overflow-y: auto;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-0 row" style="">
                <div class="container-fluid">
                    <div class="row justify-content-between p-3">
                        <div class="col-7 row rounded-2 p-0" style="">
                            <?php echo $_SESSION["Email"]; ?>
                        </div>
                        <div class="col-4 row justify-content-between">
                            <button id="toggle2" onclick="toggleDarkMode()" class=" block col-auto ms-auto me-2 p-0 d-flex justify-content-center align-items-center bg-transparent border-0">
                                <img class="img" id="adminMoon" src="../assets/icons/moon.svg">
                            </button>
                            <a href="?action=logout" class="btn text-white fw-bold col-auto" id="modifier-button">Se déconnecter</a>
                        
                        </div>
                    </div>
                </div>
            </div>

            <?php include('../includes/userview.php'); ?>
            <?php include('../includes/useremprunt.php'); ?>
            <?php include('../includes/booklist.php'); ?>
            <?php include('../includes/ajoutForm.php'); ?>

            <script src="../js/bootstrap.bundle.js"></script>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
