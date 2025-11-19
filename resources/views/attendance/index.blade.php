@extends('layouts.app')

@section('title', 'Quản lý điểm danh')
@section('page-title', 'Quản lý điểm danh')

@section('content')
<div x-data="{ showAttendanceForm: false }" class="space-y-6">
    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-white">Bảng điểm danh</h2>
            <p class="text-sm text-gray-300 mt-1">Theo dõi thời gian vào/ra và trạng thái làm việc hằng ngày.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <input
                type="date"
                class="px-3 py-2 bg-gray-800 border border-gray-700 text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
            >
            <select class="bg-gray-800 border border-gray-700 text-gray-100 text-sm rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                <option>Tất cả phòng ban</option>
                <option>Nhân sự</option>
                <option>Kế toán</option>
                <option>Kỹ thuật</option>
            </select>
            <button
                class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition shadow"
                @click="showAttendanceForm = true"
            >
                Ghi nhận điểm danh
            </button>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Đi làm</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">18</p>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Nghỉ phép</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">4</p>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Đi trễ</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">2</p>
        </div>
    </div>

    <!-- Attendance Modal -->
    <div
        x-show="showAttendanceForm"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm"
    >
        <div @click.outside="showAttendanceForm = false"
             class="bg-white border border-gray-300 rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto z-50">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Ghi nhận điểm danh</h3>
                    <p class="text-sm text-gray-500 mt-1">Điền thông tin để cập nhật trạng thái trong ngày.</p>
                </div>
                <button class="text-gray-400 hover:text-gray-600" @click="showAttendanceForm = false">
                    ✕
                </button>
            </div>
            <form action="#" method="POST" class="px-6 py-6 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhân viên</label>
                        <input type="text" name="employee" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="VD: Nguyễn Văn A">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ngày</label>
                        <input type="date" name="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giờ vào</label>
                        <input type="time" name="check_in" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giờ ra</label>
                        <input type="time" name="check_out" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            <option value="ontime">Đúng giờ</option>
                            <option value="late">Đi trễ</option>
                            <option value="leave">Nghỉ phép</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú</label>
                        <input type="text" name="note" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="Lý do (nếu có)">
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" @click="showAttendanceForm = false"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Hủy
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-lg font-medium hover:bg-gray-800 transition">
                        Lưu điểm danh
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Attendance Table -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Chi tiết điểm danh</h3>
            <span class="text-sm text-gray-500">Ngày: hôm nay</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã NV</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Họ tên</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giờ vào</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giờ ra</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ghi chú</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nguyễn Văn A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">08:55</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">17:35</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Đúng giờ</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">-</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV004</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Lê Văn C</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">09:20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">18:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Đi trễ</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">Kẹt xe</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


