/**
 * menuHorizontal.js
 */

// Import
import './menuHorizontal.scss';
import $ from 'jquery';

$(document).ready(function() {

    const $dropdown = $("#horizontal-menu .dropdown");
    const $dropdownToggle = $("#horizontal-menu .dropdown-toggle");
    const $dropdownMenu = $("#horizontal-menu .dropdown-menu");
    const showClass = "show";

    $dropdown.hover(
        function() {
            const $this = $(this);
            $this.addClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "true");
            $this.children($dropdownMenu).addClass(showClass);
        },
        function() {
            const $this = $(this);
            $this.removeClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "false");
            $this.children($dropdownMenu).removeClass(showClass);
        }
    );


});

