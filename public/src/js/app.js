// comment
var postId = 0;
var bodyelement = null;
$(document).ready(function () {
    $("#comment").click(function (event) {
        event.preventDefault();
        // bodyelement=event.target.
        $("#commentmodal").modal("show");
    });
});
