<?php
include('connexion_bdd.php');

// On ecrit la requete de selection des domaines
$req = 'SELECT * FROM domaines';
$res = mysqli_query($connexion, $req);

?>

<div class="col-12  m-0  row  " style="">

    <div class="container-fluid">
        <div class="row justify-content-between p-3">

            <div class="col-7  row rounded-2 p-0" style="">
                <form action="" method="GET"  class=" row">
                <input class="col-10 rounded-start-2 " type="text m-0 " name="query" placeholder="Recherchez le livre de votre choix" style=" border:1px solid rgba(0, 219, 249, 0.25); outline: none; box-shadow: 1px 1px 9px 0px rgba(0, 122, 138, 0.25) inset;" placeholder="Livre.. ">
                <button type="submit" class="col-2 rounded-end-2 btn-primary " style="border:none; background: #00B1C9;box-shadow: -2px 0px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(235, 253, 255, 0.25) inset;"><img class="me-2 " style="" src="../assets/icons/search2.svg" alt=""></button>
            </form>
            </div>
            <div class="col-4  row justify-content-between ">
                <button id="toggle" onclick=toggleDarkMode() class="col-auto ms-5 p-0 d-flex justify-content-center align-items-center bg-transparent border-0">
                <img class="img" id="moon" src="../assets/icons/moon.svg" >
                </button>
                <?php
                if (isset($_SESSION['Email'])) {
                    echo '<div class="col-9 d-flex align-items-center fw-bold " style="font-size: 24px;">';
                    echo '<img id="bookmark" class="img pe-2" src="../assets/icons/bookmark2.svg" >' . $compte['Nb_D\'emprunt'] . ' Livres empruntés';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

    </div>

</div>
<div class="col-12 ">
    <div class="container-fluid">
        <div class="row justify-content-between my-2" style="height: 35px; font-size: 20px;">
        <?php  
        while ($domaine = mysqli_fetch_assoc($res)) {
            echo '<div class="col-auto  fw-bold" style=" border-radius:6px; box-shadow:var(--cube-shadow); " id="domainBox"><a href="#'. $domaine['nom_domaine'] .'" style="text-decoration:none; margin:50px width: 200px;" id="domainLink">'. $domaine['nom_domaine'] .'</a></div>'; 
        }?>
        </div>
    </div>


</div>
