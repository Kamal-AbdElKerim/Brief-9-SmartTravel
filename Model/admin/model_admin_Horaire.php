<?php
//  include_once "Model/conn.php" ; 







class Adminhoraire extends Database {

  
 private $ID ; 
 private $Date ; 
 private $Heure_depart ; 
 private $Heure_arrivee ; 
 private $Sieges_disponibles ; 
 private $ID_Bus ; 
 private $ID_Route ; 
 private $price ; 






    public function getAllhoraire(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  horaire" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();
       
        return $resultados;

    }
    public function getAllhoraireJoin(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM horaire INNER JOIN company ON company.id = (SELECT Company_id FROM bus WHERE bus.Numero_de_bus = horaire.ID_BUS) INNER JOIN route ON horaire.ID_Route = route.ID ORDER BY Heure_depart ASC ;" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();
 
      
       
        return $resultados;

    }


    
    public function getByIdhoraire($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM horaire  WHERE ID = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function getByColumnhoraire($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM horaire WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function deleteByIdhoraire($id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM horaire WHERE ID = :id");
            $consulta->execute(array(
                "id" => $id
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnhoraire($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM horaire WHERE :column = :value");
            $consulta->execute(array(
                "column" => $column,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function Inserthoraire($Date,$Heure_depart,$Heure_arrivee,$Sieges_disponibles,$ID_Bus,$ID_Route,$price){

        $consulta = $this->getConnection()->prepare("INSERT INTO horaire(Date,Heure_depart,Heure_arrivee,Sieges_disponibles,ID_Bus,ID_Route,price)
                                        VALUES (:Date,:Heure_depart,:Heure_arrivee,:Sieges_disponibles,:ID_Bus,:ID_Route,:price)");
        $result = $consulta->execute(array(
            "Date" => $Date,
            "Heure_depart" => $Heure_depart,
            "Heure_arrivee" => $Heure_arrivee,
            "Sieges_disponibles" => $Sieges_disponibles,
            "ID_Bus" => $ID_Bus,
            "ID_Route" => $ID_Route,
            "price" => $price
          
        ));

        return $result; 
    }

    public function Updatehoraire($id,$Date,$Heure_depart,$Heure_arrivee,$Sieges_disponibles,$ID_Bus,$ID_Route,$price) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE horaire 
                SET 
                    Date = :Date,  
                    Heure_depart = :Heure_depart,  
                    Heure_arrivee = :Heure_arrivee,
                    Sieges_disponibles = :Sieges_disponibles,
                    ID_Bus = :ID_Bus,
                    ID_Route = :ID_Route,
                    price = :price
                WHERE Id = :id 
            ");
    
            $resultado = $consulta->execute(array(
                "Date" => $Date,
                "Heure_depart" => $Heure_depart,
                "Heure_arrivee" => $Heure_arrivee,
                "Sieges_disponibles" => $Sieges_disponibles,
                "ID_Bus" => $ID_Bus,
                "ID_Route" => $ID_Route,
                "price" => $price,
                "id" => $id
            ));
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    





}