<?php

use Livewire\Volt\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;

new class extends Component {
    #[Validate('required | min:3')]
    public $searchTerm = '';
    public $results = [];

    public function handleSearch(){
        $this->reset('results');
        $this->validate();
        $search = "%{$this->searchTerm}%";
        $this->results = Article::where('title','like',$search)->get();
        $this->reset('searchTerm');
    }

}; ?>

<div class="flex flex-col w-1/2 ">
    <div class="flex items-center gap-2 my-4 w-full justify-between">
        <input type="search" class="w-full rounded text-gray-600" wire:model="searchTerm" >
        <button class="px-4 py-2 border rounded border-gray-500 text-gray-500" wire:click="handleSearch" >Clear</button>
    </div>
   
</div>
