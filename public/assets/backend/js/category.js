const siteDeleteButtons = document.querySelectorAll(".btn-category-delete");
siteDeleteButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();

        // Get the user ID from the data attribute
        const deleteId = button.dataset.categoryId;
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
                            text: "Category has been deleted.",
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
