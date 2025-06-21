@extends('layouts.app')

@section('title', 'Create Quote')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Quote</h1>
            <div class="section-header-button">
                <a href="{{ route('quote.index') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i> Back</a>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Quote</h4>
                </div>
                <form action="{{ route('quote.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        {{-- Headline --}}
                        <div class="form-group">
                            <label>Headline</label>
                            <input type="text" class="form-control @error('headline') is-invalid @enderror" name="headline" value="{{ old('headline') }}">
                            @error('headline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Isi --}}
                        <div class="form-group">
                            <label>Isi Quote</label>
                            <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="4">{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label>Kategori Mood</label>
                            <select name="category_id" class="form-control selectric @error('category_id') is-invalid @enderror">
                                <option value="">==== Pilih Kategori ====</option>
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="section-button">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
