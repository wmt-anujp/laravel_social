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

// $(".like").click(function (event) {
//     // console.log("hello");
// });

$(document).ready(function () {
    $(".like").click(function (event) {
        event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset["postid"];
        var isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: "POST",
            url: urlLike,
            data: { isLike: isLike, postId: postId, _token: token },
        });
        // .done(function () {
        // change the page
        // })
    });
});
