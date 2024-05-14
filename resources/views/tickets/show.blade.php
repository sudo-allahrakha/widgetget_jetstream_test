<!-- resources/views/tickets/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <div class="font-bold">Title:</div>
                        <div>{{ $ticket->title }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold">Description:</div>
                        <div>{{ $ticket->description }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold">Status:</div>
                        <div><span class="{{ $ticket->status == 'Open' ? 'text-green-600' : 'text-red-600' }}">{{ $ticket->status }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
