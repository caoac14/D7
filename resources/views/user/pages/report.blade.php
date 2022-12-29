<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <form method="POST" action="#">
                        @csrf
                        <div class="bg-indigo-50 min-h-screen md:px-20 pt-6">
                            <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                                <h1 class="text-center text-2xl font-bold text-gray-500 mb-5">SỔ NHẬT KÝ</h1>
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex items-center">
                                            <div>
                                                <select id="countries"
                                                    class="w-32 py-2 px-4 text-lx border-2 border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="VN" selected>Sáng</option>
                                                    <option value="US">Chiều</option>
                                                    <option value="CA">Tối</option>
                                                </select>
                                            </div>
                                            <div class="ml-8">
                                                <input type="date" placeholder="name" id="date"
                                                    class="outline-none border-gray-300 py-2 px-2 text-md border-2 rounded-md" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="name" class="text-lx">Tên giáo viên:</label>
                                        <input type="text" placeholder="name" id="name"
                                            class="block outline-none w-full bg-slate-200 border-gray-300 py-2 px-4 text-md border-2 rounded-md cursor-default"
                                            disabled readonly value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div>
                                        <label for="title" class="text-lx">Phòng:</label>
                                        <select id="room" name="room" required
                                            class=" outline-none py-2 px-4 text-md border-2 border-gray-300 text-gray-900 text-lx rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected hidden>Chọn phòng</option>
                                            @foreach ($listRooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->ten_phong }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="over">
                                        <label for="device" class="text-lx block">Tên thiết bị:</label>

                                        <div class="flex items-center">
                                            <button type="button" data-modal-toggle="crypto-modal"
                                                class="text-gray-100 bg-blue-500 hover:bg-blue-600 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="12" y1="5" x2="12" y2="19">
                                                    </line>
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                </svg>
                                                <span class="ml-2 text-base">Chọn thiết bị</span>
                                            </button>
                                            <input type="text"
                                                class="flex-1 outline-none py-2 ml-4 px-4 text-md border-2 border-gray-300 text-gray-900 text-lx rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                                            <div>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <svg aria-hidden="true"
                                                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                                            fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                    <input type="search" id="searchDevice"
                                                                        name="searchDevice"
                                                                        class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Nhập tên thiết bị cần tìm"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div id="device">

                                                            </div>
                                                            <div class="flex justify-center">
                                                                <button type="button" data-modal-toggle="crypto-modal"
                                                                class=" px-4 w-full mb-4 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-blue-600 hover:bg-blue-500  ">
                                                                    Xong
                                                            </button>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- @if ($deviceName->count())
                                        <input type="text" placeholder="" id="device"
                                        class="block outline-none  w-full border-gray-300 p-2 text-md border-2 rounded-md"
                                        value="{{ $deviceName[0] }}; " />
                                        @else
                                        <input type="text" placeholder="" id="device"
                                        class="block outline-none  w-full border-gray-300 p-2 text-md border-2 rounded-md" />
                                        @endif --}}
                                    </div>

                                    <div>
                                        <label for="description" class="block mb-2 text-lx">Mô tả:</label>
                                        <textarea id="description" cols="30" rows="5" placeholder="Sự cố thiết bị gặp phải?"
                                            class="w-full px-4 py-4 text-gray-600 border-gray-300 bg-indigo-50 outline-none rounded-md"></textarea>
                                    </div>

                                    <button type="submit"
                                        class=" px-4 w-52 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-blue-600  ">
                                        Gởi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var url = "{{ url('/KL/showDevice') }}";
        $("select[name='room']").change(function() {
            var room_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    room_id: room_id,
                    _token: token
                },
                success: function(data) {
                    $("#device").html('');
                    $.each(data, function(key, value) {
                        $("#device").append(
                            `<li>
                                <div
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-blue-300 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <input id="default-${value.id}" type="checkbox"
                                        value="${value.id}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-${value.id}"
                                        class="flex-1 ml-3 whitespace-nowrap">
                                        ${value.ten_thiet_bi}
                                    </label>
                                </div>
                            </li> `
                        );
                    });
                }
            });
        });

        // Search device
        // $('#searchDevice').on('keyup', function() {
        //     console.log(123)
        //     $value = $(this).val();
        //     $.ajax({
        //         type: 'get',
        //         url: '{{ URL::to('searchDevice') }}',
        //         data: {
        //             'searchValue': $value
        //         },
        //         success: function(data) {
        //             $('p').html(data);
        //         }
        //     });
        // })
        // $.ajaxSetup({
        //     headers: {
        //         'csrftoken': '{{ csrf_token() }}'
        //     }
        // });
    </script>
</x-app-layout>
