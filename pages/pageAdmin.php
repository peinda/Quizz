<?php
is_connect();
?>
<div class="cadr">
<div class="entet">
    <div class="texto">CRÉER ET PARAMETRER VOS QUIZZ </div>   
    <div class="deconnexion"><a href="index.php?statut=logout">
    <input type="submit" name="deconnexion" value="Déconnexion"/></a></div>
</div>
<div class="taille2div">  
<div class="div1"> 
<div class="icone"><img src="<?='./photos/'.$_SESSION['user']['avatar'];?>">
<div id="ab"><h3><?php echo $_SESSION['user']['prenom'];?><br><?php echo $_SESSION['user']['nom'];?></h3></div>
</div>
<a href="index.php?lien=accueil&block=listequestion" class="onglet">
<div class="text">Liste Questions</div>
    <div class="icon"><img src="Icones/ic-liste-active.png"></div>
    </a>
<a href="index.php?lien=accueil&block=inscription" class="onglet">
    <div class="text">Créer Admin</div>
    <div class="icon"><img src="Icones/ic-ajout.png"></div>
</a>
<a href="index.php?lien=accueil&block=listeJoueur" class="onglet">
    <div class="text">Liste joueurs</div>
    <div class="icon"><img src="Icones/ic-liste.png"></div>
</a>
<a href="index.php?lien=accueil&block=creerquestion" class="onglet">
    <div class="text">Créer Questions</div>
    <div class="icon"><img src="Icones/ic-ajout.png"></div>
</a>
</div>
<?php
            if (isset($_GET['block'])) {
                
                if ($_GET['block']=="listequestion") {
                    include ("listequestion.php");
                }
                elseif ($_GET['block']=="inscription") {
                    include ("inscription.php");
                }
                elseif ($_GET['block']=="listeJoueur") {
                    include ("listeJoueur.php");
                }
                elseif ($_GET['block']=="creerquestion") {
                    include ("creerquestion.php");
                }
            }
        ?>
</div>

