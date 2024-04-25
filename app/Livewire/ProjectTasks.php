<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProjectTasks extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.project-tasks')
            ->title($this->project->name);
    }
}
