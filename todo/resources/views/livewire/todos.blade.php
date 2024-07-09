<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => auth()->user()->todos
]);

$add = function(){
        auth()->user()->todos()->create([
            'task' => $this->task
        ]);
    $this -> task = '';
};


$delete = fn(\App\Models\Todo $todo) => $todo->delete();

$update = function($edit){
        auth()->user()->todos()->create([
            $validated_data = $this->validate
        ]);
        $todo = ($this->todo_id);
        $todo->update($validated_data);
};

$edit = function ($id){
        $this->edit_mode = true;
        $todo = ($id);
        // $this->task = $todo->task;
        $this->todo_id = $id;
}


?>

<div>
    <form wire:submit='add'>
        <div >
            <input wire:model='task' type="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" placeholder="Enter Task" >
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
        </div> 
        
        <div>
            @foreach ($todos as $todo)
                <div>
                    {{$todo->task}}
                    <button wire:click='delete({{ $todo->id }})' class="btn btn-danger btn-sm">Delete</button>
                </div>
            @endforeach
        </div>
    </form>       
</div>
