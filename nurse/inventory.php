<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'medical';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve all items
function get_items($conn) {
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

// Retrieve all items
$items = get_items($conn);

// Close database connection
$conn->close();
?>

<html>
<head>
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .navbar-custom {
    background-color: #003366; /* Dark blue */
    padding: 5px;
}

.navbar-custom .navbar-brand {
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
}

.navbar-custom .navbar-nav .nav-link {
    color: #fff;
}

.navbar-custom .navbar-toggler {
    border-color: #fff;
}

.navbar-custom .navbar-nav .dropdown-menu {
    background-color: #003366;
}

.navbar-custom .dropdown-menu .dropdown-item {
    color: white;
}

.navbar-custom .dropdown-menu .dropdown-item:hover {
    background-color: #004080; /* Lighter shade of dark blue */
}

.navbar-brand img {
    max-height: 40px;
    width: auto;
}


.dropdown-menu {
    background-color: #003366; /* Matching dropdown with navbar */
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.dropdown-item {
    color: white !important;
}

.dropdown-item:hover {
    background-color: #1535ee !important; /* DodgerBlue hover */
    color: #fff !important;
}
3
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container input[type="text"] {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }
        .search-container button {
            background: none;
            border: none;
            margin-left: -35px;
            cursor: pointer;
        }
        .search-container button i {
            font-size: 16px;
            color: #333;
        }
        .category-container {
            margin-left: 20px;
        }
        .category-container select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .add-item-container {
            margin-left: auto;
        }
        .add-item-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
        }
        .action-links a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        /* Modal Styles */
        #addItemModal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.5);
            display: flex; 
            justify-content: center; 
            align-items: center;
        }
        .modal-content {
            background-color: white; 
            padding: 20px; 
            border-radius: 10px; 
            width: 400px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            text-align: center;
        }
        .modal-content h2 {
            margin: 0 0 15px;
        }
        .modal-content label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        .modal-content input[type="text"],
        .modal-content input[type="date"],
        .modal-content input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .modal-content button {
            padding: 10px 15px;
            margin: 10px ;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
        }
        .modal-content button[type="submit"] {
            background-color: #007bff;
        }
        .modal-content button[type="button"] {
            background-color: #ccc;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="../src/Nbsc_logo-removebg-preview.png" alt="NBSC HOS" width="50" height="50"> NBSC HOS
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    <li><a class="dropdown-item" href="welcome2.php">Home</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
        <div class="search-container">
            <input type="text" placeholder="Search">
            <button><i class="fas fa-search"></i></button>
            <div class="category-container">
                <select>
                    <option>Category</option>
                </select>
            </div>
            <div class="add-item-container">
                <button onclick="openModal()">Add Item</button>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Date Manufactured</th>
                    <th>Date Expiry</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['date_manufactured']; ?></td>
                    <td><?php echo $item['date_expiry']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td class="action-links">
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Add Item Modal -->
    <div id="addItemModal">
        <div class="modal-content">
            <h2>Add Item</h2>
            <form id="addItemForm">
                <label for="itemName">Item Name:</label>
                <input type="text" id="itemName" name="itemName" required><br><br>
                <label for="dateManufactured">Date Manufactured:</label>
                <input type="date" id="dateManufactured" name="dateManufactured" required><br><br>
                <label for="dateExpiry">Date Expiry:</label>
                <input type="date" id="dateExpiry" name="dateExpiry" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>
                <button type="submit">Add Item</button>
                <button type="button" onclick="closeModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("addItemModal"). style.display = "block";
        }

        function closeModal() {
            document.getElementById("addItemModal").style.display = "none";
        }

        document.getElementById("addItemForm").onsubmit = function(event) {
            event.preventDefault();
            
            const name = document.getElementById("itemName").value;
            const dateManufactured = document.getElementById("dateManufactured").value;
            const dateExpiry = document.getElementById("dateExpiry").value;
            const quantity = document.getElementById("quantity").value;

            // Make an AJAX request to add the item
            fetch('add_item.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: name,
                    date_manufactured: dateManufactured,
                    date_expiry: dateExpiry,
                    quantity: quantity
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                closeModal(); // Close the modal
                location.reload(); // Reload the page to see the new item
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        };
    </script>
</body>
</html>