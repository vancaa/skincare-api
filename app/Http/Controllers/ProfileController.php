<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user yang sedang login via API token.
     * Route: GET /my-profile
     */
  public function show(Request $request)
{
    // Debug: tampilkan semua cookie yang dikirim
    // dd('Semua cookie:', $request->cookie());

    $token = $request->cookie('ut');

    if (!$token) {
        return redirect('/login');
    }

    try {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(env('API_URL') . '/profile', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $user = $data['data']; // pastikan sesuai struktur API kamu

        return view('pages.profile', compact('user'));
    } catch (\Exception $e) {
        dd('Gagal ambil profile dari API:', $e->getMessage());
        // return redirect('/login'); // kamu bisa balikin ini setelah debug selesai
    }
}
}