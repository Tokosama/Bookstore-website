<!--Page d'accueil affichant les livres disponibles. 
Cette page peut afficher une liste de livres avec leurs couvertures, 
titres, auteurs et liens vers les détails des livres.-->
<?php  include('../includes/head.php'); ?>
<div class="container-fluid">
  <div class="row">




             <?php  include('../includes/usersidebar.php'); ?>




            <div class="col-10  p-0 " style=" max-height: 100vh; overflow: hidden; overflow-y:auto;">
                <div class="container-fluid">
                    <div class="row">
                        

                        <?php  include('../includes/header.php'); ?>

                        <?php  include('../includes/books.php'); ?>
                        
                        <!-- <?php  include('../includes/modalcontroller.php'); ?> -->
                        <?php  include('../includes/description_des_livres.php'); ?>


                    </div>
                </div>
            </div>
    </div>
</div>
<?php  include('../includes/footer.php'); ?>

