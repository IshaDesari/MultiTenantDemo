<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:role-read', ['only' => ['index', 'show']]);
        // $this->middleware('permission:role-update', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            $permissions = Permission::orderBy('id', 'DESC')->get();
            return response()->json(['success' => true, 'data' => $permissions]);
        } else {
            $permissions = Permission::orderBy('id', 'DESC')->get();
            return view('app.permissions.index', ['permissions' => $permissions]);
        }
    }

    public function create()
    {
        return view('app.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create($request->only('name'));

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            return response()->json(['success' => true, 'message' => 'Permission created successfully']);
        } else {
            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission created successfully.');
        }
    }

    public function show($id)
    {
        $permission = Permission::find($id);

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            return response()->json(['success' => true, 'data' => $permission]);
        } else {
            // return view('app.permissions.show', compact('permission'));
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('app.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id
        ]);

        $permission = Permission::find($id);
        $permission->update($request->only('name'));

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            return response()->json(['success' => true, 'message' => 'Permission updated successfully']);
        } else {
            return redirect()
                ->route('permissions.index')
                ->with('success', 'Permission updated successfully.');
        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if ($permission->delete()) {
            return redirect()->back()->with('success', 'Permission Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong, Permission Deletion Failed !!');
        }
    }
}