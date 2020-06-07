<?php

$servername = "localhost";
$username = "webandpr_vvTjz1Bk";
$password = "QRJsguvEARviGwFM";
$dbname = "webandpr_vvTjz1Bk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$queries = [
      'create table app_infographics (id int auto_increment, title varchar(200) null, src varchar(300) null, description varchar(300) null, constraint infographics_pk primary key (id));',
    /*    "create table app_answers (id int auto_increment, question_id int not null, title varchar(140) not null, constraint app_answers_id_uindex unique (id));",
        "alter table app_answers add primary key (id);",
        "create table app_documents (id int auto_increment primary key, title varchar(140) not null, src varchar(40) not null);",
        "create table app_news ( id int auto_increment primary key, text varchar(240) not null );",
        "create table app_question_answer ( id int auto_increment primary key, answer_id int null, question_id int not null, survey_id int not null );",
        "create table app_questions ( id int auto_increment, survey_id int not null, title varchar(140) not null, type varchar(15) not null, constraint app_questions_id_uindex unique (id) );",
        "alter table app_questions add primary key (id);",
        "create table app_surveys ( id int auto_increment primary key, title varchar(140) not null, description varchar(240) null, status tinyint default 0 not null );",
        "create table app_users ( id int auto_increment primary key, username varchar(15) not null, password varchar(50) not null );",
        'INSERT INTO app_users (username, password) VALUES ("admin","3c94290b29b4bce707beb0f0227671c866a6b5cd");',

        'alter table app_question_answer add other int null;',
        'alter table app_question_answer modify other text null;',
    */
];
foreach ($queries as $key=>$sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Table $key successfully";
    } else {
        echo "Error creating table $key :" . $conn->error;
    }
}
$conn->close();
?>