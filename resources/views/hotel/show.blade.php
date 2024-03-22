<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center justify-between p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        {{ __('Hotel') }}
                    </div>
                    <div>
                        <x-secondary-button onclick="window.location='{{ route('hotels.rooms.create', ['hotel' => $hotel->id]) }}'">
                            {{ __('Add Room') }}
                        </x-secondary-button>
                    </div>
                </div>
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                        <p class="text-gray-700 text-sm">{{ $hotel->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="zip_code" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Zip') }}</label>
                        <p class="text-gray-700 text-sm">{{ $hotel->zip_code }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Address') }}</label>
                        <p class="text-gray-700 text-sm">{{ $hotel->address }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 text-sm font-bold mb-2">{{ __('City') }}</label>
                        <p class="text-gray-700 text-sm">{{ $hotel->city }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="state" class="block text-gray-700 text-sm font-bold mb-2">{{ __('State') }}</label>
                        <p class="text-gray-700 text-sm">{{ $hotel->state }}</p>
                    </div>
                    <div class="flex items center justify-between">
                        <x-secondary-button onclick="window.location='{{ route('hotels.index') }}'">
                            {{ __('Back') }}
                        </x-secondary-button>
                        <x-secondary-button onclick="window.location='{{ route('hotels.edit', $hotel) }}'">
                            {{ __('Edit') }}
                        </x-secondary-button>
                        <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button wire:confirm="Tem certeza que deseja deletar o Hotel e seus quartos?" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

