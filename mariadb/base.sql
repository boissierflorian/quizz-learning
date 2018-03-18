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

DROP DATABASE IF EXISTS quizz_learning;

CREATE DATABASE quizz_learning
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

use quizz_learning;

DROP TABLE IF EXISTS t_user;
CREATE TABLE t_user(
  id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nickname VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  registration_date DATE NOT NULL
);

DROP TABLE IF EXISTS t_category;
CREATE TABLE t_category(
  id_category INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(100) NOT NULL UNIQUE
);

DROP TABLE IF EXISTS t_course;
CREATE TABLE t_course(
  id_course INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_category INT NOT NULL,
  content TEXT NOT NULL,
  id_author INT NOT NULL,
  creation_date DATE NOT NULL,
  CONSTRAINT fk_course_category FOREIGN KEY (id_category) REFERENCES t_category(id_category),
  CONSTRAINT fk_course_user FOREIGN KEY (id_author) REFERENCES t_user(id_user)
);

DROP TABLE IF EXISTS t_quizz;
CREATE TABLE t_quizz(
  id_quizz INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  creation_date DATE NOT NULL,
  id_author INT NOT NULL,
  id_course INT NOT NULL,
  CONSTRAINT fk_quizz_user FOREIGN KEY (id_author) REFERENCES t_user(id_user),
  CONSTRAINT fk_quizz_course FOREIGN KEY (id_course) REFERENCES t_course(id_course)
);

DROP TABLE IF EXISTS t_question;
CREATE TABLE t_question(
  id_question INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  content VARCHAR(255) NOT NULL,
  id_quizz INT NOT NULL,
  CONSTRAINT fk_question_quizz FOREIGN KEY (id_quizz) REFERENCES t_quizz(id_quizz)
);

DROP TABLE IF EXISTS t_response;
CREATE TABLE t_response(
  id_response INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  content VARCHAR(255) NOT NULL,
  correct BIT(1) NOT NULL,
  id_question INT NOT NULL,
  CONSTRAINT fk_response_question FOREIGN KEY (id_question) REFERENCES t_question(id_question)
);