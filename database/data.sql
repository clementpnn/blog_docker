CREATE TABLE IF NOT EXISTS user (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  admin BOOLEAN NOT NULL,
  -- PRIMARY KEY (userId)
  ) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS article (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  content VARCHAR(255) NOT NULL,
  date DATETIME NOT NULL,
  image VARCHAR(255) NOT NULL,
  -- PRIMARY KEY (articleId),
  FOREIGN KEY (user) REFERENCES user (id)
  ) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comment (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user INT NOT NULL,
  article INT NOT NULL,
  date DATETIME NOT NULL,
  content VARCHAR(255) NOT NULL,
  FOREIGN KEY (user) REFERENCES user (id)
  FOREIGN KEY (article) REFERENCES article (id)
)

CREATE TABLE IF NOT EXISTS subComment (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user INT NOT NULL,
  comment INT NOT NULL,
  date DATETIME NOT NULL,
  content VARCHAR(255) NOT NULL,
  FOREIGN KEY (user) REFERENCES user (id)
  FOREIGN KEY (comment) REFERENCES comment (id)
)