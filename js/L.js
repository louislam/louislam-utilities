/**
 * Created by Louis Lam on 8/23/2015.
 */
/// <reference path="jquery.d.ts" />
var L = (function () {
    function L() {
    }
    return L;
})();
$(document).ready(function () {
    // Smart Confirm
    $(".confirm-link").click(function (e) {
        e.preventDefault();
        var yes = confirm("Are you sure?");
        if (yes) {
            location.href = $(this).attr("href");
        }
    });
    // Ajax Link
    $(".ajax-link").click(function (e) {
        var a = $(this);
        e.preventDefault();
        $.get($(this).attr("href"), function (data) {
            var callback = a.data("ajax-callback");
            callback(data, a);
        });
    });
    $(".ajax-link-confirm").click(function (e) {
        e.preventDefault();
        var yes;
        if ($(this).hasClass("force-confirm")) {
            yes = true;
        }
        else {
            yes = confirm("Are you sure?");
        }
        if (yes) {
            var a = $(this);
            e.preventDefault();
            $.get($(this).attr("href"), function (data) {
                var callback = a.data("ajax-callback");
                callback(data, a);
            });
        }
    });
});
//# sourceMappingURL=L.js.map