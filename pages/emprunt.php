<!--Page permettant aux utilisateurs d'emprunter un livre. 
Cette page peut afficher les livres disponibles et permettre aux utilisateurs connectés de sélectionner les livres à emprunter. 
Elle devrait vérifier si les livres sont disponibles et mettre à jour le nombre d'exemplaires disponibles après l'emprunt.-->
<?php  include('../includes/head.php'); ?>

<div class="container-fluid">
  <div class="row">




             <?php  include('../includes/usersidebar.php'); ?>




            <div class="col-10 p-0 " style="  overflow: hidden; ">
                <div class="container-fluid">
                    <div class="row">

                        <?php  include('../includes/header.php'); ?>

                        <?php  include('../includes/livreEmprunte.php'); ?>
                       
                        
                            



                    </div>
                </div>
            </div>
    </div>
</div>
<?php  include('../includes/footer.php'); ?>
