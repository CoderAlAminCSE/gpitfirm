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

  alert("Link copied to clipboard!");
}