var postId = 0;
var userId = 0;
$(document).ready(function () {
    $(".like").click(function (event) {
        event.preventDefault();
        postId = event.target.dataset["pid"];
        userId = event.target.dataset["uid"];
        var isLike = event.target.previousElementSibling == null;
        console.log(isLike);
        $.ajax({
            method: "POST",
            url: urllike,
            data: {
                isLike: isLike,
                postId: postId,
                userId: userId,
                _token: token,
            },
        }).done(function (event) {
            event.target.innerText = isLike
                ? event.target.innerText == "Like"
                    ? "Liked"
                    : "Like"
                : event.target.innerText == "Dislike"
                ? "Disliked"
                : "Dislike";
            if (isLike) {
                event.target.nextElementSibling.innerText = "Dislike";
            } else {
                event.target.previousElementSibling.innerText = "Like";
            }
        });
    });
});
