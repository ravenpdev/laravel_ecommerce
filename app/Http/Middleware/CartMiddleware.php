<?php

namespace App\Http\Middleware;

use App\Services\Cart\CartService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
{

    public function __construct(protected CartService $cartService) { }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->cartService->exists()) {
            $this->cartService->create($request->user());
        }

        return $next($request);
    }
}
