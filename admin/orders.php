<?php
session_start();
include 'components/connect.php';

// Fetch orders from database using PDO
$query = "SELECT o.id, u.name AS user_name, o.total_price, o.status, c.name AS coupon_name FROM `order` o
          LEFT JOIN `user` u ON o.user_id = u.id
          LEFT JOIN `coupon` c ON o.coupon_id = c.id
          ORDER BY o.id DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Orders Management</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Coupon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['user_name']) ?></td>
                        <td>$<?= number_format($row['total_price'], 2) ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                        <td><?= $row['coupon_name'] ? htmlspecialchars($row['coupon_name']) : 'N/A' ?></td>
                        <td>
                            <a href="edit_order.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="update_order.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
