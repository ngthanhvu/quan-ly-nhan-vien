@extends('layouts.app')

@section('title', 'Trang quản trị')
@section('page-title', 'Tổng quan hệ thống')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Tổng số nhân viên -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Tổng số nhân viên</p>
                <p class="text-2xl font-bold text-gray-800">124</p>
                <p class="text-sm text-green-600 mt-1">+5 nhân viên mới tháng này</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Nhân viên đang làm việc -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Đang làm việc</p>
                <p class="text-2xl font-bold text-gray-800">118</p>
                <p class="text-sm text-green-600 mt-1">95.2% tổng số nhân viên</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Nhân viên nghỉ phép -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Nghỉ phép hôm nay</p>
                <p class="text-2xl font-bold text-gray-800">4</p>
                <p class="text-sm text-yellow-600 mt-1">3.2% tổng số nhân viên</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Tổng lương tháng này -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Tổng lương tháng này</p>
                <p class="text-2xl font-bold text-gray-800">2.5 tỷ</p>
                <p class="text-sm text-orange-600 mt-1">+3.2% so với tháng trước</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Biểu đồ điểm danh -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Tỷ lệ điểm danh 7 ngày qua</h3>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded">
            <p class="text-gray-500">Biểu đồ điểm danh</p>
        </div>
    </div>

    <!-- Phân bố nhân viên theo phòng ban -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Phân bố nhân viên theo phòng ban</h3>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded">
            <p class="text-gray-500">Biểu đồ phân bố</p>
        </div>
    </div>
</div>

<!-- Nhân viên mới và hoạt động gần đây -->
<div class="bg-white border border-gray-300 rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800">Nhân viên mới và hoạt động gần đây</h3>
        <a href="{{ route('employees.index') }}" class="text-sm text-orange-600 hover:text-orange-800 font-medium">Xem tất cả</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã NV</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Họ tên</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phòng ban</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chức vụ</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày vào làm</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV125</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nguyễn Thị D</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Marketing</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nhân viên</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">15/11/2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Đang làm</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV124</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Trần Văn E</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kỹ thuật</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Developer</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">10/11/2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Đang làm</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV123</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Lê Thị F</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kế toán</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kế toán viên</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">05/11/2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Đang làm</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection