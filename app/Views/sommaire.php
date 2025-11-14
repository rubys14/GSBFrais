<?php 

$session = session(); 
$utilisateur = $session->get('role');

?>

<div id="menuGauche">
    <div id="infosUtil">
        <div id="user">
            <img src="<?= base_url('assets/images/UserIcon.png') ?>" alt="user" />
        </div>
        <div id="infos">
            <h2><?= esc($session->get('prenom') . ' ' . $session->get('nom')) ?></h2>
            <h3><?= ($session->get('role')) ?></h3>
        </div>
        <ul class="menuList">
            <li>
                <?= anchor('connexion/deconnexion', 'Déconnexion', ['title' => 'Se déconnecter']) ?>
            </li>
        </ul>
    </div>

    
    <ul id="menuPrincipal" class="menuList">
        <?php if ($utilisateur == 'visiteur') { ?>
            <li>
                <?= anchor('accueil', 'Accueil', ['title' => 'Accueil']) ?>
            </li>
            <li>
                <?= anchor('gererfrais', 'Saisie fiche de frais', ['title' => 'Saisie fiche de frais']) ?>
            </li>
            <li>
                <?= anchor('etatfrais', 'Mes fiches de frais', ['title' => 'Consultation de mes fiches de frais']) ?>
            </li>
        <?php } ?>

        <?php if ($utilisateur == 'comptable') { ?>
            <li>
                <?= anchor('accueil', 'Accueil', ['title' => 'Accueil']) ?>
            </li>
            <li>
                <?= anchor('suivifrais', 'Suivi des fiches de frais', ['title' => 'Suivi des fiches de frais']) ?>
            </li>
            <li>
                <?= anchor('validationfrais', 'Validation des fiches de frais', ['title' => 'Validation des fiches de frais']) ?>
            </li>
        <?php } ?>
    </ul>
</div>