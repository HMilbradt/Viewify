<?php
use PHPUnit\Framework\TestCase;

class TaskListTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('tasks');
        $this->tasks = new Tasks();
    }

    function testTasksHasMoreUncompletedThanCompleted()
    {
        $complete = 0;
        $incomplete = 0;

        foreach ($this->tasks->all() as $task) {

            ($task->status == 1) ? $incomplete++ : $complete++;
        }

        $this->assertEquals(true, $complete < $incomplete);
    }
}