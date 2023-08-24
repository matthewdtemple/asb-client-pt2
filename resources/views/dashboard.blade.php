<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <h1>List of your clients</h1>
                </div>
                <ul>
                @foreach ($clients as $client)
                    <p>
                        {{$client->firstname}} {{$client->lastname}} {{$client->email}} 
                        <button class="outline outline-offset-2 outline-1 ..."> - Button here </button>
                    </p>
                   <br>
                @endforeach
                </ul>
            </div>
        
        </div>
        <a href="/exportclients">Export</a>
    </div>
</x-app-layout>
