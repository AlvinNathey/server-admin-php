<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div>
    <header class="hero-section py-16 bg-gray-900 text-white relative overflow-hidden">
        <!-- Decorative Shape Elements -->
        <svg class="absolute top-0 left-0" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="40" cy="40" r="40" fill="#FF6A35" opacity="0.2"/>
        </svg>

        <svg class="absolute top-[20%] left-[5%]" width="70" height="60" viewBox="0 0 70 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="35" cy="30" rx="35" ry="30" fill="#1DC9FF" opacity="0.5"/>
        </svg>

        <svg class="absolute bottom-0 right-0" width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="75" cy="75" r="75" fill="#FDB314" opacity="0.3"/>
        </svg>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-12 gap-8 items-center">
                <div class="col-span-12 lg:col-span-6 text-center lg:text-left">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6">Discover a New Path Today!</h1>
                    <p class="text-lg lg:text-xl mb-8">Explore opportunities that match your skills and interests. Whether you're looking to grow, learn, or engage, we provide the tools to help you on your journey.</p>
                    
                    <div class="flex justify-center lg:justify-start space-x-4">
                        <a href="signup/index.php">
                            <button class="py-3 px-6 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Sign Up</button>
                        </a>
                        <a href="login/index.php">
                            <button class="py-3 px-6 bg-gray-700 text-white rounded hover:bg-gray-800 transition">Log In</button>
                        </a>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 text-center relative">
                    <!-- Background Circle -->
                    <div class="absolute -z-10 bg-gray-800 rounded-full w-[600px] h-[600px] left-1/2 transform -translate-x-1/2"></div>
                    
                    <img src="https://cdn.easyfrontend.com/pictures/hero/hero-6.png" alt="Hero Image" class="rounded-full max-w-full h-auto mx-auto">
                </div>
            </div>
        </div>
    </header>
    </div>
</body>
</html>
