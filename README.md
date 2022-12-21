# Infosphère
Thème Wordpress pour Infosphère

# Démo
Le site Infosphère est accessible à cette URL [https://infosphere.uqam.ca](https://infosphere.uqam.ca)

# Prérequis
•	Installer la dernière version Wordpress : [https://fr.wordpress.org/download/](https://fr.wordpress.org/download/) 


# Extensions utilisées
Le thème Wordpress actuel utilise les extensions gratuites suivantes qu'il faut faciliter l'installation et profiter pleinement des fonctionnalités :

- [WordPress Importer](https://en-ca.wordpress.org/plugins/wordpress-importer/) : pour importer le contenu Wordpress;
- [Better Search Replace](https://en-ca.wordpress.org/plugins/better-search-replace/) : pour remplacer les hyperliens après l'importation;
- [Formidable Forms](https://en-ca.wordpress.org/plugins/formidable/) : pour l'affichage des formulaires;
- [PublishPress Blocks](https://wordpress.org/plugins/advanced-gutenberg/) : pour déployer le contenu en accordéon.


# Fonctionnement des thèmes
Le thème enfant "infosphere" repose sur le thème parent institutionnel "uqam-gabarit-universel". Les 2 thèmes doivent être présents dans le répertoire wp-content/themes de votre installation Wordpress.

Pour plus d'information sur l'utilisation d'un thème enfant, consultez : [fr:Thèmes Enfant](https://codex.wordpress.org/fr:Th%C3%A8mes_Enfant)

# Procédure d'installation
1. Installez la version la plus récente de Wordpress : [https://fr.wordpress.org/download/](https://fr.wordpress.org/download/) sur un serveur;
2. Assurez-vous de supprimer les contenus (billets, pages, commentaires), les widgets et les menus que vous **ne souhaitez pas voir apparaître** dans votre instance Infosphère.
3. Copiez les répertoires "infosphere" et "uqam-gabarit-universel" dans le répertoire "themes" de votre installation Wordpress et activer le thème Infosphère;
4. Téléchargez et activez les extensions [WordPress Importer](https://en-ca.wordpress.org/plugins/wordpress-importer/), [Better Search Replace](https://en-ca.wordpress.org/plugins/better-search-replace/), [Formidable Forms](https://en-ca.wordpress.org/plugins/formidable/) et [PublishPress Blocks](https://wordpress.org/plugins/advanced-gutenberg/).

# Procédure d'importation du contenu d'Infosphère
1. Dans le tableau de bord de Wordpress, sous le menu "Outils", cliquez sur "Importer" et ensuite sur le lien "Lancer l'outil d'importation" (sous l'entrée "WordPress");
2. Cliquez sur le bouton "Choisir un fichier" et sélectionnez le fichier "infosphere.WordPress.xml;
3. Cliquez sur le bouton "Téléverser et importer le fichier";
4. Assignez ensuite les contenus à l'utilisateur responsable des contenus Wordpress, cochez la case "Téléverser les fichiers joints" et cliquez sur le bouton "Envoyer";

Vous devriez maintenant retrouver l'ensemble du contenu sous le menu "Pages". Toutefois, le contenu ne sera pas encore visible pour les usagers dans l'interface publique. Il faut poursuivre la procédure pour s'assurer d'obtenir l'affichage complet.

# Procédure d'importation des formulaires d'Infosphère
Infosphère présente 2 formulaires au sein de ses pages : "Caractéristiques de la documentation à utiliser" et "Cerner son sujet". Pour bien fonctionner, ces formulaires doivent également être importés à l'aide de l'extension [Formidable Forms](https://en-ca.wordpress.org/plugins/formidable/).

1. Dans le tableau de bord de Wordpress, sous le menu "Formidable", cliquez sur "Importation/Exportation";
2. Sous la section "Importer", cliquez sur le bouton "Choisir un fichier" et sélectionnez le fichier "infosphere.formulaires.xml;
3. Cliquez sur le bouton "Téléverser un fichier et l'importer";

# Procédure pour l'affichage du contenu dans l'interface publique
## Affichage de la page d'accueil
1. Dans le tableau de bord de Wordpress, sous le menu "Réglages", cliquez sur "Lecture";
2. Dans la première section "La page d’accueil affiche", sélectionnez le bouton radio "Une page statique" et sous le menu déroulant "Page d'accueil", sélectionnez la page dont le titre est "Gagner du temps et réaliser de meilleurs travaux";
3. Cliquez sur le bouton "Enregistrer les modifications"; 

Vous devriez maintenant voir la page d'accueil d'Infosphère avec les 4 vignettes illustrant les étapges de la recherche ainsi que le bouton "Boîte à outils". Si ce n'est pas le cas, assurez-vous d'avoir suivi correctement la procédure et vérifiez si les liens qui appellent les images ne retournent pas une erreur 404 (si tel est le cas, il faudra effectuer un rechercher/remplacer des liens, voir procédure Modification en lot des hyperliens). 

## Affichage des menus
1. Dans le tableau de bord de Wordpress, sous le menu "Apparence", cliquez sur "Menus";
2. Dans le haut de la page, cliquez sur l'onglet "Gérer les emplacements";
3. Associez les menus de la façon suivante :
 * "Menu vertical" avec "Secondaire"
 * "Menu horizontal" avec "Primaire"
 * "Menu secondaire (par public)" avec "En complément"
4. Cliquez sur le bouton "Enregistrer les modifications";
 
Vous devriez maintenant voir les différents menus sur votre site Infosphère. Cependant, tous les liens pointent actuellement vers l'instance Infosphère de l'UQAM. Suivre la procédure suivante pour corriger les hyperliens.


## Modification en lot des hyperliens
Les hyperliens pointent tous en ce moment vers le domaine "infosphere.uqam.ca". Pour que les hyperliens pointent vers votre propre nom de domaine, plusieurs solutions sont possibles. Nous vous en proposons une intégrée à Wordpress à l'aide de l'extension "Better Search Replace".
1. Dans le tableau de bord de Wordpress, sous le menu "Outils", cliquez sur "Better Search Replace";
2. Dans la boîte "Rechercher" indiquez le nom de domaine "https://infosphere.uqam.ca";
3. Dans la boîte "Remplacer par" indiquer votre propre nom de domaine (ex. "https://universite.education.org");
4. Sélectionnez ensuite les tables "wp_postmeta" et "wp_posts". Laissez la case "Faire un essai" cochée et cliquez sur le bouton "Lancer un rechercher/remplacer";
5. Dans le haut de l'écran, l'extension vous indique le nombre de chaînes qui seront remplacées. Si vous êtes d'accord, décochez la case "Faire un essai" et cliquez à nouveau sur "Lancer un rechercher/remplacer";

Les hyperliens devraient maintenant être tous fonctionnels.

## Modification du courriel, titre et sous-titre etc.
1. Dans le tableau de bord de Wordpress, sous le menu "Apparence", cliquez sur "Personnaliser";
2. Sélectionnez l'entrée "Identité du site" et indiquez les informations liées à votre institution : titre, sous-titre, courriel, etc.