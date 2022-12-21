/**
 * shame.js
 * Fichier JS pour des fix rapide, shame on you
 */

// Import
import "./shame.scss";
import $ from 'jquery';

$(document).ready(function() {

    // Fix pour SAFE SVG - On remplace le double slash dans l'URL des images SVG (le double slash est créé par le plugin Safe SVG)
    $("img[src$='.svg']").each(function () {
        if($(this).attr("srcset"))
            $(this).attr("srcset", $(this).attr("srcset").replace(/([\w\?\-])(\/{2,})/gi, '$1/'));
    });

});