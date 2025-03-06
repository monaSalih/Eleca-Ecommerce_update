<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>admin dashboard</title>
</head>

<body>
    <div class="d-flex">
        <div id="sidebar">
            <button class="btn text-white sidebarHeaderbutton">Eleca Shop</button>
            <a href="ProductCRUDS\index.php">
            <button class="btn CustomSidebarButtons text-white"><img src="flaticon\product.png" alt="" class="me-1">
            Products</button>
            </a>
            <a href="CategoryCRUDS\index.php"> <button class="btn CustomSidebarButtons text-white"><img src="flaticon\categories.png" alt="" class="me-1">
                Categories</button></a>
            <a href=""><button class="btn CustomSidebarButtons text-white"><img src="flaticon\man.png" alt="" class="me-1">Users</button></a>
            <a href=""><button class="btn CustomSidebarButtons text-white"><img src="flaticon\coupon.png" alt="" class="me-1">Coupons</button></a>
            <a href=""><button class="btn CustomSidebarButtons text-white"><img src="flaticon\cogwheel.png" alt="" class="me-1">Settings</button></a>

        </div>
        <div class="page-content">
            <nav class="navbar navbar-expand-lg bg-body-tertiary ">
                <a class="navbar-brand btn ms-3" href="#"><i class="fa-solid fa-bars"></i></a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <!-- Notification dropdown -->
                <ul class="navbar-nav">
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>