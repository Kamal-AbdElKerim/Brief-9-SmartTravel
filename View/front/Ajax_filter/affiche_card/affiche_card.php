<?php 

// require_once  "../../../../Model/conn.php";
require_once "../../../../Model/admin/model_admin_Bus.php";
require_once "../../../../Model/admin/model_admin_Horaire.php";
  require_once "../../../../Model/admin/model_admin_Company.php";


class controller_horaire {

    function ajaxaffiche() {
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraireJoin() ; 
        return  $horaire ;
    }

    function controller_select()  {
      
        $AdminBus = new AdminBus() ; 
        $Bus =   $AdminBus->getAllBus() ; 
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraire() ; 
        $Adminroute = new Adminroute() ; 
        $route =   $Adminroute->getAllroute() ; 
    
        include_once "View/admin/dash_horaire/affichehoraire.php" ;
    }

    
    function controller_insert()  {
        extract($_POST);
   
                $Adminhoraire = new Adminhoraire() ; 
                $Adminhoraire->Inserthoraire($Heure_depart,$Heure_arrivee,$Sieges_disponibles,$ID_Bus,$ID_Route,$price) ; 
          

          header("Location: index.php?action=Horaire");
   
    }
    
    function controller_update()  {
        $id = $_GET['id'];
        $Adminhoraire = new Adminhoraire() ;    
        $AdminBus = new AdminBus() ; 
        $Bus =   $AdminBus->getAllBus() ; 
     
        $Adminroute = new Adminroute() ; 
        $route =   $Adminroute->getAllroute() ; 
        

             $data =  $Adminhoraire->getByIdhoraire($id) ; 
             require_once  'View\admin\dash_horaire\updatehoraire.php';

       
   
    }

    function controller_delete()  {
        $id = $_GET['id'];
        $Adminhoraire = new Adminhoraire() ; 

             $Adminhoraire->deleteByIdhoraire($id); 
         
             header("Location: index.php?action=Horaire");
       
   
    }
    
    function controller_submet_update()  {
        extract($_POST);
       

        if (isset($submit)) {
          
            // echo "$id";                    echo "<br>" ;
            // echo "$Heure_depart"; echo "<br>" ;
            // echo "$Heure_arrivee"; echo "<br>" ;
            // echo "$Sieges_disponibles"; echo "<br>" ;
            // echo "$ID_Bus"; echo "<br>" ;
            // echo "$ID_Route"; echo "<br>" ;
            // echo "$price"; echo "<br>" ;
     
                $Adminhoraire = new Adminhoraire() ; 

                $Adminhoraire->Updatehoraire($id,$Heure_depart,$Heure_arrivee,$Sieges_disponibles,$ID_Bus,$ID_Route,$price) ; 

               
              
       

                header("Location: index.php?action=Horaire");


            } 
          

       
   
    }
}








  $controller_horaire = new controller_horaire() ; 


        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
        $AdminBus = new AdminBus() ; 
        $Bus =   $AdminBus->getAllBus() ; 
     
  $data =  $controller_horaire->ajaxaffiche() ; 




//    print_r($data);
//     print_r($Bus);
//    print_r($Company);



$combinedData = [
    'data' => $data,
    'Bus' => $Bus,
    'Company' => $Company
];

// // Convert the combined data to JSON
 echo json_encode($combinedData);

//    echo json_encode($data);

