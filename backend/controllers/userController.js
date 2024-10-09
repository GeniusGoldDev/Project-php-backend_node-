const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const pool = require('../config/db');
const User = require('../models/userModel');
const user = new User(pool);

exports.registerUser = async (req, res) => {
    
    const { username, password, roleId, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year  } = req.body;
    console.log('Registering user:', { username, password, roleId, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year });

    try {
        const existingUser = await user.getUserByUsername(username);
        console.log('Existing user check:', existingUser);
        const userId = await user.registerUser(username, password, roleId, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year );
        console.log('User registered with ID:', userId);
        res.json({ status: 'success', data: { id: userId } });

        // if (existingUser) {
        //     console.error('Username already exists:', username);
        //     return res.status(400).json({ status: 'error', message: 'Username already exists' });
        // }

    } catch (error) {
        console.error('Error registering user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.loginUser = async (req, res) => {
    const { username, password } = req.body;
    console.log('Logging in user:', { username });

    try {
        const existingUser = await user.getUserByUsername(username);
        console.log('Found user:', existingUser);

        if (!existingUser) {
            console.error('User not found:', username);
            return res.status(404).json({ status: 'error', message: 'User not found' });
        }

        const isMatch = await bcrypt.compare(password, existingUser.password);
        if (!isMatch) {
            console.error('Invalid password for user:', username);
            return res.status(401).json({ status: 'error', message: 'Invalid password' });
        }

        const token = jwt.sign({ id: existingUser.id, role: existingUser.role_id }, process.env.JWT_SECRET, { expiresIn: '1h' });
        console.log('Token generated for user:', existingUser.id);
        res.json({ status: 'success', token });
    } catch (error) {
        console.error('Error logging in user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.createUser = async (req, res) => {
    const { username, email, password, roleId } = req.body;
    const avatar = req.file;

    // Check for missing avatar file
    if (!avatar) {
        return res.status(400).json({ error: 'No avatar file uploaded.' });
    }

    // Optionally validate the inputs here

    try {
        // Create the user with a hashed password
        const hashedPassword = await bcrypt.hash(password, 10); // Hash the password
        const userId = await user.createUser(username, email, hashedPassword, roleId, avatar.filename);

        res.status(201).json({ message: 'User created successfully.', data: { id: userId } });
    } catch (error) {
        console.error('Error creating user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.updateUser = async (req, res) => {
    const { id } = req.params;
    const { username, email, roleId } = req.body;
    const avatar = req.file;
    console.log('Updating user with ID:',{id, username, email, roleId, avatar });

    try {
        const userData = await user.getUserById(id);
        if (!userData) {
            console.error('User not found:', id);
            return res.status(404).json({ status: 'error', message: 'User not found' });
        }

        const updateResult = await user.updateUser(id, username, email, roleId, avatar.filename);
        
        // Check if the update was blocked due to a duplicate username
        if (updateResult.error) {
            console.error('Username already exists:', username);
            return res.status(400).json({ status: 'error', message: updateResult.error });
        }

        console.log('User updated with ID:', id);
        res.json({ status: 'success', data: { id } });
    } catch (error) {
        console.error('Error updating user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};


exports.getAllUsers = async (req, res) => {
    console.log('Retrieving all users');

    try {
        const users = await user.getAllUsers();
        console.log('Retrieved users:', users);
        res.json(users);
    } catch (error) {
        console.error('Error retrieving users:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getUser = async (req, res) => {
    const { id } = req.params;
    console.log('Retrieving user with ID:', id);

    try {
        const userData = await user.getUserById(id);
        console.log('User data retrieved:', userData);
        if (!userData) return res.status(404).json({ status: 'error', message: 'User not found' });
        res.json(userData);
    } catch (error) {
        console.error('Error retrieving user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getSetting = async (req, res) => {
    const { id } = req.params;
    console.log('Retrieving user with ID:', id);

    try {
        const userData = await user.getSettingById(id);
        console.log('User data retrieved:', userData);
        if (!userData) return res.status(404).json({ status: 'error', message: 'User not found' });
        res.json(userData);
    } catch (error) {
        console.error('Error retrieving user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getSettingup = async (req, res) => {
    const { id } = req.params;
    const { username, company, contact_phone, company_site, country, language, time_zone, currency, communication, allow } = req.body;
    const avatar = req.file;
    console.log('Updating user with ID:',{id, username, company, contact_phone, company_site, country, language, time_zone, currency, communication, allow });

    try {
        const userData = await user.getUserById(id);
        if (!userData) {
            console.error('User not found:', id);
            return res.status(404).json({ status: 'error', message: 'User not found' });
        }
        
        const updateResult = await user.updateUserSetting(id, username, company, contact_phone, company_site, country, language, time_zone, currency, communication, allow, avatar.filename);
        
        // Check if the update was blocked due to a duplicate username
        if (updateResult.error) {
            console.error('Username already exists:', username);
            return res.status(400).json({ status: 'error', message: updateResult.error });
        }

        console.log('User updated with ID:', id);
        res.json({ status: 'success', data: { id } });
    } catch (error) {
        console.error('Error updating user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.deleteUser = async (req, res) => {
    const { id } = req.params;
    console.log('Deleting user with ID:', id);

    try {
        const affectedRows = await user.deleteUser(id);
        console.log('Affected rows after deletion:', affectedRows);
        if (affectedRows === 0) return res.status(404).json({ status: 'error', message: 'User not found' });
        res.json({ status: 'success', message: 'User deleted successfully' });
    } catch (error) {
        console.error('Error deleting user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getAllPermissions = async (req, res) => {
    console.log('Retrieving all users');

    try {
        var permissions_ = await user.getAllPermissions();
        console.log('Retrieved users:', permissions_);
        
        // var lenth = permissions_.length();
        const lenth =  Object.keys(permissions_).length;
        const permissions = [];
        const pindex = [];
        const role_names = {}; // Changed to an object

        for (var i = 0; i < lenth; i++) {
            const menuName = permissions_[i]['menu_name'];
            const roleName = permissions_[i]['role_name'];

            if (!pindex[menuName]) {
                permissions.push(menuName);
                role_names[menuName] = []; // Initialize an array for each menu_name
            }
            pindex[menuName] = true;

            if (!role_names[menuName].includes(roleName)) {
                role_names[menuName].push(roleName); // Use push to add roles
            }
        }
        // console.log(role_names);
        const created_at = permissions_[0]['created_at'];
        const permissionArray = [permissions,role_names,created_at]

        console.log(permissionArray);
        res.json(permissionArray);
    } catch (error) {
        console.error('Error retrieving users:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getAllroles = async (req, res) => {
    console.log('Retrieving all roles');

    try {
        const roles = await user.getAllroles();
        console.log('Retrieved roles:', roles);
        res.json(roles);
    } catch (error) {
        console.error('Error retrieving users:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.createRole = async (req, res) => {
    const { new_role_name } = req.body;
    console.log({new_role_name});
    
    try {
        const role_name = await user.createRole(new_role_name);

        res.status(201).json({ data: role_name });
    } catch (error) {
        console.error('Error creating role_name:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getRole = async (req, res) => {
    const { id } = req.params;
    console.log('Retrieving user with ID:', id);

    try {
        const roleData = await user.getRoleById(id);
        console.log('User data retrieved:', roleData);
        if (!roleData) return res.status(404).json({ status: 'error', message: 'User not found' });
        res.json(roleData);
    } catch (error) {
        console.error('Error retrieving user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.getPermission = async (req, res) => {
    const { id } = req.params;
    console.log('Retrieving role with ID:', id);

    try {
        const permissionData = await user.getPermissionById(id);
        console.log('User data retrieved:', permissionData);
        if (!permissionData) return res.status(404).json({ status: 'error', message: 'User not found' });
        res.json(permissionData);
    } catch (error) {
        console.error('Error retrieving user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.updateRole = async (req, res) => {
    const { id: role_id } = req.params; // Destructure role_id from params
    const { permissions } = req.body; // Extract permissions from request body
    console.log('Updating role with ID:', { role_id });
    console.log({ permissions });
    
    let flattenedPermissions = [];

    // Flatten permissions into an array of objects
    Object.keys(permissions).forEach(menuName => {
        permissions[menuName].forEach(permission => {
            flattenedPermissions.push({ menu_name: menuName, permission });
        });
    });

    console.log({ flattenedPermissions }); // Log the flattened permissions
    
    try {
        // Get permission mapping
        const permissionMapping = await user.getPermissionMapping(); // Retrieve mapping from the model

        // For each permission, map to permission_id and insert/update role_permissions
        for (let entry of flattenedPermissions) {
            const { menu_name, permission } = entry; // Destructure menu_name and permission
            
            // Create permission name for mapping
            const permissionKey = `${permission}`; // Assuming permission names like 'read_users'

            // Map permission to its ID
            const permission_id = permissionMapping[permissionKey]; // Get the corresponding permission_id
            
            if (permission_id) { // Check if permission_id is found
                // Insert or update into role_permissions
                await user.updateRolePermissions(role_id, permission_id, menu_name);
            } else {
                console.warn(`Permission not found for key: ${permissionKey}`);
            }
        }

        // Successfully updated
        res.json({ status: 'success', message: 'Permissions updated successfully' });

    } catch (error) {
        console.error('Error updating role permissions:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.AddPermissions = async (req, res) => {
    try {
        const { permission_name } = req.body;

        // Check if the permission_name exists in the request body
        if (!permission_name || permission_name.trim() === '') {
            return res.status(400).json({ message: 'Permission name is required' });
        }

        // Check if the permission already exists
        const permissionExists = await user.permissionExists(permission_name);
        if (permissionExists) {
            return res.status(400).json({ message: 'Permission name already exists' });
        }

        // Add permission to the database
        const result = await user.addPermission(permission_name);

        return res.status(201).json({ permissionId: result.insertId });
    } catch (error) {
        console.error('Error adding permission:', error);
        return res.status(500).json({ message: 'Server error. Please try again later.' });
    }
};

exports.delPermission = async (req, res) => {
    try {
        const { permission_name } = req.body; // Get permission name from the request body

        if (!permission_name) {
            return res.status(400).json({ message: "Permission name is required" });
        }

        // Call the model's delete method
        const result = await user.deletePermission(permission_name);

        if (result.rowCount > 0) {
            return res.status(200).json({ message: "Permission deleted successfully" });
        } else {
            return res.status(404).json({ message: "Permission not found" });
        }
    } catch (error) {
        console.error(error);
        return res.status(500).json({ message: "An error occurred while deleting the permission" });
    }
};

exports.editPermission = async (req, res) => {
    try {
        const { inputValue, management_name } = req.body; // Get management name from request body

        if (!inputValue) {
            return res.status(400).json({ message: "Management name is required" });
        }

        // You can implement your logic to edit the permission here.
        // Assuming you need to update the permission name in the database.

        // Call your model method to update the permission
        const result = await user.updatePermission(inputValue,management_name); // Call a method to update the permission
        return res.status(200).json({ message: "Permission updated successfully", result });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ message: "An error occurred while processing the edit permission request" });
    }
};

