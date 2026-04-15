@extends('master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h1 class="card-title mb-4 text-center">
                        <i class="bi bi-person-circle"></i> User Detail
                    </h1>

                    <div class="user-info">
                        <div class="mb-4 pb-3 border-bottom">
                            <label class="fw-bold text-muted">ID</label>
                            <p class="fs-5">{{ $user->id }}</p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="fw-bold text-muted">Name</label>
                            <p class="fs-5">{{ $user->name }}</p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="fw-bold text-muted">Email</label>
                            <p class="fs-5">
                                <i class="bi bi-envelope"></i> 
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold text-muted">Member Since</label>
                            <p class="fs-5">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-center mt-5">
                        <a href="/users" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.95);
    }

    .card-body {
        background-color: #fff;
    }

    .user-info p {
        color: #333;
        margin: 0;
    }

    .fw-bold {
        font-size: 0.9rem;
        color: #6c757d;
    }
</style>
@endsection