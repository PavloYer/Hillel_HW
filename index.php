<?php
declare(strict_types=1);

require_once 'configs.php';
require_once ROOT . 'classes/TaskTracker.php';
require_once ROOT . 'classes/TaskStatus.php';

use classes\TaskTracker;
use classes\TaskStatus;

try {
    $task = new TaskTracker('newTasks.txt');
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
    exit;
}

$task->addTask('gym', 7);     //метод, який додає завдання з назвою $taskName та пріоритетом $priority до списку завдань.
$task->addTask('cooking', 3); //метод, який додає завдання з назвою $taskName та пріоритетом $priority до списку завдань.
$task->addTask('cleaning', 7);  //метод, який додає завдання з назвою $taskName та пріоритетом $priority до списку завдань.
$task->addTask('resting', 1); //метод, який додає завдання з назвою $taskName та пріоритетом $priority до списку завдань.
$task->addTask('walking', 4); //метод, який додає завдання з назвою $taskName та пріоритетом $priority до списку завдань.

try {
    $task->deleteTask(4);
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $task->completeTask(3, TaskStatus::done);
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

var_dump($task->getTasks());    // метод, який повертає всі завдання зі списку відсортовані за пріоритетом в порядку спадання.
