@extends('admin.layout')

@section('home')
    <div>
        <div class="flex justify-end mt-2">
            <button type="button"
                class="flex items-center justify-center  bg-blue-500 hover:bg-blue-600 shadow-md mr-2 text-white font-semibold py-1.5 px-6 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                Xem lịch sử
            </button>
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
                {{-- @foreach ($reportList as $report) --}}
                <li class="flex items-center border-y hover:bg-gray-200 px-4">
                    <div x-data="{ messageHover: false }" @mouseover="messageHover = true" @mouseleave="messageHover = false"
                        class="w-full flex items-center justify-between py-2 cursor-pointer">
                        <div data-modal-target="modal-report-" data-modal-toggle="modal-report-">
                            <div class="flex items-center">
                                <span class="w-44  truncate">Trương Quốc Huy</span>
                                <span class="w-32  truncate">D71.111</span>
                                <span class="w-40 truncate">D71.101-MT01</span>
                                <span class="w-60 truncate">Không kết nối được mạng</span>
                                <span class="w-40 text-gray-600 text-sm truncate">12:23:00 17/01/2023</span>
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
                        <div id="modal-report-" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between  bg-blue-500 px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                        <div class=" font-semibold text-gray-200 dark:text-white">
                                            <h3 class="text-gray-100  text-2xl py-2">
                                                Nhật ký số
                                            </h3>
                                        </div>
                                        <button type="button"
                                            class="text-gray-100 bg-transparent hover:bg-red-500 hover:text-gray-200 rounded-lg text-sm p-2 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="modal-report-">
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
                                    <form action="{{ route('admin.download_pdf') }}" method="POST">
                                        @csrf
                                        <div class="px-6 py-4 space-y-6">


                                            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                                <div class="border-t  border-gray-200">
                                                    <dl class="bg-gray-300">
                                                        <input type="text" name="id" value="" class="hidden"
                                                            readonly>
                                                        <div
                                                            class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">Tên giáo
                                                                viên
                                                            </dt>
                                                            <input name="tenGV"
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-200 outline-0"
                                                                value="" readonly>
                                                        </div>
                                                        <div
                                                            class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">Email</dt>
                                                            <input name="emailGV"
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                value="" readonly>
                                                        </div>
                                                        <div
                                                            class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">Tên phòng -
                                                                MãLớp
                                                            </dt>
                                                            <input name="tenPhongLop"
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-200 outline-0"
                                                                value=" " readonly>
                                                        </div>
                                                        <div
                                                            class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">Thời gian
                                                            </dt>
                                                            <input name="thoiGian"
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                {{-- value=" - {{ date('d-m-Y', strtotime()) }}" readonly> --}} value="" readonly>
                                                        </div>

                                                        <div
                                                            class="bg-gray-200 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">
                                                                Tên thiết bị
                                                            </dt>
                                                            <div
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                                <span class="space-y-2">

                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="text-base font-medium text-gray-600">Ghi chú
                                                            </dt>
                                                            <input name="moTa"
                                                                class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                value="" readonly>
                                                        </div>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="pb-4 px-4 my-4 mx-2">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
