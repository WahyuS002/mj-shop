<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $countOrders['all'] = Order::where(['user_id' => $userId])->count();
        $countOrders['unpaid'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_UNPAID])->count();
        $countOrders['on_process'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_ON_PROCESS])->count();
        $countOrders['on_delivery'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_ON_DELIVERY])->count();
        $countOrders['finished'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_FINISHED])->count();
        $countOrders['cancelled'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_CANCELLED])->count();

        return view('public.user.dashboard', compact('countOrders'));
    }
}
