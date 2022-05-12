var postId = 0;
var postBodyElement = null;
$(document).ready(function () {
    $(".edit").click(function (event) {
        // console.log(event);
        event.preventDefault();
        postBodyElement = event.target.parentNode.parentNode.childNodes[3];
        // console.log(postBodyElement);
        var postBody = postBodyElement.textContent;
        // console.log(postBody);
        postId = event.target.parentNode.parentNode.dataset["anuj"];
        // console.log(postId);
        $("#post-body").val(postBody);
        $("#editmodal").modal("show");
    });

    $("#modalsave").click(function () {
        $.ajax({
            method: "POST",
            url: urlEdit,
            data: {
                body: $("#post-body").val(),
                postId: postId,
                _token: token,
            },
        }).done(function (msg) {
            $(postBodyElement).text(msg["new-body"]);
            $("#editmodal").modal("hide");
        });
    });
});

// $(".like").click(function (event) {
//     // console.log("hello");
// });

$(".like").click(function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset["postid"];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: "POST",
        url: urlLike,
        data: { isLike: isLike, postId: postId, _token: token },
    }).done(function () {
        // change the page
        event.target.innerText = isLike
            ? event.target.innerText == "Like"
                ? "You have already liked this Post"
                : "Like"
            : event.target.innerText == "Dislike"
            ? "You don't like this post"
            : "Dislike";
        if (isLike) {
            event.target.nextElementSibling.innerText = "Dislike";
        } else {
            event.target.previousElementSibling.innerText = "Like";
        }
    });
});
