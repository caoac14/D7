@extends('admin.layout')

@section('device')
    <div>
        <div class="flex justify-between items-center text-sm bg-blue-300 p-2 mr-1">
            <div class="text-lg text-gray-900 mx-2 font-semibold">Dãy<span class="text-blue-700"> {{$groupRoomSelected->ten_day_phong}}</span></div>
            <button data-modal-toggle="modal_addroom"
                class="flex justify-center items-center w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Thêm phòng
            </button>

            <div id="modal_addroom" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between bg-blue-500 p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                                Thêm phòng học
                            </h3>
                            <button type="button"
                                class="text-gray-200 bg-transparent hover:bg-red-400 hover:text-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="modal_addroom">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action=" {{ route('admin.add_room') }} " method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="text"
                                        class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                        Tên phòng:
                                    </label>
                                    <input type="text" name="ten_phong" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required value="">
                                </div>
                                <div class="mb-6">
                                    <label for="ma_nhom_phong" class="text-base">Thuộc dãy: </label>
                                    <select id="ma_nhom_phong" name="ma_nhom_phong" readonly
                                        class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="{{ $groupRoomSelected->id }}">
                                            {{ $groupRoomSelected->ten_day_phong }}</option>
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="ma_loai_phong" class="text-base">Loại phòng: </label>
                                    <select id="ma_loai_phong" name="ma_loai_phong" required
                                        class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected hidden value="">--Chọn--</option>
                                        @foreach ($typeRoomLists as $typeRoom)
                                            <option value="{{ $typeRoom->id }}">{{ $typeRoom->ten_loai_phong }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Thêm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 p-4">
            @for ($i = 0; $i < count($roomLists); $i++)
                <div
                    class="w-full p-4 justify-center max-w-2xl mx-auto bg-white shadow-lg rounded-md border border-gray-200">
                    <h4 class="text-lg text-center uppercase text-gray-800 font-bold ">{{ $nameTypeRoom[$i] }}</h4>
                    <div class="grid grid-cols-4 gap-4 px-6 mt-4">
                        @foreach ($roomLists[$i] as $room[$i])
                            <div>
                                <a href="{{ route('admin.device_of_room', $room[$i]->id) }}">
                                    <button type="button"
                                        class="shadow-md shadow-blue-500 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        <span>{{ $room[$i]->ten_phong }}</span>
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    @endsection
