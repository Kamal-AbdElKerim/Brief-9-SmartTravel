<?php 

include_once "Model/admin/model_admin_route.php";


class controller_route {


    function controller_select()  {
      
    
        $Adminroute = new Adminroute() ; 
        $route =   $Adminroute->getAllroute() ; 
    
        include_once "View/admin/dash_route/afficheroute.php" ;
    }

    
    function controller_insert()  {
        extract($_POST);
   
                $Adminroute = new Adminroute() ; 
                $Adminroute->Insertroute($Ville_depart,$Ville_destination,$Distance,$Duree) ; 
          

           header("Location: index.php?action=admin");
   
    }
    
    function controller_update()  {
        $id = $_GET['id'];
        $Adminroute = new Adminroute() ; 

             $data =  $Adminroute->getByIdroute($id) ; 
             require_once  'View\admin\dash_route\updateroute.php';

       
   
    }

    function controller_delete()  {
        $id = $_GET['id'];
        $Adminroute = new Adminroute() ; 

             $Adminroute->deleteByIdroute($id); 
         
             header("Location: index.php?action=admin");
       
   
    }
    
    function controller_submet_update()  {
        extract($_POST);
       

        if (isset($submit)) {
          
      
     
                $Adminroute = new Adminroute() ; 

                $Adminroute-> Updateroute($id,$Ville_depart,$Ville_destination,$Distance,$Duree) ; 

               
              
       

            header("Location: index.php?action=admin");


            } 
          

       
   
    }
}