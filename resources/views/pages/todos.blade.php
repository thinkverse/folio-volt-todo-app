<?php

use function Livewire\Volt\{state, form};
use App\Livewire\Forms\CreateTodo;
use App\Models\Todo;

state(todos: fn() => Todo::all());

form(CreateTodo::class);

$addTodo = function () {
    $this->form->save();

    $this->todos = Todo::all();
};

?>

<x-app-layout>
    @volt
        <div class="grid grid-cols-3 m-12 gap-y-8">
            <header class="col-span-3">
                <h1 class="text-5xl">📝</h1>
            </header>

            <section class="col-span-2">
                <header>
                    <h2 class="text-2xl font-semibold">Todos</h2>
                </header>

                @if (empty($todos))
                    <p class="mt-4 text-gray-500">
                        {{ __("You don't have any todos right now.") }}
                    </p>
                @else
                    <ul class="grid gap-5 mt-4 text-gray-700">
                        @foreach ($todos as $todo)
                            <li>{{ $todo->description }}</li>
                        @endforeach
                    </ul>
                @endif
            </section>

            <section>
                <header>
                    <h2 class="text-xl font-semibold">Create a Todo</h2>
                </header>

                <form wire:submit="addTodo" class="flex flex-col max-w-lg gap-2 mt-4">
                    <label for="description" class="text-gray-500">Description</label>
                    <input type="text" id="description" wire:model="form.description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('form.description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                    <button type="submit" class="px-3 py-2 mt-4 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('Add Todo') }}
                    </button>
                </form>
            </section>
        </div>
    @endvolt
</x-app-layout>
