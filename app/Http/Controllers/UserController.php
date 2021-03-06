<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Session;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id) {
        $user = User::find($id);
        return view('admin.user.profile', compact('user'));

    }

    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $authorRole = Role::where('name', 'author')->first();
        $adminRole = Role::where('name', 'admin')->first();
        if($request->role == "Admin") {
        $user->attachRole($adminRole);
        }elseif($request->role == "Author") {
        $user->attachRole($authorRole);
        }
        Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil Menyimpan $user->name"
                    ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $user->name"
                        ]);
        if ( Auth::user()->id == "1" ) {
            return redirect()->route('user.index');
        } else {
            if(Auth::user()->hasRole('admin')) {
            return redirect('admin');
            }else if(Auth::user()->hasRole('author')) {
            return redirect('author');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menghapus User $user->name"
                        ]);
        return redirect()->route('user.index');
    }

}
