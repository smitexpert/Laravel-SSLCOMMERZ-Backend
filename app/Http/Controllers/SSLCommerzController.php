<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SSLCommerzController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'order_id' => 'required'
        ]);

        $order = Order::find($request->order_id);

        if(!$order)
            return response()->json([
                'message' => 'Order Not found!',
                'status' => 'Not Found'
            ]);

            $data = array();
            $data['store_id'] = config('sslcommerz.api_credential.store_id');
            $data['store_passwd'] = config('sslcommerz.api_credential.store_password');

            $data['success_url'] = config('sslcommerz.backend.success_url');
            $data['fail_url'] = config('sslcommerz.backend.fail_url');
            $data['cancel_url'] = config('sslcommerz.backend.cancel_url');
            $data['ipn_url'] = config('sslcommerz.backend.ipn_url');

            $data['total_amount'] = $order->total_amount; # You cant not pay less than 10
            $data['currency'] = "BDT";
            $data['tran_id'] = $order->tran_id;

            # CUSTOMER INFORMATION
            $data['cus_name'] = $order->cus_name;
            $data['cus_email'] = $order->cus_email;
            $data['cus_add1'] = $order->cus_add1;
            $data['cus_add2'] = $order->cus_add2;
            $data['cus_city'] = $order->ship_city;
            $data['cus_state'] = $order->cus_state;
            $data['cus_postcode'] = $order->cus_postcode;
            $data['cus_country'] = $order->cus_country;
            $data['cus_phone'] = $order->cus_phone;
            $data['cus_fax'] = $order->cus_fax;

            # SHIPMENT INFORMATION
            $data['ship_name'] = $order->ship_name;
            $data['ship_add1'] = $order->ship_add1;
            $data['ship_add2'] = $order->ship_add2;
            $data['ship_city'] = $order->ship_city;
            $data['ship_state'] = $order->ship_state;
            $data['ship_postcode'] = $order->ship_postcode;
            $data['ship_phone'] = $order->ship_phone;
            $data['ship_country'] = $order->ship_country;

            $data['shipping_method'] = "NO";
            $data['product_name'] = $order->product_name;
            $data['product_category'] = $order->product_category;
            $data['product_profile'] = "physical-goods";

            $response = Http::asForm()->post(config('sslcommerz.api_domain').config('sslcommerz.api_url.make_payment'), $data);

            return response()->json([
                'redirect' => $response['GatewayPageURL'],
                'status' => 1
            ]);
    }

    public function success(Request $request)
    {
        Order::where('tran_id', $request->tran_id)->update([
            'status' => true
        ]);

        return redirect(config('sslcommerz.frontend.success_url'));
    }

    public function fail(Request $request)
    {
        return redirect(config('sslcommerz.frontend.fail_url'));
    }

    public function cancel(Request $request)
    {
        return redirect(config('sslcommerz.frontend.cancel_url'));
    }

    public function ipn(Request $request)
    {
        return $request->all();
    }
}
