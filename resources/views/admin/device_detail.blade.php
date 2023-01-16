@extends('admin.layout')

@section('device_detail')
    <div>
        <div class="flex justify-between items-center text-sm p-2 bg-blue-300">
            <div class="text-lg text-gray-900 mx-2 font-semibold">Phòng
                <span class="text-blue-700">{{ $roomName->ten_phong }}</span> -
                <span class="text-red-600">{{ $typeDeviceName->ten_loai_thiet_bi }}</span>
            </div>
            <button type="button"
                class="flex items-center shadow-md shadow-green-300 justify-center bg-green-500 mr-2  hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg"
                data-modal-toggle="modal_add_device">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24"
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
                        <div
                            class="flex items-center justify-between bg-green-500 p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                                Phòng<span class="ml-2">{{ $roomName->ten_phong }}</span>
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
                            <form
                                action="{{ route('admin.add_device', ['roomId' => $roomName->id, 'typeDeviceId' => $typeDeviceName->id]) }}"
                                method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tên thiết bị
                                    </label>
                                    <input type="text" name="name_device" id="name_device"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                        required value="">
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:w-auto px-6 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Thêm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4">
            <div class="">
                <div>
                    <div class=" grid grid-cols-4 gap-4 px-4 py-8">
                        @if (count($typeDeviceLists) > 0)
                            @foreach ($typeDeviceLists as $device)
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
                                                                Phòng: {{ $roomName->ten_phong }}
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
                                                        W2ith less than a month to go before the European
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
                                                    <form action="{{ route('admin.delete_device', $device->id) }}"
                                                        method="POST">
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
                        @else
                            <div class="col-span-4 flex p-3 mt-2 text-base text-blue-700 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                                role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    Không có thiết bị
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
