<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LogoRequest;
use App\Link;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class,'account');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('super_admin',0)->get();
        return view('admin.accounts.index')
            ->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {

        $user=new User();
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->gender=$request['gender'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        if ($request->hasFile('logo'))
        $user->logo=$request->file('logo');
        $user->mobile=$request['mobile'];
        $user->save();

        \Session::flash('msg','s:'.__('operations.inserting_successfuly',['item'=>__('account.account')]));
        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       // $user=User::find($id);
        return view('admin.accounts.show')
            ->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       // $user=User::find($id);
        return view('admin.accounts.edit')
            ->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, User $user)
    {
        $request->isUpdating=true;
       // $user=User::find($id);
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->gender=$request['gender'];
        $user->email=$request['email'];
        if ($request['password'])
        $user->password=Hash::make($request['password']);
        if ($request->hasFile('logo'))
            $user->logo=$request->file('logo');
        $user->mobile=$request['mobile'];
        $user->date_of_birth=$request['date_of_birth'];
        $user->save();
        \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('account.account')]));
        return redirect()->route('accounts.index');
    }


    public function changePasssword(ChangePasswordRequest $request)
    {
        $user=auth()->user();
        if (Hash::check($request['old_password'],$user->password))
        {
            $user->password=Hash::make($request['password']);
            $user->save();
            \Session::flash('msg','s:'.__('passwords.reset'));
            return redirect()->route('accounts.profile');
        }
        else
        {
            return redirect()->route('accounts.profile')
                ->withErrors([__('passwords.not_matched')]);
        }
    }

    public function profile()
    {
        return view('admin.accounts.profile')
            ->with('user',auth()->user());
    }

    public function updateProfile(AccountRequest $request)
    {
         $user=auth()->user();
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->gender=$request['gender'];
        $user->email=$request['email'];
        $user->mobile=$request['mobile'];
        $user->date_of_birth=$request['date_of_birth'];
        $user->update();
        \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('account.account')]));
        return redirect()->route('accounts.profile');
    }

    public function updateLogo(LogoRequest $request)
    {
         $user=auth()->user();
         Storage::delete("public/users/{$user->logo}");
         $user->logo=$request->file('logo');
         $user->save();
         \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('account.logo')]));
         return redirect()->route('accounts.profile');
    }

    public function permissions($id)
    {
        $links=Link::all();
        $user=User::find($id);
        return view('admin.accounts.permissions')
            ->with(compact('links','user'));
    }

    public function updatePermissions(Request $request,$id)
    {
        $user=User::find($id);
        $user->links()->detach();
        foreach ($request['links'] as $link) {
            $user->links()->attach($link);
        }
        \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('account.permissions_settings')]));
        return redirect()->route('accounts.permissions',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        Storage::delete("public/products/{$user->logo}");
        $user->delete();
        \Session::flash('msg','s:'.__('operations.deleting_successfuly',['item'=>__('account.account')]));
        return redirect()->route('accounts.index');
    }


}
