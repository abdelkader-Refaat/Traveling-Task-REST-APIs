<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@foreach(auth()->user()->notifications as $notification)
    {{ $notification->data['message'] }}
@endforeach
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
            @php
                $users = \App\Models\User::all();
            @endphp
             @foreach ($users as $user)
             <h4>{{$user->name}}
                @can('update', $user) <a href="{{route('dashboard')}}"> update</a> @endcan</h4>

         @endforeach
        </div>
    </div>
</x-app-layout>
