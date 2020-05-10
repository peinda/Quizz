<?php
is_connect();
?>
<form action="index.php?lien=jeux&page=" method="POST">
<div class="cadrscore">
    <div class="enteter">
        <div class="joueurr">
            <div class="images"><img src="<?='./photos/'.$_SESSION['user']['avatar'];?>"></div>
            <div class="prenomm"><?php echo $_SESSION['user']['prenom'];?>/<?php echo $_SESSION['user']['nom'];?></div> 
        </div>
        <div class="titler"> BIENVENUE SUR LA PLATEFORME DE JEU QUIZZ<br>JOUEZ ET TESTEZ VOTRE NIVEAU DE CULTURE GÉNÉRALE </div>
        <button type="submit" class="buttonn"><a href="index.php?statut=logout">Déconnexion</a></button>
    </div>
    <div class="fonds">
        <div class="question">
         <div class="qJ">
<?php 
        //le nombre de question fixé 
    $dataques=file_get_contents("./data/listequestion.json");
    $dataques=json_decode($dataques,true);
    $_SESSION['nbr']=$dataques["Nombre"];
    $cpt=0;
    //les questions
    $data=file_get_contents("./data/question.json");
    $data=json_decode($data,true);
    $pageActuelle=1;
            // $ques=shuffle($data);

             //Pagination 
    if (isset($_SESSION['page'])) {
        $_SESSION['page']>=1 && $_SESSION['page']<=$_SESSION['nbr'];
        if(isset($_POST['prece'])){
            $p=$_SESSION['page'];// $p= c'est la page  pour chaque page je mets ses reponses 
            $_SESSION['reponse_user'][$p]=$_POST['reponses'];// c'est ici que jenregistre quand il qui il appui sur prece de memec'est la meme chose pour suivanr
            $_SESSION['page']--; 
        }
    }else{
        $_SESSION['page']=$pageActuelle;   
    }
    if(isset($_POST['suiv'])){
        $p=$_SESSION['page'];
        var_dump($_POST);
        $_SESSION['reponse_user'][$p]=$_POST['reponses'];//ici
        $_SESSION['page']++; 
    }
     if(isset($_POST['ter'])){
        $p=$_SESSION['page'];
        $_SESSION['reponse_user'][$p]=$_POST['reponses'];//ici
    //fait la rediection vers affichejeu ici
    header("location:index.php?lien=afficheJeu");//la redirection
    }                
    define("NombreValeurParPage",1);
     $NbrePages=$_SESSION['nbr'];
    if(isset($_SESSION['page'])){
        $pageActuelle=$_SESSION['page'];
        if($pageActuelle>$NbrePages){
            $pageActuelle=$NbrePages;
        }
    }
    $IndiceDepart=($pageActuelle-1)*NombreValeurParPage;
    $IndiceFin=$IndiceDepart+NombreValeurParPage-1;
    for ($i=$IndiceDepart; $i<=$IndiceFin ; $i++) { 
        if(isset($data[$i])){
            echo '<div class="questi"><center>';
            echo 'Question '.$pageActuelle.'/'. $_SESSION['nbr'];
            echo "<br><br>"; echo ' '.$data[$i]['question'];
            echo '</center></div>';
        }
        if(isset($data[$i])){
        echo '<div class="po">'; 
       echo $data[$i]['point']."pts";
       echo '</div>';
    }
    if(isset($data[$i])){
        //texte          
        echo '<div class="afque">';
        echo "<br><br><br><br><br>";
            if($data[$i]['type']=="texte") {
                $cpt++;                                           //c'est pour ne pas ca affiche une erruer quand la variablke nexiste pas encore
            echo "<input type='text' name='reponses[]' value='".@$_SESSION['reponse_user'][$pageActuelle][0]."' class='inpuGen'>";
           
            }//choix simple  
           else if ($data[$i]['type']=="choix-simple") {
            
            $cpt++;
                 $reponse=$data[$i]['reponse'];
                 for ($j=0; $j <count($reponse) ; $j++) { 
                    if (isset($_SESSION['reponse_user'][$pageActuelle]) && in_array($j,$_SESSION['reponse_user'][$pageActuelle])) {
                       echo "<h5><input type='radio' name='reponses[]' checked='checked' class='checkbox' value='$j'/>".$reponse[$j]['valeur']."<h5>";
                    }
                    else {
                       echo "<h5><input type='radio' name='reponses[]' radio='checked' class='radio' value='$j'/>".$reponse[$j]['valeur']."<h5>";
                    }
                 }
           }
           //cHOIX MULTIPLE
           else if ($data[$i]['type']=="choix-multiple") {
            $cpt++;
                 $reponse=$data[$i]['reponse'];
                 for ($j=0; $j <count($reponse) ; $j++) { 
                    if (isset($_SESSION['reponse_user'][$pageActuelle]) && in_array($j,$_SESSION['reponse_user'][$pageActuelle])) {//$_SESSION['reponse_user'] les reponse de que l'utisateur a mis
                       echo "<h5><input type='checkbox' name='reponses[]' checked='checked' class='checkbox' value='$j'/>".$reponse[$j]['valeur']."<h5>";
                    }
                    else {
                       echo "<h5><input type='checkbox' name='reponses[]'  class='radio' value='$j'/>".$reponse[$j]['valeur']."<h5>";
                    }
               }
           }
        }    
      echo '</div>';
    }
 ?>
</div>
<div class="piedJ">
<?php if($pageActuelle>1){ ?>
<button class="prece" type="submit" name="prece">PRECEDENT</button>
<?php } ?>
<?php if($pageActuelle<$_SESSION['nbr']){ ?>
<button class="suiv" type="submit" name="suiv">SUIVANT</button> 
<?php } ?>    
<?php if($pageActuelle==$_SESSION['nbr']){ ?>
<button class="ter" type="submit" name="ter">TERMINER</button> 
<?php } ?> 
       
</div>
</div>
</form>
        <div class="score">
            <a class="top" href="index.php?lien=jeux&bloc=topscore"> <div class="topp"> Top scores </div> </a>
            <a class="top" href="index.php?lien=jeux&bloc=monscore"> <div class="tope"> Mon meilleur score </div> </a>
            <div class="liste">
                <?php
                    if (isset($_GET['bloc'])) {
                        if ($_GET['bloc'] == "topscore") {
                            include ("topscore.php");
                        }elseif ($_GET['bloc'] == "monscore") {
                            include ("monscore.php");
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>