<?php
    class VueResrv extends VueGenerique{
        public function __construct(){parent::__construct();}

        public function form_ajout_supp(){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <form action='index.php?module=reservation&action=ajout_supp' method='post' enctype='multipart/form-data'>
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Ajout d'un supplement</h4>
                    </div>
                    <div class="card-body px-5 ">
                        <div class="row gx-xl-5">

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">nom</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='nom'required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">description</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='description'required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">prix</label>
                                    <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name='prix'required>
                                </div>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="validatedCustomFile">image / gif / video sans</label>
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name='fileSans' required>
                                </div>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="validatedCustomFile">image / gif / video avec</label>
                                    <input type="file" class="custom-file-input" id="validatedCustomFile2" name='fileAvec' required>
                                </div>
                                <div class="form-check form-switch marg-btn">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="plusieursChoix">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">il y a plusieurs choix possibles pour ce supplement ?</label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">si oui, combien ?</label>
                                    <input type="number" min="0" max="8" class="form-control" id="exampleInput1" style="max-width: 80px;" value="0" name='nbChoix'>
                                </div>
                            </div>
                        <hr class="my-5" />
                    <div class="card-footer text-end py-4 px-5 bg-light border-0">
                        <button type="submit" class="btn btn-primary btn-rounded" name="submit">Continuer</button>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        }

        public function form_ajout_choix($nbChoix){
            ?>
            <div class="container my-5" >
                <div class="card">
                    <form action='index.php?module=reservation&action=ajout_choix' method='post' enctype='multipart/form-data'>
                    <div class="card-header py-4 px-5 bg-light border-0">
                        <h4 class="mb-0 fw-bold">Les Choix du supplement </h4>
                    </div>
                    <div class="card-body px-5 ">
                        <div class="row gx-xl-5">
                            <div class="col-md-8">
                                <?php
                                    for($i = 1; $i <= $nbChoix; $i++){
                                        echo'
                                            <div class="mb-3">
                                                <label for="exampleInput1" class="form-label">choix '.$i.'</label>
                                                <input type="text" class="form-control" id="exampleInput1" style="max-width: 500px;" name="choix'.$i.'" required>
                                            </div>
                                        ';
                                    }
                                ?>
                            </div>
                        <hr class="my-5" />
                    <div class="card-footer text-end py-4 px-5 bg-light border-0">
                        <button type="submit" class="btn btn-primary btn-rounded" name="submit">commander </button>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }