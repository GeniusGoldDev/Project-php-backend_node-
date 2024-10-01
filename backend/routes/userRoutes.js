const express = require('express');
const { authenticate, authorize } = require('../middleware/middleware');
const userController = require('../controllers/userController');

const router = express.Router();

// Registration route
router.post('/register', userController.registerUser);

// User routes
router.get('/', authenticate, authorize('users', 'view'), userController.getAllUsers);
router.post('/create', authenticate, authorize('users', 'create'), userController.createUser);
router.get('/:id', authenticate, authorize('users', 'view'), userController.getUser);
router.put('/:id', authenticate, authorize('users', 'update'), userController.updateUser);
router.delete('/:id', authenticate, authorize('users', 'delete'), userController.deleteUser);

// Login route
router.post('/login', userController.loginUser);

module.exports = router;
