<?php
                require_once("functions.php");
                ?>
<div class="list-group">
                <a href="accueil.php" onclick="charge()" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                <span class="fa fa-th-large "></span> &nbsp;Tous les PFEs<span class="badge bg-warning rounded-pill text-dark"><?=getNumAllPfes()?></span>               
                </a>

              
                  <?php
                require_once("functions.php");

               $specs=getAllSpecialites();

               foreach ($specs as $key=>$value){
                   ?>
                <a href="pfe.php?types=<?=$value->types ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span class="fa fa-th-large "></span>&nbsp;  <?=$value->types?> <span class="badge bg-warning rounded-pill text-dark"><?=countsByType($value->types)?></span>
                
            </a>
<?php
               }
               ?>









            </div>