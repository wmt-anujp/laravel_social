$(document).ready(function () {
    jQuery.validator.addMethod(
        "lettersonly",
        function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        },
        "Only alphabetical characters"
    );
    $.validator.addMethod("filesize", function (value, element, param) {
        return (
            this.optional(element) || element.files[0].size <= param * 100000
        );
    });

    $.validator.addMethod("regex", function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });

    // SIGNUP
    $("#usersignup").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50,
                lettersonly: true,
            },
            username: {
                required: true,
                maxlength: 15,
                regex: "[A-Za-z][a-z0-9_]{7,29}$",
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                regex: "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@])(?=.{8,})",
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
            profile: {
                required: true,
                extension: "jpg|jpeg|png|svg",
                filesize: 10,
            },
        },
        messages: {
            name: {
                required: "Please Enter Name",
                maxlength: "Maximum 50 characters are allowed",
                lettersonly: "Name should be alphabets only",
            },
            username: {
                required: "Please Enter Username",
                maxlength: "Maximum 15 characters are allowed",
                regex: "Only lower,upper,_,and numbers are allowed",
            },
            email: {
                required: "Please Enter Email",
                email: "Email should contain @,should have alphabets after .",
            },
            password: {
                required: "Please Enter Password",
                regex: "Password must contain lower,upper,numbers,special characters and should be 8 characters long",
            },
            cpassword: {
                required: "Please Enter Password Again",
                equalTo: "Confirm Password must be same as Password",
            },
            profile: {
                required: "Please upload Profile Image",
                extension: "Only Images are allowed!!",
                filesize: "Image Size Must be less than 10MB",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.insertAfter(element);
            error.addClass("invalid-feedback");
        },
        highlight: function (element, errorClass, validClass) {
            // $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
    // login
    $("#userlogin").validate({
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

    // edit Account
    $("#editaccount").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50,
                lettersonly: true,
            },
            username: {
                required: true,
                maxlength: 15,
                regex: "[A-Za-z][a-z0-9_]{7,29}$",
            },
            profile: {
                extension: "jpg|jpeg|png|svg|webp",
                filesize: 10,
            },
        },
        messages: {
            name: {
                required: "Please Enter Name",
                maxlength: "Maximum 50 characters are allowed",
                lettersonly: "Name should be alphabets only",
            },
            username: {
                required: "Please Enter Username",
                maxlength: "Maximum 15 characters are allowed",
                regex: "Only lower,upper,_,and numbers are allowed",
            },
            profile: {
                extension:
                    "Only jpg,webp,png,jpeg,svg image extension are allowed",
                filesize: "Image Size Must be less than 10MB",
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
