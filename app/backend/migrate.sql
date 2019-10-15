DROP TABLE IF EXIST content;
DROP TABLE IF EXIST news;
DROP TABLE IF EXIST instructors;
DROP TABLE IF EXIST pts;
DROP TABLE IF EXIST tokens;
DROP TABLE IF EXIST training;
DROP TABLE IF EXIST users;
DROP TABLE IF EXIST images;

CREATE TABLE content (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  text text NOT NULL,
  img varchar(255),
  tag varchar(255),
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE news (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  text text NOT NULL,
  img varchar(255),
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE instructors (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  text text NOT NULL,
  img varchar(255),
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE pts (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  text text NOT NULL,
  img varchar(255),
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE tokens (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    token varchar(50),
    tokenTimer varchar(50),
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE training (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    text text,
    tag VARCHAR(255),
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin_access BOOLEAN NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE images (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img varchar(255) NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

