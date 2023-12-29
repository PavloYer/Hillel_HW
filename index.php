<?php
declare(strict_types=1);

require_once 'configs.php';
require_once ROOT . 'database/Connect.php';

try {
    $connect = Connect::getInstance();
} catch (PDOException $exception) {
    echo $exception->getMessage();
    exit;
}

$table_name = 'blogs';

$create_table = "CREATE TABLE $table_name
(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `title` CHAR(120) NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted` TINYINT(1) DEFAULT 0
)ENGINE=InnoDB;";

$stmt = $connect->query($create_table);

$table_data = "INSERT INTO $table_name (`title`, `content`)
    VALUES ('News','neeeeeeeeeeeeewss'),
           ('Blogs', 'blooooooooooogs'),
           ('Books', 'boooooks'),
           ('Smt','Smt interesting')
    ";

$stmt = $connect->prepare($table_data);
$stmt->execute();

$sql = "SELECT `name`, `email`, `password`, `title` FROM users
    JOIN user_accounts ua on users.id = ua.user_id
    JOIN users_courses uc on users.id = uc.user_id
    JOIN courses c on c.id = uc.course_id";

$stmt = $connect->query($sql);
echo '<pre>';
print_r($stmt->fetch());

$sql = "SELECT `title`, `content` FROM `blogs`";

$stmt = $connect->query($sql);
print_r($stmt->fetchAll());