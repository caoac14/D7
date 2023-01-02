<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="grid grid-cols-3 gap-4">
                            @for ($i = 0; $i < count($typeOfDevice); $i++)
                            <div
                            class="w-full p-4 justify-center max-w-2xl mx-auto bg-white shadow-lg rounded-md border border-gray-200">
                            <h3 class="mb-4 text-xl text-center font-bold tracking-tight text-gray-800 dark:text-white">{{ $nameTypes[$i] }}</h3>
                                    <div class="grid grid-cols-2 gap-2 ">
                                        @foreach ($typeOfDevice[$i] as $device)
                                            <div class="w-full flex items-center justify-center">
                                                <!-- Modal toggle -->
                                                <button
                                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                                    type="button" data-modal-toggle="defaultModal-{{ $device->id }}">
                                                    {{ $device->ten_thiet_bi }}
                                                </button>
                                                <!-- Main modal -->
                                                <div id="defaultModal-{{ $device->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="flex items-start justify-between px-6 pt-4 pb-2  border-b rounded-t dark:border-gray-600">
                                                                <div
                                                                    class=" font-semibold text-gray-900 dark:text-white">
                                                                    <a href="{{ route('dashboard') }}">
                                                                        <p class="text-blue-500 text-base">
                                                                            Phòng: {{ $room[0] }}
                                                                        </p>
                                                                    </a>
                                                                    <h3 class="text-gray-800 text-2xl mt-2">
                                                                        {{ $device->ten_thiet_bi }}
                                                                    </h3>
                                                                </div>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-toggle="defaultModal-{{ $device->id }}">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
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
                                                                <p
                                                                    class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                    With less than a month to go before the European
                                                                    Union
                                                                    enacts
                                                                    new consumer privacy laws for its citizens,
                                                                    companies
                                                                    around
                                                                    the
                                                                    world are updating their terms of service agreements
                                                                    to
                                                                    comply.
                                                                </p>
                                                                <p
                                                                    class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                    The European Union’s General Data Protection
                                                                    Regulation
                                                                    (G.D.P.R.)
                                                                    goes into effect on May 25 and is meant to ensure a
                                                                    common set of data rights in the European Union. It
                                                                    requires
                                                                    organizations to notify users as soon as possible of
                                                                    high-risk
                                                                    data breaches that could personally affect them.
                                                                </p>
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div
                                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                <form action="{{ route('report') }}" method="GET">
                                                                    @csrf
                                                                    <input type="text" name="devide" class="hidden"
                                                                        value="{{ $device->id }}">
                                                                    <button type="submit"
                                                                        data-modal-toggle="defaultModal-{{ $device->id }}"
                                                                        type="button"
                                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        Báo cáo sự cố
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
