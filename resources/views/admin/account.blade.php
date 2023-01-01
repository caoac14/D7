@extends('admin.layout')

@section('account')
    <div>
        <div class="flex justify-end text-sm p-1">
            <a href="{{ route('admin.register_account') }}">
                <button
                    class="flex items-center justify-center bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
                <div class="w-full flex items-center font-bold p-2 my-1">
                    <div class="w-full flex items-center mt-2">
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
                            <a href="">
                                <div class="flex items-center">
                                    <span class="w-56 pr-2 truncate">{{ $user->name }}</span>
                                    <span class="w-52 truncate">{{ $user->email }}</span>
                                    <span class="w-56 truncate">{{ $user->chuc_vu }}</span>
                                    <span class="w-40 truncate">{{ $user->hoc_vi }}</span>
                                    <span class="w-32 text-gray-600 text-sm truncate">{{ $user->sdt }}</span>
                                </div>
                            </a>
                            <div class="w-1 flex items-center justify-end">
                                <div x-show="messageHover" class="flex items-center space-x-3" style="display: none;">
                                    <a href="{{ $user->id }}" class="no-underline flex items-center mr-2">
                                        <button title="Reset">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#0047ff" stroke-width="2"
                                                stroke-linecap="square" stroke-linejoin="round">
                                                <path d="M2.5 2v6h6M21.5 22v-6h-6" />
                                                <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2" />
                                            </svg>
                                        </button>
                                    </a>
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
                @endforeach
            </ul>
            <div
                class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                {{ $userLists->links() }}
            </div>
        </div>
    </div>
@endsection
