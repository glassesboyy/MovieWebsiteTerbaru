<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MovieTicket;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = MovieTicket::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditemukan Bosssss',
            'data' => $movie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'movie_title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_date' => 'required|date',
            'show_time' => 'required|date_format:H:i',
            'price' => 'required|numeric',
            'available_seats' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors(),
            ]);
        }

        // Store poster image if provided
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('movies');
        }

        // Create the movie ticket
        $movieTicket = MovieTicket::create([
            'movie_title' => $request->movie_title,
            'description' => $request->description,
            'genre' => $request->genre,
            'poster' => $posterPath,
            'release_date' => $request->release_date,
            'show_time' => $request->show_time,
            'price' => $request->price,
            'available_seats' => $request->available_seats,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie Ticket Created Successfully',
            'data' => $movieTicket,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the movie ticket by ID
        $movieTicket = MovieTicket::find($id);

        if (!$movieTicket) {
            return response()->json([
                'success' => false,
                'message' => 'Movie Ticket Not Found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Movie Ticket Found',
            'data' => $movieTicket,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'movie_title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_date' => 'required|date',
            'show_time' => 'required|date_format:H:i',
            'price' => 'required|numeric',
            'available_seats' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors(),
            ]);
        }

        // Find the movie ticket to update
        $movieTicket = MovieTicket::find($id);

        if (!$movieTicket) {
            return response()->json([
                'success' => false,
                'message' => 'Movie Ticket Not Found',
            ]);
        }

        // Update the poster image if provided
        $posterPath = $movieTicket->poster;
        if ($request->hasFile('poster')) {
            // Delete the old poster if it exists
            if ($posterPath && file_exists(storage_path('app/' . $posterPath))) {
                unlink(storage_path('app/' . $posterPath));
            }
            // Store the new poster
            $posterPath = $request->file('poster')->store('movies');
        }

        // Update the movie ticket
        $movieTicket->update([
            'movie_title' => $request->movie_title,
            'description' => $request->description,
            'genre' => $request->genre,
            'poster' => $posterPath,
            'release_date' => $request->release_date,
            'show_time' => $request->show_time,
            'price' => $request->price,
            'available_seats' => $request->available_seats,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie Ticket Updated Successfully',
            'data' => $movieTicket,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the movie ticket to delete
        $movieTicket = MovieTicket::find($id);

        if (!$movieTicket) {
            return response()->json([
                'success' => false,
                'message' => 'Movie Ticket Not Found',
            ]);
        }

        // Delete the poster if it exists
        if ($movieTicket->poster && file_exists(storage_path('app/' . $movieTicket->poster))) {
            unlink(storage_path('app/' . $movieTicket->poster));
        }

        // Delete the movie ticket
        $movieTicket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie Ticket Deleted Successfully',
        ]);
    }
}
