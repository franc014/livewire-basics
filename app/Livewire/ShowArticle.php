<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Article')]
class ShowArticle extends Component
{
    public $article;

    public function mount(Article $article){
        $this->article = $article;
    }

    public function render()
    {
       
        return view('livewire.show-article');
    }
}
