<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Completed</title>
    <link rel="stylesheet" href="cssfile/paySucess.css">
</head>

<body>
    <div class="container">
        <div id="alert-additional-content-5" class="alert-box" role="alert">
            <div class="img">
                <img class="img" src="image/869563.png">
            </div>
            <div class="alert">
                <i class="fa-solid fa-circle-check ico"></i>
                <h3>Payment Successful !!!</h3>
            </div>
            <div class="alert-content alert">
                Your payment was successful, and thank you for getting a ticket from us.
            </div>
            <div class="alert">
                <button type="button" class="button" id="ok-btn">
                    <i class="fa-solid fa-eye"></i>
                    Ok
                </button>
                <button type="button" class="dismiss-btn" id="close">Dismiss</button>
            </div>
        </div>
    </div>
    <script>
        var albox = document.getElementById("alert-additional-content-5");
        var okButton = document.getElementById("ok-btn");
        var dismissButton = document.getElementById("close");

        function redirectToviewbus1() {
            // Replace the current page with viewbus1.php in the history
            window.location.href = "viewbus1.php";
            window.history.replaceState(null, "", "viewbus1.php");
        }

        function Close() {
            albox.style.opacity = 0;
            albox.style.transition = "all 3s";
            setTimeout(redirectToviewbus1, 3000); // Redirect after animation
        }

        okButton.addEventListener("click", Close);
        dismissButton.addEventListener("click", Close);
    </script>
</body>

</html>
