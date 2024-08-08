<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:update user', ['only' => ['update','edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users =  User::paginate(15);
            
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->get();
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();
        return view('role-permission.user.create', ['roles' => $roles, 'tashkilots' => $tashkilots,'xodimlar'=>$xodimlar]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'tashkilot_id' => 'required'
        ]);

        $roluchun = $request->roles;
        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'tashkilot_id' => $request->tashkilot_id,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);
        if($roluchun[0] == "admin"){
            return redirect('/users')->with('status','User Updated Successfully with roles');
        }else{
            return redirect('/')->with('status','User Updated Successfully with roles');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->get();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'xodimlar' => $xodimlar
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        $roluchun = $request->roles;
        if($roluchun[0] == 'admin'){
            return redirect('/users')->with('status','User Updated Successfully with roles');
        }else{
            return redirect('/')->with('status','User Updated Successfully with roles');
        }
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('status','User Delete Successfully');
    }

    public function profileview()
    {
        return view('admin.profile.index');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Eski parol noto‘g‘ri.']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/profileview')->with('status', 'Parol muvaffaqiyatli o‘zgartirildi!');
    }

    public function searchuser(Request $request)
    {
        $querysearch = $request->input('query');
        $user_search = User::where('name','like','%'.$querysearch.'%')
                ->orWhere('email','like','%'.$querysearch.'%')
                ->paginate(10);
        return view('role-permission.user.search_results', compact('user_search'));
    }
}
