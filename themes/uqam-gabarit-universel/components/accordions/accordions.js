/**
 * accordions.js
 * Fonctionnement des accordéons
 */

// Import
import './accordions.scss';
import $ from 'jquery';

$(function(){
console.log('Ouvrir un collapse');
    // Ouvrir un collapse si il est dans l'URL Pour les accordéons bootstrap
    if (window.location.hash) {
        if ($('.accordion')[0]) {
            var $target = $('body').find(window.location.hash);
            if ($target.hasClass('card-header')) {
                $('.collapse').each(function () {
                    $(this).collapse('hide');
                });
                $target.find('button').removeClass('collapsed').attr('aria-expanded',"true");
                $target.next('div').addClass('show');
            }
        }
    }

});