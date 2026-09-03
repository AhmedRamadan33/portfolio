<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $profile = Profile::firstOrNew();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:5000'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:4096'],
            'cv' => ['nullable', 'mimes:pdf', 'max:8192'],
        ]);

        $profile = Profile::firstOrNew();

        if ($request->hasFile('avatar')) {
            if ($profile->avatar_path) {
                Storage::disk('public')->delete($profile->avatar_path);
            }
            $data['avatar_path'] = $request->file('avatar')->store('profile', 'public');
        }

        if ($request->hasFile('cv')) {
            if ($profile->cv_path) {
                Storage::disk('public')->delete($profile->cv_path);
            }
            $data['cv_path'] = $request->file('cv')->store('profile', 'public');
        }

        $profile->fill($data)->save();

        if ($request->filled('new_password')) {
            $request->validate([
                'new_password' => ['confirmed', 'min:8'],
            ]);

            Auth::user()->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
        }

        return back()->with('status', 'Profile updated.');
    }
}
