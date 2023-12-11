<?php

namespace classes;
require_once 'configs.php';
require_once ROOT . 'classes/TaskStatus.php';


class TaskTracker
{
    private string $trackerName;
    private string $path;
    private array $tasks;

    public function __construct($trackerName)
    {
        $this->setTrackerName($trackerName);
        $this->path = $this->getPath($trackerName);
        $this->tasks = $this->getArrayTasks();
    }

    public function addTask(string $taskName, int $priority): void
    {
        $status = TaskStatus::undone->value;

        $taskID = (int)array_key_last($this->tasks) + 1;
        $this->tasks[$taskID] = [$taskName, $status, $priority];

        $fileStream = fopen($this->path, 'a+');

        fwrite($fileStream, "$taskID|$taskName|$status|$priority\n");
        fclose($fileStream);

    }

    public function deleteTask($taskID): void
    {
        if (!isset($this->tasks[$taskID])) {
            throw new \Exception('Task ID for deleting not found');
        }
        unset($this->tasks[$taskID]);

        $this->rewriteTracker();
    }

    public function completeTask($taskID, TaskStatus $status): void
    {
        if (!isset($this->tasks[$taskID])) {
            throw new \Exception('Task ID for completing not found');
        }

        $this->tasks[$taskID][1] = $status->value;
        $this->rewriteTracker();
    }

    public function getTasks(): array
    {
        foreach ($this->tasks as $id => $task) {
            $sortingRule[$id] = $task[2];
        }
        asort($sortingRule);
        $sortingRule = array_keys($sortingRule);

        foreach ($sortingRule as $id) {
            $sortedTasks[$id] = $this->tasks[$id];
        }
        return $sortedTasks;
    }

    public function setTrackerName(string $trackerName): void
    {
        $extension = pathinfo($trackerName, PATHINFO_EXTENSION);
        if (!in_array($extension, ['txt', 'scv'])) //todo use enum
        {
            throw new \Exception('File format is invalid');
        }

        if (!file_exists($this->getPath($trackerName))) {
            fclose(fopen($this->getPath($trackerName), 'a'));
        }

        $this->trackerName = $trackerName;
    }

    public function getTrackerName(): string
    {
        return $this->trackerName;
    }

    private function getPath($trackerName): string
    {
        return ROOT . "files/" . $trackerName;
    }

    private function getArrayTasks(): array
    {
        $tmp = file($this->path, FILE_IGNORE_NEW_LINES);
        if (empty($tmp)) {
            return [];
        }

        foreach ($tmp as $task) {
            $arrayTask = explode('|', $task);
            $this->tasks[$arrayTask[0]] = [$arrayTask[1], $arrayTask[2], $arrayTask[3]];
        }

        return $this->tasks;
    }

    private function rewriteTracker(): void
    {
        $fileStream = fopen($this->path, 'w+');
        foreach ($this->tasks as $id => $task) {
            fwrite($fileStream, "$id|$task[0]|$task[1]|$task[2]\n");
        }
        fclose($fileStream);
    }

}