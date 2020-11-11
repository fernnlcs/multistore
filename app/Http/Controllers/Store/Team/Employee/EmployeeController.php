<?php

namespace App\Http\Controllers\Store\Team\Employee;

use App\Http\Controllers\Controller;
use App\Models\Store\Formal\Store;
use App\Models\Store\Team\Employee\Employee;
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
    public function index(Store $store)
    {
        $employees = $store->employees();
        $types = Employee::TYPE;
        array_pop($types);

        return view('store.team.employee.index', [
            'store' => $store,
            'employees' => $employees,
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $types = Employee::TYPE;
        array_pop($types);

        return view('store.team.employee.create', [
            'store' => $store,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $user = User::where('email', '=', $request->email);

        if ($user->count()) {
            $employee = new Employee();
            $employee->created_by = Auth::id();
            $employee->user = $user->first()->id;
            $employee->store = $store->id;
            $employee->type = $request->type;

            $employee->save();
        }

        return redirect()->route('store.show', ['store' => $store]);
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
    public function update(Request $request, Store $store, Employee $employee)
    {
        $employee->type = $request->type;
        $employee->save();

        return redirect()->route('employee.index', ['store' => $store]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store\Team\Employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store, Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index', ['store' => $store]);
    }
}
