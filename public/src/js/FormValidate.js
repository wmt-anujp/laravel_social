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

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
        },
        "Please check your input."
      );

    $("#signup").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50,
                lettersonly: true,
            },
            username: {
                required: true,
                maxlength: 15,
                regex: "^[a-zA-Z0-9_.]+$",
                // RegExp:"^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$"
                // RegExp:"^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$"
            },
            email: {
                required: true,
                email: true,
                RegExp: "/^w+@[a-zA-Z_]+?.[a-zA-Z]{2,3}$/",
            },
            dob: {
                required: true,
            },
            profile: {
                required: true,
                extension: "jpg|jpeg|png|svg",
                filesize: 3,
            },
            password: {
                required: true,
                minlength: 8,
                RegExp: "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/",
            },
            cpassword: {
                required: true,
                equalTo: "#password",
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
                RegExp: "Username should contain lower,upper,_,.,numbers",
            },
            email: {
                required: "Please Enter Email",
                email: "Please Enter Valid Email",
                RegExp: "Email should contain @,should have alphbets after .",
            },
            dob: {
                required: "Please choose Date of Birth",
            },
            profile: {
                required: "Please upload Profile Image",
                extension: "Only Images are allowed!!",
                filesize: "Image Size Must be less than 3MB",
            },
            password: {
                required: "Please Enter Password",
                minlength:"Minimum 8 character are required",
                RegExp: "Password must contain lower,upper,numbers,special characters and should be 8 characters long",
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
    // login
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
    //account
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
                extension: "jpg|jpeg|png|svg",
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
    // new post
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

    // edit post
    $("#editpost").validate({
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
