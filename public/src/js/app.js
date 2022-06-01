var postId = 0;
var userId = 0;
$(document).ready(function () {
    $(".like").click(function (event) {
        // event.preventDefault();
        postId = event.target.dataset["pid"];
        userId = event.target.dataset["uid"];
        var isLike = event.target == null;
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

    $(function(){
        var dtToday=new Date();
        var month=dtToday.getMonth()+1;
        var day=dtToday.getDate();
        var year=dtToday.getFullYear();
        if(month<0)
        month='0'+month.toString();
        if(day<10)
        day='0'+day.toString();
        var maxDate=year + '-' + month + '-' + day;
        $('.txtDate').attr('max',maxDate);
      });
});
