<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProjectTasks extends Component
{
    public Project $project;

    /**
     * Indicates if a modal to create Task is open.
     *
     * @var bool
     */
    public $openCreateTaskModal = false;

    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'min:3'])]
    public $description = '';

    public function openTaskForm()
    {
        $this->resetForm();

        $this->dispatch('create-task');

        $this->openCreateTaskModal = true;
    }

    public function createTask()
    {
        $this->validate();

        $this->project->tasks()->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetForm();

        $this->openCreateTaskModal = false;
    }

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    private function resetForm(): void
    {
        $this->resetErrorBag();

        $this->name = '';

        $this->description = '';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.project-tasks')
            ->title($this->project->name);
    }
}
