var albox = document.getElementById("alert-additional-content-5");
var okButton = document.getElementById("ok-btn");
var dismissButton = document.getElementById("close");

function redirectToviewbus1() {
    window.location.href = "viewbus1.php";
    // Remove the current page from the session history
    window.history.replaceState(null, "", "viewbus1.php");
}

function Close() {
    albox.style.opacity = 0;
    albox.style.transition = "all 3s";
    setTimeout(redirectToviewbus1, 3000); // Redirect after animation
}

okButton.addEventListener("click", Close);
dismissButton.addEventListener("click", Close);
