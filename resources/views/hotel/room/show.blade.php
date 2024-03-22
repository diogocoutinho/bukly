<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room') }}: {{ $room->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                        <p class="text-gray-700 text-sm">{{ $room->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Description') }}</label>
                        <p class="text-gray-700 text-sm">{{ $room->description }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Price') }}</label>
                        <p class="text-gray-700 text-sm">{{ $room->price }}</p>
                    </div>
                    <div class="flex items center justify-between">
                        <a href="{{ route('hotels.rooms.index', ['hotel' => $room->hotel_id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Back') }}
                        </a>
                        <a href="{{ route('hotels.rooms.edit', ['hotel' => $room->hotel_id, 'room' => $room->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Edit') }}
                        </a>
                        <form action="{{ route('hotels.rooms.destroy', ['hotel' => $room->hotel_id, 'room' => $room->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Delete') }}
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
