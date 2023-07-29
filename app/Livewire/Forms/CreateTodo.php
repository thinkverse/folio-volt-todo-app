<?php

namespace App\Livewire\Forms;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateTodo extends Form
{
    #[Rule('required|max:255')]
    public $description = '';

    public function save()
    {
        $validated = $this->validate();

        Todo::create($validated);
    }
}
