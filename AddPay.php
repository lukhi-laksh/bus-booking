<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);
$errors = []; // Array to store error messages

// Fetch the amount from the database using the id passed via the URL
if (isset($_GET['id'])) {
    // Sanitize the id to prevent SQL injection
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
    
    // Prepare the SQL query using the retrieved id
    $sqlget = "SELECT * FROM route WHERE id = '$id'";
    
    // Execute the query
    $sqldata = mysqli_query($conn, $sqlget) or die('Error getting data');
    
    // Fetch the result and store the 'cost'
    if ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
        $amount = $row['cost'];
    } else {
        echo "No data found for the provided ID.";
        exit; // Stop further execution if no data is found
    }
} else {
    echo "No ID provided in the URL.";
    exit; // Stop further execution if no ID is provided
}

// Handle form submission
if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cname = $_POST['cardName'];
    $cnumber = $_POST['cardNumber'];
    $expM = $_POST['expM'];
    $expY = $_POST['expYear'];
    $cvv = $_POST['cvv'];

    // Validate inputs
    if (!preg_match('/^\d{6}$/', $zip)) {
        $errors['zip'] = "Invalid ZIP code format.";
    }
    
    if (!preg_match('/^\d{16}$/', $cnumber)) {
        $errors['cardNumber'] = "Credit card number must be 16 digits.";
    }

    if (!preg_match('/^\d{3}$/', $cvv)) {
        $errors['cvv'] = "CVV must be 3 digits.";
    }

    if ($expY <= 2023) {
        $errors['expYear'] = "Expiration year must be greater than 2023.";
    }

    if (empty($errors)) {
        if ($conn->connect_error) {
            die('Connection Failed :' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO payment(amount, name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("isssssissssi", $amount, $name, $email, $address, $city, $state, $zip, $cname, $cnumber, $expM, $expY, $cvv);
            $stmt->execute();

            // Redirecting to the success page
            header("Location: paySucess.php");
            exit; // Ensure the script terminates after redirect
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfile/payment.css">
</head>
<body>

<div class="container">
    <form method="POST">
        <div class="row">
            <div class="col">
                <h3 class="title">Billing Address</h3>
                <div class="inputBox">
                    <span>Amount You Pay :</span>
                    <input type="number" value="<?php echo htmlspecialchars($amount); ?>" name="amount" readonly>
                </div>
                <div class="inputBox">
                    <span>Name :</span>
                    <input type="text" value="<?php echo htmlspecialchars($user_data['username']); ?>" name="name" readonly>
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" name="email" readonly>
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="address"  >
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" placeholder="Mumbai" name="city"  >
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" placeholder="India" name="state"  >
                    </div>
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" placeholder="123456" name="zip"  >
                        <?php if (isset($errors['zip'])): ?>
                            <div style="color: red;"><?php echo $errors['zip']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col">
                <h3 class="title">Payment</h3>
                <div class="inputBox">
                    <span>Cards Accepted :</span>
                    <img src="image/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name on Card :</span>
                    <input type="text" placeholder="Mr. John Doe" name="cardName"  >
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="text" placeholder="1111-2222-3333-4444" name="cardNumber"  >
                    <?php if (isset($errors['cardNumber'])): ?>
                        <div style="color: red;"><?php echo $errors['cardNumber']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="inputBox">
                    <span>Exp Month :</span>
                    <input type="text" placeholder="January" name="expM"  >
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" placeholder="2024" name="expYear"  >
                        <?php if (isset($errors['expYear'])): ?>
                            <div style="color: red;"><?php echo $errors['expYear']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" name="cvv"  >
                        <?php if (isset($errors['cvv'])): ?>
                            <div style="color: red;"><?php echo $errors['cvv']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Proceed to Checkout" class="submit-btn" name="checkout">
    </form>
</div>

</body>
</html>
