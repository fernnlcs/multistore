<?php

namespace App\Http\Controllers\Store\Formal;

use App\Http\Controllers\Controller;
use App\Models\Store\Formal\Store;
use App\Models\Store\Team\Employee\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myJobs = (User::find(Auth::id()))->worksAs()->get();
        return view('store.index', [
            'myJobs' => $myJobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->created_by = Auth::id();
        $store->cnpj = $request->cnpj;
        $store->name = $request->name;
        $store->slug = $request->slug;
        $store->email = $request->email;
        $store->phone = $request->phone;

        if ($store->save()) {
            $employee = new Employee();
            $employee->created_by = Auth::id();
            $employee->user = Auth::id();
            $employee->store = $store->id;
            $employee->type = Employee::TYPE['OWNER']['id'];
            $employee->save();

            return redirect()->route('store.index');
        }

        return redirect()->route('store.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store\Formal\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $employees = $store->employees();
        return view('store.show', [
            'store' => $store,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store\Formal\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store\Formal\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store\Formal\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
