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
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            email: {
                required: "Please enter your Email id",
                email: "Please enter valid email id",
            },
            password: {
                required: "Please Create password",
                minlength: "Password must of 8 characters",
            },
            cpassword: {
                required: "Please Enter Above Password Correctly",
                equalTo:
                    "Confirm Password should match the above entered password",
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

    // $validator.addMethod(
    //     "filesize",
    //     function (value, element, param) {
    //         return (
    //             this.optional(element) ||
    //             element.files[0].size <= param * 100000
    //         );
    //     },
    //     "File size must be less then {0} MB"
    // );

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

    $("#add_author_form").validate({
        rules: {
            a_fname: {
                required: true,
                maxlength: 100,
            },
            a_lname: {
                required: true,
                maxlength: 100,
            },
            a_dob: {
                required: true,
            },
            a_gen: {
                required: true,
            },
            a_address: {
                required: true,
                maxlength: 300,
            },
            a_mobile_no: {
                required: true,
                number: true,
            },
            a_desc: {
                required: true,
                maxlength: 300,
            },
        },
        messages: {
            a_fname: {
                required: "Please Enter Authors First Name",
                maxlength: "Maximum 100 characters are allowed",
            },
            a_lname: {
                required: "Please Enter Authors last Name",
                maxlength: "Maximum 100 characters are allowed",
            },
            a_dob: {
                required: "Please Select Authors Date of Birth",
            },
            a_gen: {
                required: "Please Select Gender of Author",
            },
            a_address: {
                required: "Please Enter Address of Author",
                maxlength: "Maximum 300 characters allowed",
            },
            a_mobile_no: {
                required: "Please Enter Mobile no. of Author",
                number: "Mobile no should be in numbers only",
            },
            a_desc: {
                required: "Please Enter Description about author",
                maxlength: "Maximum 300 characters allowed",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#add_book_form").validate({
        rules: {
            b_title: {
                required: true,
            },
            b_pages: {
                required: true,
                number: true,
            },
            b_lang: {
                required: true,
            },
            "b_author[]": {
                required: true,
            },
            b_img: {
                required: true,
            },
            b_isbn: {
                required: true,
                maxlength: 13,
            },
            b_desc: {
                required: true,
                maxlength: 300,
            },
            b_price: {
                required: true,
                number: true,
            },
        },
        messages: {
            b_title: {
                required: "Please Enter Book Title",
            },
            b_pages: {
                required: "Please Enter Number of Pages in Book",
                number: "Pages Should be in numbers only",
            },
            b_lang: {
                required: "Please Enter Book Language",
            },
            "b_author[]": {
                required: "Please select Author Name of Book",
            },
            b_img: {
                required: "Please Select Cover Image of Book",
            },
            b_isbn: {
                required: "Please Enter ISBN Number of Book",
                maxlength: "Length of ISBN number should be 13 digit",
            },
            b_desc: {
                required: "Please Enter Description of Book",
                maxlength: 300,
            },
            b_price: {
                required: "Please Enter Book Price",
                number: "Book Price Should be in number only",
            },
        },

        submitHandler: function (form) {
            form.submit();
        },
    });
});
