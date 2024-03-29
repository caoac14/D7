<aside class="w-auto h-screen" aria-label="Sidebar">
    <div class="overflow-y-auto shadow-lg py-4 px-3 bg-gray-300 h-screen dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.home') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white  hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#000000" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                        <path d="M21.5 12H12V2.5" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <span class="ml-3">Sự cố</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.device') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2">
                        </rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    <span class="ml-3">Phòng học</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.account') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="square"
                        stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ml-3">Tài khoản</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.report') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="square"
                        stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                        <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
                    </svg>
                    <span class="ml-3">Nhật ký</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.chart') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="square"
                        stroke-linejoin="round">
                        <path d="M12 20v-6M6 20V10M18 20V4" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Thống kê</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.profileAdmin') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="square"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Thông tin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.division') }}"
                    class="flex items-center p-2 text-sm font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="square"
                        stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Phân công</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
