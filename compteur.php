
<?php

//recuperation du nombre d'élèves
    $req_select = "SELECT count(*) AS 'nombre_eleve' FROM eleves";

    $req = $bdd -> prepare($req_select);

    $req -> execute();

    $result = $req -> fetchAll();

    foreach($result as $result_final){

        $nbr_eleve = $result_final['nombre_eleve'];

    }

//recuperation du nombre de notes
    $req_select = "SELECT count(*) AS 'nombre_note' FROM notes";

    $req = $bdd -> prepare($req_select);

    $req -> execute();

    $result = $req -> fetchAll();

    foreach($result as $result_final){

        $nbr_note = $result_final['nombre_note'];

    }

//recuperation du nombre matières
    $req_select = "SELECT count(*) AS 'nombre_matiere' FROM matieres";

    $req = $bdd -> prepare($req_select);

    $req -> execute();

    $result = $req -> fetchAll();

    foreach($result as $result_final){

        $nbr_matiere = $result_final['nombre_matiere'];

    }

//recuperation du nombre d'enseignants
    $req_select = "SELECT count(*) AS 'nombre_prof' FROM profs";

    $req = $bdd -> prepare($req_select);

    $req -> execute();

    $result = $req -> fetchAll();

    foreach($result as $result_final){

        $nbr_prof = $result_final['nombre_prof'];

    }


?>


            <div class="container">
                <div class="row">
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated p-5" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp; background: #003366;">
                        <h4 class="counter-title fs-3 fw-bold text-white">Eleves</h4>
                        <i class="fa-solid fa-users fa-5x text-white"></i>
                        <span id="anim-number-pizza" class="counter-number"></span>
                        <span class="timer counter alt-font appear fs-1 fw-bold" data-to="<?php echo $nbr_eleve; ?>" data-speed="4000" style="color: #4dd2ff;"><?php echo $nbr_eleve; ?></span>
                    </div>

                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated bg-success p-5" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp; background: #339933;">
                        <h4 class="counter-title fs-3 fw-bold text-white">Notes</h4>
                        <i class="fa-solid fa-sheet-plastic fa-5x text-white"></i>
                        <span class="timer counter alt-font appear fs-1 fw-bold" data-to="<?php echo $nbr_note; ?>" data-speed="4000" style="color: #80ffbf
                        ;"><?php echo $nbr_note; ?></span>
                    </div>

                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten 
                    animated p-5" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp; background: #990033;">
                        <h4 class="counter-title fs-3 fw-bold text-white">Matières</h4>
                        <i class="fa-solid fa-book fa-5x text-white"></i>
                        <span id="anim-number-pizza" class="counter-number"></span>
                        <span class="timer counter alt-font appear fs-1 fw-bold" data-to="<?php echo $nbr_matiere; ?>" data-speed="4000" style="color: #ff80aa
                        ;"><?php echo $nbr_matiere; ?></span>
                    </div>

                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated p-5" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp; background: #000000;">
                        <h4 class="counter-title fs-3 fw-bold text-white">Enseignants</h4>
                        <i class="fa-solid fa-chalkboard-user fa-5x text-white"></i>
                        <span id="anim-number-pizza" class="counter-number"></span>
                        <span class="timer counter alt-font appear fs-1 fw-bold" data-to="<?php echo $nbr_prof; ?>" data-speed="4000" style="color: #f2f2f2
                        ;"><?php echo $nbr_prof; ?></span>
                    </div>
                    <!-- end counter -->
                </div>
            </div>

