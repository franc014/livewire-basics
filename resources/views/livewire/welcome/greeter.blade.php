<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component
{  
    #[Validate('required | min:3')]
    public $name = 'Juan';
    public $greeting = 'Hey';
    public $completedGreeting = '';
    public $greetings = [
        'Hey',
        'Hows going',
        'whats up',
        'Hello'
    ];
    
   
    public function handleSubmit(){
        $this->validate();
        return $this->completedGreeting =  "{$this->greeting}, {$this->name}";
    }
  
}; 
?>

<div >
    <form wire:submit="handleSubmit" class="flex items-center  gap-4">
        <select name="greetings" id="greetings" wire:model.change="greeting">
            @foreach($greetings as $greeting)
                <option value="{{ $greeting }}">{{ $greeting }}</option>
            @endforeach    
        </select>
       
            <input type="text" wire:model="name">
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
     
        <button class="border border-gray-600 px-4 py-2 rounded" type="submit" >Send</button>
    </form>
    <h1 class="mt-10"> {{$completedGreeting}} </h1>
</div>
