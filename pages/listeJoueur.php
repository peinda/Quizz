
<div class="div5">
    <div class="lj"><p>LISTE DES JOUEURS PAR SCORE</p> </div>
    <div class="divlj"> 
    <div class="PreNoScore">
    <div class="Pre">Prenom </div>
    <div class="No">Nom </div>
    <div class="Score">Score</div>
    </div>
	<?php
	$json_data= file_get_contents('./data/fichier.json');
	$decode_flux= json_decode($json_data, true);
	foreach ($decode_flux as $value) {
		if ($value["profil"] == "joueur") {
			$joueur[] = $value;
		}
	}
	$colonne = array_column($joueur, 'score');
	array_multisort($colonne, SORT_DESC, $joueur);
			  
	//Pagination 
    define("NombreValeurParPage",15);
                if(isset($joueur)){
                    $TotalValeur=count($joueur); 
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
                    if(isset($joueur[$i])){
                        echo"<table border=1 bgcolor=deepskyblue width=100% id='left'><tr>";
                        echo "<td width=30%>".$joueur[$i]['prenom']."</td> ";
                        echo "<td width=30%>".$joueur[$i]['nom']."</td>";
                        echo "<td width=20% >".$joueur[$i]['score']."</td>" ;
                        echo"</tr></table>";

                    }
                }?>                
</div>
<div class="pied">
<button class="prec"><a href="index.php?lien=accueil&block=listeJoueur&page=<?=$pageActuelle-1 ?>">PRECEDENT</a></button>
<button class="sui"><a href="index.php?lien=accueil&block=listeJoueur&page=<?=$pageActuelle+1 ?>">SUIVANT</a></button>             
</div>
</div>




    
        