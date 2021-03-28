<section class="book">
  <div class="new__book">
    <?php
    if (isset($_SESSION['user'])) {
      $id_user = $_SESSION['user']['ID_USER'];
      $select = $bdd->query("SELECT * FROM livre WHERE ID_USER='$id_user'")->fetchAll();
    }

    foreach ($select as $row) {

    ?>
      <a href="#" class="book__items">
        <img src="Book_Images/<?php echo $row['IMAGE1']; ?>" alt="">
        <div class="book__description">
          <h3 class="book__title"><?php echo $row['TITRE']; ?></h3>
          <p class="author__name"><?php echo $row['NOM_AUTEUR']; ?></p>
          <div class="book__appreciation">
            <i class=" active fas fa-star"></i>
            <i class=" active fas fa-star"></i>
            <i class=" active fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="book__price"><?php echo $row['PRIX']; ?> Fcfa</p>
        </div>
        <div class="action">
          <i class="fas fa-trash"></i>
        </div>
      </a>
    <?php
    }
    ?>
  </div>
</section>