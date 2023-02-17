@extends('admin.layout')

@section('device')
    <div>
        <div class="flex justify-between items-center text-sm bg-blue-300 p-2 mr-1">
            <div class="text-lg text-gray-700 mx-2 font-semibold">Danh sách dãy phòng<span class="text-blue-700"></span></div>
            <button data-modal-toggle="modal_addGroupRoom"
                class="flex justify-center items-center w-40 text-white shadow-md shadow-green-300 bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2 text-center ">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Thêm dãy
            </button>
        </div>
        <div id="modal_addGroupRoom" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between bg-green-500 p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                            Thêm dãy phòng
                        </h3>
                        <button type="button"
                            class="text-gray-200 bg-transparent hover:bg-red-400 hover:text-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="modal_addGroupRoom">
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
                        <form action=" {{ route('admin.add_groupRoom') }} " method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="ten_day_phong"
                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                    Tên dãy:
                                </label>
                                <input type="text" name="ten_day_phong" id="ten_day_phong"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    required value="">
                            </div>

                            <button type="submit"
                                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Thêm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-5 gap-x-6 gap-y-4 p-4 my-2 bg-gray-200 shadow-md shadow-gray-300">
        @foreach ($groupRoomLists as $groupRoom)
            <div class="w-full">
                <a href="{{ route('admin.group_room', $groupRoom->id) }}">
                    <button
                        class="w-full  relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span
                            class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            {{ $groupRoom->ten_day_phong }}
                        </span>
                    </button>
                </a>
            </div>
        @endforeach
    </div>
@endsection
