<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Bank;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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

        $orders = Order::where(['user_id' => $userId])->latest()->get();

        return view('public.user.orders.index', compact('countOrders', 'orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id != auth()->user()->id) {
            abort(404);
        }

        $banks = Bank::all();

        return view('public.user.orders.show', compact('banks', 'order'));
    }

    public function status($status = '')
    {
        $statuses = ['unpaid', 'on-process', 'on-delivery', 'finish', 'cancelled'];
        if (!in_array($status, $statuses)) {
            abort(404);
        }
        $statusText = '';
        $userId = auth()->user()->id;

        switch ($status) {
            case 'unpaid':
                $statusText = 'Belum Dibayar';
                $status = Constants::ORDER_STATUS_UNPAID;
                break;
            case 'on-process':
                $statusText = 'Sedang Diproses';
                $status = Constants::ORDER_STATUS_ON_PROCESS;
                break;
            case 'on-delivery':
                $statusText = 'Dalam Pengiriman';
                $status = Constants::ORDER_STATUS_ON_DELIVERY;
                break;
            case 'finish':
                $statusText = 'Selesai';
                $status = Constants::ORDER_STATUS_FINISHED;
                break;
            case 'cancelled':
                $statusText = 'Dibatalkan';
                $status = Constants::ORDER_STATUS_CANCELLED;
                break;
        }

        $countOrders['all'] = Order::where(['user_id' => $userId])->count();
        $countOrders['unpaid'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_UNPAID])->count();
        $countOrders['on_process'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_ON_PROCESS])->count();
        $countOrders['on_delivery'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_ON_DELIVERY])->count();
        $countOrders['finished'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_FINISHED])->count();
        $countOrders['cancelled'] = Order::where(['user_id' => $userId, 'status_id' => Constants::ORDER_STATUS_CANCELLED])->count();

        $orders = Order::where(['user_id' => auth()->user()->id, 'status_id' => $status])->get();

        return view('public.user.orders.status', compact('countOrders', 'orders', 'statusText'));
    }

    public function cancelOrder(Request $request, Order $order)
    {
        if ($order->user_id != auth()->user()->id) {
            abort(404);
        }

        $order->status_id = Constants::ORDER_STATUS_CANCELLED;
        $order->save();

        $cancellations = [
            'user_id' => auth()->user()->id,
            'reason' => $request->reason
        ];

        $order->cancellations()->create($cancellations);

        return redirect()
            ->back()
            ->withSuccess('Berhasil membatalkan order');
    }
}
