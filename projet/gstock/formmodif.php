<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <link rel="stylesheet" href="form.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="home-section">
    <div class="sidebar">
        <div class="logo-details">
          <i class="bx bxl-c-plus-plus"></i>
          <span class="logo_name">D-CLIC</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="index.php" >
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="formproduct.php">
              <i class="bx bx-box"></i>
              <span class="links_name">Ajouter Produit</span>
            </a>
          </li>
          <li>
            <a href="aficheproduct.php">
              <i class="bx bx-list-ul"></i>
              <span class="links_name">les produit</span>
            </a>
          </li>
          <li>
            <a href="" class="active">
              <i class="bx bx-pie-chart-alt-2"></i>
              <span class="links_name">forme modif</span>
            </a>
          </li>
          <li>
            <a href="gereclient.php">
              <i class="bx bx-coin-stack"></i>
              <span class="links_name">GERE LES CLIENT</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bx bx-book-alt"></i>
              <span class="links_name">Toutes les Commandes</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bx bx-user"></i>
              <span class="links_name">Utilisateur</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bx bx-cog"></i>
              <span class="links_name">Configuration</span>
            </a>
          </li>
          <li class="log_out">
            <a href="#">
              <i class="bx bx-log-out"></i>
              <span class="links_name">Déconnexion</span>
            </a>
          </li>
        </ul>
    </div>
    

    
<section class="home-section">
        <nav>
          <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
            <span class="dashboard">Dashboard</span>
          </div>
          <div class="search-box">
            <input type="text" placeholder="Recherche..." />
            <i class="bx bx-search"></i>
          </div>
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Komche</span>
            <i class="bx bx-chevron-down"></i>
          </div>
        </nav>
</section>

   <?php
    include_once '../products/edit.php';
    include_once '../database.php';
    $id = $_GET['id'];
    $new = new modifierproduits;
    $row = $new->modif($id);
    if(isset($_POST['submit'])){
      $id = $_GET['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $image = $_POST['image'];
      $new->modifierproduit($id,$name, $description, $price, $quantity, $image);
      header("location: aficheproduct.php");
    }
   ?>
      <!-- form -->
  <section class="form-container">
    <h2>Product Form</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" placeholder="Enter product name" value='<?= $row['name'] ?>' required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Enter product description"  required><?= $row['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter product price" step="0.01" value='<?= $row['price'] ?>' required>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter product quantity" value='<?= $row['quantite'] ?>' required>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="text" id="image" name="image" value='<?= $row['image'] ?>' required>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Modif</button>
      </div>
    </form>
  </section>
  
      

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebar-button i");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
    };
  </script>
  
</body>
</html>
