<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div>
                            <div
                                class="text-gray-50 text-lg p-4 mb-4 rounded-md bg-blue-500 shadow-md shadow-blue-300">
                                <h3 class="">Phòng <span>{{ $roomName->ten_phong }}</span></h3>
                            </div>
                            <div class="p-4 bg-gray-200 rounded-md shadow-md shadow-gray-300">
                                <div class="grid grid-cols-4 gap-4 ">
                                    @for ($i = 0; $i < count($typeOfDevice); $i++)
                                        <a href="{{ route('KL.show_device', ['roomId' => $roomName->id, 'typeDeviceId' => $nameTypes[$i]->id]) }}">
                                            <button class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-base font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 font-semibold bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    {{ $nameTypes[$i]->ten_loai_thiet_bi }}
                                                </span>
                                              </button>
                                        </a>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
