$(document).ready(function () {
    jQuery.validator.addMethod(
        "lettersonly",
        function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        },
        "Only alphabetical characters"
    );
    $.validator.addMethod(
        "filesize",
        function (value, element, param) {
            return (
                this.optional(element) ||
                element.files[0].size <= param * 500000
            );
        },
        "File size must be less than {0} MB"
    );

    $("#signup").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            username: {
                required: true,
                maxlength: 15,
                // RegExp: "^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$",
            },
            email: {
                required: true,
                email: true,
            },
            dob: {
                required: true,
            },
            profile: {
                required: true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            },
            password: {
                required: true,
                minlength: 8,
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            name: {
                required: "Please Enter Name",
                lettersonly: "Name should be alphabets only",
            },
            username: {
                required: "Please Enter Username",
                maxlength: "Username must be less than 15 characters",
                // RegExp: "Please follow the username format",
            },
            email: {
                required: "Please Enter Email",
                email: "Please Enter Valid Email",
            },
            dob: {
                required: "Please choose Date of Birth",
            },
            profile: {
                required: "Please upload Profile Image",
                extension: "Only jpg/png/jpeg/gif formats are allowed!!",
                filesize: "Image Size Must be less than 3MB",
            },
            password: {
                required: "Please Enter Password",
                minlength: "Password must be 8 characters long",
            },
            cpassword: {
                required: "Please Enter Password Again",
                equalTo: "Confirm Password must be same as password",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
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
    $("#login").validate({
        rules: {
            username: {
                required: true,
                maxlength: 15,
            },
            password: {
                required: true,
                minlength: 8,
            },
        },
        messages: {
            username: {
                required: "Please Enter Username",
                maxlength: "Username must be less than 15 characters",
            },
            password: {
                required: "Please Enter Password",
                minlength: "Password must be 8 characters long",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
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
    $("#account").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            username: {
                required: true,
                maxlength: 15,
            },
            email: {
                required: true,
                email: true,
            },
            profile: {
                required: true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            },
        },
        messages: {
            name: {
                required: "Please Enter Name",
                lettersonly: "Name should be in letters only",
            },
            username: {
                required: "Please Enter Username",
                maxlength: "Username must be less than 15 characters",
            },
            email: {
                required: "Please Enter Email",
                email: "Please Enter Valid Email",
            },
            profile: {
                required: "Please upload Profile Image",
                extension: "Only image type jpg/png/jpeg/gif is allowed!!",
                filesize: "Image Size Must be less than 3MB",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
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
    $("#addpost").validate({
        rules: {
            caption: {
                required: true,
                maxlength: 300,
            },
            post_image: {
                required: true,
                extension:
                    "jpg|jpeg|png|gif|mp4|ogg|ogv|avi|mpeg|mov|wmv|flv|mkv",
                filesize: 15,
            },
            post_country: {
                required: true,
            },
        },
        messages: {
            caption: {
                required: "Please Enter Description",
                maxlength: "Maximum 300 characters allowed",
            },
            post_image: {
                required: "Please upload Profile Image",
                extension:
                    "Only image or video type jpg,jpeg,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv is allowed!!",
                filesize: "File Size Must be less than 15MB",
            },
            post_country: {
                required: "Please select Post Country",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
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
