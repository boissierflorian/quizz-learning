/**
  MIT License

  Copyright (c) 2018 Boissier Florian

  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files (the "Software"), to deal
  in the Software without restriction, including without limitation the rights
  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
  copies of the Software, and to permit persons to whom the Software is
  furnished to do so, subject to the following conditions:

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.

  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
  SOFTWARE.

  File: base.sql
  Description: Initial database setup.
  Version: 1.0
*/


use quizz_learning;

DROP TABLE IF EXISTS t_category;
CREATE TABLE t_category(
  id_category INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(100) NOT NULL UNIQUE,
  color VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_course;
CREATE TABLE t_course(
  id_course INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_category INT NOT NULL,
  title VARCHAR(100) NOT NULL,
  description VARCHAR(255) NOT NULL,
  difficulty TINYINT(1) NOT NULL,
  id_author INT(11) unsigned NOT NULL,
  creation_date DATE NOT NULL,
  CONSTRAINT fk_course_category FOREIGN KEY (id_category) REFERENCES t_category(id_category),
  CONSTRAINT fk_course_user FOREIGN KEY (id_author) REFERENCES t_users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_step;
CREATE TABLE t_step(
  id_step INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  n_step INT NOT NULL,
  step_title VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  id_course INT NOT NULL,
  CONSTRAINT fk_step_course FOREIGN KEY (id_course) REFERENCES t_course(id_course)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_quizz;
CREATE TABLE t_quizz (
  id_quizz      INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  quizz_title VARCHAR(100) NOT NULL,
  creation_date DATE NOT NULL,
  id_author     INT(11) unsigned NOT NULL,
  id_course     INT             NOT NULL,
  CONSTRAINT fk_quizz_user FOREIGN KEY (id_author) REFERENCES t_users(id),
  CONSTRAINT fk_quizz_course FOREIGN KEY (id_course) REFERENCES t_course(id_course)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_question;
CREATE TABLE t_question(
  id_question INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  content VARCHAR(255) NOT NULL,
  id_quizz INT NOT NULL,
  CONSTRAINT fk_question_quizz FOREIGN KEY (id_quizz) REFERENCES t_quizz(id_quizz)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_response;
CREATE TABLE t_response(
  id_response INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  content VARCHAR(255) NOT NULL,
  correct BIT(1) NOT NULL,
  id_question INT NOT NULL,
  CONSTRAINT fk_response_question FOREIGN KEY (id_question) REFERENCES t_question(id_question)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS t_captcha;
CREATE TABLE t_captcha (
  captcha_id bigint(13) unsigned NOT NULL auto_increment,
  captcha_time int(10) unsigned NOT NULL,
  ip_address varchar(45) NOT NULL,
  word varchar(20) NOT NULL,
  PRIMARY KEY `captcha_id` (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO t_category(category_name, color) VALUES ('XML', 'red'),('Webservices', 'blue'), ('Apprentissage artificiel', 'yellow');
INSERT INTO t_course(id_category, title, description, difficulty, id_author, creation_date)
  VALUES(1, 'Présentation du xml', 'Un cours de xml', 1, 1, '2018-03-23'),
  (2, 'Présentation des webservices', 'Une courte présentation sur l\'utilité des webservices !', 2, 1, '2018-03-20'),
  (3, 'Présentation de l\'apprentissage articifiel', 'LAA un sujet assez vaste !', 3, 1, '2018-03-24'),
  (1, 'Cours sur les DTD', 'Un cours sur les DTD', 4, 1, '2018-02-23'),
  (1, 'Cours sur les XML Schemas', 'Un cour sur les xml schemas', 5, 1, '2018-01-23'),
  (1, 'Ajax XML', 'Un cour sur ajax couplé au xml', 0, 1, '2018-01-25');

INSERT INTO t_step(n_step, step_title, content, id_course)
    VALUES (1, 'Installation des outils', 'test', 1),
      (2, 'Lancement du script de base', 'test', 1),
      (3, 'Blabla', 'test', 1);

INSERT INTO t_quizz(quizz_title, creation_date, id_author, id_course)
  VALUES ('Premier quizz xml', '2018-03-20', 1, 1),
    ('Deuxième quizz xml', '2018-03-20', 1, 1);

INSERT INTO t_question(content, id_quizz)
  VALUES('En quelle année a été créé le XML ?', 1),
    ('En quelle année a été créé le XML2 ?', 2);

INSERT INTO t_response(content, correct, id_question) VALUES
  ('En 2004', 0, 1), ('En 2010', 0, 1), ('En 2005', 1, 1), ('En 2009', 0, 1),
  ('En 2004', 1, 2), ('En 2010', 0, 2), ('En 2005', 0, 2), ('En 2009', 0, 2);
