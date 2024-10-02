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
        const hashedPassword = await bcrypt.hash(password, 10);
        const [result] = await this.pool.execute('INSERT INTO users (username, email, password, role_id, avatar) VALUES (?, ?, ?, ?, ?)', [username, email, hashedPassword, roleId, avatar]);
        return result.insertId;
    }

async updateUser(id, username, email, roleId) {
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
    // const hashedPassword = await bcrypt.hash(password, 10);
    const [result] = await this.pool.execute(
        'UPDATE users SET username = ?, email = ?, role_id = ? WHERE id = ?',
        [username, email, roleId, id]
    );
    return { affectedRows: result.affectedRows }; // Return the number of affected rows
}



    async getUserById(id) {
        const [rows] = await this.pool.execute('SELECT id, username, role_id, email FROM users WHERE id = ?', [id]);
        return rows[0];
    }

    async getAllUsers() {
        const [rows] = await this.pool.execute('SELECT id, username, role_id, email, created_at, avatar FROM users');
        return rows;
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


}

module.exports = User;
