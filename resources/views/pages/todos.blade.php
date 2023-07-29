<?php

use function Livewire\Volt\state;
use App\Models\Todo;

state(description: '', todos: fn() => Todo::all());

$addTodo = function () {
    Todo::create([
        'description' => $this->description,
    ]);

    $this->description = '';
    $this->todos = Todo::all();
};

?>

<x-app-layout>
    @volt
        <div>
            <h1>Add Todo</h1>
            <form wire:submit="addTodo">
                <input type="text" wire:model="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
            </form>

            <h2>Todos</h2>
            <ul>
                @foreach ($todos as $todo)
                    <li>{{ $todo->description }}</li>
                @endforeach
            </ul>
        </div>
    @endvolt
</x-app-layout>
