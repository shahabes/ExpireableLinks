<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customers = Customer::all();
        $active_customers = Customer::whereHas('media')->get();

        return view('customer.index',compact(['customers','active_customers']));
    }

    public function addCustomer(Request $request)
    {
        $this->validate($request,
        [
            "name"=>"string|required",
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->instaPage = $request->instagram;
        $customer->more = $request->more;
        $customer->save();
        return redirect(route("customer.index"));

    }

    public function home($id)
    {
        try {
            $newId = Crypt::decryptString($id);
        }catch (\Exception $exception){
            return view('customer.notfoundUser');
        }
        $customer = Customer::find($newId);
        if($customer === null){
            return view('customer.notfoundUser');
        }
        $media = $customer->media;
        foreach ($media as $medium){
            $medium->url_map_for_user = $medium->pivot->url_map;
            $medium->is_active_for_user = $medium->pivot->active;
        }
        return view('customer.customer_all_media',compact('customer'));
    }
}
