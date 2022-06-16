// var paginate = 1;
// var page;
// loadMoreData(paginate);
// $("#load-more").click(function () {
//     page = $(this).data(paginate);
//     console.log("enter");
//     // console.log(page);
//     loadMoreData(page);
//     $(this).data("paginate", page + 1);
// });

// function loadMoreData(paginate) {
//     $.ajax({
//         url: "?page=" + paginate,
//         type: "get",
//         datatype: "json",
//         beforeSend: function () {
//             $("#load-more").text("Loading...");
//         },
//     })
//         .done(function (data) {
//             if (data.length == 0) {
//                 $(".invisible").removeClass("invisible");
//                 $("#load-more").hide();
//                 return;
//             } else {
//                 $("#load-more").text("Load more");
//                 $("#post").append(data);
//             }
//         })
//         .fail(function (jqXHR, ajaxOptions, thrownError) {
//             alert("Something went wrong.");
//         });
// }

// $("#load-more").click(function () {
//     $.ajax({
//         // dataType: "json",
//         type: "GET",
//         url: "{{url('user.Feed')}}",
//     }).done(function (data) {
//         var len = data.length;
//         console.log(len);
//         for (i = 0; i < data; i++) {
//             rows = rows + "data[i].url";
//         }
//         $("#morePosts").html(rows);
//     });
// });
