<?php

class AdresseManager{

    private $connexion = null;

    public function __construct($connexion){
        $this -> connexion = $connexion;
    }

    public function getConnexion(){
        return $this-> connexion;
    }

    public function setConnexion($connexion){
        $this -> connexion = $connexion;
    }


    public function create($adresse){
        
        $stmt = $this-> getConnexion() -> prepare('INSERT INTO adresse (rue, numero, localite, code_postal, pays) VALUES( :rue,:numero,:localite,:code_postal,:pays)');  
        
        $stmt -> bindValue(':rue', $adresse->getRue()); 
        $stmt -> bindValue(':numero', $adresse->getNumero());
        $stmt -> bindValue(':localite', $adresse->getLocalite());
        $stmt -> bindValue(':code_postal', $adresse->getCodePostal());
        $stmt -> bindValue(':pays', $adresse->getPays());

        $stmt ->execute();



        
        
    }

    public function read($id = null){
              
        $sql = "SELECT * FROM adresse ";
        
        
        if(isset($id)){
            
            $sql .= "WHERE id_adresse = " . $id;
            $stmt = $this-> getConnexion()->query($sql);
            $datas = $stmt -> fetch(PDO::FETCH_ASSOC);
           
           

            foreach ($datas as $key => $value) {
            

                echo $key. " => ". $value ;
                echo "<br/>";
                
            }

        }else{
            $stmt = $this-> getConnexion()->query($sql);
            while($datas = $stmt -> fetch(PDO::FETCH_ASSOC)){
                foreach ($datas as $key => $value) {
                
    
                    echo $key. " => ". $value ;
                    echo "<br/>";
                    
                }
            }


        }        
        
    }

    public function update($adresse){
        
        $id         =       $adresse->getId()               ;
        $rue        = "'".  $adresse->getRue()          ."'";
        $numero     =       $adresse->getNumero()           ;     
        $localite   = "'".  $adresse->getLocalite()     ."'";
        $codePostal =       $adresse->getCodePostal()       ;
        $pays       = "'".  $adresse->getPays()         ."'";

        

       $sql= "UPDATE adresse 
                SET rue =".$rue.", 
                    numero = ".$numero.", 
                    localite =".$localite.", 
                    code_postal =".$codePostal.",
                    pays =".$pays."
                    WHERE id_adresse = ".$id;

                    
        $stmt = $this->getConnexion()->prepare($sql);
        
       
       $stmt ->execute();
        
    }

    public function delete($adresse){
        $this->getConnexion() -> exec(
                'DELETE FROM adresse
                WHERE id_adresse = ' .$adresse->getId()
            );

    }

    
}


?>