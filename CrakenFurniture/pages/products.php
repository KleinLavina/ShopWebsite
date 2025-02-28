<?php
require "backend/database_connect.php";  // Include the Database connection class
$db = new Database();  // Instantiate the Database class

// Fetch all the products from the database
$sql = "SELECT * FROM products";
$result = $db->connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/product-css.css"> <!-- Link to external CSS file -->
</head>
<body>

<div class="container">
    <h1>Storage Units</h1>
    <?php include "add_a_product.php" ?>

    <div class="products-grid">
        <?php
        // Check if there are any products in the result
        if ($result->num_rows > 0) {
            // Output each product's data
            while ($row = $result->fetch_assoc()) {
                // Fetch product data
                $product_id = $row['product_id']; // Assuming you have a column 'product_id'
                $product_name = $row['product_name'];
                $price = $row['price'];
                $description = $row['description'];
                $image_data = $row['image_data'];

                // Convert binary data (image) to base64 for display
                $image_base64 = base64_encode($image_data);
                $image_src = 'data:image/jpeg;base64,' . $image_base64;
                ?>
                <div class="product-card">
                    <img src="<?php echo $image_src; ?>" alt="<?php echo $product_name; ?>">
                    <p><?php echo $product_name; ?></p>
                    <div class="price">$<?php echo number_format($price, 2); ?></div>

                    <!-- Action buttons for Edit, Delete, and Add to Cart -->
                    <div class="action-buttons">
                        <button onclick="toggleCart(<?php echo $product_id; ?>)"> 
                             Add to Cart
                        </button>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <a href="pages/backend/edit_product.php?product_id=<?php echo $product_id; ?>">Edit</a>
                        
                        <!-- Delete button - links to a delete handler with product_id as a query parameter -->
                        <a href="pages/backend/delete_product.php?product_id=<?php echo $product_id; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Display the cart form or login prompt -->
                <div class="form-container" id="cart-form-container-<?php echo $product_id; ?>" style="display:none;">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
                    <div class="container">
                        <button class="exit-btn" onclick="toggleCart(<?php echo $product_id; ?>)">×</button> <!-- Exit button as an '×' symbol -->

                        <div style="display:flex; justify-content: space-around; gap: 20px;">
                            <div class="product-image">
                                <img src="<?php echo $image_src; ?>" alt="<?php echo $product_name; ?>">
                            </div>
                            <div class="product-name">
                                <p><b>Name:</b> <?php echo $product_name; ?></p>
                            </div>
                        </div>
                        
                        <div style="display:flex; justify-content: space-around; gap: 20px;">
                            <div class="product-description">
                                <h3><b>About this Item: </b></h3>
                                <p><?php echo $description; ?></p>
                            </div>
                            <div class="product-price">
                                <div class="price">Price: $<?php echo number_format($price, 2); ?></div>
                                <button>Add to Cart</button>
                                <button>Buy Item</button>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="container">
                            <h2>Please log in to add items to your cart.</h2>
                            <a href="login.php">Log in</a> <!-- Assuming you have a login page -->
                        </div>
                    <?php endif; ?>
                </div>

                <?php
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</div>

<script>
    function toggleCart(productId) {
        const formContainer = document.getElementById('cart-form-container-' + productId);

        // If user is logged in, toggle cart display
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
            formContainer.style.display = formContainer.style.display === 'flex' ? 'none' : 'flex';
        <?php else: ?>
            // Otherwise, prompt the user to log in first
            alert("Please log in before adding items to the cart.");
        <?php endif; ?>
    }
</script>

</body>
</html>

<?php
// Close the database connection
$db->close();
?>
<style>
    /* Ensure the modal only applies styles within its container */
.form-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    overflow: auto;
    padding: 20px;
    box-sizing: border-box;
}

/* Container within the modal */
.form-container .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    position: relative;
    max-width: 900px;
    width: 90%;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    overflow: hidden;
    max-height: 90%; /* Adjust max-height to prevent overflow */
}

/* Styling for exit button */
.form-container .container .exit-btn {
    position: absolute;
    top: 5px;
    right: 15px;
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container .container .exit-btn:hover {
    background-color: #e60000;
}

/* Product title and heading */
.product-title h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 15px;
}

/* Image styling */
.product-image img {
    width: 150px;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Product name styling */
.product-name {
    width: 50%;
    text-align: center;
    border:1px solid black;
}

.product-name p {
    font-size: 0.9em;
    color: #333;
    margin: 0;
    text-align: center;
}

/* Product description styling */
.product-description {
    overflow-y: auto;
    max-height: 200px; /* Adjusting the height for better scroll containment */
    width: 100%;
    border: 1px solid black;
    padding: 10px;
    margin-top: 10px;
    text-align: justify;
}

/* Product description text */
.product-description p {
    font-size: 15px;
    color: #666;
    line-height: 1.5;
    margin: 0;
}

/* Product price section styling */
.product-price {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border: 1px solid black;
}

/* Styling for price */
.product-price .price {
    font-size: 25px;
    font-weight: bold;
    color: #28a745;
    margin-top: 10px;
    text-align: center;
}

/* Button styling */
.product-price button {
    background-color: #008CBA;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.product-price button:hover {
    opacity: 0.8;
}

/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    width: 90%;
    margin: 50px auto;
}

/* Grid layout for product cards */
.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns */
    gap: 20px;
    margin-top: 20px;
}

/* Product card styling */
.product-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Product card hover effect */
.product-card:hover {
    opacity: 0.8;
    transition: scale(1.1) 0.2s ease-in-out;
}

/* Product image in the card */
.product-card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Product name and description in the card */
.product-card h3 {
    font-size: 1.5em;
    margin: 10px 0;
}

.product-card p {
    font-size: 1.1em;
    color: #777;
}

/* Price section in the product card */
.product-card .price {
    font-size: 1.2em;
    color: #4CAF50;
    font-weight: bold;
    margin-top: 10px;
}

/* Action buttons for Edit, Delete, and Add to Cart */
.product-card .action-buttons {
    margin-top: 15px;
}

.product-card .action-buttons a:hover {
    opacity: 0.8;
    transform: scale(1.2); /* Increases size by 10% */
}

.product-card .action-buttons a {
    padding: 8px 15px;
    transition: transform 0.3s ease, opacity 0.3s ease; /* Smooth transition for transform and opacity */
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin: 5px;
}

.product-card .action-buttons a.delete {
    background-color: #f44336; /* Red for delete */
}

.product-card .action-buttons button {
    padding: 8px 15px;
    background-color: #008CBA;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.product-card .action-buttons button:hover {
    opacity: 0.8;
}

/* Responsive Design for smaller screens */
@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on smaller screens */
    }

    .product-name p {
        font-size: 1em; /* Adjust font size for smaller screens */
    }
}

@media (max-width: 480px) {
    .products-grid {
        grid-template-columns: 1fr; /* 1 column on very small screens */
    }
}

</style>