<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
// use DB;
use Illuminate\Support\Facades\DB;

// use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:user-list|role-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:user-create', ['user' => ['create', 'store']]);
        // $this->middleware('permission:user-edit', ['user' => ['edit', 'update']]);
        // $this->middleware('permission:user-delete', ['user' => ['destroy']]);
    }
    public function index(Request $request): View
    {
        $data = User::latest()->paginate(5);

        return view('admin.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'favorite_color' => 'nullable|string',
            'status' => 'nullable'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        // Process and save the avatar file

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatar', 'public');
            $input['avatar'] = $avatarPath;
        }

        // Create the user

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'favorite_color' => 'nullable|string',
            'status' => 'nullable'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);

        // Xử lý và lưu file avatar mới (nếu có)





        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
         if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatar', 'public');
            $input['avatar'] = $avatarPath;
        }
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);
        $avatar = $user->avatar;

        $user->delete();

        if (!empty($avatar)) {
            Storage::disk('public')->delete($avatar);
        }

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
     public function user_choose(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['id']);
        $user->status = $data['trangthai_val'];
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $user->save();
    }
}
