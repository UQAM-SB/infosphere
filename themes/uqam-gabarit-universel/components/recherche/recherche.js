/**
 * recherche.js
 */

// Import
import "./recherche.scss";
import $ from 'jquery';

$(document).ready(function() {
    $('.uqamRecherche__choix').addClass('d-md-inline-block');

    $('.dropdown-item').click(function(){
        $('form.uqamRecherche').attr('action', '/'+$(this).attr('name')+'/');
        $('.uqamRecherche__champ')
            .attr('placeholder', $(this).find('span').text())
            .attr('aria-label', $(this).find('span').text());
    })
});