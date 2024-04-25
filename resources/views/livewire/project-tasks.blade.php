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

                    <h2 class="mt-4 text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Tasks') }}</h2>

                    <div class="mt-4">
                        <div class="mb-4">
                            <x-button>
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
</div>
