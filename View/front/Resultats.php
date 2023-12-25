<?php ob_start(); ?>


<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>

			
					</div>        </div>
      </div>
    </div>
  </div>
</div>

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-3   ">
    <hr>
    <h2>Company</h2>
<div id="data_Catégories">




</div>
    

<hr>
<h3>Filter par price</h3>
      <div class="form-group">
        <input type="range" class="custom-range  " id="priceRange" min="60" max="200" step="10">
        <!-- Display selected range value -->
        <span class="text-success" id="selectedRange"></span>
      </div>
  <hr>
<h2>Date</h2>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault12" checked>
      <label class="form-check-label" for="flexRadioDefault12">
        All
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        Date in morning
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
      <label class="form-check-label" for="flexRadioDefault2">
        Date in evening
      </label>
    </div>
  
    <?php
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
            ?>


    </div>
    <div class="col-sm-9  ">
      <h5><?=  $array["DEPART"] ?> vers <?=  $array["ARRIVEE"] ?> le <?= $array["date"] ?>. pour <?= $array["people"]?>. :   <?= count($horaire) ?> résultats</h5>
    <!-- card -->
      
    <div id="data"></div>
     

      <!-- end card -->
    
      <nav aria-label="..." class=" d-flex  justify-content-center  w-100 ">
                  <ul class="pagination " id="paginate">
                
                  
                  </ul>
                </nav>
    </div>
    
  </div>

</div>



<script>
    // JavaScript to display selected range value
    const priceRange = document.getElementById('priceRange');
    const selectedRange = document.getElementById('selectedRange');

    priceRange.addEventListener('input', function() {
      selectedRange.textContent =  this.value + ' MAD' ;
    });
    <?php  include_once "View/front/Ajax_filter/affiche_card/affiche_card.js" ; ?>

  </script>


<?php $contant =  ob_get_clean();
 include_once "View\layout.php" ; 


?>