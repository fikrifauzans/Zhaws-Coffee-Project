<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Total;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getCart(Request $request)
    {
        $cart = Cart::where('user_id', '=', $request['userid'])
            ->get();
        $cartEdit = $cart->firstwhere('id', '=', $request['itemid']);
        $cartEdit->qty += 1;
        $cartEdit->update();
        $sum = $cart->sum('qty');
        return response()->json(['data' => $cartEdit, 'count' => $sum, 'total' => $cart]);
    }

    public function deleteCart(Request $request)
    {
        $cart = Cart::where('user_id', '=', $request['userid'])
            ->get();
        $cartEdit = $cart->firstwhere('id', '=', $request['itemid']);
        if ($cartEdit->qty > 0) {
            $cartEdit->qty -= 1;
            $cartEdit->update();
        }
        $sum = $cart->sum('qty');
        return response()->json(['data' => $cartEdit, 'count' => $sum, 'total' => $cart]);
    }

    public function destroy(Request $request)
    {
        $cart = Cart::find($request['id']);
        $cart->delete();

        return response()->json('sukses');
    }

    public function changepassword(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!$request['password'] == null) {
            if ($request['password'] == $request['confirmpassword']) {
                $user->password = bcrypt($request['password']);
                $user->update();
                return response()->json(['password' => 'berhasil diubah']);
            } else {
                return response()->json(['errorPassword' => 'password salah']);
            }
        } else {
            $user->update();
        }
        return response()->json(['nameSuccess' => 'Nama dan Email berhasil di rubah']);
    }

    public function postAddress(Request $request)
    {
        $validated = $request->validate([
            'receiver' => 'required',
            'phone_number' => 'required',
            'province' => 'required',
            'province_id' => 'required',
            'city' => 'required',
            'city_id' => 'required',
            'complete_address' => 'required',
            'postalcode' => 'required'
        ]);
        try {
            //code...
            $address = new Address();
            $address["receiver"] = $request["receiver"];
            $address["province_id"] = $request["province_id"];
            $address["province"] = $request["province"];
            $address["city_id"] = $request["city_id"];
            $address["city_name"] = $request["city"];
            $address["postal_code"] = $request["postalcode"];
            $address["complete_address"] = $request["complete_address"];
            $address["phone_number"] = $request["phone_number"];
            $address["user_id"] = Auth::user()->id;
            $address->save();
            return response()->json('berhasil di tambahkan');
        } catch (\Throwable $th) {
            return response()->json("Input alamat gagal");
        }

        // return response()->json($request);
    }

    public function showAddress()
    {
        $address = Address::where("user_id", "=", Auth::user()->id)
            ->get();
        return response()->json($address);
    }

    public function destroyAddress(Request $request)
    {
        $address = Address::find($request['id']);
        $address->delete();
        return response()->json('Alamat berhasil di hapus');
    }

    public function postImage(Request $request)
    {
        if ($request->image !== null) {
            $total = Total::find($request["id"]);
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('PaymentProof', $imageName, 'public');
            $total->payment_proof = $imageName;
            $total->save();
            return response()->json("sukses");
        }
    }
    public function showInvoice(Request $request)
    {
        $total = Total::find($request['id']);
        $totalProducts = $total->total_products()->get();
        return response()->json(["total" => $total, "totalProducts" => $totalProducts]);
    }
}
