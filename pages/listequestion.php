<?php
$dataques=file_get_contents("./data/listequestion.json");
$dataques=json_decode($dataques,true);
$_SESSION['nbre']=$dataques["Nombre"]; 
if(isset($_POST['ok'])) 
{
$nbre=$_POST['nbre'];
if(isset($nbre) && $nbre>=5){
   $_SESSION['nbre']=$nbre; 

$dataques=file_get_contents("./data/listequestion.json");
$dataques=json_decode($dataques,true);
      $dataques=array(
          "Nombre"=>$nbre);
$dataques=json_encode($dataques);
file_put_contents("./data/listequestion.json",$dataques);
   }else {
      $error="la valeur doit etre superieure ou égale à 5!!!";
   }
}
?>

<div class="div2">
<form method="POST" class="fq" id="liste-question" >
<div class="err" id="errorfq"></div>
<div class="nq"><p>Nbre de question/jeu</p>
<input name="nbre" type="text" value="<?= $_SESSION['nbre']?>" error="errorfq"/>
 <div class="ok"><input type="submit" name="ok" value="OK"/></div>
 <span class="meserror"><?php if (isset($error)) {
    echo $error;
 }?></span>
</div>
<div class="q">
<?php

$data=file_get_contents("./data/question.json");
$data=json_decode($data,true);
$cpt=0;

 //Pagination 
 define("NombreValeurParPage",5);
 if(isset($data)){
     $TotalValeur=count($data); 
 }else{
     $TotalValeur=0;
 }
 $NbrePages=ceil($TotalValeur/NombreValeurParPage);
 if(isset($_GET['page'])){
     $pageActuelle=$_GET['page'];
     if($pageActuelle>$NbrePages){
         $pageActuelle=$NbrePages;
     }
 }else{
     $pageActuelle=1;
 }
 $IndiceDepart=($pageActuelle-1)*NombreValeurParPage;
 $IndiceFin=$IndiceDepart+NombreValeurParPage-1;
 for ($i=$IndiceDepart; $i <=$IndiceFin ; $i++) { 
   if(isset($data[$i])){
   //texte          
   
       if($data[$i]['type']=="texte") {
         $cpt++;
       echo "<h4>".$cpt.'.'.$data[$i]['question']."</h4><input type='text' class='inputGen' readonly='readonly' value='".$data[$i]['reponse']."'>";
      }
      //choix simple  
      else if ($data[$i]['type']=="choix-simple") {
         $cpt++;
            echo "<h4>".$cpt.'.'.$data[$i]['question']. "</h4>";
            $reponse=$data[$i]['reponse'];
            for ($j=0; $j <count($reponse) ; $j++) { 
               if ("oui"==$reponse[$j]['valide']) {
                  echo "<h5><input type='radio' name='checkbox.$i' checked='checked' class='checkbox'/>".$reponse[$j]['valeur']."<h5>";
               }
               else {
                  echo "<h5><input type='radio' name='radio.$i' radio='checked' class='radio'/>".$reponse[$j]['valeur']."<h5>";
               }
            }
      }
      //cHOIX MULTIPLE
      else if ($data[$i]['type']=="choix-multiple") {
         $cpt++;
            echo "<h4>".$cpt.'.'.$data[$i]['question']. "</h4>";
            $reponse=$data[$i]['reponse'];
            for ($j=0; $j <count($reponse) ; $j++) { 
               if ("oui"==$reponse[$j]['valide']) {
                  echo "<h5><input type='checkbox' name='checkbox.$i' checked='checked' class='checkbox'/>".$reponse[$j]['valeur']."<h5>";
               }
               else {
                  echo "<h5><input type='checkbox' name='radio.$i' radio='checked' class='radio'/>".$reponse[$j]['valeur']."<h5>";
               }
          }
      }
   }
 }

 ?>                               
</div>
<div class="pied">
<button class="prec"><a href="index.php?lien=accueil&block=listequestion&page=<?=$pageActuelle-1 ?>">PRECEDENT</a></button>
<button class="sui"><a href="index.php?lien=accueil&block=listequestion&page=<?=$pageActuelle+1 ?>">SUIVANT</a></button>             
</div>
</form>
</div>

<script>
const inputs= document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
    if(e.target.hasAttribute("error")){
        var idDivError=input.getAttribute("error");
        document.getElementById(idDivError).innerText=""
        }     
        })
}
document.getElementById("liste-question").addEventListener("submit",function(e){
const inputs= document.getElementsByTagName("input");
      var error=false;
      for(input of inputs){
        if(input.hasAttribute("error")){
        var idDivError=input.getAttribute("error");
        if(!input.value){
            document.getElementById(idDivError).innerText="ce champs est obligatoire"
              error=true
          }
      }
    }
    if(error){
        e.preventDefault();
        return false;
    }
  }) 
</script>
