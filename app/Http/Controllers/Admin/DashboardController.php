<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\dateHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $listDay = dateHelper::getListDayInMonth();
        $new_order = Order::where('status', 'new')->get()->count();
        $order_has_been_cancelled = Order::where('status', 'order has been cancelled')->get()->count();
        $users = User::count();

        //tổng doanh thu tháng
        $thisMonth = Carbon::now()->month;
        $revenueMonth = Order::where('status', 'delivered')
            ->selectRaw('SUM(total) as totalMoney')
            ->whereMonth('created_at', $thisMonth)
            ->get()->toArray();
        //tổng doanh thu năm
        $thisYear = Carbon::now()->year;
        $revenueYear = Order::where('status', 'delivered')
            ->selectRaw('SUM(total) as totalMoney')
            ->whereYear('created_at', $thisYear)
            ->get()->toArray();
        // doanh thu tháng
        $revenue = Order::Where('status', 'delivered')
            ->selectRaw('SUM(total) as totalMoney')
            ->whereMonth('created_at', date('m'))
            ->selectRaw('DATE(created_at) day')
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenue = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenue as $key => $value) {
                if ($value['day'] == $day) {
                    $total = $value['totalMoney'];
                    break;
                }
            }
            $arrRevenue[] = (int)$total;
        }
        //top 10 sản phẩm bán chạy
        $selling_products = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->selectRaw('products.*,orders.status,SUM(order_details.qty) as sum')
            ->where('orders.status', 'delivered')
            ->groupBy(
                'products.id',
                'products.name',
                'products.slug',
                'products.product_category_id',
                'products.images',
                'products.description',
                'products.content',
                'products.price',
                'products.size',
                'products.qty',
                'products.discount',
                'products.status',
                'products.created_at',
                'products.updated_at',
                'orders.status'
            )
            ->orderBy('sum', 'DESC')
            ->get();

        //top khách hàng mua nhiều nhất
        $customers_buy_the_most = Order::selectRaw('name,email,phone, COUNT(phone) as count')
            ->where('status', 'delivered')
            ->groupBy('name', 'email', 'phone')
            ->orderBy('count', 'DESC')
            ->get();

        // đơn hàng đã hoàn thành theo tháng
        $total_order = Order::selectRaw('COUNT(id) as total_order')
            ->whereMonth('created_at', date('m'))
            ->where('status', 'delivered')
            ->selectRaw('DATE(created_at) day')
            ->groupBy('day')
            ->get()->toArray();
            // dd($total_order);
        $arrTotal_order = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($total_order as $key => $value) {
                if ($value['day'] == $day) {
                    $total = $value['total_order'];
                    break;
                }
            }
            $arrTotal_order[] = (int)$total;
        }
       // đơn hàng đã hủy 
        $total_order_has_been_cancelled = Order::selectRaw('COUNT(id) as total_order')
            ->whereMonth('created_at', date('m'))
            ->where('status', 'order has been cancelled')
            ->selectRaw('DATE(created_at) day')
            ->groupBy('day')
            ->get()->toArray();
        $arrTotal_order_has_been_cancelled = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($total_order_has_been_cancelled as $key => $value) {
                if ($value['day'] == $day) {
                    $total = $value['total_order'];
                    break;
                }
            }
            $arrTotal_order_has_been_cancelled[] = (int)$total;
        }

        $viewData = [
            'new_order'                 => $new_order,
            'order_has_been_cancelled'  => $order_has_been_cancelled,
            'users'                     => $users,
            'listDay'                   => json_encode($listDay),
            'revenueMonth'              => $revenueMonth,
            'thisMonth'                 => $thisMonth,
            'revenueYear'               => $revenueYear,
            'thisYear'                  => $thisYear,
            'arrRevenue'                => json_encode($arrRevenue),
            'selling_products'          => $selling_products,
            'arrTotal_order'            => json_encode($arrTotal_order),
            'customers_buy_the_most'    => $customers_buy_the_most,
            'arrTotal_order_has_been_cancelled' => json_encode($arrTotal_order_has_been_cancelled),
        ];
        return view('back/index', $viewData);
    }
    public function filter_chart_total(Request $request)
    {
        $listDay = dateHelper::generateDateRange(Carbon::create($request->from_date), Carbon::create($request->to_date));
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));
        $revenue = Order::Where('status', 'delivered')
            ->selectRaw('SUM(total) as totalMoney')
            ->whereBetween('created_at', [$from_date, $to_date])
            ->selectRaw('DATE(created_at) day')
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenue = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenue as $key => $value) {
                if ($value['day'] == $day) {
                    $total = $value['totalMoney'];
                    break;
                }
            }
            $arrRevenue[] = (int)$total;
        }
        $totalMoney = 0;
        foreach ($arrRevenue as $key => $value) {
            $totalMoney += $value;
        }
        return response()
            ->json([
                'success' => 'success',
                'listMoney' => $arrRevenue,
                'searchListDay' => $listDay,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'totalMoney' => number_format($totalMoney, 0, '.', '.'),
            ]);
    }
}
