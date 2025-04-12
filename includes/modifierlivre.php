<!-- Modifier les caractéristiques des Livres--><?php
include('../includes/head.php');

if (isset($_REQUEST['id'])) {
    require('connexion_bdd.php');
    $req = sprintf('SELECT * FROM livres WHERE id_livre = "%d"', $_REQUEST['id']);
    $res = mysqli_query($connexion, $req);
    $livre = mysqli_fetch_assoc($res);
}

?>

 
<form action="../includes/update.php" method="post" enctype="multipart/form-data" class=" col-8  row py-2 rounded-2 mx-auto mt-5" style=" box-shadow:var(--cube-shadow);" >
    <div class="col-4 m-0 p-5 pb-3  ">
        <div class=" " style="width: 200px; height: 290px; ">
            <button type="button" class="imgupload d-flex justify-content-center align-items-center rounded-2 ">
                <img class="position-absolute" style="top: 120px; left:85px;" src="../assets/icons/load.svg" alt=" ">
                <input value="<?php if (isset($livre['id_livre'])) echo $livre['Affiche'] ?>" type="file" name="couverture" accept=".jpg, .jpeg, .png" class="rounded-2 " style=" box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25); width: 200px; height:290px ; ">
            </button>
        </div>
        <div class=" mt-5 rounded-2 " style="width: 200px; height: 30px; box-shadow: 0px 2px 3px 0px rgba(0, 122, 138, 0.25); ">
            <button type="button" class="btn-warninge pb rounded-2 ">
                <span class="d-flex align-items-center justify-content-center fw-semibold "> <img class=" m-0 " src="../assets/icons/doubleload.svg " alt=" "> Importer le pdf </span>
                <input value='<?php if (isset($livre['id_livre'])) echo $livre['fichier_pdf'] ?>' type="file" name="fichier_pdf" accept=".pdf">
            </button>
        </div>
    </div>
    <div class="col-8 mt-4 p-0 " style=" height: 310px; ">
        <div class="col-11 ">
            <label for="titre" class="fs-4 fw-semibold "> Titre</label>
            <input type="text" name="titre" id="titre" value='<?php if (isset($livre['id_livre'])) echo $livre['Titre'] ?>' class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
        </div>
        <div class="col-11 mt-2 ">
            <label for="auteur" class="fs-4 fw-semibold mt-1 "> Auteur</label>
            <input type="text" name="auteur" id="auteur" value='<?php if (isset($livre['id_livre'])) echo $livre['Auteur'] ?>' class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
        </div>
        <div class="col-11 mt-2 ">
            <label for="description" class="fs-4 fw-semibold mt-1 "> Description</label>
            <input type="text" name="description" id="description" value='<?php if (isset($livre['id_livre'])) echo $livre['Description'] ?>' class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:70px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
        </div>
        <div class="col-11 mt-2 mb-2 gap-2 d-flex align-items-center justify-content-between ">
            <label for="nb_pages" class="fs-8 fw-semibold "> Nombre de pages</label>
            <input type="number" name="nb_pages" id="nb_pages" value='<?php if (isset($livre['id_livre'])) echo $livre['Nb_pages'] ?>' class=" text-black fs-8 rounded-2 " style=" border: 1px solid #00B1C9;width: 50%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
            <select class="form-select" aria-label="Default select example" name='id_domaine'>
                <option selected>Domaines</option>
                <option value="0" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '0') echo 'selected' ?>>Littérature</option>
                <option value="0" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '1') echo 'selected' ?>>informatique</option>
                <option value="1" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '2') echo 'selected' ?>>droit</option>
                <option value="2" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '3') echo 'selected' ?>>Mathématiques</option>
                <option value="3" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '4') echo 'selected' ?>>musique</option>
                <option value="4" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '5') echo 'selected' ?>>sciences</option>
                <option value="5" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '6') echo 'selected' ?>>économie</option>
                <option value="7" <?php if (isset($livre['id_livre']) && $livre['id_domaine'] == '7') echo 'selected' ?>>technologie</option>
            </select>
            <label for="exemplaires_disponibles" class="fs-8 fw-semibold ">Exemplaires disponibles</label>
            <input type="number" name="exemplaires_disponibles" id="exemplaires_disponibles" value='<?php if (isset($livre['id_livre'])) echo $livre['exemplaires_disponibles'] ?>' class=" text-black fs-8 rounded-2 " style=" border: 1px solid #00B1C9;width: 50%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
        </div>
        <button type="submit" class="col-11 border-0 rounded-2 text-white fw-semibold d-flex align-items-center justify-content-center " style=" background: #00B1C9; height: 30px; margin-top: 32px;box-shadow: 0px 2px 3px 0px rgba(0, 122, 138, 0.25);
    "> <img class=" pe-1 " src="../assets/icons/upload.svg " alt=" "> Mettre à jour </button>
    </div>
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
</form>

</body>
</html>
