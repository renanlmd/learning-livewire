<div>
    <form wire:submit.prevent="update" class="w-full">
        <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex rounded-md shadow-sm">
                        <label for="book_name" class="text-sm font-medium text-gray-700 mt-1">
                            Nome do livro:
                        </label>
                        <input type="text" id="book_name" wire:model="book.name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                    </div>
                </div>
                @if($errors->has('book.name'))
                    <p class="text-red-500 text-xs italic mt-3">
                        {{ $errors->first('book.name') }}
                    </p>
                @endif
              </div>
            </div>
        </div>

        <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex rounded-md shadow-sm">
                        <label for="book_number_pages" class="text-sm font-medium text-gray-700 mt-1">
                            Numero de paginas:
                        </label>
                        <input type="text" id="book_number_pages" wire:model="book.number_pages" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                    </div>
                </div>
                @if($errors->has('book.number_pages'))
                    <p class="text-red-500 text-xs italic mt-3">
                        {{ $errors->first('book.number_pages') }}
                    </p>
                @endif
              </div>
            </div>
        </div>

        <div class="shadow sm:rounded-md sm:overflow-hidden mb-3">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-4">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex rounded-md shadow-sm">
                        <label for="book_name" class="text-sm font-medium text-gray-700 mt-1">
                            Nome do Author:
                        </label>
                        <input type="text" wire:model="book.author" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 ml-5">
                    </div>
                </div>
                @if($errors->has('book.author'))
                    <p class="text-red-500 text-xs italic mt-3">
                        {{ $errors->first('book.author') }}
                    </p>
                @endif
              </div>
            </div>
        </div>

        <div class="mt-1 flex justify-center pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md mb-5">
            <div class="space-y-1 text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  <span>Escolha a capa</span>
                  <input id="file-upload" wire:model="fileCover" type="file" class="sr-only">
                </label>
                <p class="pl-1">ou arraste e solte</p>
              </div>
              <p class="text-xs text-gray-500">
                PNG, JPG
              </p>
              @if($errors->has('fileCover'))
                <p class="mt-2 text-sm text-red-500">{{ $errors->first('fileCover')}}</p>
              @endif
            </div>
        </div>




        <div class="mt-5 flex">
            <button
            class="h-10 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" type="submit">
            Atualizar
            </button>
            <a class="inline-flex items-center h-10 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="{{route('books.index')}}">Ver lista</a>

            
          </div>
        
    </form>

    @if(!$errors->has('fileCover'))
            
    @if ($fileCover)
      <div class="grid grid-cols-1 gap-4 pb-4">
          <div class="flex flex-col justify-center items-center justify-center">
            <div class="">
              <img src="{{ $fileCover->temporaryUrl() }}" alt="..." class=" w-40 h-96 shadow rounded-full max-w-full h-auto align-middle border-none" />
            </div>
            <div class="mt-3">
              <span class="p-1 size text-xs text-gray-700">{{$fileCover->getClientOriginalName()}}</span>
              <button class="delete focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800" wire:click="resetUpload">
                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                </svg>
              </button>
            </div>
          </div>
      </div>
    @else 
      <div class="grid grid-cols-1 gap-4 pb-4">
        <div class="flex flex-col justify-center items-center justify-center">
          <div class="">
            <img src="{{ asset('storage/'. $book->photo_cover) }}" alt="..." class=" w-40 h-96 shadow rounded-full max-w-full h-auto align-middle border-none" />
          </div>
          
        </div>
      </div>
    @endif
    

  @endif
</div>