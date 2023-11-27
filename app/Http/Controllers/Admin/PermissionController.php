<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
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
        $permissions = Permission::all();
        return view('back.admin.permissions.permissions',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $admin = Admin::findOrFail($id);
        // $name_roles = $admin->roles->first(); 
        // dd($name_roles);
        // $column_role = 
        // $role = Role::orderBy('id','DESC')->get();
       return view('back.admin.permissions.create');
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
            Permission::create($request->all());
        } catch (\Throwable $th) {
            return back()->with('error','Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member.permissions')->with('success','Thêm mới thành công.');
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
        $role = Role::all();
        $permission = Permission::findOrFail($id);
        return view('back.admin.permissions.edit',compact('permission','role'));
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
        $this->validate($request, [
            'name'  => 'required'
        ]);
            $permission = Permission::findOrFail($id);
        try {
            $permission->update($request->all());

            DB::table('role_has_permissions')->where('permission_id',$id)->delete();

            $permission->syncRoles($request->roles);

        } catch (\Throwable $th) {
            return back()->with('error','Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        return redirect()->route('member.permissions')->with('success','Cập nhật thành công.');
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
            Permission::find($id)->delete();
         } catch (\Throwable $th) {
             return back()->with('error','Có lỗi xảy ra, vui lòng thử lại sau.');
         }
         return redirect()->route('member.permissions')->with('success','Đã xóa thành công.');
    }
}
