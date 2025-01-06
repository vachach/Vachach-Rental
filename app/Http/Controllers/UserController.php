<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    // Barcha foydalanuvchilarni ko'rsatish
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->paginate(10);  // Barcha foydalanuvchilarni olish
        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    // Yangi foydalanuvchi yaratish formasi
    public function create()
    {
        return view('users.create');
    }

    // Yangi foydalanuvchini saqlash
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }

    // Ma'lum foydalanuvchini ko'rsatish
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Foydalanuvchi ma'lumotlarini tahrirlash
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Foydalanuvchini yangilash
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index');
    }

    // Foydalanuvchini o'chirish
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
};
