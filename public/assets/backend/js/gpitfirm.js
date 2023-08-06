// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Get all the "Delete" buttons inside the foreach loop
    const deleteButtons = document.querySelectorAll(".btn-delete");
    const promotDdeleteButtons = document.querySelectorAll(".btn-promo-delete");
    const serviceDdeleteButtons = document.querySelectorAll(
        ".btn-service-delete"
    );
    const testimonialDdeleteButtons = document.querySelectorAll(
        ".btn-testimonial-delete"
    );
    const faqDdeleteButtons = document.querySelectorAll(".btn-faq-delete");

    // Add a click event listener to each "Delete" button
    deleteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            // Get the user ID from the data attribute
            const userId = button.dataset.userId;
            // Show the SweetAlert confirmation
            Swal.fire({
                text: `Are you sure you want to delete this user?`,
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
                    fetch(`delete/${userId}`, {
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                    }).then((response) => {
                        // Handle the response and reload the page
                        if (response.ok) {
                            Swal.fire({
                                text: "User has been deleted.",
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
                                text: "Failed to delete the user.",
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

    promotDdeleteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Get the user ID from the data attribute
            const promoId = button.dataset.promoId;

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
                    fetch(`delete/${promoId}`, {
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                    }).then((response) => {
                        // Handle the response and reload the page
                        if (response.ok) {
                            Swal.fire({
                                text: "Promo has been deleted.",
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

    serviceDdeleteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Get the user ID from the data attribute
            const serviceId = button.dataset.serviceId;

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
                    fetch(`delete/${serviceId}`, {
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                    }).then((response) => {
                        // Handle the response and reload the page
                        if (response.ok) {
                            Swal.fire({
                                text: "Service has been deleted.",
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

    testimonialDdeleteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Get the user ID from the data attribute
            const testimonialId = button.dataset.testimonialId;

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
                    fetch(`delete/${testimonialId}`, {
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

    faqDdeleteButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();

            // Get the user ID from the data attribute
            const faqId = button.dataset.faqId;
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
                    fetch(`delete/${faqId}`, {
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
});
