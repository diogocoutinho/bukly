<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex items-center justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            {{ $hotelName ?? __('Hotels') }}
                        </div>
                        <div>
                            <x-secondary-button onclick="window.location='{{ route('hotels.index') }}'">
                                {{ __('Back') }}
                            </x-secondary-button>
                            <x-secondary-button onclick="window.location='{{ route('hotels.rooms.create', ['hotel' => $hotel]) }}'">
                                {{ __('Create') }}
                            </x-secondary-button>
                        </div>
                    </div>
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('Name') }}</th>
                                <th class="border px-4 py-2">{{ __('Description') }}</th>
                                <th class="border px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                <tr>
                                    <td class="border px-4 py-2">{{ $room->name }}</td>
                                    <td class="border px-4 py-2">{{ $room->description }}</td>
                                    <td class="border px-4 py-2">
                                        <x-primary-button onclick="window.location='{{ route('hotels.rooms.show', ['room' => $room->id, 'hotel' => $hotel  ]) }}'">
                                            {{ __('View') }}
                                        </x-primary-button>
                                        <x-secondary-button onclick="window.location='{{ route('hotels.rooms.edit', ['room' => $room->id, 'hotel' => $hotel  ]) }}'">
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                        <form action="{{ route('hotels.rooms.destroy', ['room' => $room->id, 'hotel' => $room->hotel_id]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button onclick="{{ route('hotels.rooms.destroy', ['room' => $room->id, 'hotel' => $room->hotel_id]) }}" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
