<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        if($request->input('password')!=$request->input('password2')){
            return redirect()->back()->with('warning','your passwords did not match')->withInput();
        }

        $user = new User;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('admin/users')->with('message',"$user->email successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);


        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        
        if($request->input('password')!=$request->input('password2')){
            return redirect()->back()->with('warning','your passwords did not match')->withInput();
        }
        
        $user->email = $request->input('email');
        
        if($request->input('password'))
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect('admin/users')->with('message',"$user->email successfully edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (Auth::user()->id === $user->id)
        {
            return redirect('admin/users')->with('warning',"You dont really want to delete yourself do you?");
        }

        $user->delete();

        return redirect('admin/users')->with('warning',"$user->email deleted");
    
    }
}
