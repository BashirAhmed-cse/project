<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    
    public function index(){

        $employees = Employee::orderBy('id','DESC')->paginate(3);
    //    dd($employees);
        return view('employee.list',['employees' => $employees]);
    }

    public function create(){
        return view('employee.create');
    }

    public function store(Request $request){
     $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' =>'required',
        'image' => 'sometimes|image:gif,png,jpeg,jpg'
     ]);

     if($validator->passes()){
        //save data here
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();

        //upload image here
        if($request->image){
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName);
            $employee->image = $newFileName;
            $employee->save();
        }
        
        return redirect()->route('employees.index');

     }else{
        return redirect()->route('employees.create')->withErrors($validator)->withInput();
     }

    }

    public function edit($id){
        $employee = Employee::findOrFail($id);
        return view('employee.edit',['employee' => $employee]);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' =>'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
         ]);
    
         if($validator->passes()){
            //save data here
            $employee =Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->save();
    
            //upload image here
            if($request->image){

                $oldImage = $employee->image;

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);
                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path().'/uploads/employees/'.$oldImage);
            }
            
            return redirect()->route('employees.index');
    
         }else{
            return redirect()->route('employees.edit',$id)->withErrors($validator)->withInput();
         }
    }

    public function destroy($id, Request $request){
    $employee = Employee::findOrFail($id);
    File::delete(public_path().'/uploads/employees/'.$employee->image);
    $employee->date();
    return redirect()->route('employees.index');
    }
}
