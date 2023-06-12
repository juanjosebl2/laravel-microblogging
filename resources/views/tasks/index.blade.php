<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <textarea name="description" placeholder="{{ __('The task is...') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <br />

            <label for="difficulty">Difficulty:</label>
            <select class="form-control" id="difficulty" name="difficulty">
                <option value=""></option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <x-input-error :messages="$errors->get('difficulty')" class="mt-2" />
            <br />
            <br />

            <x-primary-button class="mt-4">{{ __('Task') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tasks as $task)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <small class="ml-2 text-sm text-gray-600">{{ $task->created_at->format('j M Y, g:i a') }}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $task->description }}</p>

                        @if ($task->difficulty == 'high')
                            <p class="mt-4 text-lg text-red-500">{{ strtoupper($task->difficulty) }}</p>
                        @elseif ($task->difficulty == 'medium')
                            <p class="mt-4 text-lg text-yellow-500">{{ strtoupper($task->difficulty) }}</p>
                        @else
                            <p class="mt-4 text-lg text-green-500">{{ strtoupper($task->difficulty) }}</p>
                        @endif
                        
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
