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



class homepage  extends Database{

    function homepage()  {
      
      $consulta = $this->getConnection()->prepare("SELECT * FROM  city" );
      $consulta->execute();
      $resultcity = $consulta->fetchAll();
     
 
      include_once 'View\front\home.php';
    }

    function city()  {
      
      $consulta = $this->getConnection()->prepare("SELECT * FROM  city" );
      $consulta->execute();
      $resultcity = $consulta->fetchAll();
     
       return   $resultcity ;
    }

    function Resultatspage()  {


      
      include_once 'View\front\Resultats.php';
    }
}


class Controller_homepage{


    function afficheHome() {
        
        $homepage = new homepage();
        return $homepage->homepage() ; 

    }

    function citys() {
        
        $homepage = new homepage();
        return $homepage->city() ; 

    }
    function afficheResultat() {


        
        $homepage = new homepage();
        return $homepage->Resultatspage() ; 

    }

    function controller_form_insert()  {
        extract($_POST);

    
    
              
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraire() ; 

        $Adminroute = new Adminroute() ; 
        $route =   $Adminroute->getAllroute() ; 

     
        session_start(); 

      

        if (isset($DEPART) && isset($ARRIVEE) && isset($date) && isset($people)) {
            $array = array(
                'DEPART' => $DEPART,
                'ARRIVEE' => $ARRIVEE,
                'date' => $date,
                'people' => $people
            );

           
            $_SESSION['saved_array'] = $array;
        } else {
            
            if (isset($_SESSION['saved_array'])) {
               
                $array = $_SESSION['saved_array'];

             
            }
        }
      

     

        include_once 'View\front\Resultats.php' ; 
        header("Location: index.php?action=Resultat");

   
     }
}






$Controller_homepage = new Controller_homepage() ; 
$city =   $Controller_homepage->citys() ; 


if (isset($_GET["cityValue"])) {

    
    
 $cityValue =  $_GET["cityValue"] ; 
?>
<!-- <option >Select City</option> -->

<?php 
 foreach ($city as  $value) {
    
 if ($cityValue === $value["cityName"]) {
      continue ;
 } 
?>
	

<option><?= $value["cityName"] ?></option>


<?php } 






}