<?php



class Database {
    private $host = "localhost";
    private $db_name = "smarttravel";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}



class AdminBus extends Database {

  
 private $Numero_de_bus ; 
 private $busNumber ; 
 private $Plaque_immatriculation ; 
 private $Capacite ; 
 private $bus_id ; 






    public function getAllbus(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  bus" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();
       
        return $resultados;

    }

    
    public function getByIdbus($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM bus  WHERE Numero_de_bus = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function getByColumnbus($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM bus WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetchAll();
       
        return $resultados;
    }
    
    public function deleteByIdbus($id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM bus WHERE Numero_de_bus = :id");
            $consulta->execute(array(
                "id" => $id
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnbus($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM bus WHERE :column = :value");
            $consulta->execute(array(
                "column" => $column,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function Insertbus($busNumber, $Plaque_immatriculation, $Capacite, $Company_id){ 
        // Prepare the SQL statement with placeholders
        $consulta = $this->getConnection()->prepare("INSERT INTO bus (`busNumber`, `Plaque_immatriculation`, `Capacite`, `Company_id`)
                                                    VALUES (:busNumber, :Plaque_immatriculation, :Capacite, :Company_id)");
    
        // Bind parameters to the prepared statement
        $consulta->bindParam(':busNumber', $busNumber);
        $consulta->bindParam(':Plaque_immatriculation', $Plaque_immatriculation);
        $consulta->bindParam(':Capacite', $Capacite);
        $consulta->bindParam(':Company_id', $Company_id);
    
        // Execute the query
        $result = $consulta->execute();
    
        // Check if the query was executed successfully
        if ($result) {
            return "Data inserted successfully.";
        } else {
            return "Error inserting data: " . $consulta->errorInfo()[2]; // Fetch the error message
        }
    }
    

    public function Updatebus($Numero_de_bus,$busNumber,$Plaque_immatriculation,$Capacite,$Company_id) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE bus 
                SET 
                busNumber = :busNumber,  
                Plaque_immatriculation = :Plaque_immatriculation,
                Capacite = :Capacite,
                Company_id  = :Company_id
                WHERE Numero_de_bus = :id 
            ");
    
            $resultado = $consulta->execute(array(
                "busNumber" => $busNumber,
                "Plaque_immatriculation" => $Plaque_immatriculation,
                "Capacite" => $Capacite,
                "Company_id" => $Company_id,
                "id" => $Numero_de_bus
            ));
    
            return $resultado;
            
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    




}


