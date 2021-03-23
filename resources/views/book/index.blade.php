<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Livros') }}
        </h2>
    </x-slot>

    @slot('slot')
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    @livewire('book.index')
                </div>
            </div>
        </div>
        
    @endslot
</x-app-layout>