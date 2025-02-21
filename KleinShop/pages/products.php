<?php include "product_upload.php" ?>

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
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .product-card p {
            font-size: 1.1em;
            color: #777;
        }

        .product-card .price {
            font-size: 1.2em;
            color: #4CAF50;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Edit and Delete buttons */
        .product-card .action-buttons {
            margin-top: 15px;
        }

        .product-card .action-buttons a {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }

        .product-card .action-buttons a.delete {
            background-color: #f44336; /* Red for delete */
        }

        .product-card .action-buttons a:hover {
            opacity: 0.8;
        }

        /* Responsive Design for smaller screens */
        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 columns on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr; /* 1 column on very small screens */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>All Products</h1>

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
                        <h3><?php echo $product_name; ?></h3>
                        <p><?php echo $description; ?></p>
                        <div class="price">$<?php echo number_format($price, 2); ?></div>

                        <!-- Action buttons for Edit and Delete -->
                        <div class="action-buttons">
                            <!-- Edit button - links to an edit page with product_id as a query parameter -->
                            <a href="pages/backend/edit_product.php?product_id=<?php echo $product_id; ?>">Edit</a>
                            
                            <!-- Delete button - links to a delete handler with product_id as a query parameter -->
                            <a href="pages/backend/delete_product.php?product_id=<?php echo $product_id; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
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

</body>
</html>

<?php
// Close the database connection
$db->close();
?>  
