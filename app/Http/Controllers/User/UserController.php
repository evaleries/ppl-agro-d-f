<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\UserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function orders()
    {
        return view('frontpages.account.orders', [
            'orders' => Order::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function overview()
    {
        return view('frontpages.account.overview', [
            'user' => auth()->user()
        ]);
    }
}
