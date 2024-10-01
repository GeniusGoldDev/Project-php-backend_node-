

    <script>
        // Function to check if the user is logged in
        const isLoggedIn = () => {
            const token = localStorage.getItem('token'); // Check for token in local storage
            return token !== null; // Return true if token exists
        };

        // Redirect to index.php if not logged in
        if (!isLoggedIn()) {
            window.location.href = 'login.php'; // Redirect to index.php
        }
    </script>
    <div class="container">
        <h2>User Profile</h2>
        
        <h3>Create User</h3>
        <form id="createUserForm">
            <input type="text" id="createUsername" placeholder="Username" required>
            <input type="password" id="createPassword" placeholder="Password" required>
            <input type="number" id="createRoleId" placeholder="Role ID" required>
            <button type="submit">Create User</button>
        </form>

        <h3>Update User</h3>
        <form id="updateUserForm">
            <input type="text" id="updateUserId" placeholder="User ID" required>
            <input type="text" id="updateUsername" placeholder="New Username">
            <input type="password" id="updatePassword" placeholder="New Password">
            <input type="number" id="updateRoleId" placeholder="New Role ID">
            <button type="submit">Update User</button>
        </form>

        <h3>Get All Users</h3>
        <button id="getAllUsersButton">Get All Users</button>
        <div id="userList">
        </div>

        <h3>Get User</h3>
        <input type="text" id="getUserId" placeholder="User ID">
        <button id="getUserButton">Get User</button>
        <div id="userData"></div>

        <h3>Delete User</h3>
        <input type="text" id="deleteUserId" placeholder="User ID">
        <button id="deleteUserButton">Delete User</button>
        <div id="deleteMessage"></div>
    </div>
    <script src="js/script.js"></script>


