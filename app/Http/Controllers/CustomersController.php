<?php

namespace App\Http\Controllers;

//import model Customer
use App\Models\Customers;

//import return type View
use Illuminate\View\View;

//import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get all customers
        $customers = Customers::latest()->paginate(10);

        //render view with customers
        return view('customers.index', compact('customers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'          => 'required|string|min:3',
            'email'         => 'required|email|unique:customers',
            'phone_number'  => 'required|string',
            'movie_title'   => 'required|string',
            'show_time'     => 'required|date_format:H:i',
            'num_tickets'   => 'required|integer|min:1',
            'total_price'   => 'required|numeric|min:0',
            'booking_date'  => 'required|date'
        ]);

        //create customer
        Customers::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'movie_title'   => $request->movie_title,
            'show_time'     => $request->show_time,
            'num_tickets'   => $request->num_tickets,
            'total_price'   => $request->total_price,
            'booking_date'  => $request->booking_date
        ]);

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}