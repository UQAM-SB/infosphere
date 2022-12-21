<?php
/**
 * liensPlus.php
 * Bouton + qui apparait à côté du logo de l'UQAM dans le header
 */
?>

<button type="button" class="d-none d-md-block plus dropdown-toggle" data-toggle="dropdown" aria-label="Menu Liens rapides"></button>
<div class="dropdown-menu <?php  addFaculte(); ?>">
    <div class="background <?php  addFaculte(); ?>">
        <a class="dropdown-item" href="https://uqam.ca"><?php _e('Page d\'accueil de l\'UQAM', 'gabarit-universel'); ?></a>
        <a class="dropdown-item" href="https://etudier.uqam.ca"><?php _e('Étudier à l\'UQAM', 'gabarit-universel'); ?></a>
        <a class="dropdown-item" href="https://bottin.uqam.ca"><?php _e('Bottin du personnel', 'gabarit-universel'); ?></a>
        <a class="dropdown-item" href="https://carte.uqam.ca"><?php _e('Carte du campus', 'gabarit-universel'); ?></a>
        <a class="dropdown-item" href="https://bibliotheques.uqam.ca"><?php _e('Bibliothèques', 'gabarit-universel'); ?></a>
        <a class="dropdown-item" href="https://uqam.ca/joindre/"><?php _e('Pour nous joindre', 'gabarit-universel'); ?></a>
    </div>
</div>