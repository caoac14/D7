<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div class="text-gray-50 text-lg p-4 mb-4 rounded-md bg-blue-500 shadow-md shadow-blue-300">
                                <h3 class="">Dãy <span>{{ $groupRoomSelected->ten_day_phong }}</span></h3>
                            </div>
                            {{-- <a href="{{route('redirect_back')}}">
                                <button type="button" class="text-gray-900 hover:text-gray-700 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm pr-2 py-2 text-center mr-2 mb-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
                                        <span>Quay lại</span>
                                    </div>
                                </button>
                            </a> --}}
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
                                                        <button
                                                            class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                            <span
                                                                class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                                <span>{{ $room[$i]->ten_phong }}</span>
                                                            </span>
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
