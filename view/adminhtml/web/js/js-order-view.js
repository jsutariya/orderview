define([
    "jquery",
    "jquery/ui",
    "Magento_Ui/js/modal/modal"
], function($) {
    'use strict';

    return function (config) {
        var options = {
            type: config.popupType,
            responsive: true,
            innerScroll: true,
            modalClass: config.modalClass,
            buttons: [],
            opened: function ($Event) {
                $(".modal-footer").hide();
            }
        };

        $(document).ready(function () {
            $('body').on("click", ".order-quick-view > a.action-menu-item", function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr("href"),
                    type: "GET",
                    showLoader: true
                }).done(function (data) {
                    $('#order_quick_view').html(data).modal(options).modal('openModal');
                });
            });
        });
    };
});