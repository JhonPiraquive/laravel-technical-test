<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Handle Customers requests and logic
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 04, 2024
 */
class CustomerController extends Controller
{
    /**
     * Display the customer's main view
     *
     * @return View
     */
    public function index(): View
    {
        $customers = Customer::paginate(5, ['*'], 'customers');

        return view('customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Display the customer's create view
     *
     * @return View
     */
    public function create(): View
    {
        return view('customer.create', ['customer' => new Customer()]);
    }

    /**
     * Store the given customer
     *
     * @param CustomerStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        Customer::create($request->except(['_token', '_method']));

        return redirect()->route('customer.index');
    }

    /**
     * Display the customer's edit view
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer): View
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Display the customer's edit view
     *
     * @param Customer $customer
     * @return View
     */
    public function view(Customer $customer): View
    {
        return view('customer.view', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the given customer
     *
     * @param CustomerUpdateRequest $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(CustomerUpdateRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->except(['_token', '_method']));

        return back()->with('status', 'customer-updated');
    }

    /**
     * Delete the given customer
     *
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function delete(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
