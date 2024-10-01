const jwt = require('jsonwebtoken');
const pool = require('../config/db');
const UserModel = require('../models/userModel');

const authenticate = (req, res, next) => {
    const token = req.headers['authorization'];
    console.log('Authorization header:', token);

    if (!token) {
        console.error('No token provided');
        return res.status(403).json({ message: 'No token provided' });
    }

    jwt.verify(token.split(' ')[1], process.env.JWT_SECRET, (err, decoded) => {
        if (err) {
            console.error('Failed to authenticate token:', err.message);
            return res.status(500).json({ message: 'Failed to authenticate token' });
        }

        req.userId = decoded.id;
        req.userRole = decoded.role;
        req.isAdmin = decoded.role === 1; // Assuming role 1 is admin
        console.log('Authenticated user:', { userId: req.userId, userRole: req.userRole });
        next();
    });
};

const authorize = (menu, action) => {
    return async (req, res, next) => {
        const userModel = new UserModel(pool);
        console.log(`Checking permissions for menu: ${menu}, action: ${action}`);

        const hasPermission = await userModel.hasPermission(req.userRole, menu, action);

        if (!hasPermission && !req.isAdmin) {
            console.error('Permission denied for user role:', req.userRole);
            return res.status(403).json({ message: 'Permission denied' });
        }

        console.log('Permission granted');
        next();
    };
};

module.exports = { authenticate, authorize };
