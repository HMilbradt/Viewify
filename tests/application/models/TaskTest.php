<?php
use PHPUnit\Framework\TestCase;

class TaskTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('task');
        $this->task = new Task;
    }

    function testSetTaskName()
    {
        $this->task->setTaskName("Testy");
        $this->assertEquals("Testy", $this->task->getTaskName());
        $this->expectException(Exception::class);
        $this->task->setTaskName("!@#$%^&*()");
    }

    public function testSetSize() {
        $this->task->setSize(1);
        $this->assertEquals(1, $this->task->getSize());
        $this->expectException(Exception::class);
        $this->task->setSize("Am I here?");
    }

    public function testSetGroup() {
        $this->task->setGroup(2);
        $this->assertEquals(2, $this->task->getGroup());
        $this->expectException(Exception::class);
        $this->task->setGroup(8675309);
    }

    public function testSetPriority(){
        $this->task->setPriority(3);
        $this->assertEquals(3, $this->task->getPriority());
        $this->expectException(Exception::class);
        $this->task->setPriority(-42);

    }

}