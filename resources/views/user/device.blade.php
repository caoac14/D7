<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div>
                            <div
                                class="flex justify-between items-center text-gray-50 text-lg px-4 py-3 mb-4 rounded-md bg-blue-500 shadow-md shadow-blue-300">
                                <h3 class="flex items-center space-x-2">
                                    <span>Phòng</span> <span>{{ $roomName->ten_phong }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="#E0E0E0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h13M12 5l7 7-7 7" />
                                    </svg>
                                    <span class="flex">
                                        {{ $typeDeviceName->ten_loai_thiet_bi }}</span>
                                </h3>
                                <button data-modal-toggle="mapDeviceModal"
                                    class="flex justify-center items-center space-x-2 w-40 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-2 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    <span>Xem sơ đồ bố trí</span>
                                </button>
                                <div id="mapDeviceModal" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-auto">
                                    <div class="relative w-full h-full max-w-3xl">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between bg-blue-500 p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                                                    Sơ đồ phòng {{ $roomName->ten_phong }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-200 bg-transparent hover:bg-red-400 hover:text-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="mapDeviceModal">
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
                                                <div class="flex justify-center items-center">
                                                    <img width="100%" src="{{ asset($roomName->so_do_bo_tri) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-200 rounded-md shadow-md shadow-gray-300">
                                <div>
                                    <div class=" grid grid-cols-4 gap-x-20 gap-y-8 p-4">
                                        @if (count($typeDeviceLists) > 0)
                                            @foreach ($typeDeviceLists as $device)
                                                <div class="w-full flex items-center justify-center">
                                                    <!-- Modal toggle -->
                                                    <button data-modal-toggle="deviceModal-{{ $device->id }}"
                                                        class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                        <span
                                                            class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                            {{ $device->ten_thiet_bi }}
                                                        </span>
                                                    </button>
                                                    <!-- Main modal -->
                                                    <div id="deviceModal-{{ $device->id }}" tabindex="-1"
                                                        aria-hidden="true"
                                                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                            <!-- Modal content -->
                                                            <div
                                                                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex items-start bg-blue-500 justify-between px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                                                    <div
                                                                        class=" font-semibold  text-gray-800 dark:text-white">
                                                                        <a href="{{ route('dashboard') }}">
                                                                            <p class="text-gray-300 text-base">
                                                                                Phòng: {{ $roomName->ten_phong }}
                                                                            </p>
                                                                        </a>
                                                                        <h3 class="text-gray-100 text-2xl mt-2">
                                                                            {{ $device->ten_thiet_bi }}
                                                                        </h3>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="text-gray-100 bg-red-500 hover:bg-red-400 hover:text-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                        data-modal-toggle="deviceModal-{{ $device->id }}">
                                                                        <svg aria-hidden="true" class="w-5 h-5"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                {{-- <div class="flex justify-center items-center p-4">
                                                                    <img src="{{ asset('images/device.png') }}"
                                                                        alt="abc" width="200px">
                                                                </div> --}}
                                                                <!-- Modal footer -->
                                                                <div
                                                                    class=" flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <form class="w-full"
                                                                        action="{{ route('KL.problem_report', $device->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <textarea name="mo_ta_loi" id="message" rows="4"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg mb-4 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                            placeholder="Mô tả về lỗi thiết bị gặp phải..."></textarea>
                                                                        <input type="text" class="hidden" readonly
                                                                            name="phong"
                                                                            value="{{ $roomName->id }}">
                                                                        <button
                                                                            data-modal-toggle="deviceModal-{{ $device->id }}"
                                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                            type="submit">
                                                                            Báo cáo sự cố
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
                                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
