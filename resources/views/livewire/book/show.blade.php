<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4">
        <div class="">
          
            <div class="flex items-center justify-center p-8 min-h-full">
    
              <img src="{{asset('storage/'. $book->photo_cover)}}" alt="">
            
            </div>

        </div>
        <div class="col-span-2 ">
          
          @if (!$edit)
            <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-2 gap-4">
                  <div class="">
                    
                      <p><span><strong>Nome do Livro: </strong></span> {{$book->name}} </p>
                      
                  </div>
                  <div class="">
                    
                    <span wire:click="activeEdit('name')" class="cursor-pointer hover:underline">Editar</span>                    
                  </div>
                </div>     
              </div>
            </div>
          @else 
            @if($editRule == 'name')
              <div class="grid grid-cols-3 gap-4">
                
                <div class="col-span-2 mb-3">
                  <form wire:submit.prevent="editTest" class="w-full md:w-auto">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                            
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <label for="book_name" class="block text-sm font-medium text-gray-700">
                                Nome do Livro:
                              </label>
                              <input type="text" wire:model="book.name"id="" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                              <input type="submit" class="hover:underline" value="Salvar">
                            </div>
                              
                          </div>
                        </div>
                
                        
                      </div>
                    </div>
                  </form>
                </div>

                <div class="flex inline-block">
                  <span wire:click="cancelEdit({{ $book->id }})" class="mb-auto mt-auto cursor-pointer hover:underline">Cancelar</span>
                </div>

              </div>
              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Numero de paginas: </strong></span> {{$book->number_pages}} </p>
                        
                    </div>
                  </div>     
                </div>
              </div>
              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Nome do Autor: </strong></span> {{$book->author}} </p>
                        
                    </div>
                  </div>      
                </div>
              </div>   
              
            @endif           
            
          @endif
          
          @if (!$edit)
            <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-2 gap-4">
                  <div class="">
                    
                      <p><span><strong>Numero de paginas: </strong></span> {{$book->number_pages}} </p>
                      
                  </div>
                  <div class="">
                    
                    <span wire:click="activeEdit('page_number')" class="cursor-pointer hover:underline">Editar</span>                    
                  </div>
                </div>     
              </div>
            </div>
          @else 
            @if($editRule == 'page_number')
              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Nome do Livro: </strong></span> {{$book->name}} </p>
                        
                    </div>
                    
                  </div>     
                </div>
              </div>
              <div class="grid grid-cols-3 gap-4">
                  
                <div class="col-span-2 mb-3">
                  <form wire:submit.prevent="editTest" class="w-full md:w-auto">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                            
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <label for="book_name" class="block text-sm font-medium text-gray-700">
                                Numero de paginas:
                              </label>
                              <input type="text" wire:model="book.number_pages"id="" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                              <input type="submit" class="hover:underline" value="Salvar">
                            </div>
                              
                          </div>
                        </div>
                
                        
                      </div>
                    </div>
                  </form>
                </div>

                <div class="flex inline-block">
                  <span wire:click="cancelEdit({{ $book->id }})" class="mb-auto mt-auto cursor-pointer hover:underline">Cancelar</span>
                </div>

              </div>
              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Nome do Autor: </strong></span> {{$book->author}} </p>
                        
                    </div>
                  </div>      
                </div>
              </div> 
            @endif
          @endif
          
          @if(!$edit)
            <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-2 gap-4">
                  <div class="">
                    
                      <p><span><strong>Nome do Autor: </strong></span> {{$book->author}} </p>
                      
                  </div>
                  <div class="">
                    
                    <span wire:click="activeEdit('author')" class="cursor-pointer hover:underline">Editar</span>                    
                  </div>
                </div>      
              </div>
            </div>  
          @else 
            @if($editRule == 'author')
              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Nome do Livro: </strong></span> {{$book->name}} </p>
                        
                    </div>
                    
                  </div>     
                </div>
              </div>

              <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-2 gap-4">
                    <div class="">
                      
                        <p><span><strong>Numero de paginas: </strong></span> {{$book->number_pages}} </p>
                        
                    </div>
                    
                  </div>     
                </div>
              </div>
              <div class="grid grid-cols-3 gap-4">
                
                <div class="col-span-2">
                  <form wire:submit.prevent="editTest" class="w-full md:w-auto">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                            
                            <div class="flex rounded-md shadow-sm">
                              <label for="book_name" class="block text-sm font-medium text-gray-700">
                                Nome do Autor:
                              </label>
                              <input type="text" wire:model="book.author" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                              <input type="submit" class="hover:underline" value="Salvar">
                            </div>
                              
                          </div>
                        </div>
                
                        
                      </div>
                    </div>
                  </form>
                </div>

                <div class="flex  inline-block">
                  <span wire:click="cancelEdit({{ $book->id }})" class="mb-auto mt-auto cursor-pointer hover:underline">Cancelar</span>
                </div>

              </div>
              

            @endif
          @endif
                 
          <div class="mt-5 flex">
            <a href="{{route('books.index')}}" class="rounded-full px-4 mr-2 bg-blue-600 text-white p-2 rounded  leading-none flex items-center">
                Voltar a lista de livros
            </a>
            
          </div>
        </div>
        </div>  
    </div>
    
</div>