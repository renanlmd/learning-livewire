<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $book;
    public $fileCover;

    protected $rules = [
        'book.name' => 'required',
        'book.number_pages' => 'required|integer',
        'book.author' => 'required',
        'fileCover' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048'
    ];

    protected $messages = [
        'book.name.required' => '*Campo nome é necessario.',
        'book.number_pages.integer' => '*Campo deve ter apenas numeros.',
        'book.number_pages.required' => '*Informe o numero de paginas.',
        'book.author.required' => '*Nome do autor é necessario.',
        'fileCover.required' => '*É necessario definir foto do livro',
        'fileCover.image' => 'O arquivo deve ser uma imagem'
    ];

    public function mount()
    {
        $this->book = new Book;
    }

    public function updated($properties)
    {
        $this->validateOnly($properties);
    }

    public function save()
    {
        
        $this->validate();
        
        Book::create([
            'name' => $this->book->name,
            'number_pages' => $this->book->number_pages,
            'author' => $this->book->author,
            'photo_cover' => $this->fileCover->store('bookCover', 'public'),
        ]);

        session()->flash('book_create_success', 'Livro criado!');

        return redirect()->route('books.index');
    }
    
    public function resetUpload(){
        $this->fileCover = null;
    }
    
    public function render()
    {
        return view('livewire.book.create');
    }
}
