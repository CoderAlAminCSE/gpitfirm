// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
  // Get all the "Delete" buttons inside the foreach loop
  const deleteButtons = document.querySelectorAll('.btn-delete');

  // Add a click event listener to each "Delete" button
  deleteButtons.forEach((button) => {
      button.addEventListener('click', (e) => {
          e.preventDefault();

          // Get the user ID from the data attribute
          const userId = button.dataset.userId;

          // Show the SweetAlert confirmation
          Swal.fire({
              text: `Are you sure you want to delete this user?`,
              icon: 'warning',
              showCancelButton: true,
              buttonsStyling: false,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel',
              customClass: {
                  confirmButton: 'btn btn-primary',
                  cancelButton: 'btn btn-danger'
              }
          }).then((result) => {
              if (result.isConfirmed) {
                  // If user confirms deletion, make an AJAX request to the delete route
                  fetch(`delete/${userId}`, {
                      method: 'GET',
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  }).then((response) => {
                      // Handle the response and reload the page
                      if (response.ok) {
                          Swal.fire({
                              text: 'User has been deleted.',
                              icon: 'success',
                              buttonsStyling: false,
                              confirmButtonText: 'Ok, got it!',
                              customClass: {
                                  confirmButton: 'btn btn-primary'
                              }
                          }).then(() => {
                              // Reload the page after successful deletion
                              location.reload();
                          });
                      } else {
                          Swal.fire({
                              text: 'Failed to delete the user.',
                              icon: 'error',
                              buttonsStyling: false,
                              confirmButtonText: 'Ok, got it!',
                              customClass: {
                                  confirmButton: 'btn btn-primary'
                              }
                          });
                      }
                  });
              }
          });
      });
  });
});
