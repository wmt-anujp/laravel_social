// // comment
// var postId = 0;
// var bodyelement = null;
// $(document).ready(function () {
//     $("#comment").click(function (event) {
//         event.preventDefault();
//         // bodyelement=event.target.
//         postId = event.target.dataset["anuj"];
//         $("#commentmodal").modal("show");
//     });

//     $("#modalsave").click(function () {
//         $.ajax({
//             method: "POST",
//             url: urlcomment,
//             data: {
//                 body: $("#body").val(),
//                 postId: postId,
//                 _token: token,
//             },
//         }).done(function (msg) {
//             $(bodyelement).text(msg["body"]);
//             $("#commentmodal").modal("hide");
//         });
//     });
// });
