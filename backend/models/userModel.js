const bcrypt = require('bcryptjs');


class User {
    constructor(pool) {
        this.pool = pool;
    }

   async registerUser(username, password, roleId, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year ) {
    const hashedPassword = await bcrypt.hash(password, 10); // Hashing the password
    const [rows] = await this.pool.execute('INSERT INTO users (username, password, role_id, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [username, hashedPassword, roleId, account_plan_id, business_type_id, account_team_size, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_month, card_expiry_year]);
    return rows.insertId; // Return the ID of the newly created user
    }

    async getUserByUsername(username) {
        const [rows] = await this.pool.execute('SELECT id, username, password, role_id FROM users WHERE username = ?', [username]);
        return rows[0]; // Return the first matching user or undefined
    }

    async createUser(username, email, password, roleId, avatar) {
        try {
            // Hash the password before storing it in the database
            const hashedPassword = await bcrypt.hash(password, 10);
    
            const [result] = await this.pool.execute(
                'INSERT INTO users (username, email, password, role_id, avatar) VALUES (?, ?, ?, ?, ?)', 
                [username, email, hashedPassword, roleId, avatar]
            );
    
            return result.insertId; // Return the ID of the newly created user
        } catch (error) {
            console.error('Error inserting user into database:', error);
            throw error; // Re-throw the error for the controller to handle
        }
    }
      
    async updateUserSetting(id,username, company, contact_phone, company_site, country, language, time_zone, currency, communication, allow, avatar) {
        // Check if the new username already exists for another user
        const [existingUser] = await this.pool.execute(
            'SELECT id FROM users WHERE username = ? AND id != ?',
            [username, id]
        );
    
        if (existingUser.length > 0) {
            // If the username is already taken by another user, return an error
            return { error: 'Username already exists' };
        }
    
        // Proceed with the update if the username is unique
        const [result] = await this.pool.execute(
            'UPDATE users SET username = ?, company = ?, contact_phone = ?, company_site = ? , country = ? , language = ? , time_zone = ? , currency = ? , communication = ? , allow_changes = ? , avatar = ? WHERE id = ?',
            [username, company, contact_phone, company_site, country, language, time_zone, currency, communication, allow, avatar, id] // Pass avatar here
        );
        return { affectedRows: result.affectedRows }; // Return the number of affected rows
    }

    async updateUser(id, username, email, roleId, avatar) {
        // Check if the new username already exists for another user
        const [existingUser] = await this.pool.execute(
            'SELECT id FROM users WHERE username = ? AND id != ?',
            [username, id]
        );
    
        if (existingUser.length > 0) {
            // If the username is already taken by another user, return an error
            return { error: 'Username already exists' };
        }
    
        // Proceed with the update if the username is unique
        const [result] = await this.pool.execute(
            'UPDATE users SET username = ?, email = ?, role_id = ?, avatar = ? WHERE id = ?',
            [username, email, roleId, avatar, id] // Pass avatar here
        );
        return { affectedRows: result.affectedRows }; // Return the number of affected rows
    }
    
    async getSettingById(id) {
        const [rows] = await this.pool.execute(`
            SELECT users.id, users.username, users.role_id, users.email, users.avatar, 
                   users.company, users.contact_phone, users.company_site, 
                   users.country, users.language, users.time_zone, 
                   users.currency, users.communication,
                   roles.role_name 
            FROM users 
            JOIN roles
            ON roles.id = users.role_id
            WHERE users.id = ?`, 
            [id]
        );
        
        // If user is found, return the first row, else return undefined
        return rows[0];
    }

    async getUserById(id) {
        const [rows] = await this.pool.execute(`
            SELECT users.id, users.username, users.role_id, users.email, users.avatar, 
                   users.company, users.contact_phone, users.company_site, 
                   users.country, users.language, users.time_zone, 
                   users.currency, users.communication ,
                   roles.role_name
            FROM users 
            JOIN roles
            ON users.role_id = roles.id
            WHERE users.id = ?`, 
            [id]
        );
        
        // If user is found, return the first row, else return undefined
        return rows[0];
    }

    async getAllUsers() {
        const [rows] = await this.pool.execute('SELECT users.id, users.username, users.role_id, users.email, users.created_at, users.avatar, roles.role_name FROM users JOIN roles ON users.role_id = roles.id');
        const [rows1] = await this.pool.execute('SELECT role_name, id FROM roles');
        return [rows,rows1];
    }

    async deleteUser(id) {
        const [result] = await this.pool.execute('DELETE FROM users WHERE id = ?', [id]);
        return result.affectedRows;
    }

    async getUserRole(userId) {
        const [rows] = await this.pool.execute('SELECT role_id FROM users WHERE id = ?', [userId]);
        return rows[0] ? rows[0].role_id : null;
    }

   async hasPermission(roleId, menu, action) {
    console.log('Checking permission for:', { roleId, menu, action });

    try {
        // Retrieve the permission name based on the action
        const [permissions] = await this.pool.execute(
            `SELECT p.permission_name
             FROM role_permissions rp
             JOIN permissions p ON rp.permission_id = p.id
             WHERE rp.role_id = ? AND rp.menu_name = ?`,
            [roleId, menu]
        );

        // Log the permissions retrieved for the role and menu
        console.log('Retrieved permissions:', permissions);

        // Check if the specific permission for the action exists in the retrieved permissions
        const permissionExists = permissions.some(permission => {
            return permission.permission_name === `${action}_users`; // Assuming action is suffixed with '_users'
        });

        if (permissionExists) {
            console.log('Permission granted for action:', action);
            return true; // Permission exists
        } else {
            console.log('Permission denied for action:', action);
            return false; // No permission
        }
    } catch (error) {
        console.error('Error checking permission:', error.message);
        return false; // Error during permission check
    }
    }

    async getAllPermissions() {
        const [rows] = await this.pool.execute('SELECT role_permissions.role_id, role_permissions.menu_name, role_permissions.created_at, roles.role_name, role_permissions.created_at FROM roles JOIN role_permissions ON roles.id = role_permissions.role_id');
        return rows;
    }

    async getAllroles() {
        const [rows] = await this.pool.execute('SELECT r.role_name, r.id, COUNT(u.id) AS user_count FROM roles r LEFT JOIN users u ON r.id = u.role_id GROUP BY r.role_name');
        const [rows2] = await this.pool.execute('SELECT DISTINCT menu_name FROM role_permissions');

        return [rows,rows2];
    }

    async createRole(new_role_name) {
        const [result] = await this.pool.execute('INSERT INTO roles (role_name) VALUES (?)', [new_role_name]);
        return result.new_role_name;
    }

    async getRoleById(id) {
        const [rows] = await this.pool.execute('SELECT roles.role_name , users.role_id ,users.email, users.id, users.username, users.created_at, users.avatar FROM users JOIN roles ON roles.id = users.role_id WHERE roles.id = ? ', [id]);
        const [rows1] = await this.pool.execute('SELECT r.role_name , rp.menu_name AS permission_name, rp.permission_id FROM roles r JOIN role_permissions rp ON r.id = rp.role_id WHERE rp.role_id = ?', [id]);
        const [rows2] = await this.pool.execute('SELECT DISTINCT menu_name FROM role_permissions');
        return [rows,rows1,rows2];
    }

    async getPermissionById(id) {
        const [rows] = await this.pool.execute('SELECT r.role_name , rp.menu_name AS permission_name, rp.permission_id FROM roles r JOIN role_permissions rp ON r.id = rp.role_id WHERE rp.role_id = ?', [id]);
        const [rows1] = await this.pool.execute('SELECT r.role_name, FROM roles r WHERE r.id = ?', [id]);
        const [rows2] = await this.pool.execute('SELECT DISTINCT menu_name FROM role_permissions');
        return [rows,rows1[0],rows2];
    }

    async updateUserPermissions(id) {
        // Check if the new username already exists for another user
        const [existingUser] = await this.pool.execute(
            'SELECT id FROM users WHERE username = ? AND id != ?',
            [username, id]
        );
    
        if (existingUser.length > 0) {
            // If the username is already taken by another user, return an error
            return { error: 'Username already exists' };
        }
    
        // Proceed with the update if the username is unique
        
        return { affectedRows: result.affectedRows }; // Return the number of affected rows
    }
    
    async getPermissionMapping() {
        const permissionMapping = {};
        const [permissions] = await this.pool.execute('SELECT id, permission_name FROM permissions');
        permissions.forEach(permission => {
            permissionMapping[permission.permission_name] = permission.id;
        });
        return permissionMapping; // Return the mapping for use in the controller
    }

    async updateRolePermissions(role_id, permission_id, menu_name) {
        // Insert or update into role_permissions
        await this.pool.execute(`
            INSERT INTO role_permissions (role_id, permission_id, menu_name) 
            VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE permission_id = ?`, 
            [role_id, permission_id, menu_name, permission_id]
        );
    }

    async permissionExists(permission_name) {
        try {
            const [result] = await this.pool.execute('SELECT * FROM role_permissions WHERE menu_name = ?', [permission_name]);
            return result.length > 0; // Returns true if permission exists
        } catch (error) {
            console.error('Error checking permission:', error);
            throw error;
        }
    }

    async addPermission(permission_name) {
        try {
            const [result] = await this.pool.execute('INSERT INTO role_permissions (menu_name) VALUES (?)', [permission_name]);
            return result; // Returns the result of the insert operation (contains insertId)
        } catch (error) {
            console.error('Error adding permission:', error);
            throw error;
        }
    }

    async deletePermission(permission_name) {
        try {
            const [result] = await this.pool.execute('DELETE FROM role_permissions WHERE menu_name = ?', [permission_name]);
            return result; // Returns the result of the delete operation (contains affectedRows)
        } catch (error) {
            console.error('Error deleting permission:', error);
            throw error;
        }
    }

    async updatePermission(inputValue, management_name) {
        try {
            const [result] = await this.pool.execute(
                'UPDATE role_permissions SET menu_name = ? WHERE menu_name = ?',
                [inputValue, management_name] // Replace the management name based on your logic
            );
            return result; // Returns the result of the update operation
        } catch (error) {
            console.error('Error updating permission:', error);
            throw error;
        }
    }

    async createPackage(packageName, description, pricingPlan, price, packageStatus, featureNames, featureStatus) {
        try {
            // Insert package into the 'packages' table
            const [packageResult] = await this.pool.execute(
                'INSERT INTO packages (package_name, description, pricing_plan, price, status) VALUES (?, ?, ?, ?, ?)', 
                [packageName, description, pricingPlan, price, packageStatus]
            );
            const packageId = packageResult.insertId; // Get the newly inserted package ID

            // Insert each feature into the 'features' table
            const insertFeatureQuery = 'INSERT INTO features (package_id, name, status) VALUES (?, ?, ?)';

            // Iterate over features and insert each one
            for (let i = 0; i < featureNames.length; i++) {
                await this.pool.execute(insertFeatureQuery, [packageId, featureNames[i], featureStatus[i]]);
            }

            return packageId; // Return the package ID after successful insertion
        } catch (error) {
            console.error('Error creating package:', error);
            throw error; // Re-throw the error for the controller to handle
        }
    }

    async getPackage() {
        const [rows] = await this.pool.execute(
            'SELECT p.package_name, p.price, p.description, p.pricing_plan, p.status AS package_status, ' +
            'GROUP_CONCAT(f.name SEPARATOR \', \') AS feature_names, ' +
            'GROUP_CONCAT(f.status SEPARATOR \', \') AS feature_statuses ' +
            'FROM packages AS p ' +
            'JOIN features AS f ON p.id = f.package_id ' +
            'WHERE p.pricing_plan = \'monthly\' ' +
            'GROUP BY p.id'
        );
        const [rows1] = await this.pool.execute(
            'SELECT p.package_name, p.price, p.description, p.pricing_plan, p.status AS package_status, ' +
            'GROUP_CONCAT(f.name SEPARATOR \', \') AS feature_names, ' +
            'GROUP_CONCAT(f.status SEPARATOR \', \') AS feature_statuses ' +
            'FROM packages AS p ' +
            'JOIN features AS f ON p.id = f.package_id ' +
            'WHERE p.pricing_plan = \'yearly\' ' +
            'GROUP BY p.id'
        );
        // Format the output
        const formattedRows = rows.map(row => {
            const featureNames = row.feature_names.split(', ');
            const featureStatuses = row.feature_statuses.split(', ');
    
            const featuresArray = featureNames.map((name, index) => {
                return {
                    feature_name: name,
                    feature_status: featureStatuses[index]
                };
            });
    
            return {
                package_name: row.package_name,
                price: row.price,
                description: row.description,
                pricing_plan: row.pricing_plan,
                package_status: row.package_status,
                features: featuresArray  // This will be an array of objects
            };
        });
        const formattedRows1 = rows1.map(row => {
            const featureNames = row.feature_names.split(', ');
            const featureStatuses = row.feature_statuses.split(', ');
    
            const featuresArray = featureNames.map((name, index) => {
                return {
                    feature_name: name,
                    feature_status: featureStatuses[index]
                };
            });
    
            return {
                package_name: row.package_name,
                price: row.price,
                description: row.description,
                pricing_plan: row.pricing_plan,
                package_status: row.package_status,
                features: featuresArray  // This will be an array of objects
            };
        });
    
        return [formattedRows,formattedRows1];  // Return the formatted rows directly
    }
    
    
    
}

module.exports = User;
