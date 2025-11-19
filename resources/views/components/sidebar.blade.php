<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-full w-64 bg-white text-gray-900 shadow-lg z-40 transition-transform duration-300 border-r border-gray-300"
    x-data="{ open: true }">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 2L3 14h8l-1 8 10-12h-8l1-8z" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-gray-900">Dashboard</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="px-4 space-y-2">
                @php
                    $linkBase = 'flex items-center space-x-3 px-4 py-3 rounded-lg transition';
                @endphp

                <!-- Dashboard -->
                @php $isDashboard = request()->routeIs('dashboard'); @endphp
                <a href="{{ route('dashboard') }}"
                    class="{{ $linkBase }} {{ $isDashboard ? 'bg-gray-900 text-white shadow-lg' : 'text-gray-900 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Employees -->
                @php $isEmployees = request()->routeIs('employees.index'); @endphp
                <a href="{{ route('employees.index') }}"
                    class="{{ $linkBase }} {{ $isEmployees ? 'bg-gray-900 text-white shadow-lg' : 'text-gray-900 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="font-medium">Quản lý nhân viên</span>
                </a>

                <!-- Attendance -->
                @php $isAttendance = request()->routeIs('attendance.index'); @endphp
                <a href="{{ route('attendance.index') }}"
                    class="{{ $linkBase }} {{ $isAttendance ? 'bg-gray-900 text-white shadow-lg' : 'text-gray-900 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-medium">Quản lý điểm danh</span>
                </a>

                <!-- Payroll -->
                @php $isPayroll = request()->routeIs('payroll.index'); @endphp
                <a href="{{ route('payroll.index') }}"
                    class="{{ $linkBase }} {{ $isPayroll ? 'bg-gray-900 text-white shadow-lg' : 'text-gray-900 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="font-medium">Quản lý lương</span>
                </a>
            </div>
        </nav>

        <!-- Logout Button -->
        <div class="p-2 border-t border-gray-300">
            <form method="POST" action="/logout" class="w-full">
                @csrf
                <button type="submit"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg text-red-400 hover:bg-red-500 hover:text-white transition w-full cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- Sidebar Toggle Button (Mobile) -->
<button @click="open = !open" class="fixed top-4 left-4 z-50 md:hidden bg-gray-900 text-white p-2 rounded-lg shadow-lg">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>
