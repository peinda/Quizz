<?php
include_once("./data/connect-bd.php");
?>
<div class="row zone-connexion">
    <div class=" zone-admin">
      <div class="row entete">
        <div class="col-sm-6 col-lg-6 col-6 cp">
            <h3>CREER ET PARAMETRER DU QUIZZ</h3>
        </div>
        <div class="col-sm-2 btn ">
         <button type="button" class="btn btn-primary ">DECONNEXION</button>   
         </div>
        <div class="col-sm-4">
        <div id="avatar"><img src="..." ></div>
            <div id="ab"><h3>peinda/diallo</h3>
                         
            </div>
         </div>
         </div>
         <div class="row form-group op ">
            <div class="col-md-3 "><button type="button" class="btn btn-link">CREER QUESTIONS</button>
          </div>
          <div class="col-md-3 "><button type="button" class="btn btn-link">CREER ADMIN</button>
          </div>
          <div class="col-md-3 "><button type="button" class="btn btn-link">LISTE QUESTIONS</button>
          </div>
          <div class="col-md-3 "><button type="button" class="btn btn-link">LISTE JOUEURS</button>
          </div>
        </div>
        <div class="container option">
        <?php
            if (isset($_GET['block'])) {
                
                if ($_GET['block']=="creerquestion") {
                  include ("CreerQuestion.php");
                }
                elseif ($_GET['block']=="inscription") {
                    include ("inscripAdmin.php");
                }
                elseif ($_GET['block']=="listeJoueur") {
                    include ("listeJoueur.php");
                }
                elseif ($_GET['block']=="listequestion") {
                  include ("listequestion.php");
                }
            }
        ?>

      </div>
</div>