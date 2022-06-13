$(document).ready(function () {
    $.validator.addMethod(
        "filesize",
        function (value, element, param) {
            return (
                this.optional(element) ||
                element.files[0].size <= param * 1000000
            );
        },
        "File size must be less than {0} MB"
    );
    ("use strict");
    $("#newpost").validate({
        rules: {
            caption: {
                required: true,
                maxlength: 300,
            },
            media: {
                required: true,
                extension:
                    "jpg|jpeg|webp|png|gif|mp4|ogg|ogv|avi|mpeg|mov|wmv|flv|mkv",
                filesize: 15,
            },
        },
        messages: {
            caption: {
                required: "Please Enter Caption",
                maxlength: "Maximum 300 characters allowed",
            },
            media: {
                required: "Please upload Profile Image",
                extension:
                    "Only image or video type jpg,jpeg,webp,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv is allowed!!",
                filesize: "File than 15MB",
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
        submitHandler: function (form) {
            form.submit();
        },
    });
});
