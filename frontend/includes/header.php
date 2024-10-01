<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>My Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">My Project</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="navItems">
                <!-- Navigation items will be dynamically inserted here -->
            </ul>
        </div>
    </nav>

    <script>
        // Function to check if the user is logged in
        const isLoggedIn = () => {
            const token = localStorage.getItem('token'); // Check for token in local storage
            return token !== null; // Return true if token exists
        };

        // Function to update the navigation menu
        const updateNav = () => {
            const navItems = document.getElementById('navItems');
            navItems.innerHTML = ''; // Clear existing items

            if (isLoggedIn()) {
                // If user is logged in, show Dashboard and Logout links
                navItems.innerHTML += `
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="user.php">User Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" id="logout">Logout</a></li>
                `;

                // Add logout functionality
                document.getElementById('logout').addEventListener('click', () => {
                    localStorage.removeItem('token'); // Remove token from local storage
                    alert('You have logged out successfully.');
                    updateNav(); // Update navigation after logout
                    window.location.href = 'index.php'; // Redirect to index.php
                });
            } else {
                // If user is not logged in, show Login and Register links
                navItems.innerHTML += `
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                `;
            }
        };

        // Call updateNav on page load
        updateNav();
    </script>
</body>
</html>
