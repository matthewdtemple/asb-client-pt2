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
                <ul>
                @foreach ($clients as $client)
                    <p>
                        {{$client->firstname}} {{$client->lastname}} {{$client->email}} 

                        <?php if (DB::table('clients')->where('email', $client->email)->exists()): ?>
                            <p>Create User</p>
                        <?php endif; ?>

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
