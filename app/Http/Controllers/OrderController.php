<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/checkout",
     *     tags={"Orders"},
     *     summary="Proses checkout pembelian produk skincare",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"product_id", "quantity"},
     *             @OA\Property(property="product_id", type="integer", example=1),
     *             @OA\Property(property="quantity", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Berhasil checkout"),
     *     @OA\Response(response=400, description="Stok tidak mencukupi"),
     *     @OA\Response(response=404, description="Produk tidak ditemukan"),
     * )
     */
    public function store(Request $request)
    {
        // Validasi inputan dari request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($validated['product_id']);

        // Cek stok produk
        if ($product->stock < $validated['quantity']) {
            return response()->json([
                'message' => 'Stok tidak mencukupi'
            ], 400);
        }

        // Kurangi stok
        $product->stock -= $validated['quantity'];
        $product->save();

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $product->price * $validated['quantity'],
        ]);

        return response()->json($order, 201);
    }
}
