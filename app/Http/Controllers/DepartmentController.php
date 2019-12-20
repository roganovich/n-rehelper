<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        if(request()->has('Department')){
            dd(request());
            $paginations = Department::where([''])
                ->orderByRaw('projectTitle DESC')
                ->paginate(10)
                ->appends('gender',request('gender'));
        }else{
            $paginations = Department::orderByRaw('projectTitle DESC')->paginate(10);
        }
        return view('department.index', ['paginations'=>$paginations]);
    }
}
