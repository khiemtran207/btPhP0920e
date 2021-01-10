CREATE DATABASE IF NOT EXISTS QUANLYBANHANG CHARACTER SET utf8 collate  utf8_unicode_ci;
CREATE TABLE IF NOT EXISTS categories(
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR (255) NOT NULL,
  avatar VARCHAR (255),
  description TEXT,
  type TINYINT(3),
  status TINYINT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ,
  PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS products(
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_id INT(11) NOT NULL,
  title VARCHAR (255) NOT NULL ,
  avatar VARCHAR (255),
  price INT(11),
  summary VARCHAR (500),
  content TEXT,
  status TINYINT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
  updated_at DATETIME,
  PRIMARY  KEY (id),
  FOREIGN  KEY (category_id) REFERENCES categories(id)
);
CREATE TABLE IF NOT EXISTS news(
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_id INT(11) NOT NULL ,
  title VARCHAR (255) NOT NULL,
  summary VARCHAR (500),
  content TEXT,
  avatar VARCHAR (255),
  status TINYINT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
  updated_at DATETIME,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);
CREATE TABLE IF NOT EXISTS users(
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR (255) NOT NULL,
  password VARCHAR (255) NOT NULL,
  fullname VARCHAR (255),
  avatar VARCHAR (255),
  jobs VARCHAR (255),
  last_login DATETIME ,
  status TINYINT(3),
  created_at TIMESTAMP default CURRENT_TIMESTAMP ,
  updated_at DATETIME,
  PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS orders(
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) ,
  fullname VARCHAR (255),
  address VARCHAR (255),
  mobile INT(11),
  email VARCHAR (50),
  note TEXT,
  price_total INT(11),
  payment_status TINYINT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
  updated_at DATETIME,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS orders_details(
  order_id INT(11) NOT NULL,
  product_id INT(11) NOT NULL,
  quality INT(11) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);
INSERT INTO categories(name, avatar, description,
type, status, updated_at) values (
    'khiêm','abc','ảnh abc',1,1,'2020-12-05 15:51:00'
);
INSERT INTO products(category_id,title, avatar,price, summary, content,
 status, updated_at) values (
 1, 'sản phẩm 1','ảnh 1',3000,'sản phẩm 1 chất lượng 10','sản phẩm ',
 2, '2020-09-08'
 );
INSERT INTO news(category_id,title,summary,content,avatar,status,
 updated_at) values (
  1, 'sản phẩm 1','sản phẩm 1 abc','askdf','ảnh 2',1,'2021-09-20'
 );
INSERT INTO users(username, password, fullname, avatar, jobs, last_login,status, updated_at
) values (
'khiêm','123456','trần văn khiêm','anh.jpg','deverloper','2020-11-11',1,'2020-09-03'
);
INSERT INTO orders(user_id, fullname, address, mobile, email, note, price_total, payment_status, updated_at) values (
  1, 'trần văn khiê','nam hải tiền hải thái bình', 0374253692, 'trankhiem207it@gmail.com','khiêm đz',10000000,0,'2020-12-08'
);
INSERT INTO orders_details(order_id,product_id,quality) VALUES (1,1,1);

SELECT * FROM categories;
SELECT * FROM products;
SELECT * FROM news;
SELECT * FROM users;
SELECT * FROM orders;
SELECT * FROM orders_details;

UPDATE categories SET name = "khiem abc", status = 0 WHERE id = 2;
UPDATE products SET summary = "sp như l" WHERE id = 1;
UPDATE news SET content = "đc" WHERE id = 2;
UPDATE users SET fullname = "khiem tran van" WHERE id = 2;
UPDATE orders SET address = "nam hải" WHERE id = 2;
UPDATE orders_details SET quality = 2 WHERE order_id = 2;

DELETE FROM categories WHERE id > 5;
DELETE FROM products WHERE id > 5;
DELETE FROM news WHERE id > 4;
DELETE FROM users WHERE id > 5;
DELETE FROM orders WHERE id > 3;
DELETE FROM orders_details WHERE order_id > 5;













