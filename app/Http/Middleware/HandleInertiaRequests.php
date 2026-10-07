<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $cartCount = 0;
        if (auth()->check()) {
            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
            if ($cart) $cartCount = $cart->items()->sum('quantity');
        } else {
            $cart = \App\Models\Cart::where('session_id', $request->session()->getId())->first();
            if ($cart) $cartCount = $cart->items()->sum('quantity');
        }

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'cartCount' => $cartCount,
            'flash' => [
                'success' => fn () => $request->session()->get('success')
            ]
        ];
    }
}
