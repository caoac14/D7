<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div>
                            <div class="text-gray-200 text-lg p-4 mb-4 rounded-md bg-blue-400 shadow-md shadow-blue-300">
                                <h3 class="">Phòng <span class="text-red-600">{{ $roomName->ten_phong }}</span></h3>
                            </div>
                            <div class="p-4 bg-gray-200 rounded-md shadow-md shadow-gray-300" >
                                <div class="grid grid-cols-4 gap-4 ">
                                    @for ($i = 0; $i < count($typeOfDevice); $i++)
                                        <a href="{{ route('KL.show_device',[ 'roomId'=>$roomName->id ,'typeDeviceId' => $nameTypes[$i]->id]) }}" 
                                            class="text-white bg-gradient-to-r shadow-md shadow-blue-400 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-1 py-2 text-center">
                                            <h5
                                                class="py-2 w-full text-sm text-center font-bold rounded-sm tracking-tight text-gray-200 dark:text-white  ">
                                                {{ $nameTypes[$i]->ten_loai_thiet_bi }}
                                            </h5>
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
