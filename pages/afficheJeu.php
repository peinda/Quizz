<?php
is_connect();
?>
<p><br><br><br></p>
<div class="afficheJeu" >
<?php 
$data=file_get_contents("./data/question.json");
$data=json_decode($data,true);
//var_dump($data);
$IndiceDepart=0;
$IndiceFin=6;
for ($i=$IndiceDepart; $i<$IndiceFin ; $i++) { 
    if(isset($data[$i])){
        echo ($i+1).'. '.$data[$i]['question']."<br>";
            if($data[$i]['type']==="choix-multiple" || $data[$i]['type']==='choix-simple' )
            {
                $reponse_users=array();
                if(isset($_SESSION['reponse_user'][$i+1]))
                {
                    $reponse_users=$_SESSION['reponse_user'][$i+1];
                }
                $reponse=$data[$i]['reponse'];
                for ($j=0; $j <count($reponse) ; $j++) { 
                    echo "<input ";
                    if($data[$i]['type']==="choix-multiple")
                    {
                        echo "type='checkbox'";
                    }
                    else
                    {
                        echo "type='radio'";
                    }
                    if(in_array($j,$reponse_users))
                    {
                        echo "checked";
                    }
                    echo " name='cr$i'/>  ".$reponse[$j]['valeur']."<br>";
                }    
            }else
            {
                $val="";
                        //tu as vu 
                    //verify si la sesion a page $i+1 contient une valeur
                    //si oui on recupere la valeur
                if(isset($_SESSION['reponse_user'][$i+1]))
                {
                    $val=$_SESSION['reponse_user'][$i+1][0];
                }
                echo "<input type='text' name='text' value='$val'><br>";
            }

        }
    }


?>
</div>