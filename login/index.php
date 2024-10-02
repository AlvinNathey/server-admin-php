<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <style>
        /* Modal Hidden by Default */
        .modal {
            display: none;
        }
        .modal-active {
            display: block;
        }
    </style>
</head>
<body>
    <div>
    <section
    class="ezy__login flex items-center justify-center py-14 md:py-24 text-black bg-cover bg-center bg-no-repeat relative"
    style="background-image: url('https://images.unsplash.com/photo-1610242614713-4d135e71b87d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080')"
    >
    <div class="container px-4 mx-auto">
        <div class="flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3">
            <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="flex flex-col items-center">
                <div class="w-full mb-6">
                <h2 class="text-[28px] leading-none font-bold text-center text-gray-800 mb-4">Welcome Back</h2>
                <p class="text-center text-gray-500">Please log in to your account</p>
                </div>
                <div class="w-full mb-6">
                <img
                    src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800"
                    alt="Login Illustration"
                    class="w-full rounded-lg object-cover"
                />
                </div>
                <form class="w-full" method="POST" action="">
                    <div class="relative mb-4">
                        <input
                        type="text"
                        class="border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 text-sm w-full py-2 px-4"
                        id="username"
                        name="username"
                        placeholder="Username or Email"
                        />
                    </div>
                    <div class="relative mb-6">
                        <input
                        type="password"
                        class="border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 text-sm w-full py-2 px-4"
                        id="password"
                        name="password"
                        placeholder="Password"
                        />
                    </div>

                    <input type="submit" class="bg-blue-600 py-3 px-6 text-white font-semibold w-full rounded-md hover:bg-blue-700 transition duration-300" value="Login">

                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-500">
                        Don't have an account?
                        <a href="signup.php" class="text-blue-600 hover:underline">Sign Up</a>
                        </p>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    </div>

    <!-- Modal for Login Failure -->
    <div id="failureModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/3">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold">Login Failed</h2>
                <button id="closeFailureModal" class="text-gray-500">&times;</button>
            </div>
            <p class="mt-4">Invalid username or password. Please try again.</p>
        </div>
    </div>

    <!-- Modal for Login Success -->
    <div id="successModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/3">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold">Login Successful!</h2>
                <button id="closeSuccessModal" class="text-gray-500">&times;</button>
            </div>
            <p class="mt-4">You will be redirected shortly.</p>
        </div>
    </div>

<?php
require '../config/database.php';

$db = new Database();
$showFailureModal = false; // Variable to control failure modal display
$showSuccessModal = false; // Variable to control success modal display

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($db->login($username, $password)) {
        $showSuccessModal = true; // Show success modal
        // Add a short delay before redirection
        echo '<script>
            setTimeout(function() {
                window.location.href = "dashboard.php"; // Change this to your target page
            }, 2000); // 2 seconds delay
        </script>';
    } else {
        $showFailureModal = true; // Show failure modal
    }
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const failureModal = document.getElementById("failureModal");
        const closeFailureModal = document.getElementById("closeFailureModal");

        const successModal = document.getElementById("successModal");
        const closeSuccessModal = document.getElementById("closeSuccessModal");

        <?php if ($showFailureModal): ?>
            failureModal.classList.add("modal-active"); // Show failure modal
        <?php endif; ?>

        <?php if ($showSuccessModal): ?>
            successModal.classList.add("modal-active"); // Show success modal
        <?php endif; ?>

        closeFailureModal.addEventListener("click", function() {
            failureModal.classList.remove("modal-active"); // Hide failure modal
        });

        closeSuccessModal.addEventListener("click", function() {
            successModal.classList.remove("modal-active"); // Hide success modal
        });

        // Optional: Close modal when clicking outside of it
        failureModal.addEventListener("click", function(event) {
            if (event.target === failureModal) {
                failureModal.classList.remove("modal-active");
            }
        });

        successModal.addEventListener("click", function(event) {
            if (event.target === successModal) {
                successModal.classList.remove("modal-active");
            }
        });
    });
</script>

</body>
</html>
