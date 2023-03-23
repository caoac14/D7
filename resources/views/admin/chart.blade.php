@extends('admin.layout')

@section('chart')
    <div class="relative">
        <div class="absolute right-4">
            @if (\Session::has('noData'))
                <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {!! \Session::get('noData') !!}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
        <div class="flex justify-between items-center p-4 m-2">
            <span class=" font-semibold text-xl">
                THỐNG KÊ THÁNG {{ now()->month }} NĂM {{ now()->year }}
            </span>
            <div>
                <div
                    class="w-full bg-green-500
               hover:bg-green-600 text-gray-50 text-base font-normal py-1.5 px-4 rounded inline-flex justify-center shadow-md shadow-green-300
               items-center">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                    </svg>
                    <span data-modal-toggle="modal_excel">Xuất file Excel</span>

                    <div id="modal_excel" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between px-6 py-3 bg-green-500  border-b rounded-t dark:border-gray-600">
                                    <div class=" font-semibold text-gray-100 dark:text-white">
                                        <h3 class="text-gray-100 text-xl mt-2">
                                            Xuất dữ liệu file Excel
                                        </h3>
                                    </div>
                                    <button type="button"
                                        class="text-gray-200 bg-transparent hover:bg-green-400 hover:text-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="modal_excel">
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
                                <form method="post" action="{{ route('admin.export_report') }}"
                                    class="flex items-center px-6 py-1">
                                    @csrf
                                    <div class="p-6 w-full">
                                        <h4 class="text-gray-800 text-xl">Xuất file theo:</h4>

                                        <div class="flex items-center my-4 ">
                                            <div class="flex-1">
                                                <input checked id="rdo_report" type="radio" value="rdo_report"
                                                    name="rdo_excel"
                                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="rdo_report"
                                                    class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                                    Xuất sổ nhật ký
                                                </label>
                                            </div>

                                            <div class="flex-1 ml-4">
                                                <select name="nhatky_nam"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                                    <option selected disabled> - Năm - </option>
                                                    <option value="2023">2023</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2021">2021</option>
                                                </select>
                                            </div>
                                            <div class="flex-1 ml-4">
                                                <select name="nhatky_thang"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                                    <option selected disabled> - Tháng - </option>
                                                    <option value="1">Tháng 1</option>
                                                    <option value="2">Tháng 2</option>
                                                    <option value="3">Tháng 3</option>
                                                    <option value="4">Tháng 4</option>
                                                    <option value="5">Tháng 5</option>
                                                    <option value="6">Tháng 6</option>
                                                    <option value="7">Tháng 7</option>
                                                    <option value="8">Tháng 8</option>
                                                    <option value="9">Tháng 9</option>
                                                    <option value="10">Tháng 10</option>
                                                    <option value="11">Tháng 11</option>
                                                    <option value="12">Tháng 12</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="flex items-center my-4">
                                            <input id="rdo_account" type="radio" value="rdo_account" name="rdo_excel"
                                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="rdo_account"
                                                class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                                Xuất danh sách tài khoản
                                            </label>
                                        </div>
                                        <div class="flex items-center my-4">
                                            <input id="rdo_device" type="radio" value="rdo_device" name="rdo_excel"
                                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="rdo_device"
                                                class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                                Xuất danh sách thiết bị
                                            </label>
                                        </div>
                                        <div class="flex items-center my-4">
                                            <input id="rdo_room" type="radio" value="rdo_room" name="rdo_excel"
                                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="rdo_room"
                                                class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                                Xuất file phòng học
                                            </label>
                                        </div>

                                        <button data-modal-toggle="modal_excel"
                                            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-8 py-2.5 my-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Xuất file
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Số lượng thiết bị --}}
        <!-- component -->
        <!-- This is an example component -->
        <div class='flex sm:flex-row p-4 mb-8 sm:space-x-2 w-full items-center justify-center'>
            <div
                class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/3 p-5 bg-white rounded-md shadow-xl border-l-4 border-blue-500'>
                <div class="flex justify-between w-full">
                    <div>
                        <div class="p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#0090de" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1"
                                    ry="1"></rect>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.report') }}"
                            class="flex items-center text-xs px-3 py-1 bg-blue-500 text-gray-50 rounded-full hover:bg-blue-400">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-3xl">
                        {{ $countReport }}
                    </div>
                    <div class=" text-md">
                        Nhật ký đã được lưu
                    </div>
                </div>
            </div>
            <div
                class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/3 p-5 bg-white rounded-md shadow-xl border-l-4 border-green-500'>
                <div class="flex justify-between w-full">
                    <div>
                        <div class="p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#05b555" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2"
                                    ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <a href="#"
                            class="flex items-center text-xs px-3 py-1 bg-emerald-500 text-gray-50 rounded-full hover:bg-emerald-400">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-3xl">
                        {{ $countDevice }}
                    </div>
                    <div class=" text-md">
                        Thiết bị đã được thêm
                    </div>
                </div>
            </div>
            <div
                class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/3 p-5 bg-white rounded-md shadow-xl border-l-4 border-orange-500'>
                <div class="flex justify-between w-full">
                    <div>
                        <div class="p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#ff2b00" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.account') }}"
                            class="flex items-center text-xs px-3 py-1 bg-orange-500 text-gray-50 rounded-full hover:bg-orange-400">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-3xl">
                        {{ $countUser }}
                    </div>
                    <div class="text-md">
                        Tài khoản đã được tạo
                    </div>
                </div>
            </div>

        </div>

        <div class="overflow-hidden">
            {{-- <div class="w-full py-3 mt-2 text-xl font-bold px-5 bg-white text-center">
                THỐNG KÊ LỖI PHÒNG MÁY {{ now()->year }}
            </div> --}}
            <div class="">
                <div class="">
                    {{-- Biểu đồ --}}
                    <canvas class="px-10" id="chartBar"></canvas>
                </div>
                {{-- <div class="col-span-1">
                    <!-- Thống kê số liệu -->
                    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
                        <div class="flex flex-col">
                            <h3 class="text-xl leading-6 font-bold text-gray-800 text-center py-2">TẤT CẢ</h3>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg border border-gray-200 text-left overflow-hidden shadow-lg transform transition-all mb-4 w-full ">
                                <div class="bg-gray-50 p-5 ">
                                    <div class="sm:flex  sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-base pb-1 leading-6 font-medium text-gray-700">Nhật ký được lưu
                                            </h3>
                                            <p class="text-xl font-bold text-black"> {{ $countReport }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg border border-gray-200 text-left overflow-hidden shadow-lg transform transition-all mb-4 w-full ">
                                <div class="bg-gray-50 p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-base pb-1 leading-6 font-medium text-gray-700">Thiết bị hiện tại
                                            </h3>
                                            <p class="text-xl font-bold text-black">{{ $countDevice }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg border border-gray-200 text-left overflow-hidden shadow-lg transform transition-all mb-4 w-full ">
                                <div class="bg-gray-50 p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-sm leading-6 font-medium text-gray-700">Tài khoản được tạo</h3>
                                            <p class="text-xl font-bold text-black"> {{ $countUser }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> --}}
                <span class="hidden" id="totalData">{{ $totalData }},10</span>
            </div>
        </div>
        <!-- Required chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Chart bar -->
        <script>
            const labelsBarChart = [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
                "25",
                "26",
                "27",
                "28",
                "29",
                "30",
                "31"
            ];
            const totalData = document.getElementById('totalData').innerHTML;
            const resultData = totalData.split(",");

            const dataBarChart = {
                labels: labelsBarChart,
                datasets: [{
                    label: "Nhật ký đã được lưu",
                    backgroundColor: "hsl(206, 100%, 50%)",
                    borderColor: "hsl(252, 82.9%, 67.8%)",
                    data: resultData,
                }, ],
            };
            const configBarChart = {
                type: "bar",
                data: dataBarChart,
                options: {},
            };

            var chartBar = new Chart(
                document.getElementById("chartBar"),
                configBarChart
            );
        </script>
    </div>
@endsection
