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
    const { username, email, password, roleId, avatar } = req.body;
    console.log({username});
    
    try {
        const userId = await user.createUser(username, email, password, roleId, avatar);

        res.status(201).json({ data: { id: userId } });
    } catch (error) {
        console.error('Error creating user:', error);
        res.status(500).json({ status: 'error', message: error.message });
    }
};

exports.updateUser = async (req, res) => {
    const { id } = req.params;
    const { username, email, roleId } = req.body;
    console.log('Updating user with ID:',{id, username, email, roleId });

    try {
        const userData = await user.getUserById(id);
        if (!userData) {
            console.error('User not found:', id);
            return res.status(404).json({ status: 'error', message: 'User not found' });
        }

        const updateResult = await user.updateUser(id, username, email, roleId);
        
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
        res.json({ data: users });
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
