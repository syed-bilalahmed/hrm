<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Overview Cards -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                    <i class="fa-solid fa-users fa-2x"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Total Employees</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total_employees'] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                    <i class="fa-solid fa-clock fa-2x"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">Present Today</p>
                    <p class="text-2xl font-bold text-gray-800">--</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                    <i class="fa-solid fa-calendar-times fa-2x"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-semibold">On Leave</p>
                    <p class="text-2xl font-bold text-gray-800">--</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Attendance Trends</h3>
            <div class="relative h-[250px]">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Department Distribution</h3>
            <div class="relative h-[250px]">
                <canvas id="departmentChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Attendance Line Chart
            const attCtx = document.getElementById('attendanceChart').getContext('2d');
            new Chart(attCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    datasets: [{
                        label: 'Present Employees',
                        data: [12, 19, 15, 22, 20, 10],
                        borderColor: 'rgb(34, 197, 94)',
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            // Department Pie Chart
            const deptCtx = document.getElementById('departmentChart').getContext('2d');
            new Chart(deptCtx, {
                type: 'doughnut',
                data: {
                    labels: ['IT', 'HR', 'Finance', 'Marketing'],
                    datasets: [{
                        data: [10, 5, 8, 12],
                        backgroundColor: [
                            'rgb(59, 130, 246)',
                            'rgb(234, 88, 12)',
                            'rgb(34, 197, 94)',
                            'rgb(168, 85, 247)'
                        ]
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        });
    </script>
</x-app-layout>
