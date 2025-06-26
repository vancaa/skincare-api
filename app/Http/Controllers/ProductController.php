<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Ambil semua produk skincare",
     *     @OA\Response(response=200, description="Daftar semua produk")
     * )
     */
    public function index()
    {
        $products = Product::where('is_active', true)->get();

        return response()->json([
            'message' => 'List of active products',
            'data' => $products
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Tambahkan produk skincare baru",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "brand", "category", "stock", "price"},
     *             @OA\Property(property="name", type="string", example="Toner Glow"),
     *             @OA\Property(property="brand", type="string", example="Skintific"),
     *             @OA\Property(property="category", type="string", example="Toner"),
     *             @OA\Property(property="description", type="string", example="Toner untuk kulit glowing"),
     *             @OA\Property(property="stock", type="integer", example=100),
     *             @OA\Property(property="price", type="number", example=75000),
     *             @OA\Property(property="is_active", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Produk ditambahkan")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Lihat detail produk skincare",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID produk",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail produk ditemukan"),
     *     @OA\Response(response=404, description="Produk tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['data' => $product]);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Update produk skincare",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID produk",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Toner Baru"),
     *             @OA\Property(property="brand", type="string", example="Wardah"),
     *             @OA\Property(property="category", type="string", example="Essence"),
     *             @OA\Property(property="description", type="string", example="Essence pencerah wajah"),
     *             @OA\Property(property="stock", type="integer", example=50),
     *             @OA\Property(property="price", type="number", example=60000),
     *             @OA\Property(property="is_active", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Produk berhasil diupdate")
     * )
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'brand' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'description' => 'nullable|string',
            'stock' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Hapus produk skincare",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID produk",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Produk dihapus"),
     *     @OA\Response(response=404, description="Produk tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted'], 200);
    }
}
