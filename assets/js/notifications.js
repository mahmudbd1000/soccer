function Notifications() {
    "use strict";

    // tooltip demo
    $('.tooltip_notifications').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
            .popover()
}
;

$(function() {
    Notifications();
});