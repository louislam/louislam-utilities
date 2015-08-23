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
});
//# sourceMappingURL=L.js.map