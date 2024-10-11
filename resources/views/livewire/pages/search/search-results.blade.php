<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Reactive;

new class extends Component {
    #[Reactive]
    public $results;
    public function mount($results) {
        $this->results = $results;
    }
}; ?>

<div>
    @if($results)
      @if($results->count() > 0)
      <ul class="p-4 border border-gray-500 rounded divide-y divide-gray-200 ">
        @foreach($results as $result)
            <li class="py-1 px-1" wire:key="result-{{$result->id}}" ><a wire:navigate class="text-gray-500 hover:text-indigo-400" href="/articles/{{$result->id}}">{{$result->title}}</a> </li>
        @endforeach
      </ul>
      @else
      <p class="text-yellow-600">No results found</p>
      @endif
    @endif
</div>
