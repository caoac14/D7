@extends('admin.layout')

@section('report')
    <div>
        <div class="bg-gray-100 mb-6 text-sm">
            <div>
                <div class="w-full flex items-center font-bold p-3 bg-blue-300 mt-2">
                    <div class="w-full flex items-center">
                        <span class="w-44 pr-2 ml-2 truncate">Tên giáo viên</span>
                        <span class="w-32 truncate">Tên phòng</span>
                        <span class="w-44 truncate">Thiết bị</span>
                        <span class="w-64 ml-2">Ghi chú</span>
                        <span class="w-24">Trạng thái</span>
                    </div>
                    <div class="w-48 flex items-center justify-end">
                        <span class="w-full ml-6 text-gray-800">Thời gian</span>
                    </div>
                </div>
            </div>

            <ul>
                @foreach ($reportList as $report)
                    <li class="flex items-center border-y hover:bg-gray-200 px-3">
                        <div x-data="{ messageHover: false }" @mouseover="messageHover = true" @mouseleave="messageHover = false"
                            class="w-full flex items-center justify-between p-2 cursor-pointer">
                            <div data-modal-target="modal-report-{{ $report->id }}"
                                data-modal-toggle="modal-report-{{ $report->id }}">
                                <div class="flex items-center">
                                    <span class="w-44 truncate">{{ $report->name }}</span>
                                    <span class="w-32 truncate">{{ $report->ten_phong }}</span>
                                    <span class="w-44 truncate">
                                        @foreach ($groupDeviceList as $item)
                                            @if ($item->ma_nhat_ky == $report->id)
                                                <span> {{ $item->ten_thiet_bi }}; </span>
                                            @endif
                                        @endforeach
                                    </span>
                                    <span class="mx-1">-</span>
                                    <span class="w-64 text-gray-600 text-sm truncate">{{ $report->mo_ta_loi }}</span>
                                    @if ($report->trang_thai == '1')
                                        <div>
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-800 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Đang đợi</span>
                                            </span>
                                        </div>
                                    @else
                                        <div>
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-800 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Đã xử lý</span>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div id="modal-report-{{ $report->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-2xl md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between  bg-blue-500 px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                            <div class=" font-semibold text-gray-200 dark:text-white">
                                                <h3 class="text-gray-100  text-2xl py-2">
                                                    Nhật ký số {{ $report->id }}
                                                </h3>
                                            </div>
                                            <button type="button"
                                                class="text-gray-100 bg-transparent hover:bg-red-500 hover:text-gray-200 rounded-lg text-sm p-2 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="modal-report-{{ $report->id }}">
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
                                        <form action="{{ route('admin.download_pdf') }}" method="POST">
                                            @csrf
                                            <div class="px-6 py-4 space-y-6">

                                                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                                    <div class="border-t  border-gray-200">
                                                        <dl class="bg-gray-300">
                                                            <input type="text" name="id"
                                                                value="{{ $report->id }}" class="hidden" readonly>
                                                            <div
                                                                class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">Tên giáo
                                                                    viên
                                                                </dt>
                                                                <input name="tenGV"
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-200 outline-0"
                                                                    value="{{ $report->name }}" readonly>
                                                            </div>
                                                            <div
                                                                class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">Email</dt>
                                                                <input name="emailGV"
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                    value="{{ $report->email }}" readonly>
                                                            </div>
                                                            <div
                                                                class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">Tên phòng -
                                                                    MãLớp
                                                                </dt>
                                                                <input name="tenPhongLop"
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-200 outline-0"
                                                                    value="{{ $report->ten_phong }} - {{ $report->ma_lop }}"
                                                                    readonly>
                                                            </div>
                                                            <div
                                                                class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">Thời gian
                                                                </dt>
                                                                <input name="thoiGian"
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                    value="{{ $report->buoi }} - {{ date('d-m-Y', strtotime($report->ngay)) }}"
                                                                    readonly>
                                                            </div>

                                                            <div
                                                                class="bg-gray-200 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">
                                                                    Tên thiết bị
                                                                </dt>
                                                                <div
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                                                                    <span class="space-y-2 ">
                                                                        @foreach ($groupDeviceList as $item)
                                                                            @if ($item->ma_nhat_ky == $report->id)
                                                                                <input name="ten_thiet_bi"
                                                                                    class="block text-gray-900 bg-gray-200"
                                                                                    value="{{ $item->ten_thiet_bi }}">
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                <dt class="text-base font-medium text-gray-600">Ghi chú
                                                                </dt>
                                                                <input name="moTa"
                                                                    class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0 bg-gray-100 outline-0"
                                                                    value="{{ $report->mo_ta_loi }}" readonly>
                                                            </div>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="pb-4 px-4 my-4 mx-2">
                                            @if ($report->trang_thai == '1')
                                                <form action="{{ route('admin.update_status', $report->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button data-modal-toggle="modal-report-{{ $report->id }}"
                                                        type="submit"
                                                        class=" relative flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                                        <span
                                                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                            <span> Khắc phục xong</span>
                                                        </span>
                                                    </button>

                                                </form>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-48 flex items-center justify-end">
                                <form action="{{ route('admin.delete_report', $report->id) }}" method="POST"
                                    onclick="return confirm('Xác nhận xóa nhật ký thứ {{ $report->id }}?')">
                                    @csrf
                                    <div x-show="messageHover"
                                        class="flex items-center space-x-3 text-red-400 hover:text-red-500"
                                        style="display: none;">
                                        <button title="Delete" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                <span x-show="!messageHover" class="text-sm text-gray-600">
                                    {{ $report->buoi }} - {{ date('d-m-Y', strtotime($report->ngay)) }}
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

<!-- Modal toggle -->
