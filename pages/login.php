<?php
session_start();

include('../includes/connexion_bdd.php');

//Connexion
if (isset($_POST["submit"])) {
    $email = $_POST["Email"];
    $password = $_POST["Mot_de_passe"];

    $sql = "SELECT * FROM utilisateurs WHERE Email='$email' AND Mot_de_passe='$password'";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 1) {
       
        $_SESSION["Email"] = $email;
        header("Location: home.php");
        exit();
    } else {
       
    }
}

mysqli_close($connexion);
?>

<?php include('../includes/head.php'); ?>

<div class="container">
    <div class="card mt-5 mx-auto" style="max-width: 500px; background:var(--background-color); color: var(--text-color); box-shadow:var(--cube-shadow);  ">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-11 fs-2 fw-semibold mx-auto text-center">Connectez-vous</div>
                <div class="col-11 my-4 mx-auto">
                    <label for="Email" class="fs-5 fw-semibold">Email</label>
                    <input type="email" name="Email" id="Email" class="border-0 text-black fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto">
                    <label for="Mot_de_passe" class="fs-5 fw-semibold">Mot de passe</label>
                    <input type="password" name="Mot_de_passe" id="Mot_de_passe" class="border-0 text-black fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto">
                    <button type="submit" name="submit" class="border-0 text-white fs-4 rounded-2" style="width: 100%; background: #00B1C9; box-shadow: 0px 2px 5px 1px rgba(0, 219, 249, 0.25), 0px -1px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 9px 0px rgba(255, 255, 255, 0.45) inset;">
                        Se connecter
                    </button>
                </div>
                <div class="col-11 d-flex justify-content-end my-4 mx-auto fs-6 fw-semibold">
                    Pas de compte? <a href="./signup.php" style=" color: #00B1C9;" >Inscrivez-vous</a>
                </div>
            </form>
        </div>
    </div>
</div>

