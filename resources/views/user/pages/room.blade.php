<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-3 gap-4">
                        <div></div>
                        <div>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($listRooms as $room)
                                    <div>
                                        <a href="{{ url('KL/room', $room->id) }}">
                                            <button type="button"
                                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                Phòng <span>{{ $room->ten_phong }}</span>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
