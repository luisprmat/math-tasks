<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 dark:text-gray-100 dark:bg-inherit">
                        <div class="mb-4">
                            <div class="mb-4">
                                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white dark:text-gray-800 uppercase bg-gray-800 dark:bg-gray-200 rounded-md border border-transparent hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white cursor-pointer">
                                    {{ __('Create Project') }}
                                </a>
                            </div>
                        </div>

                        <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle dark:border-gray-500">
                            <table class="min-w-full border divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="divide-y divide-gray-200 divide-solid dark:divide-gray-600">
                                    <tr>
                                        <th class="px-6 py-3 text-left bg-gray-50 dark:bg-gray-900">
                                        </th>
                                        <th class="px-6 py-3 text-left bg-gray-50 dark:bg-gray-900">
                                            <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 dark:text-gray-400 uppercase">{{ __('Name') }}</span>
                                        </th>
                                        <th class="px-6 py-3 text-left bg-gray-50 dark:bg-gray-900"></th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid dark:divide-gray-600">
                                    @forelse($projects as $project)
                                        <tr>
                                            <td class="px-4 py-2 text-sm leading-5 dark:bg-gray-800 text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                                {{ $project->id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm leading-5 dark:bg-gray-800 text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('projects.show', $project) }}">
                                                    {{ str($project->name)->limit(72, '...') }}
                                                </a>
                                            </td>
                                            <td class="dark:bg-gray-800 whitespace-nowrap">
                                                <div class="mx-2 flex gap-2 justify-end">
                                                    <x-primary-link href="{{ route('projects.edit', $project) }}">
                                                        {{ __('Edit') }}
                                                    </x-primary-link>
                                                    <form method="POST" action="{{ route('projects.destroy', $project) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <x-danger-button onclick="event.preventDefault();
                                                            if(confirm('{{ __('Are you sure you want to delete this project?') }}')) this.closest('form').submit();">
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-4 text-center leading-5 dark:bg-gray-800 text-gray-900 dark:text-gray-200">{{ __('No results found!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>{{ $projects->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
