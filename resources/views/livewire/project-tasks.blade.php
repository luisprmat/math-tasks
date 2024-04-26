<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                        <span class="font-semibold">{{ __('Project Name') }}:</span> {{ $project->name }}
                    </h1>

                    <h2 class="my-4 text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Tasks') }}</h2>

                    @if($project->tasks->isNotEmpty())
                        <x-section-border space="2" />
                        @foreach ($project->tasks as $task)
                            <h3 class="text-gray-700 font-semibold dark:text-gray-200">{{ $task->name }}</h3>
                            <div class="w-full mt-2 p-2 border rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden prose dark:prose-invert">{!! $task->description !!}</div>
                            <x-section-border space="2" />
                        @endforeach
                    @else
                        <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed">
                            {{ __('No tasks found for this project!') }}
                        </p>
                    @endif

                    <div class="mt-4">
                        <div class="mb-4">
                            <x-button wire:click="openTaskForm">
                                {{ __('Add Task') }}
                            </x-button>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Laravel Jetstream provides a beautiful interface.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Task Modal -->
    <x-dialog-modal wire:model.live="openCreateTaskModal">
        <x-slot name="title">
            {{ __('New Task') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4" x-data="{}" x-on:create-task.window="setTimeout(() => $refs.taskName.focus(), 250)">
                <x-label for="name" :value="__('Name')" />
                <x-input type="text" id="name" class="mt-1 block w-full"
                            autocomplete="username"
                            x-ref="taskName"
                            wire:model="name" />

                <x-input-error for="name" class="mt-2" />
            </div>

            <div x-data="{ desc: @entangle('description') }">
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea id="description" class="mt-1 block w-full" x-model="desc"></x-textarea>
                    <x-input-error for="description" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="preview" value="{{ __('Preview') }}" />
                    <div id="preview" class="w-full mt-2 p-2 border rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden prose dark:prose-invert" x-html="desc"></div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openCreateTaskModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="createTask" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

@script
<script>
console.log('Hola')
</script>
@endscript
