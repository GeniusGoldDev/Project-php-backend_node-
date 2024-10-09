const express = require('express');
const multer = require('multer');
const { authenticate, authorize } = require('../middleware/middleware');
const userController = require('../controllers/userController');
const bodyParser = require('body-parser');
const path = require('path');
const app = express();

const router = express.Router();

// Middleware for parsing larger request bodies for non-file uploads (JSON, URL-encoded data)
app.use(bodyParser.json({ limit: '10mb' }));
app.use(bodyParser.urlencoded({ limit: '10mb', extended: true }));

// Serve static files from the 'uploads' directory
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'uploads/'); // Specify the upload directory
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + '-' + file.originalname); // Generate a unique filename
    },
});

const upload = multer({ 
    storage: storage,
    limits: { fileSize: 10 * 1024 * 1024 }, // 10 MB file size limit for Multer
});

// Use the router with the app
app.use('/users', router);

// Registration route
router.post('/register', userController.registerUser);

// User routes
router.get('/', authenticate, authorize('users', 'view'), userController.getAllUsers);
router.get('/permissions', userController.getAllPermissions);
router.post('/add_permission', userController.AddPermissions);
router.post('/create_role', userController.createRole);
router.get('/roles', userController.getAllroles);
router.get('/roles:id',  userController.getRole);
router.put('/roles/:id', userController.updateRole);
router.get('/permission/:id', userController.getPermission);
router.delete('/del_permission/', userController.delPermission);
router.put('/edit_permission/', userController.editPermission);
router.post('/create_package', userController.createPackage);
router.get('/get_package', userController.getpackage);
router.get('/:id', userController.getUser);
router.get('/setting/:id', userController.getSetting);
router.put('/settingup/:id', upload.single('avatar'), userController.getSettingup);
router.put('/:id', upload.single('avatar'), userController.updateUser);
router.post('/create', upload.single('avatar'), userController.createUser);
router.delete('/:id', userController.deleteUser);

// Login route
router.post('/login', userController.loginUser);

module.exports = router;
