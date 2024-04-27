<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;

    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'min:3'])]
    public $description = '';

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->name = $task->name;

        $this->description = $task->description;
    }
}
