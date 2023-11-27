<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware(['role:super-admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // foreach (Permission::select('name')->get()->all() as $key => $value) {
        //     echo $value->name.' , ';
        // }
        // dd();
        $admins = Admin::orderBy('created_at', 'DESC')->get();

        return view('back.admin.index', compact('admins'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.admin.create');
    }

    public function assignRole($id)
    {
        $roles = Role::all();
        $admin = Admin::findOrFail($id);
        return view('back.admin.assignRole', compact('roles', 'admin'));
    }
    public function post_assignRole(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        try {

            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $admin->syncRoles($request->roles);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required | email:rfc | email:strict',
            'phone' => 'required | numeric',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password|min:6'

        ]);
        $password = Hash::make($request->password);
        $request['password'] = $password;
        try {
            Admin::create($request->all());
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member')->with('success', 'Thêm mới thành công.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if(in_array('super-admin',$admin->getRoleNames()->toArray())){
            return back()->with('error', 'Không thể xóa thành viên với vai trò super-admin.');
        }
        try {
            Admin::find($id)->delete();
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member')->with('success', 'Đã xóa thành công.');
    }
}
