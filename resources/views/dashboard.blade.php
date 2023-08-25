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
                   <h1 style="font-size:20px;"> <strong>List of your clients</h1>
                </div>
                <a href="createclient" style="color:blue"> <strong>Create Client</a>
                <br>
                <br>
                @if(session('alert'))
            <div class="alert alert-success" style="color:red;">
                {{ session('alert') }}
            </div>
        @endif
                <ul>
                @foreach ($clients as $client)
                    <p>
                        {{$client->firstname}} {{$client->lastname}} {{$client->email}} 

                        <form method="POST" action="{{ route('registerclient') }}">
                        @csrf
                        <input type="hidden" name="name" value="{{$client->firstname}}" />
                        <input type="hidden" name="email" value="{{$client->email}}" />
                        <input type="hidden" name="password" value="password" />
                        <input type="hidden" name="password_confirmation" value="password" />
                        <input type="hidden" name="id" value="{{$client->id}}" />

                        <button type="submit" > Assign User </button>
                        </form>

                        <form method="post" action="{{ route('deleteclient', $client->id) }}">
                        {{ csrf_field() }}
                        <button type="submit" style="color:red;"> DELETE </button>
                        </form>
                    </p>
                   <br>
                @endforeach
                </ul>
            </div>
            <a style="color:green;" href="/exportclients"> <strong>Export</a>
        </div>
        
    </div>
</x-app-layout>
