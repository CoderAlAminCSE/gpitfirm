function copyLink(button) {
    const linkToCopy = button.getAttribute("data-link");
    const currentURL = window.location.origin; // Get the current website's URL
    const fullLinkToCopy = currentURL + "/invoice/" + linkToCopy;

    const tempInput = document.createElement("input");
    tempInput.value = fullLinkToCopy;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toastr-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    toastr.success("Invoice link copied successfully");
}
