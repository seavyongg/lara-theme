<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all services
        $services = Service::query()
            ->orderBy('order')
            ->get();
        // Return the view with the services
        return view('services', [
            'services' => $services, // Pass the services to the view
        ]);
    }

    //list
    public function list()
    {
        // Get all services
        $services = Service::query()
            ->orderBy('order')
            ->get();

        // Return the view with the services
        return view('service.list', [
            'services' => $services, // Pass the services to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new service
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->title = $request->input('title');
        $service->image = $request->input('image');
        $service->color = $request->input('color');
        $service->order = $request->input('order');
        $service->save();

        // Redirect to the services page with a success message
        return redirect()->route('services.list')->with('success', 'Service created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the service by ID
        $service = Service::findOrFail($id);
        if (!$service) {
            return redirect()->route('services.list')->with('error', 'Service not found.');
        }

        // Return the view to edit the service
        return view('service.edit', [
            'service' => $service, // Pass the service to the view
        ]);
    }

    //update
    public function update(ServiceRequest $request, $id)
    {
        // Find the service by ID
        $service = Service::findOrFail($id);
        if (!$service) {
            return redirect()->route('services.list')->with('error', 'Service not found.');
        }

        // Update the service
        $service->title = $request->input('title');
        $service->image = $request->input('image');
        $service->color = $request->input('color');
        $service->order = $request->input('order');
        $service->save();

        // Redirect to the services page with a success message
        return redirect()->route('services.list')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the service by ID
        $service = Service::findOrFail($id);
        if (!$service) {
            return redirect()->route('services.list')->with('error', 'Service not found.');
        }

        // Delete the service
        $service->delete();

        // Redirect to the services page with a success message
        return redirect()->route('services.list')->with('success', 'Service deleted successfully.');
    }
}
