CREATE TABLE IF NOT EXISTS users (
  userId INT AUTO_INCREMENT,
  userName VARCHAR(255) NOT NULL,
  userPassword VARCHAR(255) NOT NULL,
  userAdmin VARCHAR(255),
  PRIMARY KEY (userId)
  ) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS articles (
  articleId INT AUTO_INCREMENT,
  user INT NOT NULL,
  content VARCHAR(255),
  PRIMARY KEY (articleId),
  FOREIGN KEY (user) REFERENCES users (userId)
  ) ENGINE=InnoDB;