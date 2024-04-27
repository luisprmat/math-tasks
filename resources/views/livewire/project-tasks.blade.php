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
                            <h3 class="flex gap-2 text-gray-700 font-semibold dark:text-gray-200">
                                <div>{{ $task->name }}</div>
                                <button type="button" wire:click="openTaskEditForm({{ $task->id }})" class="text-indigo-500 dark:text-indigo-300 hover:text-indigo-700 dark:hover:text-indigo-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                            </h3>
                            <div wire:ignore class="w-full mt-2 p-2 border rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden prose dark:prose-invert">{!! $task->description !!}</div>
                            <x-section-border space="2" />
                        @endforeach
                    @else
                        <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed">
                            {{ __('No tasks found for this project!') }}
                        </p>
                    @endif

                    <div class="mt-4">
                        <div class="mb-4">
                            <x-button wire:click="openTaskCreateForm">
                                {{ __('Add Task') }}
                            </x-button>
                        </div>
                    </div>

                    {{-- <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Laravel Jetstream provides a beautiful interface.
                    </p> --}}
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
                            wire:model="form.name" />

                <x-input-error for="form.name" class="mt-2" />
            </div>

            <div x-data="{ desc: @entangle('form.description') }">
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea id="description" class="mt-1 block w-full" x-model="desc"></x-textarea>
                    <x-input-error for="form.description" class="mt-2" />
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

            <x-button type="button" class="ms-3" wire:click="store" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Edit Task Modal -->
    <x-dialog-modal wire:model.live="openEditTaskModal">
        <x-slot name="title">
            {{ __('Edit Task') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4" x-data="{}" x-on:edit-task.window="setTimeout(() => $refs.taskName.focus(), 250)">
                <x-label for="name" :value="__('Name')" />
                <x-input type="text" id="name" class="mt-1 block w-full"
                            autocomplete="username"
                            x-ref="taskName"
                            wire:model="form.name" />

                <x-input-error for="form.name" class="mt-2" />
            </div>

            <div x-data="{ desc: @entangle('form.description') }">
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea id="description" class="mt-1 block w-full" x-model="desc"></x-textarea>
                    <x-input-error for="form.description" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="preview" value="{{ __('Preview') }}" />
                    <div wire:ignore id="preview" class="w-full mt-2 p-2 border rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden prose dark:prose-invert" x-html="desc"></div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openEditTaskModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button type="button" class="ms-3" wire:click="update" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    @push('headScripts')
        <script>
            MathJax = {
                tex: {
                    inlineMath: [['$', '$'], ['\\(', '\\)']]
                }
            };
        </script>
        <script id="MathJax-script" async
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
        </script>
    @endpush
</div>
