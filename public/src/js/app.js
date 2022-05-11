// function editfunction() {
//     $("#editmodal").modal("show");
// }
$(document).ready(function () {
    $(".edit").click(function (event) {
        event.preventDefault();
        var postBody =
            event.target.parentNode.parentNode.childNodes[1].textContent;
        postId = event.target.parentNode.parentNode.dataset["post_id"];
        console.log(postId);
        $("#post-body").val(postBody);
    });
    $("#modalsave").click(function () {
        $.ajax({
            method: "POST",
            url: url,
            data: { body: $("#post-body").val(), postId: "" },
        });
    });
});
