@extends('admin.layout')

@section('device')
    <div class="grid grid-cols-5 gap-4 p-6">

        <button data-modal-toggle="modal_addroom"
            class="w-40 flex items-center justify-center text-blue-700 border border-blue-500 hover:bg-blue-500 hover:border-white hover:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            <span class="font-semibold">Thêm phòng</span>
        </button>
        <div id="modal_addroom" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold mt-2  text-gray-900 dark:text-white">
                            Thêm phòng học
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="modal_addroom">
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
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tên phòng
                                </label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required value="">
                            </div>
                            <div class="mb-6">
                              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                  Vị trí phòng
                              </label>
                              <input type="text" name="so_do_bo_tri" id="so_do_bo_tri"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  required value="">
                          </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Thêm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($roomLists as $room)
            <div class="">
                <a href="">
                    <button type="button"
                        class="w-40 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Phòng <span>{{ $room->ten_phong }}</span>
                    </button>
                </a>
            </div>
        @endforeach

        {{-- @foreach ($deviceLists as $device)
          <div>
            <h1>{{$device->ten_thiet_bi}}</h1>
          </div>
      @endforeach --}}

    </div>
@endsection
