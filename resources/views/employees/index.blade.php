@extends('layouts.app')

@section('title', 'Quản lý nhân viên')
@section('page-title', 'Quản lý nhân viên')

@section('content')
    <div x-data="{ showCreateEmployee: false }" class="space-y-6">
        <!-- Toolbar -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Danh sách nhân viên</h2>
                <p class="text-sm text-gray-700 mt-1">Quản lý thông tin hồ sơ, phòng ban và trạng thái làm việc.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="search" placeholder="Tìm nhân viên..."
                        class="pl-10 pr-4 py-2 bg-gray-800 border border-gray-700 text-gray-100 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition shadow"
                    @click="showCreateEmployee = true">
                    + Thêm nhân viên
                </button>
            </div>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <select
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200 focus:border-transparent">
                <option>Phòng ban</option>
                <option>Nhân sự</option>
                <option>Kế toán</option>
                <option>Kỹ thuật</option>
            </select>
            <select
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200 focus:border-transparent">
                <option>Chức vụ</option>
                <option>Nhân viên</option>
                <option>Trưởng phòng</option>
                <option>Giám đốc</option>
            </select>
            <select
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200 focus:border-transparent">
                <option>Trạng thái</option>
                <option>Đang làm</option>
                <option>Nghỉ phép</option>
                <option>Đã nghỉ</option>
            </select>
            <button class="px-4 py-2 rounded-lg border border-gray-600 text-gray-100 text-sm hover:bg-gray-800 transition">
                Đặt lại bộ lọc
            </button>
        </div>

        <!-- Create Employee Modal -->
        <div x-show="showCreateEmployee" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
            <div @click.outside="showCreateEmployee = false"
                class="bg-white border border-gray-300 rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto z-50">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Thêm nhân viên</h3>
                        <p class="text-sm text-gray-500 mt-1">Nhập đầy đủ thông tin nhân sự mới.</p>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600" @click="showCreateEmployee = false">
                        ✕
                    </button>
                </div>
                <form action="#" method="POST" class="px-6 py-6 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Họ tên</label>
                            <input type="text" name="full_name"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                placeholder="VD: Nguyễn Văn A">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                placeholder="name@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phòng ban</label>
                            <select name="department"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                <option value="">Chọn phòng ban</option>
                                <option value="hr">Nhân sự</option>
                                <option value="accounting">Kế toán</option>
                                <option value="engineering">Kỹ thuật</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Chức vụ</label>
                            <input type="text" name="position"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                placeholder="VD: Trưởng phòng">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ngày vào làm</label>
                            <input type="date" name="start_date"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                            <select name="status"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                <option value="active">Đang làm</option>
                                <option value="leave">Nghỉ phép</option>
                                <option value="inactive">Đã nghỉ</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" @click="showCreateEmployee = false"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                            Hủy
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-gray-900 text-white rounded-lg font-medium hover:bg-gray-800 transition">
                            Lưu nhân viên
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Employees Table -->
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Danh sách nhân viên</h3>
                <span class="text-sm text-gray-500">Tổng: 24 nhân viên</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã NV
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Họ
                                tên</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phòng
                                ban</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chức
                                vụ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng
                                thái</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Thao
                                tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nguyễn Văn A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nhân sự</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Trưởng phòng</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Đang
                                    làm</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right space-x-2">
                                <button class="text-orange-600 hover:text-orange-800">Sửa</button>
                                <button class="text-red-600 hover:text-red-800">Xóa</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Trần Thị B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kế toán</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nhân viên</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Nghỉ
                                    phép</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right space-x-2">
                                <button class="text-orange-600 hover:text-orange-800">Sửa</button>
                                <button class="text-red-600 hover:text-red-800">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between text-sm text-gray-600">
                <p>Hiển thị 1–10 trên 24</p>
                <div class="flex items-center space-x-1">
                    <button
                        class="px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">Trước</button>
                    <button class="px-3 py-1 rounded-lg bg-gray-900 text-white">1</button>
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">Sau</button>
                </div>
            </div>
        </div>
    </div>
@endsection
