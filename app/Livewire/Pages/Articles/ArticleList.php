<?php

namespace App\Livewire\Pages\Articles;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;



#[Layout('layouts.app')]
#[Title('Manage Articles')]
class ArticleList extends Component implements HasForms,HasTable
{
 
    use InteractsWithTable;
    use InteractsWithForms;


    public function render()
    {
        $articles = Article::all();
        return view('livewire.pages.articles.article-list',['articles' => $articles]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(Article::query())
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('created_at'),
            ])
            ->actions([
                ViewAction::make()
                ->form([
                    TextInput::make('title'),
                    TextInput::make('body'),
                ]),
                EditAction::make()->form([
                    TextInput::make('title'),
                    TextInput::make('body'),
                ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
