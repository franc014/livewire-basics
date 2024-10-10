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
    <div class="flex items-center justify-between gap-2 mb-4">
        <input type="search" class="w-full h-14 rounded text-gray-600" wire:model="searchTerm" >
        <button class="px-4 py-2 border h-14 rounded border-gray-500" wire:click="handleSearch" >Search</button>
    </div>
  
    @if($results)
     
     @if($results->count() > 0)
      <ul class="p-4 border border-gray-500 rounded divide-y divide-gray-200">
        @foreach($results as $result)
            <li class="py-1 px-1" ><a class="text-indigo-600 hover:text-indigo-400" href="/articles/{{$result->id}}">{{$result->title}}</a> </li>
        @endforeach
      </ul>
     @else
      <p>No results found</p>
     @endif
     
    @else
      <p>Write something in the search box</p>
    @endif
    
    @error('searchTerm')
        <p class="text-red-500">{{$message}}</p>
    @enderror  
 
</div>
