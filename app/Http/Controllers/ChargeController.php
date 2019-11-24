<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
use App\Cart;
use Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
class ChargeController extends Controller
{
  public function charge_view($value='')
  {
    return view('charge/sample');
  }
  public function charge(Request $request)
  {
    try {
        Stripe::setApiKey("<stripe api key>");

        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ));
        dd($request->stripeEmail);
        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount' => 1000,
            'currency' => 'jpy'
        ));

        return back();
    } catch (\Exception $ex) {
        return $ex->getMessage();
    }

  }

}
