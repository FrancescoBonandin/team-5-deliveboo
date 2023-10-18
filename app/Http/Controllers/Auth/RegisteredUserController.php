<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Restaurant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $categories=Category::all();

        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:319', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name'=>['required', 'max:255'],
            'address'=>['required', 'max:255'],
            'image'=>['nullable','image'],
            'p_iva'=>['required','min:11','max:11'],
            'categories' => 'required|array',
            'categories.*'=>'exists:categories,id',

        ],[
            'name.required' => 'Il campo Nome è obbligatorio.',
            'name.max' => 'Il campo Nome non può superare i 255 caratteri.',
            'email.required' => 'Il campo Email è obbligatorio.',
            'email.email' => 'Il campo Email deve essere un indirizzo email valido.',
            'email.max' => 'Il campo Email non può superare i 319 caratteri.',
            'email.unique' => 'L\'indirizzo email specificato è già in uso.',
            'password.required' => 'Il campo Password è obbligatorio.',
            'password.confirmed' => 'La conferma della password non corrisponde.',
            'restaurant_name.required' => 'Il campo Nome del ristorante è obbligatorio.',
            'restaurant_name.max' => 'Il campo Nome del ristorante non può superare i 255 caratteri.',
            'address.required' => 'Il campo Indirizzo è obbligatorio.',
            'address.max' => 'Il campo Indirizzo non può superare i 255 caratteri.',
            'image.image' => 'L\'immagine deve essere un file di immagine valido.',
            'p_iva.required' => 'Il campo Partita IVA è obbligatorio.',
            'p_iva.min' => 'Il campo Partita IVA deve contenere almeno 11 caratteri.',
            'p_iva.max' => 'Il campo Partita IVA non può superare 11 caratteri.',
            'categories'=> 'Il campo categoria è obbligatorio',
            
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurantImage = null;
        if (isset($request->image)) {
            $restaurantImage = Storage::put('uploads/images', $request->image);
        }


        $restaurant = Restaurant::Create([
            'user_id'=>$user->id,
            'restaurant_name'=>$request->restaurant_name,
            'address'=> $request->address,
            'image'=>$restaurantImage,
            'p_iva'=>$request->p_iva,

        ]);


        if (isset($request['categories'])) {
            foreach ($request['categories'] as $categoryId) {
                                                
                                                
                $restaurant->categories()->attach($categoryId);  
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
