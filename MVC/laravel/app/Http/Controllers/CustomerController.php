<?php

namespace App\Http\Controllers;
use App\Models\CustomerModel;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers(){
        $customers = CustomerModel::all();
        return view('admin.customer.getCustomers',
        ['customers'=>$customers]
    );}
}
