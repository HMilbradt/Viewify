<?php
use PHPUnit\Framework\TestCase;

class TaskTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('tasks');
        $this->task = new Tasks();
    }
}