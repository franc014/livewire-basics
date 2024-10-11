<?php

namespace App\Livewire\Pages\Articles;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;




#[Layout('layouts.app')]
#[Title('Manage Articles')]
class ArticleList extends Component
{
 
    public function render()
    {
        $articles = Article::all();
        return view('livewire.pages.articles.article-list',['articles' => $articles]);
    }

    public function delete(Article $article){
        $article->delete();
    }


   
}
