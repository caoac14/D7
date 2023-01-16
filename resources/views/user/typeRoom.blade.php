<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div
                                class="text-gray-50 text-lg p-4 mb-4 rounded-md bg-green-500 shadow-md shadow-green-300">
                                <h3 class="">Dãy <span>{{ $groupRoomSelected->ten_day_phong }}</span></h3>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                @for ($i = 0; $i < count($roomLists); $i++)
                                    <div
                                        class="w-full p-4 justify-center max-w-2xl mx-auto bg-gray-200 shadow-lg rounded-md border border-gray-200">
                                        <h4 class="text-lg text-center uppercase text-gray-800 font-bold ">
                                            {{ $nameTypeRoom[$i] }}
                                        </h4>
                                        <div class="grid grid-cols-4 gap-4 my-4">
                                            @foreach ($roomLists[$i] as $room[$i])
                                                <div>
                                                    <a href="{{ route('KL.show_room', $room[$i]->id) }}">
                                                        <button type="button"
                                                            class="w-full shadow-md shadow-blue-500 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                                            <span>{{ $room[$i]->ten_phong }}</span>
                                                        </button>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
