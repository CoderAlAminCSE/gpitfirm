const deleteButtons = document.querySelectorAll(".btn-contactMessage-delete");
deleteButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();

        // Get the user ID from the data attribute
        const deleteId = button.dataset.contactId;
        // Show the SweetAlert confirmation
        Swal.fire({
            text: `Are you sure you want to delete?`,
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms deletion, make an AJAX request to the delete route
                fetch(`delete/${deleteId}`, {
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                }).then((response) => {
                    // Handle the response and reload the page
                    if (response.ok) {
                        Swal.fire({
                            text: "Testimonial has been deleted.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        }).then(() => {
                            // Reload the page after successful deletion
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: "Failed to delete.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Get modal and input element
    const modal = document.getElementById("kt_modal_newsletter_email");
    const contactIdInputs = modal.querySelectorAll('[name="contactMessageId"]');
    const replyButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

    replyButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const contactId = button.getAttribute("data-contact-id");
            const emailInput = document.getElementById("email");
            const contactEmail = button.getAttribute("data-contact-email");
            if (emailInput) {
                emailInput.value = contactEmail;
            }

            contactIdInputs.forEach((input) => {
                input.value = contactId;
            });
        });
    });
});
