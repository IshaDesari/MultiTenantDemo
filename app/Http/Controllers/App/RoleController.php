<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

// use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;

use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
        // dd('here');
        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            $roles = Role::orderBy('id')->get();
            return response()->json(['success' => true, 'data' => $roles]);
        } else {
            // $roles = Role::orderBy('id')->paginate(5);
            // return view('roles.index', compact('roles'))
            //     ->with('i', ($request->input('page', 1) - 1) * 5);

            // $roles = Role::where('guard_name','web')->orderBy('id')->get();
            $roles = Role::where('name', '!=', 'Developer')->where('guard_name', 'web')->orderBy('id')->get();
            // $roles = Role::where('name', '!=' , 'Developer')->orderBy('id')->get();

            return view('app.roles.index', compact('roles'));
        }
    }

    public function create()
    {
        $permission = Permission::get();
        return view('app.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'name' => 'required|unique:roles,name',
            'name' => 'required',
            'guard_name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            return response()->json(['success' => true, 'message' => 'Role created successfully...']);
        } else {
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role created successfully');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('app.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'name' => 'required|unique:roles,name,' . $id,
            'name' => 'required',
            // 'guard_name' => 'required',
            // 'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        // dd($request->input('permission'));
        $role->save();

        $role->syncPermissions($request->input('permission'));

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            return response()->json(['success' => true, 'message' => "Role updated successfully"]);
        } else {
            return Redirect::route('roles.index')->with('success', 'Role updated successfully');
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        
        if ($role->delete()) {
            return redirect()->back()->with('success', 'Role Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong, Role Deletion Failed !!');
        }
    }
}