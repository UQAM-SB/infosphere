/**
 * tableau.js
 * Solution pour les tableau sur mobile
 */

// Import
import './tableau.scss';
import $ from 'jquery';
require('tablesorter');

$(function () {
    $(document).ready(function () {
        $(window).resize(function () {
            update();
        });
        init();
    });

    function init() {
        let count = 0;
        $(".content-center table").each(function () {
            if ($(this).width() > $("#main-content").width()) {
                count++;
                let degradeDroit = $("<div class='degrade droit'></div>");
                let degradeGauche = $("<div class='degrade gauche'></div>");
                let wrapper = $("<div class='scrollableTable'></div>");
                $(this).wrap(wrapper);
                degradeDroit.insertBefore($(this));
                degradeGauche.insertBefore($(this));
                appliquerDegrade($(this).parent(".scrollableTable"));
            }
        });

        $(".scrollableTable table").scroll(function () {
            appliquerDegrade($(this).parent('.scrollableTable'));
        });
    }

    function update() {
        $("div.scrollableTable").each(function () {
            appliquerDegrade($(this));
        });
    }

    function appliquerDegrade(wrapper) {
        let maxDegrade = 20;
        let largeurCalculee = maxDegrade;
        let tableau = wrapper.children("table").first();
        if (typeof tableau.width() === "number") {
            largeurCalculee = tableau.scrollLeft() / (tableau.get(0).scrollWidth - tableau.width()) * maxDegrade;
            largeurCalculee = largeurCalculee > maxDegrade ? maxDegrade : largeurCalculee;
        }
        wrapper.children(".degrade.droit").css('width', maxDegrade - largeurCalculee + '%');
        wrapper.children(".degrade.gauche").css('width', largeurCalculee + '%');

        // On corrige la position du wrapper si les éléments précédents sont flottants
        if (wrapper.prev().css("float") != "none") {
            wrapper.css("float", "left");
        }
    }


    //TABLESORTER
    $('.is-style-nonSortable table').tablesorter({
        headers: {
            'th' : {
                sorter: false
            }
        },
        widgets: [ 'stickyHeaders' ],
    });
    $('.is-style-sortable table, table.dataTable').tablesorter({
        headers: {
            'th' : {
                sorter: true
            }
        },
        widgets: [ 'stickyHeaders' ],
    });
});