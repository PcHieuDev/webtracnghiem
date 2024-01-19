import $ from "jquery";
import Swal from 'sweetalert2';
window.Swal = Swal;

window.$ = window.jQuery = $;
require('select2');
require('select2/dist/css/select2.css');

$(document).ready(function() {
    $('.select2').select2();
});

require('bootstrap');
require('bootstrap-select');

$(document).ready(function() {
    $('.selectpicker').selectpicker();
});
require('jquery-slimscroll/jquery.slimscroll.min.js')


const Turbolinks = require("turbolinks");
Turbolinks.start();

document.addEventListener("turbolinks:load", function() {
    if (
        ($("#nav-toggle").length &&
            $("#nav-toggle").on("click", function(t) {
                t.preventDefault(), $("#db-wrapper").toggleClass("toggled");
            }),
            $(".nav-scroller").length &&
            $(".nav-scroller").slimScroll({ height: "100%" }),
            $(".notification-list-scroll").length &&
            $(".notification-list-scroll").slimScroll({ height: 300 }),
            $('[data-bs-toggle="tooltip"]').length)
    )
        [].slice
        .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        .map(function(t) {
            return new bootstrap.Tooltip(t);
        });
    if ($('[data-bs-toggle="popover"]').length)
        [].slice
        .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        .map(function(t) {
            return new bootstrap.Popover(t);
        });
    $('[data-bs-spy="scroll"]').length && [].slice
        .call(document.querySelectorAll('[data-bs-spy="scroll"]'))
        .forEach(function(t) {
            bootstrap.ScrollSpy.getInstance(t).refresh();
        });
    if ($(".offcanvas").length)
        [].slice.call(document.querySelectorAll(".offcanvas")).map(function(t) {
            return new bootstrap.Offcanvas(t);
        });
});
