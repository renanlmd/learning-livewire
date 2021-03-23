<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Show extends Component
{
    public $book;
    public $edit = false;
    public $editRule = null;
    
    protected $rules = [
        'book.name' => 'required',
        'book.number_pages' => 'required|integer',
        'book.author' => 'required',
    ];

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function activeEdit($rule)
    {
        $this->edit = true;
        $this->editRule = $rule;
    }

    public function cancelEdit(Book $book)
    {
        
        $this->edit = false;
        $this->editRule = null;
        $this->book = $book;
        
    }
    
    public function editTest()
    {
        $this->book->update([
            'name' => $this->book->name,
            'number_pages' => $this->book->number_pages,
            'author' => $this->book->author,
        ]);
        $this->edit = false;
        $this->editRule = null;
    }
    public function render()
    {
        return view('livewire.book.show');
    }
}
