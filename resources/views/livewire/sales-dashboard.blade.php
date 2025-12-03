<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-semibold mb-6">Sales Dashboard</h2>

                <!-- Overall User Metrics -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Overall User Statistics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-blue-100 rounded-lg p-4 border border-blue-200">
                            <div class="text-sm text-blue-600 font-medium">Total Users</div>
                            <div class="text-3xl font-bold text-blue-800 mt-2">{{ $totalUsers }}</div>
                        </div>

                        <div class="bg-green-100 rounded-lg p-4 border border-green-200">
                            <div class="text-sm text-green-600 font-medium">Active Users</div>
                            <div class="text-3xl font-bold text-green-800 mt-2">{{ $totalActiveUsers }}</div>
                        </div>

                        <div class="bg-red-100 rounded-lg p-4 border border-red-200">
                            <div class="text-sm text-red-600 font-medium">Inactive Users</div>
                            <div class="text-3xl font-bold text-red-800 mt-2">{{ $totalInactiveUsers }}</div>
                        </div>

                        <div class="bg-purple-100 rounded-lg p-4 border border-purple-200">
                            <div class="text-sm text-purple-600 font-medium">Today's Signups</div>
                            <div class="text-3xl font-bold text-purple-800 mt-2">{{ $todaySignups }}</div>
                        </div>
                    </div>
                </div>

                <!-- Sales Team Metrics -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Sales Team Statistics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-indigo-100 rounded-lg p-4 border border-indigo-200">
                            <div class="text-sm text-indigo-600 font-medium">Total Sales Members</div>
                            <div class="text-3xl font-bold text-indigo-800 mt-2">{{ $totalSalesUsers }}</div>
                        </div>

                        <div class="bg-teal-100 rounded-lg p-4 border border-teal-200">
                            <div class="text-sm text-teal-600 font-medium">Active Sales Members</div>
                            <div class="text-3xl font-bold text-teal-800 mt-2">{{ $activeSalesUsers }}</div>
                        </div>

                        <div class="bg-orange-100 rounded-lg p-4 border border-orange-200">
                            <div class="text-sm text-orange-600 font-medium">Inactive Sales Members</div>
                            <div class="text-3xl font-bold text-orange-800 mt-2">{{ $inactiveSalesUsers }}</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Signups -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Recent Signups</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-yellow-100 rounded-lg p-4 border border-yellow-200">
                            <div class="text-sm text-yellow-600 font-medium">This Week</div>
                            <div class="text-3xl font-bold text-yellow-800 mt-2">{{ $weekSignups }}</div>
                        </div>

                        <div class="bg-pink-100 rounded-lg p-4 border border-pink-200">
                            <div class="text-sm text-pink-600 font-medium">This Month</div>
                            <div class="text-3xl font-bold text-pink-800 mt-2">{{ $monthSignups }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
