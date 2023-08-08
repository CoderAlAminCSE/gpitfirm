$(document).ready(function () {
    $("#newsletterSubmitBtn").on("click", function (e) {
        e.preventDefault();
        var email = $("#email").val();
        var formUrl = $("#newsletter_form_url").val();

        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            url: formUrl,
            data: {
                email: email,
            },
            success: function (data) {
                console.log(data.value + " " + data.status);
                $("#newsletterSuccessMessage").removeClass("d-none");
            },
            error: function (request, status, error) {
                console.log(error);
            },
        });
    });

    $("#contactFormSubmitBtn").on("click", function (e) {
        e.preventDefault();
        $("#send_btn_spinner").removeClass("d-none");

        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var url = $("#contact_form_url").val();
        var isValid = true;

        if (!name) {
            $("#nameError").html("Name is required");
            isValid = false;
        }
        if (!email) {
            $("#emailError").html("Email is required!");
            isValid = false;
        }
        if (!message) {
            $("#messageError").html("Message is required!");
            isValid = false;
        }

        if (!isValid) {
            $("#send_btn_spinner").addClass("d-none");
            return false;
        }

        $(this).prop("disabled", true);

        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            url: url,
            data: {
                name: name,
                email: email,
                message: message,
            },
            success: function (data) {
                $("#contactFormSubmitBtn").prop("disabled", false);
                $("#send_btn_spinner").addClass("d-none");

                if ($.isEmptyObject(data.error)) {
                    if (data.status == 200) {
                        $("#name").val("");
                        $("#email").val("");
                        $("#message").val("");
                        console.log("email send successfully");
                    }
                } else {
                    $("#send_btn_spinner").addClass("d-none");
                    $("#contactFormSubmitBtn").prop("disabled", false);
                    printErrorMsg(data.error);
                    alert("check validation");
                }
            },
            error: function (request, status, error) {
                $("#send_btn_spinner").addClass("d-none");
                $("#contactFormSubmitBtn").prop("disabled", false);
                console.log(error);
                alert("check validation");
            },
        });
    });
});
