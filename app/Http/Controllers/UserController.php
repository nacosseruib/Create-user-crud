<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        //$filterID = Session::get('filterID');
        try{
            $data['roleType'] = RolePermission::where('status', 1)->get(['id','role_name', 'read', 'write', 'delete']);
        }catch(\Throwable $errorThrown){}

        try{
            //Get all Users
            $data['userList'] = User::where('users.status', 1)
                            ->join('role_permissions', 'role_permissions.id', '=', 'users.role_type')
                            ->orderBy('users.created_at', 'Desc')
                            ->get(['users.id','firstname', 'lastname', 'employee_id', 'email', 'users.created_at', 'role_type', 'role_name', 'bg_color']);
        }catch(\Throwable $errorThrown){}

        return view('welcome', $data);
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
    public function store(Request $request)
    {
        $is_save = null;
        //store or update
        if($request['recordID']){
            $is_save = $this->update($request);
            if($is_save)
            {
                return redirect()->back()->with('success', 'User was updated successfully');
            }
            return redirect()->back()->with('error', 'Unable to update User. Try again.');
        }else{
            $is_save = null;
            $this->validate($request,
            [
            'employeeId' => ['required', 'string', 'max:100'],
            'firstName'  => ['required', 'string', 'max:100'],
            'lastName'   => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:100', 'unique:users'],
            //'mobile'     => ['required', 'string', 'max:15'],
            //'roleType'   => ['required', 'numeric'],
            'username'   => ['required', 'string', 'max:100'],
            'password'   => ['required', 'string', 'min:5', 'confirmed']
            ]);
            try{
                $is_save = User::create(
                [
                    'employee_id'   => $request['employeeId'],
                    'firstname'     => $request['firstName'],
                    'lastname'      => $request['lastName'],
                    'email'         => $request['email'],
                    'mobile'        => $request['mobile'],
                    'role_type'     => $request['roleType'],
                    'username'      => $request['username'],
                    'password'      => Hash::make($request['password']),
                ]);
            }catch(\Throwable $errorThrown){
                return redirect()->back()->with('danger', 'Server error occurred. Try again.')->withInput($request->all());
            }
            if($is_save)
            {
                return redirect()->back()->with('success', 'User was created successfully');
            }
            return redirect()->back()->with('error', 'Unable to create User. Try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $data = [];
        try{
            //Get User
            $data['getUser'] = User::where('users.id', $id)
                             ->join('role_permissions', 'role_permissions.id', '=', 'users.role_type')
                            ->orderBy('users.created_at', 'Asc')
                             ->first(['users.id','firstname', 'username', 'mobile', 'lastname', 'employee_id', 'email', 'users.created_at', 'role_type', 'role_name', 'bg_color']);

            return response()->json($data, 200);
        }catch(\Throwable $errorThrown){
            return response()->json($data, 500);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update($request)
    {
         //update new user
         $is_save = null;
         $this->validate($request,
         [
            'employeeId' => ['required', 'string', 'max:100'],
            'firstName'  => ['required', 'string', 'max:100'],
            'lastName'   => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:100'],
            //'mobile'     => ['required', 'string', 'max:15'],
            //'roleType'   => ['required', 'numeric'],
            'username'   => ['required', 'string', 'max:100'],
            //password'   => ['required', 'string', 'min:5', 'confirmed']
         ]);
         try{
             if($request['password'])
             {
                $this->validate($request,
                [
                   'password'   => ['required', 'string', 'min:5', 'confirmed']
                ]);
                $is_save = User::where('id', $request['recordID'])->update(
                    [
                        'employee_id'   => $request['employeeId'],
                        'firstname'     => $request['firstName'],
                        'lastname'      => $request['lastName'],
                        'email'         => $request['email'],
                        'mobile'        => $request['mobile'],
                        'role_type'     => $request['roleType'],
                        'username'      => $request['username'],
                        'password'      => Hash::make($request['password']),
                    ]);
             }else{
                $is_save = User::where('id', $request['recordID'])->update(
                    [
                        'employee_id'   => $request['employeeId'],
                        'firstname'     => $request['firstName'],
                        'lastname'      => $request['lastName'],
                        'email'         => $request['email'],
                        'mobile'        => $request['mobile'],
                        'role_type'     => $request['roleType'],
                        'username'      => $request['username'],
                    ]);
             }

         }catch(\Throwable $errorThrown){
             return redirect()->back()->with('danger', 'Server error occurred. Try again.')->withInput($request->all());
         }
         return $is_save;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $is_delete = null;
         try{
            //delete User
            $is_delete = User::where('users.id', $request['user_id'])->delete();
        }catch(\Throwable $errorThrown){}
        if($is_delete)
        {
            return redirect()->back()->with('success', 'User was deleted successfully');
        }
        return redirect()->back()->with('error', 'Unable to delete User. Try again.');
    }



}
