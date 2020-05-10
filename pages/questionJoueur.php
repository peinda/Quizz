<div class="qJ">
<div class="questi"><input type="text" name="questi"/></div>
<div class="po"><input type="text" name="po"/></div>
<div class="afque">
<?php
$data=file_get_contents("./data/question.json");
$data=json_decode($data,true);
$cpt=0;
 //Pagination 
 define("NombreValeurParPage",1);
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
<div class="piedJ">
<button class="prece"><a href="index.php?lien=jeux&bloc&page=<?=$pageActuelle-1 ?>">PRECEDENT</a></button>
<button class="suiv"><a href="index.php?lien=jeux&bloc&page=<?=$pageActuelle+1 ?>">SUIVANT</a></button>             
</div>

</div>
