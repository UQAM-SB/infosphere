/**
 * menuMobile.js
 * Tout ce qui concerne le menu principal lorsque nous somme dans la version mobile
 */

// Import
import './menuMobile.scss';
import $ from 'jquery';

$(document).ready(function () {

    //Animation
    $('.dropdown').on({
        "show.bs.dropdown": function (e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
        },
        "hide.bs.dropdown": function (e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
        }
    });

    // ARIA + active class
    $('.menu li .sub-menu').attr('aria-label', 'Sous-menu');
    $('.menu li.current-menu-ancestor').addClass('active');
    $('.menu li.current-menu-ancestor>a').addClass('active');
    $('.menu li.current-menu-parent>a').addClass('active');
    $('.menu .menu-item-has-children>a').attr('aria-haspopup', 'true');
    $('.menu li.menu-item-has-children>a').click(function (e) {
        e.preventDefault();
        $(this).next('ul').slideDown();
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).parent().removeClass('active');
            $(this).next('ul').slideUp();
        } else {
            $(this).addClass('active');
            $(this).parent().addClass('active');
            $(this).next('ul').slideDown();
        }
        return false;
    })
});