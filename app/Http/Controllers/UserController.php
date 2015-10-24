<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Requests\editUserRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	protected $_user_photo_path = 'images/users/';

	public function show($id)
	{

	}

    public function edit(Request $request, $id)
    {
    	$user = User::find($id);
    	
    	return view('pages.users.edit', compact('user', $user));
    }

    public function update(Request $request, $id)
    {
    	 $this->validate($request,['name'=>'required','lastname'=>'required','password'=>'required|min:6', 'email'=>'required|email']);
   	
    	 $user = User::find($id)->first();

    	 
    	  if ($request->file('edit-user-photo')) {
    	  $this->validate($request,['edit-user-photo'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg']);

    	  	$userFile = $user->avatar_path.$user->avatar;
                if(\File::isFile($userFile)){
                \File::delete($userFile);
             }

            $file = $request->file('edit-user-photo');

            $avatar_path = $this->_user_photo_path;
           
            $avatar = $file->getClientOriginalName();

            $file->move($avatar_path, $avatar);
          
            $user->avatar = $avatar;
            $user->avatar_path = $avatar_path;
        }


    	 $user->name = $request->get('name');
         $user->lastname  = $request->get('lastname');
         $user->email  = $request->get('email');
         $user->password  = bcrypt($request->get('password'));

        $user->save();
     
        flash()->success('','Redaguotas!');
        return redirect()->back();
    }
}
