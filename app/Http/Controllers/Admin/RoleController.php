<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('back.admin.roles.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.admin.roles.create');
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
            'name'  => 'required'
        ]);

        try {
            Role::create($request->all());
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member.roles')->with('success', 'Thêm mới thành công.');
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
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        return view('back.admin.roles.edit', compact('role', 'permissions'));
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
        // dd($request->all());
        $this->validate($request, [
            'name'  => 'required'
        ]);
        $role = Role::findOrFail($id);
        try {
            $role->update(['name' => $request->name]);

            // foreach($request->permission as $item){
            // $role->revokePermissionTo($request->permission);
            // }

            // foreach ($request->permission as $item) {
            // $role->givePermissionTo($item);
            // }
            DB::table('role_has_permissions')->where('role_id',$id)->delete();
            $role->syncPermissions($request->permission);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member.roles')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Role::find($id)->delete();
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member.roles')->with('success', 'Đã xóa thành công.');
    }
}
