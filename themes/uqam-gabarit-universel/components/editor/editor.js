/**
 * editor.js
 * Import tous les élément JS pour l'ADMIN de Wordpress
 */

// Import
import "./editor.scss";
import $ from 'jquery';

$(document).ready(function() {

    // GUTENBERG
    if(wp.blocks){
        // -- Bouton
        wp.blocks.unregisterBlockStyle(
            'core/button',
            [ 'default', 'outline', 'squared', 'fill' ]
        );
        wp.blocks.registerBlockStyle(
            'core/button',
            [
                {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
                },
                {
                    name: 'fleche',
                    label: 'Avec flèche',
                }
            ]
        );

        // -- Tableau
        wp.blocks.unregisterBlockStyle(
            'core/table',
            [ 'regular', 'stripes' ]
        );
        wp.blocks.registerBlockStyle(
            'core/table',
            [
                {
                    name: 'nonSortable',
                    label: 'non Sortable',
                    isDefault: true,
                },
                {
                    name: 'sortable',
                    label: 'Sortable',
                }
            ]
        );
    }


});