<?php 




 class homepage  extends Database{

      function homepage()  {
        
        $consulta = $this->getConnection()->prepare("SELECT * FROM  city" );
        $consulta->execute();
        $resultcity = $consulta->fetchAll();
       
   
        include_once 'View\front\home.php';
      }
  
      function Resultatspage()  {


        
        include_once 'View\front\Resultats.php';
      }
 }