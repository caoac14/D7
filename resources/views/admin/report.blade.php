@extends('admin.layout')

@section('report')
    <div>
        <div class="bg-gray-100 mb-6 text-sm">
            <div>
                <div class="w-full flex items-center font-bold p-3 bg-blue-300 mt-2">
                    <div class="w-full flex items-center">
                        <span class="w-44 pr-2 ml-8 truncate">Tên giáo viên</span>
                        <span class="w-32 truncate">Tên phòng</span>
                        <span class="w-48 truncate">Thiết bị</span>
                        <span class="w-64 ml-2">Mô tả</span>
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
                            <a href="{{ route('admin.report_detail', $report->id) }}">
                                <div class="flex items-center">
                                    <span class="w-44 pr-2 truncate">{{ $report->name }}</span>
                                    <span class="w-32 truncate">{{ $report->ten_phong }}</span>
                                    <span class="w-48 truncate">{{ $report->ten_thiet_bi }}</span>
                                    <span class="mx-1">-</span>
                                    <span class="w-64 text-gray-600 text-sm truncate">{{ $report->mo_ta_loi }}</span>
                                </div>
                            </a>
                            <div class="w-48 flex items-center justify-end">
                                <div x-show="messageHover" class="flex items-center space-x-3" style="display: none;">
                                    <a href="#" class="no-underline flex items-center mr-2">
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
                                <span x-show="!messageHover" class="text-sm text-gray-500">
                                    {{ $report->buoi }} - {{ $report->ngay }}
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div
                class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                {{ $reportList->links() }}
            </div>
        </div>
    </div>
@endsection
