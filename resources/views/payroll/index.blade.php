@extends('layouts.app')

@section('title', 'Quản lý lương')
@section('page-title', 'Quản lý lương')

@section('content')
<div x-data="{ showPayrollForm: false }" class="space-y-6">
    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-white">Bảng lương</h2>
            <p class="text-sm text-gray-300 mt-1">Tổng hợp lương, phụ cấp và khấu trừ theo tháng.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <select class="bg-gray-800 border border-gray-700 text-gray-100 text-sm rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                <option>Tháng 11 / 2025</option>
                <option>Tháng 10 / 2025</option>
                <option>Tháng 9 / 2025</option>
            </select>
            <div class="flex gap-2">
                <button
                    class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition shadow"
                    @click="showPayrollForm = true"
                >
                    Thêm bản ghi
                </button>
                <button class="px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm font-medium hover:bg-gray-50 transition shadow-sm">
                    Xuất file (.xlsx)
                </button>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Tổng lương phải trả</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">250,000,000₫</p>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Tổng phụ cấp</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">35,000,000₫</p>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-4">
            <p class="text-sm text-gray-500">Tổng khấu trừ</p>
            <p class="mt-2 text-2xl font-bold text-gray-900">12,000,000₫</p>
        </div>
    </div>

    <!-- Payroll Modal -->
    <div
        x-show="showPayrollForm"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm"
    >
        <div @click.outside="showPayrollForm = false"
             class="bg-white border border-gray-300 rounded-xl shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto z-50">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Thêm bản ghi lương</h3>
                    <p class="text-sm text-gray-500 mt-1">Nhập chi tiết lương cho kỳ hiện tại.</p>
                </div>
                <button class="text-gray-400 hover:text-gray-600" @click="showPayrollForm = false">
                    ✕
                </button>
            </div>
            <form action="#" method="POST" class="px-6 py-6 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhân viên</label>
                        <input type="text" name="employee" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="VD: Nguyễn Văn A">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ngày trả</label>
                        <input type="date" name="pay_date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lương cơ bản</label>
                        <input type="number" name="base_salary" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="20000000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phụ cấp</label>
                        <input type="number" name="allowance" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="3000000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Khấu trừ</label>
                        <input type="number" name="deduction" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="1000000">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú</label>
                        <textarea name="note" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-900 focus:border-transparent" placeholder="Chi tiết bổ sung (nếu có)"></textarea>
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" @click="showPayrollForm = false"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Hủy
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-lg font-medium hover:bg-gray-800 transition">
                        Lưu bảng lương
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Payroll Table -->
    <div class="bg-white border border-gray-300 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Chi tiết lương</h3>
            <span class="text-sm text-gray-500">Kỳ lương: 01/11 - 30/11</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã NV</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Họ tên</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Lương cơ bản</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Phụ cấp</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Khấu trừ</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Thực lĩnh</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nguyễn Văn A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">20,000,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">3,000,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">1,000,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-semibold text-gray-900">22,000,000₫</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NV002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Trần Thị B</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">15,000,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">2,000,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">500,000₫</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-semibold text-gray-900">16,500,000₫</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


