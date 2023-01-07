@extends('admin.layout')

@section('report')
    <div>
        <a href="{{ route('admin.export_report') }}" class="flex justify-end text-sm mt-2">
            <button type="button"
                class="flex items-center justify-center  bg-green-600 hover:bg-green-700 shadow-md mr-2 text-white font-bold py-2 px-4 rounded"
                data-modal-toggle="modal_add_device">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5" />
                </svg>
                Xuất file Excel
            </button>
        </a>
        <div class="bg-gray-100 mb-6 text-sm">
            <div>
                <div class="w-full flex items-center font-bold p-3 bg-blue-300 mt-2">
                    <div class="w-full flex items-center">
                        <span class="w-44 pr-2 ml-8 truncate">Tên giáo viên</span>
                        <span class="w-32 truncate">Tên phòng</span>
                        <span class="w-48 truncate">Thiết bị</span>
                        <span class="w-64 ml-2">Ghi chú</span>
                    </div>
                    <div class="w-48 flex items-center justify-end">
                        <span class="w-full ml-6 text-gray-800">Thời gian</span>
                    </div>
                </div>
            </div>
            <ul>
                @foreach ($reportList as $report)
                    <li class="flex items-center border-y hover:bg-gray-200 px-3">
                        <input id="default-checkbox" type="checkbox" value="" :checked="checkAll"
                            class="w-4 h-4 text-blue-600 bg-white rounded border-gray-300 focus:ring-blue-500 mr-2 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div x-data="{ messageHover: false }" @mouseover="messageHover = true" @mouseleave="messageHover = false"
                            class="w-full flex items-center justify-between p-1 my-1 cursor-pointer">
                            <div data-modal-toggle="defaultModal-{{ $report->id }}">
                                <div class="flex items-center">
                                    <span class="w-44 pr-2 truncate">{{ $report->name }}</span>
                                    <span class="w-32 ml-2 truncate">{{ $report->ten_phong }}</span>
                                    <span class="w-48 truncate">
                                        @foreach ($groupDeviceList as $item)
                                            @if ($item->ma_nhat_ky == $report->id)
                                                <span> {{ $item->ten_thiet_bi }}; </span>
                                            @endif
                                        @endforeach
                                    </span>
                                    <span class="mx-1">-</span>
                                    <span class="w-64 text-gray-600 text-sm truncate">{{ $report->mo_ta_loi }}</span>
                                </div>
                            </div>
                            <div class="w-48 flex items-center justify-end">
                                <div x-show="messageHover" class="flex items-center space-x-3" style="display: none;">
                                    <a href="" class="no-underline flex items-center mr-2">
                                        <button title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="square" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <span x-show="!messageHover" class="text-sm text-gray-600">
                                    {{ $report->buoi }} - {{ date('d-m-Y', strtotime($report->ngay)) }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <div id="defaultModal-{{ $report->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between  bg-blue-500 px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                    <div class=" font-semibold text-gray-200 dark:text-white">
                                        <h3 class="text-gray-100  text-2xl py-2">
                                            Nhật ký số: #{{ $report->id }}
                                        </h3>
                                    </div>
                                    <button type="button"
                                        class="text-gray-100 bg-transparent hover:bg-red-500 hover:text-gray-200 rounded-lg text-sm p-2 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="defaultModal-{{ $report->id }}">
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
                                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                        <div class="border-t border-gray-200">
                                            <dl>
                                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Tên giáo viên</dt>
                                                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                        {{ $report->name }}
                                                    </dd>
                                                </div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Email</dt>
                                                    <dd class="mt-1 text-base text-blue-500 sm:col-span-2  sm:mt-0">
                                                        {{ $report->email }}
                                                    </dd>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Tên phòng - Mã Lớp</dt>
                                                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                        {{ $report->ten_phong }} - {{ $report->ten_lop }}
                                                    </dd>
                                                </div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Thời gian</dt>
                                                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                        {{ $report->buoi }} -
                                                        {{ date('d-m-Y', strtotime($report->ngay)) }}
                                                    </dd>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Ghi chú</dt>
                                                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                        {{ $report->mo_ta_loi }}
                                                    </dd>
                                                </div>
                                                <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-base font-medium text-gray-600">Tên thiết bị</dt>
                                                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                        <span class="space-y-2">
                                                            @foreach ($groupDeviceList as $item)
                                                                @if ($item->ma_nhat_ky == $report->id)
                                                                    <span class="block text-blue-500">
                                                                        {{ $item->ten_thiet_bi }}
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                    <button type="button" data-modal-toggle="defaultModal-{{ $report->id }}"
                                        type="button"
                                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Xong
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            <div
                class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                {{ $reportList->links() }}
            </div>
        </div>
    @endsection
