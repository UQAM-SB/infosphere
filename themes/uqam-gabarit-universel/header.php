<?php
/**
 * header.php
 */
?>
<!doctype html>
<html lang="fr">
<head>

	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="web_author" content="Service Audiovisuel">
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

    <style>
        :root{
            --global-title-color: <?php couleurTitre(); ?>;
            --global-text-color: <?php couleurTexte(); ?>;
            --global-link-color: <?php couleurLien(); ?>;
            --global-accordion-color: <?php couleurAccordeon(); ?>;
            --global-accordion-color-alt: <?php couleurAccordeonAlt(); ?>;
            --global-accordion-color-text: <?php couleurAccordeonText(); ?>;
            --menu-bg-color: <?php menuColor(); ?>;
            --menu-bg-color-2: <?php menuColor2e(); ?>;
            --menu-text-color: <?php menuTextColor(); ?>;
            --menu-bg-color-horizontal: <?php menuColorHorizontal(); ?>;
            --menu-bg-color-2-horizontal: <?php menuColor2eHorizontal(); ?>;
            --menu-text-color-horizontal: <?php menuTextColorHorizontal(); ?>;
            --menu-color-mobile: <?php menuColorMobile(); ?>;
            --menu-color-mobile-active: <?php menuColorMobileActive(); ?>;
            --menu-color-2-mobile: <?php menuColor2eMobile(); ?>;
            --banner-bg-color: <?php bannerColor(); ?>;
            --banner-bg-image: url(<?php bannerBGImage(); ?>);
            --banner-height: <?php bannerHeight(); ?>;
            --banner-height-lg: calc(var(--banner-height) / 1.25);
            --col-left-title-color: <?php colLeftTitleColor(); ?>;
            --col-left-text-color: <?php colLeftTextColor(); ?>;
            --col-left-icon-color: <?php colLeftIconColor(); ?>;
            --col-left-link-color: <?php colLeftLinkColor(); ?>;
            --col-left-bg-color: <?php colLeftBgColor(); ?>;
            --col-left-separators: <?php colSeparatorColor(); ?>;
            --col-right-title: <?php colRightTitre(); ?>;
            --col-right-bg-title: <?php colRightBgTitre(); ?>;
            --col-right-border-color: <?php colRightBorderColor(); ?>;
            --home-title: <?php couleurTitreAccueil(); ?>;
            --home-bg-title: <?php couleurBgTitreAccueil(); ?>;
            --home-bg-link-title: <?php couleurBgLienTitreAccueil(); ?>;
        }
    </style>

</head>

<body <?php body_class(); ?>>
    <div id="mainframe">
	    <?php locate_template( 'components/header/header-uqam.php', true ); ?>
        <?php locate_template( 'components/breadcrumb/breadcrumb.php', true ); ?>