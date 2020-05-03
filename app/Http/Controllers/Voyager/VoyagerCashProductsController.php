<?php

namespace App\Http\Controllers\Voyager;
use App\OrderingProduct;
use App\Ordering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ReflectionClass;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Database\Schema\Table;
use TCG\Voyager\Database\Types\Type;
use TCG\Voyager\Events\BreadAdded;
use TCG\Voyager\Events\BreadDeleted;
use TCG\Voyager\Events\BreadUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;
use Illuminate\Support\Facades\Hash;

class VoyagerCashProductsController extends BaseVoyagerController
{
    public function cashProducts(){
        $cash_products = Ordering::all()->where('cash', 1);
        var_dump($cash_products);exit;
        return view('vendor.voyager.ordered.cash_products')->with(compact('orderig_products'));

    }

    public function edit_password($id){
        $company = Company::all()->where('id', $id)->first();
        return view('vendor.voyager.company.edit_password')->with(compact('company', 'company'));
    }

    public function edit_password_post(Request $request, $id){
        $company = Company::all()->where('id', $id)->first();
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $company->password = Hash::make($request->password);
        if($company->save()){
            return redirect('admin/companies')->with('status', 'Password succesfuly updated!');
        }


        return back();
    }
}
