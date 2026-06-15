<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_item_id' => ['required', 'integer', 'exists:order_items,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        $orderItem = OrderItem::with(['order', 'review'])->findOrFail($validated['order_item_id']);

        if ((int) $orderItem->order->user_id !== (int) Auth::id()) {
            return back()->with('error', 'No puedes calificar este pedido.');
        }

        if ($orderItem->order->estado !== 'entregado') {
            return back()->with('error', 'Solo puedes calificar pedidos entregados.');
        }

        if ($orderItem->review) {
            return back()->with('error', 'Este producto ya fue calificado.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'order_item_id' => $orderItem->id,
            'product_id' => $orderItem->product_id,
            'rating' => (int) $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'Gracias por tu reseña.');
    }
}
