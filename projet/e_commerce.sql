--
-- Table structure for table `users`
--

CREATE TABLE users (
  id int NOT NULL,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  is_active BOOLEAN DEFAULT TRUE
);

-- Table structure for table `commande`

CREATE TABLE commande ( 
  id INT AUTO_INCREMENT PRIMARY KEY, 
  dates DATE, 
  user_id INT, 
  FOREIGN KEY (user_id) REFERENCES users(id)
);
-- Table structure for table `product`

CREATE TABLE products ( 
  id INT AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(255) NOT NULL, 
  description TEXT, 
  price DECIMAL(10, 2) NOT NULL, 
  quantite INT 
);

--
-- Table structure for table `commande_product`
--

CREATE TABLE commande_product ( 
  order_id INT NOT NULL, 
  product_id INT NOT NULL, 
  quantity INT NOT NULL, 
  FOREIGN KEY (order_id) REFERENCES commande(id) , 
  FOREIGN KEY (product_id) REFERENCES products(id) 
);

ALTER TABLE users ADD COLUMN role ENUM('admin', 'client') DEFAULT 'client';