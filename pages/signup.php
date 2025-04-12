<?php  include('../includes/head.php'); ?>
<?php
session_start();
?>
<?php
include '../includes/connexion_bdd.php';

// Création du compte
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Confirmation = $_POST["Confirmation"];
    
    if ($password !== $Confirmation) {
        echo "Les mots de passe ne correspondent pas";
    } else {
       
        $result = "INSERT INTO utilisateurs (Nom, Prenom, Email, Mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$password')";
    
        if (mysqli_query($connexion, $result)) {
            
            $_SESSION['Email'] = mysqli_insert_id($connexion);
            header("Location: login.php");
            exit();
        } else {
            
            echo "Error: " . mysqli_error($connexion);
        }
  
        mysqli_close($connexion);
    }
}
?>

<div class="container" >
    <div class="card mt-5 mx-auto"  style=" max-width: 500px; background:var(--background-color); color: var(--text-color); box-shadow:var(--cube-shadow); ">
        <div class="card-body">
            <form action="signup.php" method="POST" >
                <div class="col-11 fs-2 fw-semibold mx-auto text-center">Inscrivez-vous </div>
                <div class="col-11 my-4 mx-auto ">
                    <label for="nom" class="fs-5 fw-semibold">Nom</label>
                    <input type="text" name="nom" id="nom" class="border-0  fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto ">
                    <label for="prenom" class="fs-5 fw-semibold">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="border-0  fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto ">
                    <label for="email" class="fs-5 fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="border-0  fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto ">
                    <label for="password" class="fs-5 fw-semibold">Mot de passe</label>
                    <input type="password" name="password" id="password" class="border-0  fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto ">
                    <label for="Confirmation" class="fs-5 fw-semibold">Confirmation Mot de passe</label>
                    <input type="password" name="Confirmation" id="Confirmation" class="border-0  fs-4 rounded-2" style="width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.17) inset;">
                </div>
                <div class="col-11 my-4 mx-auto">
                    <button type="submit" class="border-0 text-white fs-4 rounded-2" style="width: 100%; background: #00B1C9; box-shadow: 0px 2px 5px 1px rgba(0, 219, 249, 0.25), 0px -1px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 9px 0px rgba(255, 255, 255, 0.45) inset;">
                        S'inscrire
                    </button>
                </div>
                <div class="col-11 d-flex justify-content-end my-4 mx-auto fs-6 fw-semibold">
                    Déja inscrit? <a href="./login.php" style=" color: #00B1C9;" >connectez-vous</a>
                </div>
            </form>
        </div>
    </div>
</div>
 
</body>
</html>