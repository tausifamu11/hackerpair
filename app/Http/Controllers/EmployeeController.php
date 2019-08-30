<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Employee;
use DB;

class EmployeeController extends Controller
{
    public function create(){
        return view('employee.create');
    }

    public function store(EmployeeRequest $request){
    $employee= new Employee;
        $employee->name=$request->get('name');
        $employee->email=$request->get('email');
        $employee->gender=$request->get('gender');
        $employee->employee_id=$request->get('employee_id');
        $employee->mob=$request->get('mob');
        $employee->position=$request->get('position');
        $employee->salary=$request->get('salary');
        if($file=$request->hasFile('image')){
        $file=$request->file('image');
        $filename=$file->getClientOriginalName();
        $destinationPath=public_path().'/images/';
        $file->move($destinationPath,$filename);
        }
        $employee->image=$filename;
        $employee->save();
        $request->session()->flash('alert-success', 'Employee was successful added!');
        return redirect()->to('employees');
    }

    public function employeelist(Request $request){
        //print_r($request);
        //$ajax=$request->ajax();
        //dd($ajax);
        //dd($request->isMethod('get'));
        //dd($request);
        //var_dump($request->ajax());
        if($request->ajax()){
            die('tttttttttt');
           $output='';
           $query=$request->get('search');
           if ($query != ''){
               $data=DB::table('employees')
                   ->where('name','like','%'.$query.'%')
                   ->orWhere('email','like','%'.$query.'%')
                   ->orWhere('gender','like','%'.$query.'%')
                   ->orWhere('employee_id','like','%'.$query.'%')
                   ->orWhere('mob','like','%'.$query.'%')
                   ->orWhere('position','like','%'.$query.'%')
                   ->orWhere('salary','like','%'.$query.'%')
                   ->orderBy('id','desc')
                   ->get();

           }

           else{
               $data=DB::table('employees')
                  ->orderBy('id','desc')
                  ->get();
              // dd($data);
           }
           $total_count=$data->count();
           if ($total_count > 0){
               foreach($data as $results){
                   $output .='
               <tr>
               <td> '.$results->name.'</td>
               <td> '.$results->email.'</td>
               <td> '.$results->mob.'</td>
               <td> '.$results->employee_id.'</td>
               <td> '.$results->position.'</td>
               <td> '.$results->salary.'</td>
               </tr>';

               }

           }
           else{
                $output = '
                <tr>
                <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
           }

            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_count
            );

            echo json_encode($data);

        }


        /*Employee::all();
        $query=DB::table('employees')->select()->orderby('id','desc');
        $result=$query->get();
        return view('employee.employees',compact('result'));*/

    }

    public function edit($id){

        $query=DB::table('employees')->select()->where('id',$id);
        $result=$query->get();
        //print_r($result);die('tttt');
        return view('employee.edit',compact('result'));

    }

    public function update(EmployeeRequest $request,$id){
        $employee=Employee::find($id);
        $employee->name=$request->get('name');
        $employee->email=$request->get('email');
        $employee->gender=$request->get('gender');
        $employee->employee_id=$request->get('employee_id');
        $employee->mob=$request->get('mob');
        $employee->position=$request->get('position');
        $employee->salary=$request->get('salary');
        if($file=$request->hasFile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $destinationPath=public_path().'/images/';
            $file->move($destinationPath,$filename);
        }
        $employee->image=$filename;
        $employee->save();
        $request->session()->flash('alert-info', 'Employee was successfully updated!');
        return redirect()->to('employees');
    }

    public function delete($id){
        $employee=Employee::find($id);
        $employee->delete();
        //$request->session()->flash('alert-danger', 'Employee was successfully updated!');
        //return redirect()->back()->withErrors('Successfully deleted!');
        \Session::flash('alert-danger','successfully deleted.');
        return redirect()->to('employees');
    }
}
