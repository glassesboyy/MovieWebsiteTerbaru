<?php

namespace App\Http\Controllers;

// Import model MovieTicket
use App\Models\MovieTicket;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\CustomerController;

class MovieController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index() : View
    {
        $movies = MovieTicket::latest()->paginate(10);

        return view('movies.index', compact('movies'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('movies.create');
    }

    /**
     * store
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'poster'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'movie_title'   => 'required|min:5',
            'description'   => 'nullable|min:10',
            'genre'         => 'nullable|min:3',
            'release_date'  => 'required|date',
            'show_time'     => 'required|date_format:H:i',
            'price'         => 'required|numeric',
            'available_seats'=> 'required|numeric'
        ]);

        // Upload poster
        $poster = $request->file('poster');
        $poster->storeAs('movies', $poster->hashName());

        // Membuat data movie
        MovieTicket::create([
            'poster'         => $poster->hashName(),
            'movie_title'    => $request->movie_title,
            'description'    => $request->description,
            'genre'          => $request->genre,
            'release_date'   => $request->release_date,
            'show_time'      => $request->show_time,
            'price'          => $request->price,
            'available_seats' => $request->available_seats
        ]);

        // Redirect ke index
        return redirect()->route('movies.index')->with(['success' => 'Data Film Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        // Mendapatkan data film berdasarkan ID
        $movie = MovieTicket::findOrFail($id);

        // Mengembalikan view dengan data film
        return view('movies.show', compact('movie'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Mendapatkan data film berdasarkan ID
        $movie = MovieTicket::findOrFail($id);

        // Mengembalikan view dengan data film untuk diedit
        return view('movies.edit', compact('movie'));
    }

    /**
     * update
     *
     * @param  Request  $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'poster'        => 'nullable|image|mimes:jpeg,jpg,png|max:1000000',
            'movie_title'   => 'required|min:5',
            'description'   => 'nullable|min:10',
            'genre'         => 'nullable|min:3',
            'release_date'  => 'required|date',
            'show_time'     => 'required',
            'price'         => 'required|numeric',
            'available_seats'=> 'required|numeric'
        ]);

        // Mendapatkan data film berdasarkan ID
        $movie = MovieTicket::findOrFail($id);

        // Cek jika poster baru diupload
        if ($request->hasFile('poster')) {
            // Upload poster baru
            $poster = $request->file('poster');
            $poster->storeAs('movies/', $poster->hashName());

            // Hapus poster lama jika ada
            Storage::delete('movies/' . $movie->poster);

            // Update data film dengan poster baru
            $movie->update([
                'poster'         => $poster->hashName(),
                'movie_title'    => $request->movie_title,
                'description'    => $request->description,
                'genre'          => $request->genre,
                'release_date'   => $request->release_date,
                'show_time'      => $request->show_time,
                'price'          => $request->price,
                'available_seats' => $request->available_seats
            ]);
        } else {
            // Update data film tanpa mengubah poster
            $movie->update([
                'movie_title'    => $request->movie_title,
                'description'    => $request->description,
                'genre'          => $request->genre,
                'release_date'   => $request->release_date,
                'show_time'      => $request->show_time,
                'price'          => $request->price,
                'available_seats' => $request->available_seats
            ]);
        }

        // Redirect ke index
        return redirect()->route('movies.index')->with(['success' => 'Data Film Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Mendapatkan data film berdasarkan ID
        $movie = MovieTicket::findOrFail($id);

        // Hapus poster film dari penyimpanan
        Storage::delete('movies/' . $movie->poster);

        // Hapus data film dari database
        $movie->delete();

        // Redirect ke index
        return redirect()->route('movies.index')->with(['success' => 'Data Film Berhasil Dihapus!']);
    }
}
