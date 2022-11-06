<?php
include_once("base/config.php");
include_once("base/AdresseManager.php"); 

class Adresse{
    private $id;
    private $rue;
    private $numero; 
    private $localite;
    private $codePostal;
    private $pays; 

   public function setId($id){
        $this -> id = $id;
    }

    public function getId(){
        return $this -> id;
    }


    public function setRue($rue){
        $this -> rue = $rue;
    }
    
    public function getRue(){
        return $this ->rue; 
    }

    public function setNumero($numero){
        if( is_numeric($numero)){
            $this -> numero = $numero; 
        }else{
            echo "Le numero que vous avez inscrit n'est pas un numéro "; 
        }
    }

    public function getNumero(){
        return $this -> numero;
    }

    public function setLocalite($localite){
        $this -> localite = $localite;
    }

    public function getLocalite(){
        return $this -> localite;
    }

    public function setCodePostal($codePostal){
        if($codePostal > 999 && $codePostal <10000){
            $this -> codePostal = $codePostal;
        }else{
            echo"le code postal introduit n'est pas valide!"; 
        }
    }

    public function getCodePostal(){
        return $this-> codePostal; 
    }

    public function setPays($pays){
        $this -> pays = $pays;
    }

    public function getPays(){
        return $this -> pays;
    }


    function affichage(){

        return $this->id . " ". $this ->rue ." " . $this->numero . "<br/>". $this -> localite . "  " . $this -> codePostal . "<br/>" . $this -> pays; 
    }
    
}



$adresse = new Adresse();
$adresse -> setId(10);
$adresse -> setRue("rue Grand Route");
$adresse -> setNumero(300);
$adresse -> setLocalite("Flemalle");
$adresse -> setCodePostal(4400);
$adresse -> setPays("Belgique"); 

$test = new adresseManager($connexion);

$test -> delete($adresse);




?>