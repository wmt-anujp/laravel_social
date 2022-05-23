// update starts
var postId = 0;
var postBodyElement = null;
$(document).ready(function () {
    $(".edit").click(function (event) {
        event.preventDefault();
        postBodyElement = event.target.parentNode.parentNode.childNodes[3];
        var postBody = postBodyElement.textContent;
        postId = event.target.parentNode.parentNode.dataset["anuj"];
        $("#body").val(postBody);
        $("#editmodal").modal("show");
    });

    $("#modalsave").click(function () {
        $.ajax({
            method: "POST",
            url: urlEdit,
            data: {
                body: $("#body").val(),
                postId: postId,
                _token: token,
            },
        }).done(function (msg) {
            // console.log(msg["new-body"]);
            $(postBodyElement).text(msg["new-body"]);
            $("#editmodal").modal("hide");
        });
    });
});
// update ends

// Like dislike parts starts
$(document).ready(function () {
    $(".like").click(function (event) {
        // event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset["anuj"];
        var isLike = event.target.previousElementSibling == null;
        console.log(isLike);
        $.ajax({
            method: "POST",
            url: urlLike,
            data: {
                isLike: isLike,
                postId: postId,
                _token: token,
            },
        }).done(function (event) {
            event.target.innerText = isLike
                ? event.target.innerText == "Like"
                    ? "You have already liked this Post"
                    : "Like"
                : event.target.innerText == "Dislike"
                ? "You disliked this post"
                : "Dislike";
            if (isLike) {
                event.target.nextElementSibling.innerText = "Dislike";
            } else {
                event.target.previousElementSibling.innerText = "Like";
            }
        });
    });
});
// like dislike ends
