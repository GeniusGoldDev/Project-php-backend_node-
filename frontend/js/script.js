const API_URL = 'http://localhost:3000/users'; // Adjust the base URL as needed

// Function to handle API requests with authorization
const fetchWithAuth = async (url, options) => {
    const token = localStorage.getItem('token'); // Retrieve the token
    options.headers = {
        ...options.headers,
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json',
    };
    return fetch(url, options);
};

// Check Token Expiry
const checkTokenExpiry = () => {
    const token = localStorage.getItem('token');
    if (token) {
        const payload = JSON.parse(atob(token.split('.')[1])); // Decode the token
        const isExpired = payload.exp * 1000 < Date.now(); // Check expiry
        if (isExpired) {
            alert('Session expired. Please log in again.');
            localStorage.removeItem('token'); // Clear expired token
            // Redirect to login page
            window.location.href = 'login.php'; // Adjust based on your login page
        }
    }
};

// Call checkTokenExpiry on page load
checkTokenExpiry();

// Create User
document.getElementById('createUserForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const username = document.getElementById('createUsername').value;
    const password = document.getElementById('createPassword').value;
    const roleId = document.getElementById('createRoleId').value;

    try {
        const response = await fetchWithAuth(`${API_URL}/create`, {
            method: 'POST',
            body: JSON.stringify({ username, password, roleId }),
        });
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'An error occurred');
        }
        const result = await response.json();
        alert(result.message || 'User created successfully!');
    } catch (error) {
        console.error('Error creating user:', error);
        alert(`Error: ${error.message}`); // Display user-friendly message
    }
});



 // Update User
 document.getElementById('updateUserForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('updateUserId').value;
    const username = document.getElementById('updateUsername').value;
    const password = document.getElementById('updatePassword').value;
    const roleId = document.getElementById('updateRoleId').value;

    try {
        const response = await fetchWithAuth(`${API_URL}/${id}`, {
            method: 'PUT',
            body: JSON.stringify({ username, password, roleId }),
        });
        const result = await response.json();
        alert(result.message || 'User updated successfully!');
    } catch (error) {
        console.error('Error updating user:', error);
        alert('Error updating user');
    }
});

// Get All Users
document.getElementById('getAllUsersButton').addEventListener('click', async () => {
    try {
        const response = await fetchWithAuth(API_URL, { method: 'GET' });
        const result = await response.json();
        const userList = document.getElementById('userList');
        userList.innerHTML = JSON.stringify(result.data, null, 2);
        console.log('result :',result);
        
    } catch (error) {
        console.error('Error retrieving users:', error);
        alert('Error retrieving users');
    }
});

// Get User by ID
document.getElementById('getUserButton').addEventListener('click', async () => {
    const id = document.getElementById('getUserId').value;
    try {
        const response = await fetchWithAuth(`${API_URL}/${id}`, { method: 'GET' });
        const result = await response.json();
        const userData = document.getElementById('userData');
        userData.innerHTML = JSON.stringify(result.data, null, 2);
    } catch (error) {
        console.error('Error retrieving user:', error);
        alert('Error retrieving user');
    }
});

// Delete User
document.getElementById('deleteUserButton').addEventListener('click', async () => {
    const id = document.getElementById('deleteUserId').value;
    try {
        const response = await fetchWithAuth(`${API_URL}/${id}`, {
            method: 'DELETE',
        });
        const result = await response.json();
        const deleteMessage = document.getElementById('deleteMessage');
        deleteMessage.innerHTML = result.message || 'User deleted successfully!';
    } catch (error) {
        console.error('Error deleting user:', error);
        alert('Error deleting user');
    }
});


