<?php
// Connect to the database
$host = "localhost";
$user = "root"; // Change if needed
$pass = ""; // Change if needed
$dbname = "eleca_db"; // Your new database

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the product/post
$sql = "SELECT * FROM product WHERE id = $id"; // Change 'products' to your actual table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Item not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['name']); ?></title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; padding-top: 20px; }
        .product-card { border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .product-image { max-height: 300px; object-fit: cover; border-radius: 10px 10px 0 0; }
        .price { color: #28a745; font-size: 22px; font-weight: bold; }
        .description { margin-top: 10px;font-size: 18px; }
        .product-name { font-size: 24px; font-weight: bold; color: #333; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card product-card">
                <img src="https://via.placeholder.com/800x400" class="card-img-top product-image" alt="Product Image">
                <div class="card-body">
                    <h5 class="product-name"><?php echo htmlspecialchars($row['name']); ?></h5>
                    <p class="price">$<?php echo number_format($row['price'], 2); ?></p>
                    <p class="description"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-secondary">Back to Products</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
