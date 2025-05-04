@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-light border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold text-gradient">Add New Service</h5>
                            <a href="{{ route('services.list') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                <i class="bi bi-arrow-left me-1"></i> Back to Services
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">Service Title</label>
                                <input type="text" class="form-control rounded-3 @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="color" class="form-label fw-semibold">Color Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-end-3 @error('color') is-invalid @enderror"
                                           id="color" name="color" value="{{ old('color') }}" placeholder="e.g. ffbb2c" required>
                                    <input type="color" id="colorPicker" class="d-none" value="#ffbb2c">
                                </div>
                                @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Enter hex color code with the #</small>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold">Icon Class</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-end-3 @error('image') is-invalid @enderror"
                                           id="image" name="image" value="{{ old('image') }}" placeholder="e.g. bi bi-eye" required>
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Use Bootstrap Icons class names</small>
                            </div>

                            <div class="mb-4">
                                <label for="order" class="form-label fw-semibold">Display Order</label>
                                <input type="number" class="form-control rounded-3 @error('order') is-invalid @enderror"
                                       id="order" name="order" value="{{ old('order') }}" required>
                                @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-semibold">
                                    <i class="bi bi-save me-2"></i> Create Service
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Color Picker Functionality
            const colorInput = document.getElementById('color');
            const colorPicker = document.getElementById('colorPicker');
            const colorPreview = document.getElementById('colorPreview');

            // Click on color preview to open color picker
            colorPreview.addEventListener('click', function() {
                colorPicker.click();
            });

            colorPicker.addEventListener('input', function() {
                const hex = this.value.substring(1);
                colorInput.value = hex;
                updateColorPreview(hex);
            });

            colorInput.addEventListener('input', function() {
                const hex = this.value.replace('#', '');
                if (/^[0-9A-F]{6}$/i.test(hex)) {
                    colorPicker.value = '#' + hex;
                    updateColorPreview(hex);
                }
            });

            function updateColorPreview(hex) {
                colorPreview.style.backgroundColor = '#' + hex;
            }

            // Initialize color preview with existing value
            if (colorInput.value) {
                updateColorPreview(colorInput.value);
            }

            // Icon Preview Functionality
            const imageInput = document.getElementById('image');
            const iconPreview = document.getElementById('iconPreview');

            // Update icon preview when input changes
            imageInput.addEventListener('input', function() {
                updateIconPreview(this.value);
            });

            // Initialize icon preview with existing value
            if (imageInput.value) {
                updateIconPreview(imageInput.value);
            }

            function updateIconPreview(iconClass) {
                iconPreview.innerHTML = iconClass ? `<i class="${iconClass}"></i>` : '';
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        #iconPreview i {
            color: var(--bs-primary);
        }

        #colorPreview {
            transition: background-color 0.3s ease;
            border: 1px solid #dee2e6;
            cursor: pointer;
        }

        #colorPreview:hover {
            opacity: 0.9;
        }
    </style>
@endpush
