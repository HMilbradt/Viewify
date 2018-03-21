<?php

class Tasks extends XML_Model {

    public $id;
    public $name;
    public $color;
    public $weight;
    public $picker;

    public function __construct()
    {
            parent::__construct(APPPATH . '../data/tasks.xml', 'id');
    }

    public function load()
    {
        if (($tasks = simplexml_load_file($this->_origin)))
        {
            foreach ($tasks as $task) {
                $record = new stdClass();
                $record->id = (int) $task->id;
                $record->task = (string) $task->name;
                $record->priority = (int) $task->priority;
                $record->size = (int) $task->size;
                $record->group = (int) $task->group;
                $record->deadline = (string) $task->deadline;
                $record->status = (int) $task->status;
                $record->flag = (int) $task->flag;
                $this->_data[$record->id] = $record;
            }
        }
        $this->reindex();
    }

    public function lessCompletedThanIncomplete() {

        $complete = 0;
        $incomplete = 0;

        foreach ($this->tasks->all() as $task) {

            ($task->status == 0) ? $incomplete++ : $complete++;
        }

        return $complete < $incomplete;
    }


    function getCategorizedTasks()
    {
        // extract the undone tasks
        foreach ($this->all() as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }

        // substitute the category name, for sorting
        foreach ($undone as $task)
            $task->group = $this->app->group($task->group);

        // order them by category
        usort($undone, "orderByCategory");

        // convert the array of task objects into an array of associative objects
        foreach ($undone as $task)
            $converted[] = (array) $task;

        return $converted;
    }

    // provide form validation rules
    public function rules()
    {
        $config = array(
            ['field' => 'task', 'label' => 'TODO task', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'priority', 'label' => 'Priority', 'rules' => 'integer|less_than[4]'],
            ['field' => 'size', 'label' => 'Task size', 'rules' => 'integer|less_than[4]'],
            ['field' => 'group', 'label' => 'Task group', 'rules' => 'integer|less_than[5]'],
        );
        return $config;
    }
}

// return -1, 0, or 1 of $a's category name is earlier, equal to, or later than $b's
function orderByCategory($a, $b)
{
    if ($a->group < $b->group)
        return -1;
    elseif ($a->group > $b->group)
        return 1;
    else
        return 0;
}