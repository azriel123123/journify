@extends('layouts.app')

@section('title', 'Create Lagu')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Lagu</h1>
            <div class="section-header-button">
                <a href="{{ route('song.index') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i> Back</a>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Lagu</h4>
                </div>
                <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- Judul --}}
                        <div class="form-group">
                            <label>Judul Lagu</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Penyanyi --}}
                        <div class="form-group">
                            <label>Penyanyi</label>
                            <input type="text" class="form-control @error('penyanyi') is-invalid @enderror" name="penyanyi">
                            @error('penyanyi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori (Mood) --}}
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

                        {{-- File MP3 --}}
                        <div class="form-group">
                            <label>Upload File MP3</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" accept=".mp3">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="section-button">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Upload</button>
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
