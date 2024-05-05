<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $data = [
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'password' => Hash::make($request['cedula']),
            'cedula' => $request['cedula'],
            'tipo_usuario' => $request['tipo_usuario'],
        ];

        $user = User::create($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //si no trae nada genere un error
        if((empty($user))||($user->cedula=='567202210'))return view('errors.404');
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //si no trae nada genere un error
        if((empty($user))||($user->cedula=='567202210'))return view('errors.404');
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request['id']);
        $data = [
            'name' => $request['name'],
            'tipo_usuario' => $request['tipo_usuario'],
        ];

        $user->update($data);
        // dd($user);
        return redirect()->route('usuarios.index')
            ->with('success', 'Updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = 'Deleted successfully.';
        $tipo = 'success';
        $user = User::find($id);
        //si no trae nada genere un error
        if((empty($user))||($user->cedula=='567202210'))return view('errors.404');
        $conVentas = Venta::where('id_usuario',$id)->count();
        if($conVentas == 0)$user->delete();
        else{
            $message = 'There are sales with this user.';
            $tipo = 'error';
        }
        return redirect()->route('usuarios.index')
            ->with($tipo, $message);
    }

    public function showFormChangePassword()
    {
        $message = 'Welcome, start by changing your password.';
        $user = User::find(auth()->id());
        return view('user.cambiar-contrasena', compact('user','message'));
    }

    public function changePassword(Request $request, User $user){

        request()->validate(['password' => ['required', 'min:8', 'confirmed']]);
        $password = Hash::make($request->password);
        $user = User::find($request->id);
        $user->update([
            'password' => $password,
            'config' => '1'
        ]);
        // dd($user);
        return redirect()->route('usuarios.index')
                ->with('success', 'Password has been successfully changed.');
    }
}
