/**
 * Created by Louis Lam on 8/23/2015.
 */

/// <reference path="jquery.d.ts" />
class L {

}

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
        var a = $(this)
        e.preventDefault();

        $.get($(this).attr("href"), function (data) {
            var callback = a.data("ajax-callback");
            callback(data, a);
        })
    })

    $(".ajax-link-confirm").click(function (e) {

        e.preventDefault();

        var yes;
        if ($(this).hasClass("force-confirm")) {
            yes = true;
        } else {
            yes = confirm("Are you sure?");
        }

        if (yes) {
            var a = $(this);
            e.preventDefault();

            $.get($(this).attr("href"), function (data) {
                var callback = a.data("ajax-callback");
                callback(data, a);
            })
        }
    })

    $(".ajax-link-prompt").click(function (e) {

        e.preventDefault();

        var yes;
        if ($(this).hasClass("force-confirm")) {
            yes = $(this).data("msg-input");
        } else {
            yes = prompt($(this).data("msg"));
        }

        if (yes != null) {
            var a = $(this);
            e.preventDefault();

            $.get($(this).attr("href"), { "msg": yes },function (data) {
                var callback = a.data("ajax-callback");
                callback(data, a);
            })
        }
    })

});