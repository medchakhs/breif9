<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <link rel="stylesheet" href="affiche.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="aficheproduct.php" class="active">
              <i class="bx bx-list-ul"></i>
              <span class="links_name">les Produit</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bx bx-pie-chart-alt-2"></i>
              <span class="links_name">forme product</span>
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

    <!-- table affiche -->
<div class="tab">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include_once '../database.php';
        $query = "SELECT * FROM products";
        $stmt = $pdo->query($query);
        
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          if($row['sup'] == NULL){
            echo "<tr>";
            echo "<td>" .$row['name']. "</td>";
            echo "<td>" .$row['description']."</td>";
            echo "<td>".$row['price']. "</td>";
            echo "<td>".$row['quantite']. "</td>";
            echo "<td><img src='". $row['image']."' alt=''></td>"; 
            echo "<td><a href='formmodif.php?id=".$row['id']."'>Modofier</a></td>"; 
            echo "<td><a href='../products/delete.php?id=".$row['id']."'>Supprimer</a></td>";  
            echo "</tr>";
        }
      }
        ?>
        </tbody>
    </table>
</div>


  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebar-button i");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
    };
  </script>
</body>
</html>
