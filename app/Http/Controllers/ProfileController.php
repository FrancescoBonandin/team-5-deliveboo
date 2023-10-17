<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Category;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        if($request->user->id != Auth::id())
        {
            return back();
        }

        $categories=Category::all();

        return view('profile.edit', [
            'user' => $request->user(),
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        if($request->user->id != Auth::id())
        {
            return back();
        }

        $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->restaurant->update([

            'restaurant_name'=>$request->restaurant_name,
            'address'=> $request->address,
            'image'=>$request->image,
            'p_iva'=>$request->p_iva,
        ]
        );

        $request->user()->save();

        if (isset($request['categories'])) {
            $request->user()->restaurant->categories()->sync($request['categories']);
        }
        else {
            $request->user()->restaurant->categories()->detach();
        }

        return redirect()->route('dashboard')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if($request->user->id != Auth::id())
        {
            return back();
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
