$(document).ready(function () {
    // login
    $("#adminLogin").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please Enter Email",
            },
            password: {
                required: "Please Enter Password",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            error.addClass("invalid-feedback");
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
    });
});
