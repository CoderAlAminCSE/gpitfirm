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
});
