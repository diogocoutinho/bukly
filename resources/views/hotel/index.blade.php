<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        {{ __('Hotels') }}
                    </div>
                    <div>
                        <x-secondary-button onclick="window.location='{{ route('hotels.create') }}'">
                            {{ __('Create') }}
                        </x-secondary-button>
                    </div>
                </div>
                @if($hotels->count() > 0)
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ __('Address') }}</th>
                                <th class="px-4 py-2">{{ __('City') }}</th>
                                <th class="px-4 py-2">{{ __('State') }}</th>
                                <th class="px-4 py-2">{{ __('Zip') }}</th>
                                <th class="px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td class="border px-4 py-2">{{ $hotel->name }}</td>
                                    <td class="border px-4 py-2">{{ $hotel->address }}</td>
                                    <td class="border px-4 py-2">{{ $hotel->city }}</td>
                                    <td class="border px-4 py-2">{{ $hotel->state }}</td>
                                    <td class="border px-4 py-2">{{ $hotel->zip_code }}</td>
                                    <td class="border px-4 py-2">
                                        <x-primary-button onclick="window.location='{{ route('hotels.show', $hotel) }}'">
                                            {{ __('View') }}
                                        </x-primary-button>
                                        <x-secondary-button onclick="window.location='{{ route('hotels.edit', $hotel->id) }}'">
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                        <form wire:submit="delete" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <p>{{ __('No hotels found') }}</p>
                    </div>
                @endif
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    {{ $hotels->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
