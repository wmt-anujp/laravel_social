$(document).ready(function () {
    $(".load-more").on("click", function () {
        var _totalCurrentResult = $(".postBox").length;
        // Ajax Reuqest
        $.ajax({
            url: main_site + "/load-more-data",
            type: "get",
            dataType: "json",
            data: {
                skip: _totalCurrentResult,
            },
            beforeSend: function () {
                $(".load-more").html("Loading...");
            },
            success: function (response) {
                var _html = "";
                var image = "{{ asset('imgs') }}/";
                $.each(response, function (index, value) {
                    _html += '<div class="col-sm-4 mb-3 postBox">';
                    _html +=
                        '<img src="' +
                        image +
                        value.image +
                        '" class="card-img-top" alt="' +
                        value.title +
                        '" />';
                    _html += '<div class="card">';
                    _html += '<div class="card-body">';
                    _html +=
                        '<h5 class="card-title">' +
                        value.id +
                        ". " +
                        value.title +
                        "</h5>";
                    _html += '<p class="card-text">' + value.summer + "</p>";
                    _html +=
                        'Price: <span class="badge badge-secondary">' +
                        value.price +
                        "</span>";
                    _html += "</div>";
                    _html += "</div>";
                    _html += "</div>";
                });
                $(".product-list").append(_html);
                // Change Load More When No Further result
                var _totalCurrentResult = $(".postBox").length;
                var _totalResult = parseInt(
                    $(".load-more").attr("data-totalResult")
                );
                console.log(_totalCurrentResult);
                console.log(_totalResult);
                if (_totalCurrentResult == _totalResult) {
                    $(".load-more").remove();
                } else {
                    $(".load-more").html("Load More");
                }
            },
        });
    });
});
