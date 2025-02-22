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
    <h1>All Products</h1>
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

                <!-- Unique modal for each product -->
                <div class="form-container" id="cart-form-container-<?php echo $product_id; ?>">
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
        formContainer.style.display = formContainer.style.display === 'flex' ? 'none' : 'flex';
    }
</script>

</body>
</html>

<?php
// Close the database connection
$db->close();
?>
