@extends('admin.layout')

@section('device_detail')
    <div>
        <div class="flex justify-end text-sm p-2">
            <button type="button"
                class="flex items-center justify-center bg-blue-500 mr-2  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                data-modal-toggle="modal_add_device">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Thêm thiết bị
            </button>
            <div id="modal_add_device" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between bg-blue-500 p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                                Phòng {{$room[0]}}
                            </h3>
                            <button type="button"
                            class="text-gray-200 bg-transparent hover:bg-red-400 hover:text-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="modal_add_device">
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
                            <form action="{{route('admin.add_device',$id)}}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tên thiết bị
                                    </label>
                                    <input type="text" name="name_device" id="name_device"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required value="">
                                </div>
                                <div class="mb-6">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Loại thiết bị
                                    </label>
                                    <select id="type_device" name="type_device" required
                                        class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected hidden value="">--Chọn--</option>
                                        @foreach ($typeDeviceLists as $item)
                                            <option value="{{ $item->id }}">{{ $item->ten_loai_thiet_bi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Thêm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4">
        <div class="grid grid-cols-3 gap-4">
            @for ($i = 0; $i < count($typeOfDevice); $i++)
                <div
                    class="w-full px-4 justify-center max-w-xl pb-6 bg-gray-300 shadow-lg rounded-md border border-gray-200">
                    <h3
                        class="my-4 w-full p-2 text-xl text-center font-bold rounded-sm tracking-tight text-blue-600 dark:text-white">
                        {{ $nameTypes[$i] }}</h3>
                    <div class="grid grid-cols-2 gap-2 ">
                        @foreach ($typeOfDevice[$i] as $device)
                            <div class="w-full flex items-center justify-center">
                                <!-- Modal toggle -->
                                <button
                                    class="text-white min-w-full bg-gradient-to-r shadow-md shadow-blue-500 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-1"
                                    type="button" data-modal-toggle="defaultModal-{{ $device->id }}">
                                    {{ $device->ten_thiet_bi }}
                                </button>
                                <!-- Main modal -->
                                <div id="defaultModal-{{ $device->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                                <div class=" font-semibold text-gray-800 dark:text-white">
                                                    <a href="{{ route('dashboard') }}">
                                                        <p class="text-blue-500 text-base">
                                                            Phòng: {{ $room[0] }}
                                                        </p>
                                                    </a>
                                                    <h3 class="text-gray-800 text-2xl mt-2">
                                                        {{ $device->ten_thiet_bi }}
                                                    </h3>
                                                </div>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="defaultModal-{{ $device->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    With less than a month to go before the European
                                                    Union
                                                    enacts
                                                    new consumer privacy laws for its citizens,
                                                    companies
                                                    around
                                                    the
                                                    world are updating their terms of service agreements
                                                    to
                                                    comply.
                                                </p>
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    The European Union’s General Data Protection
                                                    Regulation
                                                    (G.D.P.R.)
                                                    goes into effect on May 25 and is meant to ensure a
                                                    common set of data rights in the European Union. It
                                                    requires
                                                    organizations to notify users as soon as possible of
                                                    high-risk
                                                    data breaches that could personally affect them.
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <form action="{{ route('report') }}" method="GET">
                                                    @csrf
                                                    <input type="text" name="devide" class="hidden"
                                                        value="{{ $device->id }}">
                                                    <button type="submit"
                                                        data-modal-toggle="defaultModal-{{ $device->id }}"
                                                        type="button"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Xóa thiết bị
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
