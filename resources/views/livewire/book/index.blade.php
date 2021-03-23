<div class="flex flex-col">
    @if(session()->has('message'))
        <div class="w-auto py-4 px-4 mb-4 pointer-events-none bg-green-100">
            <p class="text-sm leading-5 font-medium text-green-700 text-2xl">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    @if(session()->has('deleted'))
        <div class="w-auto py-4 px-4 mb-4 pointer-events-none bg-red-400">
            <p class="text-sm leading-5 font-medium text-white text-2xl">
                {{ session()->get('deleted') }}
            </p>
        </div>
    @endif
    
      
    

<!-- component -->
<div class="overflow-x-auto">
    <div class="flex items-center justify-center font-sans overflow-hidden">
        
        <div class="w-full md:max-w-5xl">
            <div class="relative text-gray-600 pt-3">
                <input type="search" wire:model="filters.search" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                  
                </button>
                <a href="{{route('books.create')}}">

                    <span class="inline-flex items-center justify-center px-2 py-1 ml-3 text-xs font-bold leading-none text-red-100 bg-green-600 rounded-full">Criar novo livro</span>
                </a>
            </div>
            <div class="bg-white shadow-md rounded my-3">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">#</th>
                            <th class="py-3 px-6 text-left">Nome</th>
                            <th class="py-3 px-6 text-center">Numero de Pagina</th>
                            <th class="py-3 px-6 text-center">Autor</th>
                            <th class="py-3 px-6 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse($books as $book)
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        
                                        <span class="font-medium">{{ $book->id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                    
                                        <span>{{ $book->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ $book->number_pages}}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $book->author }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('books.show', ['book' => $book->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('books.edit', ['book' => $book->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                            <button wire:click="testeConfirm({{ $book->id }})">

                                                <svg class="w-4 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    Nenhum item encontrado ...
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--links pagination -->
            <div class="mt-4">
                @if ($books->hasPages())
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between px-4 py-3 w-full sm:px-6">
                        <div class="flex justify-between flex-1 sm:hidden">
                            @if ($books->onFirstPage())
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    {!! __('pagination.previous') !!}
                                </span>
                            @else
                                <button type="button" wire:click="previousPage" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    {!! __('pagination.previous') !!}
                                </button>
                            @endif
                
                            @if ($books->hasMorePages())
                                <button type="button" wire:click="nextPage" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    {!! __('pagination.next') !!}
                                </button>
                            @else
                                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    {!! __('pagination.next') !!}
                                </span>
                            @endif
                        </div>
                
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700 leading-5">
                                    Showing
                                    <span class="font-semibold">{{ $books->firstItem() }}</span>
                                    to
                                    <span class="font-semibold">{{ $books->lastItem() }}</span>
                                    of
                                    <span class="font-semibold">{{ $books->total() }}</span>
                                    results
                                </p>
                            </div>
                
                            <div>
                                <span class="relative z-0 inline-flex shadow-sm">
                                    {{-- Previous Page Link --}}
                                    @if ($books->onFirstPage())
                                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                    @else
                                        <button type="button" wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @endif
                
                                    {{-- Pagination books --}}
                                    @foreach ($books as $book)
                                        {{-- "Three Dots" Separator --}}
                                        @if (is_string($book))
                                            <span aria-disabled="true">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $book }}</span>
                                            </span>
                                        @endif
                
                                        {{-- Array Of Links --}}
                                        @if (is_array($book))
                                            @foreach ($book as $page => $url)
                                                @if ($page == $books->currentPage())
                                                    <span aria-current="page">
                                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                                    </span>
                                                @else
                                                    <button type="button" wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('pagination.goto_page', ['page' => $page]) }}">
                                                        {{ $page }}
                                                    </button>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                
                                    {{-- Next Page Link --}}
                                    @if ($books->hasMorePages())
                                        <button type="button" wire:click="nextPage" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @else
                                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>


