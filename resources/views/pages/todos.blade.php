<?php

use function Livewire\Volt\state;
use App\Models\Todo;

state(description: '', todos: fn () => Todo::all());

$addTodo = function () {
    Todo::create([
        'description' => $this->description,
    ]);

    $this->description = '';
    $this->todos = Todo::all();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
</head>
<body>
@volt
    <div>
        <h1>Add Todo</h1>
        <form wire:submit="addTodo">
            <input type="text" wire:model="description">
            <button type="submit">Add</button>
        </form>

        <h2>Todos</h2>
        <ul>
            @foreach ($todos as $todo)
                <li>{{ $todo->description }}</li>
            @endforeach
        </ul>
    </div>
@endvolt
</body>
</html>
