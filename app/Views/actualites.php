<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">


        <?php
        $first = true;
        foreach ($actus as $actu) { ?>
            <div class="carousel-item text-center <?= $first ? 'active' : '' ?>">
                <img class="img-fluid" src="<?= $actu['image'] ?>">


                <!-- Contrôles du carousel -->
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-primary text-white" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <i class="bi bi-arrow-left"></i>
                    </button>


                    <button class="btn btn-primary text-white" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>


                <h3 class="fw-bold mt-3"><?= $actu['titre'] ?></h3>
                <p class="text-secondary"><?= $actu['description'] ?></p>
                <p class="text-secondary"><?= $actu['date'] ?></p>
                <a class="btn btn-primary text-white" href="<?= $actu['lien'] ?>">Lire l'article</a>
            </div>
            <?php
            $first = false;
        } ?>


    </div>
</div>