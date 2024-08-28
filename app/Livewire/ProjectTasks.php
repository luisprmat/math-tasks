<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProjectTasks extends Component
{
    public Project $project;

    public bool $openCreateTaskModal = false;

    public bool $openEditTaskModal = false;

    public bool $openDeleteTaskModal = false;

    public TaskForm $form;

    public Task $task;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->form->setTask($task);
    }

    public function openTaskCreateForm()
    {
        $this->resetForm();

        $this->dispatch('create-task');

        $this->openCreateTaskModal = true;
    }

    public function openTaskEditForm(Task $task)
    {
        $this->setTask($task);

        $this->dispatch('edit-task');

        $this->resetErrorBag();

        $this->openEditTaskModal = true;
    }

    public function openTaskDeleteForm(Task $task)
    {
        $this->setTask($task);

        $this->dispatch('delete-task');

        $this->openDeleteTaskModal = true;
    }

    public function store()
    {
        $this->validate();

        $this->project->tasks()->create($this->form->all());

        $this->resetForm();

        $this->openCreateTaskModal = false;

        $this->redirectRoute('projects.show', $this->project);
    }

    public function update()
    {
        $this->validate();

        $this->task->update($this->form->all());

        $this->resetForm();

        $this->openEditTaskModal = false;

        $this->redirectRoute('projects.show', $this->project);
    }

    public function destroy()
    {
        $this->task->delete();

        $this->openDeleteTaskModal = false;

        $this->redirectRoute('projects.show', $this->project);
    }

    private function resetForm(): void
    {
        $this->resetErrorBag();

        $this->reset('task');

        $this->form->reset();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.project-tasks')
            ->title($this->project->name);
    }
}
