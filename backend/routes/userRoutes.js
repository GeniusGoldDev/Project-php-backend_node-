const express = require('express');
const { authenticate, authorize } = require('../middleware/middleware');
const userController = require('../controllers/userController');

const router = express.Router();

// Registration route
router.post('/register', userController.registerUser);

// User routes
router.get('/', authenticate, authorize('users', 'view'), userController.getAllUsers);
router.post('/create', userController.createUser);
router.get('/:id', userController.getUser);
router.put('/:id', userController.updateUser);
router.delete('/:id', userController.deleteUser);

// Login route
router.post('/login', userController.loginUser);

module.exports = router;
