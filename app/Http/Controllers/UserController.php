<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $users = User::latest();

        if ($search) {
            $users = $users->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $users->paginate(10)->withQueryString();
        return view('pages.dashboard.master.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.master.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3',
            'profile' => 'required|file'
        ]);

        $file = $request->file('profile');
        $filename = Str::random() . $file->getClientOriginalName();
        $upload = Storage::disk('public')->put('profile', $file, );
        if (!$upload) {
            throw new \Exception("fail to save profile", 500);
        }
        $payload['profile'] = Storage::url($upload);
        User::create($payload);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            throw new HttpException(404, "User not found");
        }
        return view('pages.dashboard.master.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile' => 'nullable|file'
        ]);

        $user = User::find($id);
        if (!$user) {
            throw new HttpException(404, "User not found");
        }
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $upload = Storage::disk('public')->put('profile', $file);
            if (!$upload) {
                throw new \Exception("fail to save profile", 500);
            }
            $payload['profile'] = Storage::url($upload);
            Storage::delete($user->profile);
        }
        $user->update($payload);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!User::find($id)) {
            redirect()->back()->withErrors([
                'message' => 'user tidak ditemukan'
            ]);
        }

        User::find($id)->delete();

        return redirect()->back();
    }
}
