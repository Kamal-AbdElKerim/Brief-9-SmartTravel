<?php 
 include "Model\admin_class\class_admin_Bus.php" ;
 include "Model\admin_class\class_admin_Company.php" ;
 include "Model\admin_class\class_admin_Horaire.php" ;
 include_once "Model\admin_class\class_admin_route.php" ; 




  include_once "Controller\ControllerBus.php" ;
  include_once "Controller\ControllerCompant.php" ;
  include_once "Controller/front/Controller_homepage.php" ;
  include_once "Controller\ControllerHoraire.php" ;
  include_once "Controller\Controlleroute.php" ;
  include_once "Controller\Controlleroute.php" ;



   $controller_Compant = new controller_Compant() ; 
   $controller_Bus = new controller_Bus() ; 
   $controller_Homepage = new Controller_homepage() ; 
   $controller_horaire = new controller_horaire() ; 
   $controller_route = new controller_route() ; 

      if (isset($_GET["action"])) {
       $action = $_GET["action"] ; 
 
       switch ($action) {
        case "Saveform":
            $controller_Homepage->controller_form_insert() ; 
            break;
        case "Resultat":
            $controller_Homepage->afficheResultat() ; 
            break;
        case "destroCompany":
            $controller_Compant->controller_delete();
            break;
        case "destroBus":
            $controller_Bus->controller_delete();
            break;
        case "Horaire":
            $controller_horaire->controller_select();
            break;
        case "CreateHoraire":
            $controller_horaire->controller_insert();
            break;
        case "updateHoraire":
            $controller_horaire->controller_update();
            break;
        case "UpdateHoraire_submet":
            $controller_horaire->controller_submet_update();
            break;
        case "destroHoraire":
            $controller_horaire->controller_delete();
            break;
        case "affichBus":
            $controller_Bus->controller_select();
            break;
        case "CreateBus":
            $controller_Bus->controller_Bus_insert();
            break;
        case "updateBus":
            $controller_Bus->controller_Bus_update()  ;
            break;
        case "updateSubmitBus":
            $controller_Bus->controller_submet_update_Bus()  ;
            break;
        case "route":
            $controller_route->controller_select()  ;
            break;
        case "destroRoot":
            $controller_route->controller_delete()  ;
            break;
        case "formUpdateRoute":
            $controller_route->controller_update()  ;
            break;
        case "UpdateRoute":
            $controller_route-> controller_submet_update()  ;
            break;
        case "CreateRoot":
            $controller_route->controller_insert()  ;
            break;
        case "SubmitupdateCompany":
            $controller_Compant->controller_submet_update();
            break;
        case "updateCompany":
            $controller_Compant->controller_update() ; 
            break;
        case "CreateCompany":
            $controller_Compant->controller_insert(); 
          
            break;
        case "admin":
            $controller_Compant->controller_select() ; 
          
            break;
        default:
       
            break; }
        }else{
          $controller_Homepage->afficheHome() ; 
        }

         

         
      
   

   
