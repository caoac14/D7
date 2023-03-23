<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute right-4">
                    @if (\Session::has('saved'))
                        <div id="alert-1"
                            class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                                {!! \Session::get('saved') !!}
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-1" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="p-2 text-gray-900">
                    <div class="flex justify-end items-center  ">
                        <button type="button" data-modal-target="history_modal" data-modal-toggle="history_modal"
                            class="flex items-center justify-center  text-gray-700 font-semibold py-1.5 px-6 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="#1ea446" stroke-width="2"
                                stroke-linecap="square" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span class="text-green-500">Lịch sử</span>
                        </button>
                        <button type="button" class="flex space-x-1 items-center" data-modal-target="sodo_modal"
                            data-modal-toggle="sodo_modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="#0b8af2" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                            {{-- <a target="blank" href="{{ asset($roomName->so_do_bo_tri) }}"> --}}
                            <span class="text-blue-500"> Sơ đồ bố trí</span>
                            {{-- </a> --}}
                        </button>
                    </div>
                    <form method="POST" action="{{ route('KL.setDataReport') }}">
                        @csrf
                        <div class="bg-indigo-50 min-h-screen md:px-20 pt-6">

                            <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                                <h1 class="text-center text-2xl font-bold text-gray-500 mb-5">SỔ NHẬT KÝ</h1>
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex space-x-2 items-center">
                                                <label for="buoi" class="text-lx">Buổi: <span
                                                        class="text-red-500">(*)</span></label>
                                                <input type="text" id="buoi" name="timeR" required
                                                    class=" outline-none w-1/2 border-gray-300 py-2 px-4 text-md border-2 rounded-md cursor-default" />

                                            </div>
                                            <div class="flex space-x-2 items-center">
                                                <label for="datePickerId" class="text-lx">Ngày: <span
                                                        class="text-red-500">(*)</span></label>
                                                <input type="date" placeholder="name" name="dateR"
                                                    id="datePickerId" required
                                                    class="outline-none border-gray-300 py-2 px-2 text-md border-2 rounded-md" />
                                            </div>
                                            {{-- <div>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" name="fixNow" value="true"
                                                        class="sr-only peer">
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600">
                                                    </div>
                                                    <span
                                                        class="ml-3 text-md font-medium text-gray-900 dark:text-gray-300">
                                                        Khắc phục gấp
                                                    </span>
                                                </label>

                                            </div> --}}
                                        </div>
                                    </div>
                                    <div>
                                        <label for="name" class="text-lx">Tên giáo viên:</label>
                                        <input type="text" placeholder="name" id="name" name="user"
                                            class="block outline-none w-full bg-slate-200 border-gray-300 py-2 px-4 text-md border-2 rounded-md cursor-default"
                                            disabled value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div>
                                        <label for="title" class="text-lx">Tên lớp: <span
                                                class="text-red-500">(*)</span></label>
                                        <input type="text" placeholder="VD: DA19TTA" id="class"
                                            name="class"
                                            class="block outline-none w-full border-gray-300 py-2 px-4 text-md border-2 rounded-md cursor-default" />
                                    </div>
                                    <div>
                                        <label for="title" class="text-lx">Dãy phòng: <span
                                                class="text-red-500">(*)</span></label>
                                        <select id="groupRoom" name="groupRoom" required
                                            class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-lx rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected hidden value="">--Chọn--</option>
                                            @foreach ($listRooms as $room)
                                                <option value="{{ $room->id }}">Dãy {{ $room->ten_day_phong }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="title" class="text-lx">Phòng: <span
                                                class="text-red-500">(*)</span></label>
                                        <select id="room" name="room" required
                                            class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-lx rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected hidden value="">--Chọn--</option>

                                        </select>
                                    </div>

                                    <div class="over">
                                        <label for="device" class="text-lx block">Tên thiết bị:</label>

                                        <div class="flex items-center">
                                            <button type="button" data-modal-toggle="crypto-modal"
                                                class="text-gray-100 bg-blue-500 hover:bg-blue-600 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#fff"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="12" y1="5" x2="12"
                                                        y2="19">
                                                    </line>
                                                    <line x1="5" y1="12" x2="19"
                                                        y2="12">
                                                    </line>
                                                </svg>
                                                <span class="ml-2 text-base">Chọn thiết bị</span>
                                            </button>
                                        </div>

                                        <!-- Main modal -->
                                        <div id="crypto-modal" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white overflow-y-scroll  shadow dark:bg-gray-700"
                                                    style="height: 70vh">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="crypto-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                                        <h3
                                                            class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                                            Thiết bị
                                                        </h3>
                                                    </div>
                                                    <!-- Modal header -->

                                                    <!-- Modal body -->
                                                    <div class="p-1 mt-2 ">
                                                        <ul class=" my-2 mx-3 space-y-3">
                                                            <div id="deviceLists">

                                                            </div>
                                                            <div class="flex justify-center ">
                                                                <button data-modal-toggle="crypto-modal"
                                                                    type="button"
                                                                    class="relative w-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                                    <span
                                                                        class="relative w-full  px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                                        Xong
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="description" class="block mb-2 text-lx">Tình trạng:</label>
                                        <textarea id="description" cols="30" name="about" rows="3" placeholder="Sự cố thiết bị gặp phải?"
                                            class="w-full px-4 py-4 text-gray-600 border-gray-300 bg-indigo-50 outline-none rounded-md"></textarea>
                                    </div>


                                    <button type="submit"
                                        class=" px-4 w-52 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-blue-600  ">
                                        Lưu nhật ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="history_modal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <!-- Modal header -->
                                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                        Lịch sử lưu nhật ký
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 ">
                                    <ul class="mb-4 space-y-3">
                                        @foreach ($historyReport as $history)
                                            <li>
                                                <div
                                                    class="flex items-center truncate p-3 text-base font-semibold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                    <span class="flex-1 ml-4 ">
                                                        <div class="flex items-center space-x-2">
                                                            <span>
                                                                <span class="block">
                                                                    {{ $history->buoi }}
                                                                    {{ date('d-m-Y ', strtotime($history->ngay)) }}
                                                                </span>
                                                                <span class="block">
                                                                    Phòng: <span
                                                                        class="text-blue-500">{{ $history->ten_phong }}</span>
                                                                </span>
                                                            </span>
                                                            <div class="flex items-center space-x-3">
                                                                <form
                                                                    action="{{ route('KL.editReport', $history->id) }}"
                                                                    method="POST"
                                                                    class="w-full flex items-center p-0 m-0">
                                                                    @csrf
                                                                    @if ($history->trang_thai == 1)
                                                                        <span class="flex ml-4 items-center">
                                                                            <textarea name="mo_ta_loi" id="" class="rounded-md border font-light border-gray-400" cols="38"
                                                                                rows="1">{{ $history->mo_ta_loi }}</textarea>
                                                                        </span>
                                                                        <button type="submit" class="ml-2"
                                                                            data-popover-target="popover-edit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="#0056ff" stroke-width="2"
                                                                                stroke-linecap="square"
                                                                                stroke-linejoin="round">
                                                                                <path
                                                                                    d="M22 11.08V12a10 10 0 1 1-5.93-9.14">
                                                                                </path>
                                                                                <polyline
                                                                                    points="22 4 12 14.01 9 11.01">
                                                                                </polyline>
                                                                            </svg>
                                                                        </button>
                                                                    @else
                                                                        <span class="w-96 ml-4 items-center truncate">
                                                                            {{ $history->mo_ta_loi }}
                                                                        </span>
                                                                    @endif
                                                                    <div data-popover id="popover-edit" role="tooltip"
                                                                        class="absolute z-10 invisible inline-block w-auto text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                                        <div
                                                                            class="px-3 py-2 bg-white border-b border-gray-200 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                                                            <p class=" text-gray-700">Sửa</p>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                @if ($history->trang_thai == 1)
                                                                    <a href="{{ route('KL.deleteReport', $history->id) }}"
                                                                        data-popover-target="popover-delete">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="#ff0004" stroke-width="2"
                                                                            stroke-linecap="square"
                                                                            stroke-linejoin="round">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                        <div data-popover id="popover-delete"
                                                                            role="tooltip"
                                                                            class="absolute z-10 invisible inline-block w-auto text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                                            <div
                                                                                class="px-3 py-2 bg-white border-b border-gray-200 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                                                                <p class=" text-gray-700">Xóa</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="#0bcf16" stroke-width="2"
                                                                        stroke-linecap="square"
                                                                        stroke-linejoin="round">
                                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                                    </svg>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div>
                                        <a href="#"
                                            class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                            <svg aria-hidden="true" class="w-3 h-3 mr-2" aria-hidden="true"
                                                focusable="false" data-prefix="far" data-icon="question-circle"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z">
                                                </path>
                                            </svg>
                                            Thông tin liện hệ quochuy@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sodo_modal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <!-- Modal header -->
                                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                        Xem sơ đồ bố trí
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 ">
                                    <form action="{{ route('KL.showImage') }}" method="GET" class="mb-2">
                                        <label for="so_do"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                            an option</label>
                                        <div class="flex  items-center space-x-4">
                                            <div class="flex-1">
                                                <select id="so_do" name="so_do" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected disabled>-Chọn phòng-</option>
                                                    @foreach ($rooms as $item)
                                                        <option value="{{ $item->id }}">{{ $item->ten_phong }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit"
                                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                <span
                                                    class="relative px-5 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    Xem
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                    <div>
                                        <a href="#"
                                            class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                            <svg aria-hidden="true" class="w-3 h-3 mr-2" aria-hidden="true"
                                                focusable="false" data-prefix="far" data-icon="question-circle"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z">
                                                </path>
                                            </svg>
                                            Thông tin liện hệ quochuy@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var today = new Date()
        var curHr = today.getHours()
        var time = null;

        if (curHr < 12) {
            var time = "Sáng";
        } else if (curHr < 18) {
            var time = "Chiều";
        } else {
            var time = "Tối";
        }

        document.getElementById("buoi").value = time;

        var date = new Date();
        const datePickerId = document.getElementById('datePickerId')
        datePickerId.value = date.toISOString().substring(0, 10);


        datePickerId.min = "2023-02-10";
        datePickerId.max = new Date().toISOString().split("T")[0];




        var url2 = "{{ route('KL.showRoomAjax') }}";
        $("select[name='groupRoom']").change(function() {
            var groupRoom_id = $(this).val();
            var token2 = $("input[name='_token']").val();
            $.ajax({
                url: url2,
                method: 'GET',
                data: {
                    groupRoom_id: groupRoom_id,
                    _token: token2
                },
                success: function(dataRooms) {
                    $("select[name='room'").html('');
                    $.each(dataRooms, function(key, value) {
                        $("select[name='room']").append(
                            "<option value=" + value.id + ">" + value.ten_phong +
                            "</option>"
                        );
                    });
                }
            });
        });

        var url = "{{ route('KL.showDeviceAjax') }}";
        $("select[name='room']").change(function() {
            var room_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    room_id: room_id,
                    _token: token
                },
                success: function(data) {
                    $("#deviceLists").html('');
                    $.each(data[0], function(key, value) {
                        $("#deviceLists").append(
                            `
                            <div>
                                <button  data-dropdown-toggle="dropdown" class="block mb-2 w-full  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    ${value.ten_loai_thiet_bi}
                                    </button>
                                <div id="deviceh${value.id}"> </div>
                            </div>
                            `
                        );
                        $.each(data[1], function(key2, value2) {
                            if (value.id == value2.ma_loai_thiet_bi) {
                                const temp = `#deviceh${value.id}`;
                                $(temp).append(
                                    `
                            <div>
                                <li>
                                    <div
                                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-blue-300 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                        <input id="default-${value2.id}" type="checkbox" name="device[]"
                                            value="${value2.id}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-${value2.id}"
                                            class="flex-1 ml-3 whitespace-nowrap">
                                            ${value2.ten_thiet_bi}
                                        </label>
                                    </div>
                                </li>
                            </div>
                            `
                                )
                            }
                        });
                    });
                }
            });
        });
    </script>
</x-app-layout>
