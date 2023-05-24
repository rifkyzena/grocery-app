<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function landing()
    {
        return view('landing');
    }

    public function index()
    {
        $items = Item::paginate(12);
        return view('home', compact('items'));
    }

    public function showItem($id)
    {
        $item = Item::find($id);
        return view('show', compact('item'));
    }

    public function addCart($id)
    {
        $order = Order::where('item_id', $id)->first();
        if ($order) {
            return response()->json(['error' => 'Item is Already in Cart']);
        }
        $item = Item::find($id);
        Order::create([
            'account_id' => Auth::user()->account_id,
            'item_id' => $id,
            'price' => $item->price
        ]);
        return response()->json(['success' => 'Item Successfully Added to Cart']);
    }

    public function cartIndex()
    {
        $carts = Order::where('account_id', Auth::user()->account_id)->get();
        return view('cart', compact('carts'));
    }

    public function removeCartItem($id)
    {
        Order::find($id)->delete();
        return response()->json(['success' => 'Item Successfully Remove from Cart']);
    }

    public function checkout()
    {
        Order::where('account_id', Auth::user()->account_id)->delete();
        return redirect()->route('alert.checkout');
    }

    public function indexAccount()
    {
        $accounts = User::where('account_id', '!=', 1)->paginate(10);
        return view('account', compact('accounts'));
    }

    public function editAccount($id)
    {
        $account = User::find($id);
        $roles = Role::all();
        return view('account-edit', compact('account', 'roles'));
    }

    public function updateAccount(Request $request, $id)
    {
        User::find($id)->update([
            'role_id' => $request->role
        ]);
        return redirect()->route('admin.account')->with(['success' => 'Data Updated Successfull']);
    }

    public function destroyAccount($id)
    {
        User::find($id)->delete();
        return response()->json(['success' => 'Data Deleted Successfull']);
    }

    public function profileIndex()
    {
        $account = Auth::user();
        $roles = Role::all();
        $genders = Gender::all();
        return view('profile', compact('account', 'roles', 'genders'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => ['required', 'string', 'max:25'],
                'last_name' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email:dns', 'max:255', Rule::unique('users', 'email')->ignore($id, 'account_id')],
                'role' => ['required'],
                'gender' => ['required'],
                'display_picture' => ['image'],
            ]
        );
        $validator->sometimes('password', ['required', 'min:8', 'regex:/^(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]+$/', 'confirmed'], function ($input) {
            return !empty($input->password);
        });
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $account = User::find($id);
        if (empty($request->password)) {
            $account->password = $account->password;
        } else {
            $account->password = bcrypt($request->password);
        }
        if ($request->file('display_picture')) {
            if ($account->display_picture_link != 'test') {
                Storage::delete($account->display_picture_link);
            }
            $account->display_picture_link =  $request->file('display_picture')->store('profile');
        }
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->role_id = $request->role;
        $account->gender_id = $request->gender;
        $account->save();
        return redirect()->route('alert.update');
    }

    public function alertUpdate()
    {
        $text = 'Saved!';
        $text2 = false;
        $route = true;
        return view('alert', compact('text', 'text2', 'route'));
    }

    public function alertCheckout()
    {
        $text = 'Success!';
        $text2 = true;
        $route = true;
        return view('alert', compact('text', 'text2', 'route'));
    }
}
