<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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
    class="ezy__signup14 light flex items-center justify-center py-14 md:py-24 text-black bg-cover bg-right bg-no-repeat relative"
    style="background-image: url('https://images.unsplash.com/photo-1501426026826-31c667bdf23d?crop=entropy&fit=crop&w=1950&q=80'); background-color: rgba(255, 255, 255, 0.7); background-blend-mode: lighten;">
    <div class="container px-4 mx-auto">
        <div class="flex justify-center">
        <div class="w-full md:w-2/3">
            <div class="bg-white shadow-xl p-6 rounded-lg">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2">
                <div class="flex items-center justify-center h-full">
                    <img
                    src="https://images.unsplash.com/photo-1587614382346-4ec3f31f6bb5?crop=entropy&fit=crop&w=800&q=80"
                    alt="Signup Illustration"
                    class="max-h-[300px] w-full lg:max-h-full lg:h-full object-cover rounded-lg"
                    />
                </div>
                </div>
                <div class="w-full lg:w-1/2 mt-6 lg:mt-0 lg:pl-6">
                <div class="flex flex-col justify-center items-center text-center h-full p-2">
                    <h2 class="text-[26px] font-bold mb-3 text-gray-800">Create Your Account</h2>
                    <p class="text-gray-600 mb-4 text-sm">Get started by filling out the form below.</p>
                    <form class="w-full mt-4" method="POST" action="">
                    <div class="flex justify-center mb-4">
                        <input
                        type="text"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 py-2 text-sm w-1/2 mr-2"
                        id="fname"
                        name="fname"
                        placeholder="First Name"
                        />
                        <input
                        type="text"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 py-2 text-sm w-1/2 ml-2"
                        id="lname"
                        name="lname"
                        placeholder="Last Name"
                        />
                    </div>
                    <div class="w-full relative mb-4">
                        <input
                        type="text"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 text-sm w-full py-2"
                        id="uname"
                        name="uname"
                        placeholder="Username"
                        />
                    </div>
                    <div class="w-full relative mb-4">
                        <input
                        type="email"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 text-sm w-full py-2"
                        id="email"
                        name="email"
                        placeholder="Email Address"
                        />
                    </div>
                    <div class="w-full relative mb-4">
                        <input
                        type="password"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 text-sm w-full py-2"
                        id="pass"
                        name="pass"
                        placeholder="Password"
                        />
                    </div>
                    <div class="w-full relative mb-4">
                        <input
                        type="password"
                        class="border-b border-gray-400 focus:outline-none focus:border-blue-600 text-sm w-full py-2"
                        id="con-pass"
                        name="con-pass"
                        placeholder="Confirm Password"
                        />
                    </div>

                    <input type="submit" class="bg-blue-500 py-3 px-8 text-white hover:bg-blue-600 rounded-md mt-4" value="Sign Up">

                    <div class="text-center mt-4">
                        <p class="mb-0 text-sm text-gray-600">
                        Already have an account?
                        <a href="login.php" class="text-blue-500 hover:underline">Log In</a>
                        </p>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    </div>

    <!-- Modal for Signup Failure -->
    <div id="failureModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/3 shadow-lg">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-red-600">Signup Failed</h2>
                <button id="closeFailureModal" class="text-gray-500">&times;</button>
            </div>
            <p class="mt-4 text-gray-600">There was a problem with your signup. Please try again.</p>
        </div>
    </div>

    <!-- Modal for Signup Success -->
    <div id="successModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/3 shadow-lg">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-green-600">Signup Successful!</h2>
                <button id="closeSuccessModal" class="text-gray-500">&times;</button>
            </div>
            <p class="mt-4 text-gray-600">You have successfully signed up. You will be redirected shortly.</p>
        </div>
    </div>

<?php
include '../config/database.php';

$db = new Database();
$showFailureModal = false;
$showSuccessModal = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_POST['email'];

    if ($db->signup($first_name, $last_name, $username, $password, $email)) {
        $showSuccessModal = true;
        echo '<script>
            setTimeout(function() {
                window.location.href = "../login/index.php";
            }, 2000);
        </script>';
    } else {
        $showFailureModal = true;
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
            failureModal.classList.add("modal-active");
        <?php endif; ?>

        <?php if ($showSuccessModal): ?>
            successModal.classList.add("modal-active");
        <?php endif; ?>

        closeFailureModal.addEventListener("click", function() {
            failureModal.classList.remove("modal-active");
        });

        closeSuccessModal.addEventListener("click", function() {
            successModal.classList.remove("modal-active");
        });

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
