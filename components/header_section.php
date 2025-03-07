<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/header_style.css">

</head>
<body>
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<header class="header">
<section class="flex">

   <a href="home.php" class="logo">Elecaaa</a>

   <nav class="navbar">
      <a href="home.php" style="color:green">homfasdfasdfe</a>
      <a href="about.php">about</a>
      <a href="orders.php">orders</a>
      <a href="shop.php">products</a>
      <a href="contact.php">contact</a>
   </nav>

   <div class="icons d-flex align-items-center gap-2">
    <?php
        $count_wishlist_item = $conn->prepare("SELECT * FROM `wishlist` WHERE id = ?");
        $count_wishlist_item->execute([$user_id]);
        $total_wishlist_counts = $count_wishlist_item->rowCount();

        $count_order_items = $conn->prepare("SELECT * FROM `order` WHERE id = ?");
        $count_order_items->execute([$user_id]);
        $total_order_counts = $count_order_items->rowCount();
    ?>
    <div id="menu-btn" class="fas fa-bars fs-5"></div>
    <a href="search_page.php" class="text-dark fs-6">
        <i class="fas fa-search"></i>
    </a>
    <a href="wishlist.php" class="text-dark fs-6 d-flex align-items-center">
        <i class="fas fa-heart"></i>
        <span class="ms-1">(<?= $total_wishlist_counts; ?>)</span>
    </a>
    <a href="orders.php" class="text-dark fs-6 d-flex align-items-center">
        <i class="fas fa-shopping-cart"></i>
        <span class="ms-1">(<?= $total_order_counts; ?>)</span>
    </a>
    <div id="user-btn" class="fas fa-user fs-5"></div>
</div>


   <div class="profile">
      <?php          
         $select_profile = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
         $select_profile->execute( [$user_id]);
         if($select_profile->rowCount() > 0){
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <p><?= $fetch_profile["name"]; ?></p>
      <a href="update_user.php" class="btn">update profile</a>
      <div class="flex-btn">
         <a href="user_register.php" class="option-btn">register</a>
         <a href="user_login.php" class="option-btn">login</a>
      </div>
      <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      <?php
         }else{
      ?>
      <p>please login or register first!</p>
      <div class="flex-btn">
         <a href="user_register.php" class="option-btn">register</a>
         <a href="user_login.php" class="option-btn">login</a>
      </div>
      <?php
         }
      ?>      
      
      
   </div>

</section>
</header>
