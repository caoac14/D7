@extends('admin.layout')

@section('home')
    <div>
        <div class="flex justify-end mt-2">
            <button type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal"
                class="flex items-center justify-center  bg-blue-500 hover:bg-blue-600 shadow-md mr-2 text-white font-semibold py-1.5 px-6 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                Xem lịch sử
            </button>

            

            <!-- Main modal -->
            <div id="crypto-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        
                        <!-- Modal header -->
                        <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                Lịch sử khắc phục thiết bị
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <ul class="mb-4 space-y-3">
                                @foreach ($problemListed as $item)
                                <li>
                                    <a href="#"
                                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                        <svg aria-hidden="true" class="h-4" viewBox="0 0 96 96" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M72.0998 0.600098H48.3998H24.5998H0.799805V24.4001V48.2001V49.7001V71.8001V71.9001V95.5001H24.5998V72.0001V71.9001V49.8001V48.3001V24.5001H48.3998H72.1998H95.9998V0.700104H72.0998V0.600098Z"
                                                fill="#617BFF" />
                                            <path
                                                d="M48.5 71.8002H72.1V95.6002H73C79.1 95.6002 84.9 93.2002 89.2 88.9002C93.5 84.6002 95.9 78.8002 95.9 72.7002V48.2002H48.5V71.8002Z"
                                                fill="#617BFF" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Ngày: {{date('d-m-Y', strtotime($item->created_at))}} - Phòng:{{$item->ten_phong}} - {{$item->ten_thiet_bi}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div>
                                <a href="#"
                                    class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                    <svg aria-hidden="true" class="w-3 h-3 mr-2" aria-hidden="true" focusable="false"
                                        data-prefix="far" data-icon="question-circle" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
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
        <div class="bg-gray-100 mb-6 text-sm">
            <div>
                <div class="w-full flex items-center font-bold py-3 bg-blue-300 mt-2">
                    <div class="w-full flex items-center px-4">
                        <span class="w-44 truncate">Tên giáo viên</span>
                        <span class="w-32 truncate">Tên phòng</span>
                        <span class="w-40 truncate">Thiết bị</span>
                        <span class="w-60 ">Mô tả lỗi</span>
                        <span class="w-40 ">Thời gian</span>
                    </div>

                </div>
            </div>

            <ul>
                @foreach ($problemList as $problem)
                    <li class="flex items-center border-y hover:bg-gray-200 px-4">
                        <div x-data="{ messageHover: false }" @mouseover="messageHover = true" @mouseleave="messageHover = false"
                            class="w-full flex items-center justify-between py-2 cursor-pointer">
                            <div data-modal-target="modal-report-{{ $problem->id }}"
                                data-modal-toggle="modal-report-{{ $problem->id }}">
                                <div class="flex items-center">
                                    <span class="w-44  truncate">{{ $problem->name }}</span>
                                    <span class="w-32  truncate">{{ $problem->ten_phong }}</span>
                                    <span class="w-40 truncate">{{ $problem->ten_thiet_bi }}</span>
                                    <span class="w-60 truncate">{{ $problem->mo_ta_loi }}</span>
                                    <span
                                        class="w-40 text-gray-600 text-sm truncate">{{ date('H:i:s d-m-Y', strtotime($problem->created_at)) }}</span>
                                </div>
                            </div>
                            <button
                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span
                                    class="flex items-center relative px-6 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="square" stroke-linejoin="round">
                                        <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5" />
                                    </svg>

                                    Xuất phiếu
                                </span>
                            </button>
                            <div id="modal-report-{{ $problem->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-2xl md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between  bg-blue-500 px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                            <div class=" font-semibold text-gray-200 dark:text-white">
                                                <h3 class="text-gray-100  text-xl py-2">
                                                    Phiếu sửa thiết bị
                                                </h3>
                                            </div>
                                            <button type="button"
                                                class="text-gray-100 bg-transparent hover:bg-red-500 hover:text-gray-200 rounded-lg text-sm p-2 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="modal-report-{{ $problem->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>

                                        <div
                                            class="block w-2/3 m-auto py-6 px-12 rounded-lg  hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                            <h5
                                                class="mb-2 text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                Phòng: {{ $problem->ten_phong }}
                                            </h5>
                                            <h5
                                                class="mb-4 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                Thiết bị: {{ $problem->ten_thiet_bi }}
                                            </h5>
                                            <span class="block text-base font-normal text-gray-700 dark:text-gray-400">
                                                Thời gian: {{ date('H:i:s d-m-Y ', strtotime($problem->created_at)) }}
                                            </span>
                                            <span class="block text-base font-normal text-gray-700 dark:text-gray-400">
                                                Tên giáo viên: {{ $problem->name }}
                                            </span>
                                            <span class="block text-base font-normal text-gray-700 dark:text-gray-400">
                                                Ghi chú: "{{ $problem->mo_ta_loi }}""
                                            </span>
                                            <div>
                                                <form action="{{ route('admin.update_status_problem', $problem->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button data-modal-toggle="modal-report-{{ $problem->id }}"
                                                        type="submit"
                                                        class="w-full relative mt-8  inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                        <span
                                                            class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                            Đã sửa
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
