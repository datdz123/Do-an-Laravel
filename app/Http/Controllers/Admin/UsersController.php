<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('back.users.index', compact('users'));
    }
    function delete($id)
    {
        if (User::find($id)->delete()) {
            toast('Đã xóa thành công!', 'success');
            return back()->with('success', 'Đã xóa thành công.');
        };
    }
}
