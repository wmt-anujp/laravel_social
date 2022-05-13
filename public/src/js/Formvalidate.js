$(document).ready(function () {
    jQuery.validator.addMethod(
        "lettersonly",
        function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        },
        "Only alphabetical characters"
    );
    $("#signup").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            name: {
                required: "Please Enter Your Name",
                lettersonly: "Name should only contain alphabets",
            },
            email: {
                required: "Please Enter your Email ID",
                email: "Please Enter valid email id",
            },
            password: {
                required: "Please create password",
                minlength: "Password must of 8 characters",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#login").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            email: {
                required: "Please Enter your Email ID",
                email: "Please Enter valid Email id",
            },
            password: {
                required: "Please Enter Your Password",
                minlength: "Password must of 8 characters",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#createpost").validate({
        rules: {
            body: {
                required: true,
                maxlength: 1000,
            },
        },
        messages: {
            body: {
                required: "Please enter some text to post",
                maxlength: "Maximum 1000 characters are allowed",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    // $validator.addMethod;
    "filesize",
        function (value, element, param) {
            return (
                this.optional(element) ||
                element.files[0].size <= param * 100000
            );
        },
        "File size must be less then {0} MB";

    $("#account").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            image: {
                required: true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            },
        },
        messages: {
            name: {
                required: "Please Enter Your Name",
                lettersonly: "Only alphabets are allowed ",
            },
            image: {
                required: "Please choose an image",
                extension: "Only jpg|jpeg|png|gif image formats are allowed",
                filesize: "Image size should not be more than 3MB",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#posteditform").validate({
        rules: {
            body: {
                required: true,
                maxlength: 1000,
            },
        },
        messages: {
            body: {
                required: "Please enter some text to post",
                maxlength: "Maximum length for post is 1000",
            },
        },
        submitHandler: function (form) {
            // form.submit();
            console.log;
            $.ajax({
                method: "POST",
                url: urlEdit,
                data: {
                    body: $("#body").val(),
                    postId: postId,
                    _token: token,
                },
            }).done(function (msg) {
                // console.log(msg["new-body"]);
                $(postBodyElement).text(msg["new-body"]);
                $("#editmodal").modal("hide");
            });
        },
    });
});
