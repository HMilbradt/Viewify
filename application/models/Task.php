<?php
/**
 * Represents a task item for the to-do list
 */
require_once APPPATH . 'core/Entity.php';

class Task extends Entity
{
    private $taskName;
    private $size;
    private $group;
    private $priority;

    public function setTaskName($task)
    {
        if (strlen($task) >= 65)
        {
            throw new Exception("Task name must not exceed 64 characters.");
        }

        if (!preg_match('/^[a-z0-9\s]*$/i', $task))
        {
            throw new Exception("Task name must be alphanumeric.");
        }

        $this->taskName = $task;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }

    public function setSize($size)
    {
        if (!is_int($size)) {
            throw new Exception("Must be a number");
        }

        if ($size < 1 || $size > 4) {
            throw new Exception("Must be a number between 1 and 4");
        }

        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setGroup($group)
    {
        if (!is_int($group)) {
            throw new Exception("Must be a number");
        }

        if ($group < 1 || $group > 5) {
            throw new Exception("Must be a number between 1 and 5");
        }

        $this->group = $group;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setPriority($priority)
    {
        if (!is_int($priority)) {
            throw new Exception("Must be a number");
        }

        if ($priority < 1 || $priority > 4) {
            throw new Exception("Must be a number between 1 and 4");
        }

        $this->priority = $priority;
    }

    public function getPriority()
    {
        return $this->priority;
    }
}