<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Import model Customer
use App\Models\MovieTicket; // Import model MovieTicket
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Tampilkan daftar semua pelanggan.
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil semua data pelanggan
        $customers = Customer::paginate(10);

        // Kembalikan view dengan data pelanggan
        return view('customers.index', compact('customers'));
    }

    /**
     * Tampilkan form pemesanan tiket.
     *
     * @return View
     */
    public function create(): View
    {
        // Mendapatkan semua film untuk dropdown pemilihan film
        $movies = MovieTicket::all();

        // Kembalikan view dengan data film
        return view('customers.create', compact('movies'));
    }

    /**
     * Simpan data pemesanan.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'movie_id'       => 'required|exists:movie_tickets,id',
            'show_time'      => 'required|date_format:H:i',
            'ticket_quantity'=> 'required|integer|min:1',
            'customer_name'  => 'required|string|min:3',
            'customer_email' => 'required|email',
        ]);

        // Simpan data pemesanan ke database
        Customer::create([
            'movie_id'        => $request->movie_id,
            'show_time'       => $request->show_time,
            'ticket_quantity' => $request->ticket_quantity,
            'customer_name'   => $request->customer_name,
            'customer_email'  => $request->customer_email,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('customers.index')
            ->with(['success' => 'Pemesanan Berhasil Dibuat!']);
    }

    /**
     * Tampilkan detail pemesanan tertentu.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Ambil data pemesanan berdasarkan ID
        $customer = Customer::with('movieTicket')->findOrFail($id);

        // Kembalikan view dengan data pemesanan
        return view('customers.show', compact('customer'));
    }

    /**
     * Tampilkan form untuk mengedit pemesanan tertentu.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Ambil data pemesanan berdasarkan ID
        $customer = Customer::findOrFail($id);

        // Mendapatkan semua film untuk dropdown pemilihan film
        $movies = MovieTicket::all();

        // Kembalikan view dengan data pemesanan dan film
        return view('customers.edit', compact('customer', 'movies'));
    }

    /**
     * Update pemesanan tertentu.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'movie_id'       => 'required|exists:movie_tickets,id',
            'show_time'      => 'required|date_format:H:i',
            'ticket_quantity'=> 'required|integer|min:1',
            'customer_name'  => 'required|string|min:3',
            'customer_email' => 'required|email',
        ]);

        // Cari pemesanan dan update
        $customer = Customer::findOrFail($id);
        $customer->update([
            'movie_id'        => $request->movie_id,
            'show_time'       => $request->show_time,
            'ticket_quantity' => $request->ticket_quantity,
            'customer_name'   => $request->customer_name,
            'customer_email'  => $request->customer_email,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('customers.index')
            ->with(['success' => 'Pemesanan Berhasil Diperbarui!']);
    }

    /**
     * Hapus pemesanan berdasarkan ID.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Cari pemesanan dan hapus
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('customers.index')
            ->with(['success' => 'Pemesanan Berhasil Dihapus!']);
    }
}
