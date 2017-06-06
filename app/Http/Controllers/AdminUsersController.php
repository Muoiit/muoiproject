<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersCreateRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $users = User::all();

        return view('admin.users.index',compact('users'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::pluck('name','id')->all();
      return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {

        // save all data from Form
        // User::create($request->all());
            $file = $request->file('file');
            $user = new User();
            
            if ($file) {
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file' => $name]);       
            
            }  

             $user->role_id   = $request->get('role_id');
             $user->is_Active = $request->get('is_Active');
             $user->name      = $request->get('name');
             $user->email     = $request->get('email');
             $user->password  = bcrypt($request->get('password'));
             $user->photo_id  = $photo->id;
             $user->save();

            return redirect('/admin/users');



        // $user = User::create([
        //   'is_active' => $request->get('is_Active'),
        //   'role_id'   => $request->get('role_id'),
        //   'name'      => $request->get('name'),
        //   'email'     => $request->get('email'),
        //   'password'  => bcrypt($request->get('password')),
        //   'password'  => $photo_id ;
        // ]);
         
             // return $request->all();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersCreateRequest $request, $id)
    {
            $user  = User::findOrFail($id);
            if ($request->password=="") {
                        $input = $request->except('password');
                       }
            else {
                        $input = $request->all();
                       }           
            $input =  $request->all();
            
            if ($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();            
            $file->move('images',$name);
            $photo = Photo::create(['file' => $name]);          
            $input['photo_id'] = $photo->id;                    

            }

            $input['password'] =  bcrypt($request->get('password'));
            $user->update($input);   
            return redirect('/admin/users');      


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::findOrFail($id);
        // xoa file luon
        unlink(public_path().$user->photo->file);
        $user->delete();
        Session::flash('deleted_user','User has been deleted');
        return redirect('/admin/users'); 
    }
}


