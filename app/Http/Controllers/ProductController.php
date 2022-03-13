<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Image;
use App\Models\TotalProduct;
use App\Models\Total;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{

    use HasApiTokens;
    public function index()
    {
        if (Auth::check()) {
            $token =  User::find(Auth::user()->id)
                ->createToken('authToken')
                ->accessToken ?? '';
            session(['token' => $token]);
        }
        $Products = Product::latest()
            ->paginate(6);
        return view('humz', [
            'Products' => $Products
        ])
            ->with('user', Auth::user());
    }

    public function show(Product $product)
    {
        return view('product_Detail', [
            'product' => $product
        ]);
    }

    public function cart(User $user, Request $request)
    {
        $total = 0;
        foreach (Auth::user()->carts()->get() as $item) {
            $total += $item->price * $item->qty;
        };
        return view('cart', compact('total'));
    }

    public function postcart(Product $product)
    {

        $var = Cart::where('product_id', '=', $product->id)
            ->where('user_id', '=', Auth::user()->id)
            ->get()[0] ?? '';
        if (!$var == null) {
            $var->qty += 1;
            $var->update();
            return redirect()
                ->back();
        } else {
            $image = Image::where('product_id', '=', $product->id)
                ->get()[0];
            $cart = new Cart;
            $cart->name = $product->name;
            $cart->img = '';
            if ($image->image_1 == true) {
                $cart->img = $image->image_1;
            } elseif ($image->image_2 == true) {
                $cart->img = $image->image_2;
            } elseif ($image->image_3 == true) {
                $cart->img = $image->image_3;
            }
            $cart->price = $product->price;
            $cart->product_id = $product->id;
            $cart->user_id = Auth::user()->id;
            $cart->qty = 1;
            $cart->save();
            return redirect()
                ->back();
        }
    }

    public function purchase(Request $request)
    {
        // $purchase = json_decode($request['purchase']);
        $cart = Cart::where('user_id', '=', Auth::user()->id)
            ->get();
        $total = 0;
        foreach ($cart as $i) {
            $total += $i->qty * $i->price;
        }
        $address = Auth::user()->addresses()->get();
        return view('purchase', [
            'carts' => $cart,
            'total' => $total,
            'address' => $address
        ]);
    }

    public function userinfo(Request $request)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "key: 147201dbc5d87cd62f95e9f16f43291e"
            ]
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $provinces = json_decode($response, true);
        return view('users.userinfo', compact('provinces'));
    }

    public function showHistory(Request $request)
    {
        // dd($request['date']);
        $total = Auth::user()->totals();
        if ($request['date']) {
            $total = $total->where('created_at', '>=', $request->date);
        } else {
            $total->latest();
        }

        foreach ($total as $item) {
            if ($item->status == "Dalam Pengecekan") {
                $total_status = $item;
                if (Carbon::now() >= $total_status->expires) {
                    $total_status->status = "pesanan dibatalkan";
                    $total_status->update();
                }
            }
        }
        return view("users.history", [
            'total' => $total->paginate(8)->withQueryString()
        ]);
    }

    public function totalPurchase(Request $request)
    {


        $total = new Total();
        $carts = collect(json_decode($request['carts']));
        $total_purchase = 0;
        foreach ($carts as $cart) {
            $total_purchase += $cart->qty * $cart->price;
        }
        $total->total_purchase = $total_purchase;
        $total->unique_code = rand(0, 999);
        // $total->payment_proof = Diisi Nanti
        $total->weight = $carts->sum('qty');
        $total->status = "Dalam Pengecekan";
        $total->courer = $request['courer'];
        $total->courer_price = $request['courer_price'];
        $total->estimation = $request['estimation'];
        $total->address = $request['address'];
        $total->all_total =  $total->unique_code + $total->courer_price + $total->total_purchase;
        $total->user_id = Auth::user()->id;
        $total->expires = Carbon::tomorrow();
        $total->save();
        foreach ($carts as $cart) {
            $product = new TotalProduct();
            $product->name = $cart->name;
            $product->qty = $cart->qty;
            $product->price = $cart->price;
            $product->total_price = $cart->price * $cart->qty;
            $product->total_id = Total::latest()->first()->id;
            $product->cart_id = $cart->id;
            $product->save();
            if (Cart::find($cart->id) !== null) {
                Cart::find($cart->id)->delete();
            }
        }
        Session::put("total", $total);
        return redirect('/fix_purchase');
    }

    public function fixPurchase()
    {
        $total = Session::get('total');
        return view('totalPurchase', compact('total'));
    }
}
