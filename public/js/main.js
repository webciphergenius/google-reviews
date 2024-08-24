// Ensure this script runs after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    var myModal = new bootstrap.Modal(document.getElementById("welcome_popup"));
    myModal.show();
});
