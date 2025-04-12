

<div style=" " class=" modal mt-5" tabindex="-1px" id="myModalAdd">
        <div class="modal-dialog modal-dialog-fixed-width rounded-2 w-auto " style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); ">
            <div class="modal-content">
                <form action="../includes/upload.php" method="post" enctype="multipart/form-data" class=" row p-0 rounded-2 " style="">
                    <div class="col-4 m-0 p-5 pb-3  ">
                        <div class=" " style="width: 200px; height: 290px; ">
                            <button type="button" class="imgupload d-flex justify-content-center align-items-center rounded-2 ">
                                                <img class=" position-absolute " style=" top: 120px; left:85px; " src="../assets/icons/load.svg " alt=" ">
                                                <input type="file" name="couverture" accept=".jpg, .jpeg, .png" class="rounded-2 " style=" box-shadow: 0px 1px 8px 0px rgba(0, 122, 138, 0.25); width: 200px; height:290px ; ">
                                            </button>
                        </div>
                        <div class=" mt-5 rounded-2 " style="width: 200px; height: 30px; box-shadow: 0px 2px 3px 0px rgba(0, 122, 138, 0.25); ">
                            <button type="button" class="btn-warninge pb rounded-2 ">
                                       <span class="d-flex align-items-center justify-content-center fw-semibold "> <img class=" m-0 "  src="../assets/icons/doubleload.svg " alt=" "> Importer le pdf </span>
                                            <input type="file" name="fichier_pdf" accept=".pdf">
                            </button>
                        </div>
                    </div>
                    <div class="col-8 mt-4 p-0 " style=" height: 310px; ">
                        <div class="col-11 ">
                            <label for="titre" class="fs-4 fw-semibold "> Titre</label>
                            <input type="text" name="titre" id="titre" class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
                        </div>
                        <div class="col-11 mt-2 ">
                            <label for="auteur" class="fs-4 fw-semibold mt-1 "> Auteur</label>
                            <input type="text" name="auteur" id="auteur" class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
                        </div>
                        <div class="col-11 mt-2 ">
                            <label for="description" class="fs-4 fw-semibold mt-1 "> Description</label>
                            <input type="text" name="description" id="description" class=" text-black fs-4 rounded-2 " style=" border: 1px solid #00B1C9;width: 100%; height:70px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
                        </div>
                        <div class="col-11 mt-2 mb-2 gap-2 d-flex align-items-center justify-content-between ">
                            <label for="nb_pages" class="fs-8 fw-semibold "> Nombre de pages</label>
                            <input type="number" name="nb_pages" id="nb_pages" class=" text-black fs-8 rounded-2 " style=" border: 1px solid #00B1C9;width: 50%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
                            <select class="form-select" aria-label="Default select example" name='id_domaine'>
                                <option selected>Domaines</option>
                                <option value="0">informatique</option>
                                <option value="1">droit</option>
                                <option value="2">Mathématiques</option>
                                <option value="3">musique</option>
                                <option value="4">sciences</option>
                                <option value="5">économie</option>
                                <option value="6">finances</option>
                                <option value="7">technologie</option>
                            </select>
                            <label for="exemplaires_disponibles" class="fs-8 fw-semibold ">Exemplaires disponibles</label>
                            <input type="number" name="exemplaires_disponibles" id="exemplaires_disponibles" class=" text-black fs-8 rounded-2 " style=" border: 1px solid #00B1C9;width: 50%; height:30px; box-shadow: 1px 1px 4px 0px rgba(0, 122, 138, 0.25) inset; ">
                        </div>
                        <button type="submit" class="  col-11 border-0 rounded-2 text-white fw-semibold d-flex align-items-center justify-content-center " style=" background: #00B1C9; height: 30px; margin-top: 32px;box-shadow: 0px 2px 3px 0px rgba(0, 122, 138, 0.25);
                        "> <img class=" pe-1 " src="../assets/icons/upload.svg " alt=" "> Ajouter </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
