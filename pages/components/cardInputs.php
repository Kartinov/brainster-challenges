 <?php

    $cardInputs = 3;  // Initial card inputs 

    ?>

 <div class="p-3 bg-white shadow rounded">
     <p class="lead">Provide url for an image and description of your service/product</p>

     <?php for ($i = 0; $i < $cardInputs; $i++) : ?>

         <div class="form-group">
             <label for="card_image<?= $i ?>">Image URL</label>
             <input type="text" class="form-control" id="card_image<?= $i ?>" name="cards[<?= $i ?>][card_image]" value="<?= $_SESSION['old']['cards'][$i]['card_image'] ?? '' ?>">
         </div>
         <div class=" form-group">
             <label for="card_title<?= $i ?>">Title</label>
             <input type="text" class="form-control" id="card_title<?= $i ?>" name="cards[<?= $i ?>][card_title]" value="<?= $_SESSION['old']['cards'][$i]['card_title'] ?? '' ?>">
         </div>
         <div class="form-group">
             <label for="card_description<?= $i ?>">Description of service/product</label>
             <textarea class="form-control" id="card_description<?= $i ?>" name="cards[<?= $i ?>][card_description]" rows="2"><?= $_SESSION['old']['cards'][$i]['card_description'] ?? '' ?></textarea>
         </div>

     <?php endfor ?>

 </div>