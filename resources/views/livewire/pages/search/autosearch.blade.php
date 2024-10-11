<?php

use Livewire\Volt\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;


new class extends Component {
    #[Validate('required | min:3')]
    public $searchTerm = '';
    
    public $results = [];

    /* public function updated($property){
        if($property==='searchTerm'){
            $this->reset('results');
            $this->validate();
            $search = "%{$this->searchTerm}%";
            $this->results = Article::where('title','like',$search)->get();
        }
    } */

    public function updatedSearchTerm(){
            $this->reset('results');
            $this->validate();
            $search = "%{$this->searchTerm}%";
            $this->results = Article::where('title','like',$search)->orWhere('body','like',$search)->get();
    }

    #[On('search:clear-results')]
    public function clear(){
        $this->reset('searchTerm','results');
    }

}; ?>

<div class="flex flex-col w-1/2 relative">
    <div class="flex items-center gap-2 my-4 w-full justify-between">
        <input type="text" class="w-full rounded text-gray-600" wire:model.live.debounce="searchTerm" placeholder="Search something..." >
        <!-- <button class="px-4 py-2 border rounded border-gray-500 text-gray-500 hover:bg-indigo-200" 
        wire:click.prevent="clear" {{empty($searchTerm) ? 'disabled': ''}} >Clear</button> -->
    </div>

    <div class="absolute w-full top-16 bg-gray-50 p-2 ">
        @error('searchTerm')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <livewire:pages.search.search-results :results="$results" />
    </div>

</div>
