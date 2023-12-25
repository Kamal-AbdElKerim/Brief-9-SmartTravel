<?php
include_once 'Model\front\model_homepage.php' ; 

class Controller_homepage{


    function afficheHome() {
        
        $homepage = new homepage();
        return $homepage->homepage() ; 

    }
    function afficheResultat() {


        
        $homepage = new homepage();
        return $homepage->Resultatspage() ; 

    }

    function controller_form_insert()  {
        extract($_POST);
    
              
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraire() ; 

        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 

        $AdminBus = new AdminBus() ; 
        $Bus =   $AdminBus->getAllBus() ; 

             include_once 'View\front\Resultats.php' ; 


       header("Location: index.php?action=Resultat");
   
     }
}