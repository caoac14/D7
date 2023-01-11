@extends('admin.layout')

@section('account')
    <div>
        <div class="flex justify-end text-sm p-1">
            <a href="{{ route('admin.register_account') }}">
                <button
                    class="mb-1 flex items-center shadow-sm shadow-green-400 justify-center bg-green-500 mr-2 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Thêm tài khoản
                </button></a>
        </div>
        <div class="bg-gray-100 mb-6 text-sm">
            <div>
                <div class="w-full bg-blue-300 flex items-center font-bold py-3">
                    <div class="w-full flex items-center ml-2">
                        <span class="w-56 pr-2 ml-8 truncate">Tên giáo viên</span>
                        <span class="w-52">Email</span>
                        <span class="w-56 truncate">Chức vụ</span>
                        <span class="w-40">Học vị</span>
                        <span class="w-32 truncate">Số điện thoại</span>
                    </div>
                </div>
            </div>
            <ul>
                @foreach ($userLists as $user)
                    <li class="flex items-center border-y hover:bg-gray-200 px-3">
                        <input id="default-checkbox" type="checkbox" value="" :checked="checkAll"
                            class="w-4 h-4 text-blue-600 bg-white rounded border-gray-300 focus:ring-blue-500 mr-2 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div x-data="{ messageHover: false }" @mouseover="messageHover = true" @mouseleave="messageHover = false"
                            class="w-full flex items-center justify-between p-1 my-1 cursor-pointer">
                            <div data-modal-toggle="modal-{{ $user->id }}">
                                <div class="flex items-center">
                                    <span class="w-56 pr-2 truncate">{{ $user->name }}</span>
                                    <span class="w-52 truncate">{{ $user->email }}</span>
                                    <span class="w-56 truncate">{{ $user->chuc_vu }}</span>
                                    <span class="w-40 truncate">{{ $user->hoc_vi }}</span>
                                    <span class="w-32 text-gray-600 text-sm truncate">{{ $user->sdt }}</span>
                                </div>
                            </div>
                            <div class="w-1 flex items-center justify-end">
                                <div x-show="messageHover" class="flex items-center space-x-3" style="display: none;">
                                    <button title="Reset">
                                        <a href="{{ route('admin.reset_password', $user->id) }}"
                                            class="no-underline flex items-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#0047ff" stroke-width="2"
                                                stroke-linecap="square" stroke-linejoin="round">
                                                <path d="M2.5 2v6h6M21.5 22v-6h-6" />
                                                <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2" />
                                            </svg>
                                        </a>
                                    </button>
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

                                </span>
                            </div>
                        </div>
                    </li>
                    <div id="modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between bg-blue-500 p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold mt-2  text-gray-100 dark:text-white">
                                        Thông tin giáo viên
                                    </h3>
                                    <button type="button"
                                        class="text-gray-100 bg-transparent hover:bg-red-400 hover:text-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="modal-{{ $user->id }}">
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
                                    <form action="{{ route('admin.update_account', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-6">
                                            <label for="text"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Tên giáo viên
                                            </label>
                                            <input type="text" name="name" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required value="{{ $user->name }}">
                                        </div>
                                        <div class="mb-6">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Email
                                            </label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required value="{{ $user->email }}">
                                        </div>
                                        <div class="mb-6">
                                            <label for="text"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Chức vụ
                                            </label>
                                            <input type="text" name="chuc_vu" id="chuc_vu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $user->chuc_vu }}">
                                        </div>
                                        <div class="mb-6">
                                            <label for="text"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Học vị
                                            </label>
                                            <input type="text" name="hoc_vi" id="hoc_vi"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $user->hoc_vi }}">
                                        </div>
                                        <div class="mb-6">
                                            <label for="text"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Số điện thoại
                                            </label>
                                            <input type="text" name="sdt" id="sdt" maxlength="10"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $user->sdt }}">
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Cập nhật
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            <div
                class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                {{ $userLists->links() }}
            </div>
        </div>
    </div>
@endsection

<!-- Modal toggle -->
