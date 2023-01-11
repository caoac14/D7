<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div class="text-gray-200 text-lg p-4 mb-4 rounded-md bg-blue-500 shadow-md shadow-blue-300">
                                <h3 class="">DANH SÁCH DÃY PHÒNG</h3>
                            </div>
                            <div class="grid grid-cols-6 gap-6 bg-gray-200 p-4  rounded-md">
                                @foreach ($listGroupRooms as $room)
                                    <div class="w-full">
                                        <a href="{{ url('KL/room', $room->id) }}">
                                            <button type="button"
                                                class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <span>{{ $room->ten_day_phong }}</span>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
