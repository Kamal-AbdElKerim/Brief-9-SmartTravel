<?php ob_start();   ?>




	<div class="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>

			
					</div>
				</div>
	
			</div>
		</div>
	</div>

  <div class="container ">
  

  <div class=" text-center ">
        <div class="row">
        <div class="col-sm-12 bg-black p-4 " >

         
         <a class="mb-5 chose "  href="index.php?action=CreateCompany">Ajouter Company</a>
       
        
         <a class="mb-5 chose "  href="index.php?action=affichBus" >Ajouter Bus</a>


         <a class="mb-5 chose"  href="index.php?action=route" >Ajouter Un Route</a>

         

         <a class="mb-5 chose active"  href="index.php?action=Horaire" >Ajouter Un Horaire</a>

       
     

     
       
         
         </div>
          <div class="col-sm-12 form">
            <div class="row">
              <form  method="post" enctype="multipart/form-data" action="index.php?action=CreateHoraire">
              <div class="col-12 col-sm-12  p-5 row  text-start">
              <div class="mb-3 col-sm-3">
              <label for="timeInput13">Date</label>
              <input name="date" type="date" class="form-control" id="timeInput13">
              </div>
              <div class="mb-3 col-sm-3">
              <label for="timeInput">Heure_depart</label>
              <input name="Heure_depart" type="time" class="form-control" id="timeInput" >

              </div>
              <div class="mb-3 col-sm-3">
              <label for="timeInput1">Heure_arrivee</label>
              <input name="Heure_arrivee" type="time" class="form-control" id="timeInput1" >

              </div>
              <div class="mb-3 col-sm-3">
              <label for="exampleFormControlInput1" class="form-label ">Sieges_disponibles</label>
                <input name="Sieges_disponibles" required value="" placeholder="Sieges_disponibles..." type="number" class="form-control " id="exampleFormControlInput1" >

              </div>
              <div class="mb-3 col-sm-3">
              <label for="exampleFormControlInput1" class="form-label ">Price</label>
                <input name="price" required value="" placeholder="Price..." type="number" class="form-control " id="exampleFormControlInput1" >

              </div>
              
          
   
           
               
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">Bus</label>
              <select class="form-select" name="ID_Bus" aria-label="Default select example" required>
                <option value="null" selected>Choose Bus</option>
                <?php foreach ($Bus as  $value) {    ;?>

                <option value="<?=  $value->getNumero_de_bus() ?>"><?= $value->getBusNumber() ?></option>
               
                <?php   }  ?>
              </select>
              </div>
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">route</label>
              <select class="form-select" name="ID_Route" aria-label="Default select example" required>
                <option value="null" selected>Choose route</option>
                <?php foreach ($route as  $value) {    ;?>

                  <option value="<?=  $value->getID() ?>"><?= $value->getVille_depart() ." -> ". $value->getVille_destination() ?></option>
               
                <?php   }  ?>
              </select>
              </div>
            
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Ajouter Horaire</button>
       
             </div>
        
             </div>
         
                    </form>
              </div>
            
            </div>

            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-center table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Horaire : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">Date</th>
                    <th  scope="col">Heure_depart</th>
                    <th  scope="col">Heure_arrivee</th>
                    <th  scope="col">Sieges_disponibles</th>
                  
                    <th  scope="col">price</th>
                    <th  scope="col">Bus</th>
                    <th  scope="col">ID_Route</th>
                 
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php foreach ($horaire as  $value) {   ?>
                    <?php
                    foreach ($Bus as $value1) {
                      if ($value1->getNumero_de_bus() === $value->getID_Bus()) {
                         $nameBus = $value1->getBusNumber() ; 
                         break ;
                      }
                    } 
                   foreach ($route as  $value1) { 
                    if ($value1->getID() === $value->getID_Route()) {
                      $root = $value1->getVille_depart() ." -> ". $value1->getVille_destination() ; 
                      break ;
                   }   
                  } 
                 ?>  
                      
                    <tr>
                    <td ><?=   $value->getDate() ?></td>     
                    <td ><?=   date('H:i', strtotime($value->getHeure_depart()));  ?></td>     
                    <th  scope="row"><?=  date('H:i', strtotime($value->getHeure_arrivee())) ?></th>
                    <td ><?= $value->getSieges_disponibles() ?></td>
                    <td ><?= $value->getPrice() ?></td>
                    <td ><?= $nameBus ?></td>
                    <td ><?= $root ?></td>
                  
                    <td >
                    <a class="btn btn-success mb-2 ms-2" href="index.php?action=updateHoraire&id=<?= $value->getID() ?>">update</a>

                    <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value->getID() ?>" data-bs-name="this horaire" href="#">delete</a>

                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody> 
                </table>
                <div id="rebons"></div>
            
            
            </div>
          </div>
          </div>
        </div>

</div>
	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>


	
<script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=destroHoraire&id=${id}">delete</a>
`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });

</script>

    <?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
    
    ?>
