<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirming;

    public $sorts = [];

    public $filters = [
        'search' => null,
    ];

    public $listeners = ['deleteBook'];
    
    
    public function sortBy($column) {
        if(! isset($this->sorts[$column])) return $this->sorts[$column] = 'asc';
        if($this->sorts[$column] === 'asc') return $this->sorts[$column] = 'desc';
        unset($this->sorts[$column]);
    }

    public function applySorting($query) {
        foreach($this->sorts as $column => $direction) {
            $query->orderBy($column, $direction);
        }
        return $query;
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.book.index', ['books' => $this->runQuery()->paginate(15)]);
    }

    public function runQuery()
    {
        $query = Book::query()
        ->when($this->filters['search'], function($query, $search){
            $query->where("name", "like", "%$search%")
            ->orwhere("number_pages", "like", "%$search%")
            ->orwhere("author", "like", "%$search%");
        });
        return $this->applySorting($query);

    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function testeConfirm(Book $book)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Atenção',
            'text' => 'Deseja mesmo deletar o livro '. $book->name . '?',
            'id' => $book->id
        ]);
    }

    public function deleteBook(Book $book)
    {
        $book->delete();
        $this->dispatchBrowserEvent('swal:success',[
            'type' => 'success',
            'title' => 'Operação sucedida!',
            'text' => 'Livro deletado com sucesso.',
        ]);
        $this->filters['search'] = null;
    
    }
    
}
