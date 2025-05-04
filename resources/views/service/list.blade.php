@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="fw-bold text-gradient">Our Services</h1>
                <p class="text-muted">Manage your service offerings</p>
            </div>
            <a href="{{ route('services.create') }}" class="btn btn-primary btn-lg shadow-sm rounded-pill px-4">
                <i class="bi bi-plus-circle me-2"></i>Add New Service
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase fw-semibold text-muted small">ID</th>
                        <th class="py-3 text-uppercase fw-semibold text-muted small">Service</th>
                        <th class="py-3 text-uppercase fw-semibold text-muted small">Color</th>
                        <th class="py-3 text-uppercase fw-semibold text-muted small">Icon</th>
                        <th class="py-3 text-uppercase fw-semibold text-muted small">Order</th>
                        <th class="pe-4 py-3 text-uppercase fw-semibold text-muted small text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)
                        <tr class="border-bottom border-light">
                            <td class="ps-4 fw-semibold">#{{ $service->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper me-3" style="background-color: {{ $service->color }}20; color: {{ $service->color }};">
                                        <i class="{{ $service->image }}"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $service->title }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="color-preview" style="background-color: {{ $service->color }};">{{ $service->color }}</div>
                            </td>
                            <td>
                                <i class="{{ $service->image }} fs-5" style="color: {{ $service->color }};"></i>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $service->order }}</span>
                            </td>
                            <td class="pe-4 text-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                                        <i class="bi bi-pencil me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="bi bi-trash me-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if($services->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">No services found</h5>
                    <p class="text-muted">Add your first service by clicking the button above</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .color-preview {
            width: 24px;
            height: 24px;
            border: 1px solid #e9ecef;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }
    </style>
@endpush
