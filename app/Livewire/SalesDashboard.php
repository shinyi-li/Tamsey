<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SalesDashboard extends Component
{
    public function render()
    {
        // Calculate dashboard metrics
        $totalUsers = User::count();
        $totalActiveUsers = User::where('is_active', true)->count();
        $totalInactiveUsers = User::where('is_active', false)->count();
        $todaySignups = User::whereDate('created_at', today())->count();

        // Sales-specific metrics
        $totalSalesUsers = User::where('role', 'sales')->count();
        $activeSalesUsers = User::where('role', 'sales')->where('is_active', true)->count();
        $inactiveSalesUsers = User::where('role', 'sales')->where('is_active', false)->count();

        // Recent signups this week
        $weekSignups = User::where('created_at', '>=', now()->startOfWeek())->count();

        // Recent signups this month
        $monthSignups = User::where('created_at', '>=', now()->startOfMonth())->count();

        return view('livewire.sales-dashboard', [
            'totalUsers' => $totalUsers,
            'totalActiveUsers' => $totalActiveUsers,
            'totalInactiveUsers' => $totalInactiveUsers,
            'todaySignups' => $todaySignups,
            'totalSalesUsers' => $totalSalesUsers,
            'activeSalesUsers' => $activeSalesUsers,
            'inactiveSalesUsers' => $inactiveSalesUsers,
            'weekSignups' => $weekSignups,
            'monthSignups' => $monthSignups,
        ]);
    }
}
