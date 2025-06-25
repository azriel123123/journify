@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Category</h1>
                <div class="section-header-button">
                    <a href="{{ route('question.index') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i>
                        Back</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Question</h4>
                    </div>
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            {{-- tentukan judul --}}
                            <div class="form-group">
                                <label for="title">Judul Journal Hari Ini</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            {{-- Hari --}}
                            <label for="day" class="form-label">Hari ke-</label>
                            <select name="day" id="day" class="form-control" required>
                                <option value="" disabled selected>Pilih Hari</option>
                                @for ($i = 1; $i <= 14; $i++)
                                    <option value="{{ $i }}">Hari ke-{{ $i }}</option>
                                @endfor
                            </select>

                            {{-- Category Id --}}
                            <div class="form-group mb-4">
                                <label class="col-form-label ">Category</label>
                                <div class="">
                                    <select name="category_id" class="form-control selectric">
                                        <option selected>==== Choose Category ====</option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- queation1 --}}
                            <div class="form-group">
                                <label>Question 1</label>
                                <input type="text" class="form-control" name="question1">
                            </div>
                            {{-- question 2 --}}
                            <div class="form-group">
                                <label>Question 2</label>
                                <input type="text" class="form-control" name="question2">
                            </div>
                            {{-- question 3 --}}
                            <div class="form-group">
                                <label>Question 3</label>
                                <input type="text" class="form-control" name="question3">
                            </div>
                            <div class="section-button">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
