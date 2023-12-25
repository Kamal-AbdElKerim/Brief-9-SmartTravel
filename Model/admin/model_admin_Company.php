<?php
//  include_once "Model/conn.php" ; 






class AdminCompany extends Database {

  
 private $id ; 
 private $name ; 
 private $Bio ; 







    public function getAllCompany(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  Company" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();
       
        return $resultados;

    }

    
    public function getByIdCompany($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Company  WHERE id = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function getByColumnCompany($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Company WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function deleteByIdCompany($id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Company WHERE id = :id");
            $consulta->execute(array(
                "id" => $id
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnCompany($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Company WHERE :column = :value");
            $consulta->execute(array(
                "column" => $value,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function InsertCompany($name,$Bio,$img){

        $consulta = $this->getConnection()->prepare("INSERT INTO Company(name,Bio,img)
                                        VALUES (:name,:Bio,:img)");
        $result = $consulta->execute(array(
            "name" => $name,
            "Bio" => $Bio,
            "img" => $img
          
        ));

        return $result; 
    }

    public function UpdateCompany($id, $name, $Bio, $img) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE Company 
                SET 
                    name = :name,  
                    Bio = :Bio,
                    img = :img
                WHERE id = :id 
            ");
    
            $resultado = $consulta->execute(array(
                "name" => $name,
                "Bio" => $Bio,
                "img" => $img,
                "id" => $id
            ));
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    




 /**
  * Get the value of id
  */ 
 public function getId()
 {
  return $this->id;
 }

 /**
  * Get the value of name
  */ 
 public function getName()
 {
  return $this->name;
 }

 /**
  * Set the value of name
  *
  * @return  self
  */ 
 public function setName($name)
 {
  $this->name = $name;

  return $this;
 }

 /**
  * Get the value of Bio
  */ 
 public function getBio()
 {
  return $this->Bio;
 }

 /**
  * Set the value of Bio
  *
  * @return  self
  */ 
 public function setBio($Bio)
 {
  $this->Bio = $Bio;

  return $this;
 }
}


