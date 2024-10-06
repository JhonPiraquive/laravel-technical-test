<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Handle Customers requests and logic
 *
 * This controller provides methods for managing customer data,
 * including creating, updating, viewing, and deleting customers.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 04, 2024
 */
class CustomerController extends Controller
{
    /**
     * Display the customer's main view.
     */
    public function index(): View
    {
        $customers = Customer::paginate(5, ['*'], 'customers');

        return view('customer.index', [
            'customers' => $customers,
        ]);
    }

    /**
     * Display the customer's create view.
     */
    public function create(): View
    {
        return view('customer.create', ['customer' => new Customer]);
    }

    /**
     * Store the given customer.
     *
     * @param  StoreRequest  $request  The request containing customer data.
     * @return RedirectResponse Redirects to the customer index route.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Customer::create($request->except(['_token', '_method']));

        return redirect()->route('customer.index');
    }

    /**
     * Display the customer's edit view.
     *
     * @param  Customer  $customer  The customer instance to edit.
     */
    public function edit(Customer $customer): View
    {
        return view('customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Display the customer's view.
     *
     * @param  Customer  $customer  The customer instance to view.
     */
    public function view(Customer $customer): View
    {
        return view('customer.view', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the given customer.
     *
     * @param  UpdateRequest  $request  The request containing updated customer data.
     * @param  Customer  $customer  The customer instance to update.
     * @return RedirectResponse Redirects back with a status message.
     */
    public function update(UpdateRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->except(['_token', '_method']));

        return back()->with('status', 'customer-updated');
    }

    /**
     * Delete the given customer.
     *
     * @param  Customer  $customer  The customer instance to delete.
     * @return RedirectResponse Redirects to the customer index route.
     */
    public function delete(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
