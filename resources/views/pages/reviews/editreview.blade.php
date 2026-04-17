@extends('master')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

        
    @endif




<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Review</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Attraction -->
            <div class="form-group">
                <label for="attraction_id">Pilih Attraction <span style="color: var(--danger);">*</span></label>
                <select 
                    id="attraction_id" 
                    name="attraction_id" 
                    class="form-control @error('attraction_id') is-invalid @enderror"
                    required
                >
                    <option value="">-- Pilih Attraction --</option>
                    @foreach ($attractions as $attraction)
                        <option 
                            value="{{ $attraction->id }}" 
                            {{ old('attraction_id', $review->attraction_id) == $attraction->id ? 'selected' : '' }}
                        >
                            {{ $attraction->name }}
                        </option>
                    @endforeach
                </select>
                @error('attraction_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="FloatingInputReviewerName" placeholder="Reviewer Name" name="reviewer_name" required value="{{ old('reviewer_name', $review->reviewer_name) }}">
                            <label for="FloatingInputReviewerName">Nama Reviewer</label>
                            @error('reviewer_name')
                                <div class="text-danger">{{ $message }}</div>

                            @enderror
                        
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="FloatingInputComment" placeholder="Comment" name="comment" required>{{ old('comment', $review->comment) }}</textarea>
                            <label for="FloatingInputComment">Komentar</label>
                            @error('comment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    