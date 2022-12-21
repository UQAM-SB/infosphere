/**
 * gutenberg.js
 * Correction en JS de bloc qui ne fonctionne pas bien
 */

// Import
import "./gutenberg.scss";
import $ from 'jquery';

$(document).ready(function() {

    // Fichier - Ajout du type de fichier à la fin du lien
    $('.wp-block-file a:first-child').each(function(){
        var fichier_str = $(this).attr('href');
        var fichier_type = fichier_str.substr( (fichier_str.lastIndexOf('.') +1) );
        $(this).append(' ('+fichier_type+')');
    });


    // ADVANCED GUTENBERG
    // -- Testimonials
    $('.advgb-testimonial-avatar').each(function(){
        let imgurl = $(this).css('background-image');
        imgurl =  imgurl.replace('url(','').replace(')','').replace(/\"/gi, "");
        $(this).append('<img src="'+ imgurl +'" style="max-width: 120px;" />');
        $(this).css({'background': 'none'});
    });
    $('button.advgb-slider-arrow').each(function(){
        if($(this).hasClass('advgb-slider-next'))
            $(this).attr('aria-label', 'Suivants');
        else if($(this).hasClass('advgb-slider-prev'))
            $(this).attr('aria-label', 'Précédents');
    })

    // -- Tabs
    $('ul.advgb-tabs-panel li a').each(function(){
        let identifiant = $(this).attr('href').substr(1);
        $(this).attr('id', identifiant);
    });

});

