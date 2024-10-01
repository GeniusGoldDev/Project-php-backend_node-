const express = require('express');
const dotenv = require('dotenv');
const userRoutes = require('./routes/userRoutes');
const cors = require('cors');

dotenv.config();
const app = express();

app.use(cors());
app.use(express.json());
app.use('/users', userRoutes);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
