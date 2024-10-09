<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Creation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .feature-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .feature-row input[type="text"] {
            flex: 1;
            margin-right: 10px;
            width: 70%; / Medium width for text box /
        }

        button {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #218838;
        }
        
        #message {
            margin-top: 20px;
            text-align: center;
            color: green;
        }
        
        .remove-feature {
            margin-left: 10px;
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
        }

        .remove-feature:hover {
            background-color: #c82333;
        }

        .toggle-container {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .toggle {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(14px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a New Package</h1>
        <form id="packageForm">
            <div class="form-group">
                <label for="packageName">Package Name</label>
                <input type="text" id="packageName" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" required></textarea>
            </div>
            <div class="form-group">
                <label>Pricing Plan</label>
                <select id="pricingPlan" required>
                    <option value="" disabled selected>Select a plan</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" required>
            </div>
            <div class="form-group">
                <label>Package Status</label>
                <div class="toggle-container">
                    <input type="checkbox" id="packageStatus" checked>
                    <label class="toggle" for="packageStatus">
                        <span class="slider"></span>
                    </label>
                </div>
                <label for="packageStatus">Enable Package</label>
            </div>
            <div class="form-group">
                <label>Features</label>
                <div id="featuresContainer"></div>
                <button type="button" id="addFeature">Add Feature</button>
            </div>
            <button type="submit">Create Package</button>
        </form>
        <div id="message"></div>
    </div>

    <script>
        document.getElementById('addFeature').addEventListener('click', function() {
            const featuresContainer = document.getElementById('featuresContainer');
            const featureRow = document.createElement('div');
            featureRow.classList.add('feature-row');

            const featureInput = document.createElement('input');
            featureInput.type = 'text';
            featureInput.placeholder = 'Feature';
            featureInput.required = true;

            const toggleContainer = document.createElement('div');
            toggleContainer.classList.add('toggle-container');

            const toggleInput = document.createElement('input');
            toggleInput.type = 'checkbox';
            toggleInput.checked = true; // Default to enabled
            toggleInput.id = `toggle_${featuresContainer.children.length}`; // Unique ID for toggle

            const toggleLabel = document.createElement('label');
            toggleLabel.classList.add('toggle');
            toggleLabel.setAttribute('for', toggleInput.id);

            const slider = document.createElement('span');
            slider.classList.add('slider');

            toggleLabel.appendChild(slider);
            toggleContainer.appendChild(toggleInput);
            toggleContainer.appendChild(toggleLabel);

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.classList.add('remove-feature');
            removeButton.onclick = function() {
                featuresContainer.removeChild(featureRow);
            };

            featureRow.appendChild(featureInput);
            featureRow.appendChild(toggleContainer);
            featureRow.appendChild(removeButton);
            featuresContainer.appendChild(featureRow);
        });

        document.getElementById('packageForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const packageName = document.getElementById('packageName').value;
            const description = document.getElementById('description').value;
            const pricingPlan = document.getElementById('pricingPlan').value;
            const price = document.getElementById('price').value;
            const packageStatus = document.getElementById('packageStatus').checked ? 'Enabled' : 'Disabled';
            const featureRows = document.querySelectorAll('#featuresContainer .feature-row');

            let featuresDetails = [];
            featureRows.forEach((row, index) => {
                const featureInput = row.querySelector('input[type="text"]');
                const toggleInput = row.querySelector('input[type="checkbox"]');
                if (featureInput) {
                    featuresDetails.push({
                        name: featureInput.value,
                        status: toggleInput.checked ? 'Enabled' : 'Disabled'
                    });
                }
            });

            const features = featuresDetails.map(f => `${f.name} (${f.status})`).join(', ');

            const message = `Package "${packageName}" created successfully with the following details:\n
            Description: ${description}\n
            Pricing Plan: ${pricingPlan}\n
            Price: $${price}\n
            Package Status: ${packageStatus}\n
            Features: ${features}`;

            document.getElementById('message').textContent = message;

            // Optionally reset the form
            document.getElementById('packageForm').reset();
            document.getElementById('featuresContainer').innerHTML = '';
        });
    </script>
</body>
</html>