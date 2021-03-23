<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithFileUploads;

class Edit extends Component
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

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function updated($properties)
    {
        $this->validateOnly($properties);
    }

    public function update()
    {
        if (!is_null($this->fileCover)){
            $this->validate();
            $this->book->update([
                'name' => $this->book->name,
                'number_pages' => $this->book->number_pages,
                'author' => $this->book->author,
                'photo_cover' => $this->fileCover->store('bookCover', 'public'),
            ]);
            $this->dispatchBrowserEvent('swal:update_success',[
                'type' => 'success',
                'title' => 'Operação sucedida!',
                'text' => 'Livro deletado com sucesso.',
            ]);

        }else {
            $this->book->update([
                'name' => $this->book->name,
                'number_pages' => $this->book->number_pages,
                'author' => $this->book->author,
                'photo_cover' => $this->book->photo_cover,
            ]);
            $this->dispatchBrowserEvent('swal:update_success',[
                'type' => 'success',
                'title' => 'Operação sucedida!',
                'text' => 'Atualizado.',
            ]);
        }
        $this->fileCover = null;
    }

    public function resetUpload()
    {
        $this->fileCover = null;
    }
    
    public function render()
    {
        return view('livewire.book.edit');
    }
}
