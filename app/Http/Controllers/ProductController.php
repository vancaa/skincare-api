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
     *     summary="Ambil daftar produk skincare (dengan filter, sorting, dan paginasi)",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Halaman saat ini",
     *         required=false,
     *         @OA\Schema(type="integer", format="int64", example=1)
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Jumlah produk per halaman",
     *         required=false,
     *         @OA\Schema(type="integer", format="int64", example=10)
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian produk",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="brand",
     *         in="query",
     *         description="Filter berdasarkan brand",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="sort_by",
     *         in="query",
     *         description="Kolom untuk sorting (misal: price, created_at)",
     *         required=false,
     *         @OA\Schema(type="string", example="latest")
     *     ),
     *     @OA\Response(response=200, description="Daftar produk yang difilter dan dipaginasi")
     * )
     */
    public function index(Request $request)
{
    try {
        $filter = $request->all();
        $page = isset($filter['_page']) ? intval($filter['_page']) : 1;
        $limit = isset($filter['_limit']) ? intval($filter['_limit']) : 10;
        $offset = ($page - 1) * $limit;

        $products = Product::where('is_active', true);

        // Filter pencarian (nama produk)
        if ($request->get('_search')) {
            $products = $products->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($request->get('_search')) . '%']);
        }

        // Filter berdasarkan brand
        if ($request->get('_brand')) {
            $products = $products->whereRaw("LOWER(brand) = ?", [strtolower($request->get('_brand'))]);
        }

        // Sorting
        switch ($request->get('_sort_by')) {
            case 'name_asc':
                $products = $products->orderBy('name', 'ASC');
                break;
            case 'name_desc':
                $products = $products->orderBy('name', 'DESC');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'ASC');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'DESC');
                break;
            case 'latest':
            default:
                $products = $products->orderBy('created_at', 'DESC');
                break;
        }

        // Total semua hasil filter
        $products_count_total = $products->count();

        // Ambil data per page
        $products = $products->limit($limit)->offset($offset)->get();

        return response()->json([
            'message' => 'Filtered product list',
            'products_count_total' => $products_count_total,
            'products_count_start' => $products_count_total === 0 ? 0 : ($offset + 1),
            'products_count_end' => $products_count_total === 0 ? 0 : ($offset + count($products)),
            'data' => $products
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Invalid data: ' . $e->getMessage()
        ], 400);
    }
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
