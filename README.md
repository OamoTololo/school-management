School-management database.

Database name: school-management

Database tables:

	CREATE TABLE message_to_classes
(
id INT PRIMARY KEY AUTO_INCREMENT,
student_id INT(10) NOT NULL,
date TIMESTAMP NOT NULL,
message_to_classes TEXT NOT NULL
);

CREATE TABLE register
(
register_id INT PRIMARY KEY AUTO_INCREMENT,
register_name VARCHAR(50) NOT NULL,
register_surname VARCHAR(50) NOT NULL,
register_email VARCHAR(155) UNIQUE NOT NULL,
register_phone_no VARCHAR(10) NOT NULL,
register_address VARCHAR(150) NOT NULL,
register_qua VARCHAR(255) NOT NULL,
register_course VARCHAR(100) NOT NULL,
date TIMESTAMP NOT NULL
);

CREATE TABLE result
(
result_id INT PRIMARY KEY AUTO_INCREMENT,
student_id INT(10) NOT NULL,
batch_id INT(10) NOT NULL,
class_id INT(10) NOT NULL,
date VARCHAR(100) NOT NULL,
subject VARCHAR(100) NOT NULL,
total_marks INT(10) NOT NULL,
obtained_mark INT(10) NOT NULL
);

CREATE TABLE review **
(
review_id INT PRIMARY KEY AUTO_INCREMENT,
review_name VARCHAR(50) NOT NULL,
review_image VARCHAR(250) NOT NULL,
review VARCHAR(250) NOT NULL,
review_date VARCHAR(100) NOT NULL
);

CREATE TABLE student
(
student_id INT PRIMARY KEY AUTO_INCREMENT,
student_name VARCHAR(50) NOT NULL,
student_surname VARCHAR(50) NOT NULL,
student_address VARCHAR(150) NOT NULL,
student_class VARCHAR(50) NOT NULL,
student_batch VARCHAR(50) NOT NULL,
student_medium VARCHAR(50) NOT NULL,
student_gender VARCHAR(12) NOT NULL,
student_phone_no VARCHAR(20) NOT NULL,
student_email VARCHAR(150) UNIQUE NOT NULL,
student_school VARCHAR(80) NOT NULL,
student_fee INT(10) NOT NULL,
student_password VARCHAR(20) NOT NULL,
student_subject VARCHAR(50) NOT NULL,
student_c_exam VARCHAR(50) NOT NULL,
student_dob VARCHAR(150) NOT NULL,
student_image VARCHAR(250) NOT NULL,
student_date VARCHAR(150) NOT NULL
);

CREATE TABLE users
(
user_id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
user_password VARCHAR(20) NOT NULL,
user_role VARCHAR(50) NOT NULL,
user_image VARCHAR(250) NOT NULL
);

CREATE TABLE attendance
(
attendance_id INT PRIMARY KEY AUTO_INCREMENT,
student_id INT(10) NOT NULL,
attendance_ VARCHAR(20) NOT NULL,
user_role VARCHAR(150) NOT NULL,
attendance_date TIMESTAMP NOT NULL
);

CREATE TABLE category
(
category_id INT PRIMARY KEY AUTO_INCREMENT,
category_name VARCHAR(50) NOT NULL
);

CREATE TABLE competitve
(
competitve_id INT PRIMARY KEY AUTO_INCREMENT,
exam_name VARCHAR(50) NOT NULL
);

CREATE TABLE course
(
coursee_id INT PRIMARY KEY AUTO_INCREMENT,
course_name VARCHAR(80) NOT NULL,
course_duration VARCHAR(50) NOT NULL,
course_fee VARCHAR(250) NOT NULL,
course_start VARCHAR(80) NOT NULL,
course_class INT(10) NOT NULL
);

CREATE TABLE exam
(
exam_id INT PRIMARY KEY AUTO_INCREMENT,
batch_name VARCHAR(80) NOT NULL,
subject VARCHAR(50) NOT NULL,
exam_date VARCHAR(80) NOT NULL,
exam_class INT(10) NOT NULL,
exam_total_marks VARCHAR(80) NOT NULL
);

CREATE TABLE expense
(
expense_id INT PRIMARY KEY AUTO_INCREMENT,
expense_particular VARCHAR(80) NOT NULL,
expense_amount INT(80) NOT NULL,
expense_date VARCHAR(80) NOT NULL
);

CREATE TABLE fee
(
fee_id INT PRIMARY KEY AUTO_INCREMENT,
student_id INT(10) NOT NULL,
class_id INT(10) NOT NULL,
batch_id INT(10) NOT NULL,
fees INT(10) NOT NULL,
fee_r_no INT(10) NOT NULL,
fee_date TIMESTAMP NOT NULL
);

CREATE TABLE gallery
(
gallery_id INT PRIMARY KEY AUTO_INCREMENT,
gallery_title VARCHAR(210) NOT NULL,
gallery_image VARCHAR(250) NOT NULL
);

CREATE TABLE message
(
message_id INT PRIMARY KEY AUTO_INCREMENT,
student_id INT(10) NOT NULL,
message TEXT NOT NULL,
message_date TIMESTAMP NOT NULL
);
