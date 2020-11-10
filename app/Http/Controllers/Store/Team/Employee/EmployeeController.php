<?php

namespace App\Http\Controllers\Store\Team\Employee;

use App\Http\Controllers\Controller;
use App\Models\Store\Formal\Store;
use App\Models\Store\Team\Employee\Employee;
use App\Models\Store\Team\Employee\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store, User $user, Type $type)
    {
        $employee = Employee::find($user->id);
        $employee->created_by = Auth::id();
        $employee->user = $user->id;
        $employee->store = $store->id;
        $employee->type = $type->id;

        $employee->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store\Team\Employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store\Team\Employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store\Team\Employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store\Team\Employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
