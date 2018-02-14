<?php

class Views extends Application
{
    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';

        // get all the tasks
        $tasks = $this->tasks->all();

        // so we don't need pagebody
        $this->data['content'] = 'Ok';
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
        $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

        $this->render('template_secondary');
    }
}