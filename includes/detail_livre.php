<?php
include('../includes/head.php');

if (isset($_REQUEST['id'])) {
    require('connexion_bdd.php');
    $req = sprintf('SELECT * FROM livres WHERE id_livre = "%d"', $_REQUEST['id']);
    $res = mysqli_query($connexion, $req);
    $livre = mysqli_fetch_assoc($res);
}
?>

       

<div class=" col-9 mx-auto mt-5 rounded-3   d-flex px-2 py-5 " style=" box-shadow: var(--cube-shadow);">
                    <div class="   col-4 px-auto d-flex align-items-center flex-column">
                        <div class="p-0 m-0 rounded-2 " style=" width: 200px; height: 290px ; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25); ">
                            <img class="m-0 p-0 rounded-3 " src="../assets/covers/<?php echo $livre['Affiche'] ?> " alt=" " style=" height: 100% ; width:100% ; box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25); ">
                        </div>
                      
                    </div>


                    <div class="col-8  d-flex flex-column ms-2  rounded-3 " style=" ">
                        <p class="m-0 p-0 fw-bold  " style="font-size: 46px; "><?php echo $livre['Titre'] ?></p>
                        <p class="m-0 p-0  " style="font-size: 40px; "><?php echo $livre['Auteur'] ?></p>
                        <p class="m-0 p-0 fw-bold " style="font-size: 16px; "> <?php echo $livre['Description'] ?></p>
                        <p class="m-0 p-0 mb-2 mt-3 fw-bold " style="font-size: 20px; "><?php echo $livre['Nb_pages'] ?> PAGES</p>
                    </div>


                </div>
                </div>
       
</body>
</html>
