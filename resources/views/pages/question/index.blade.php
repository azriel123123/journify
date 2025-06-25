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
                <h1>Question</h1>
                <div class="section-header-button">
                    <a href="{{ route('question.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Create</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Question Table Data</h4>
                    </div>
                    <!-- Filter Bar -->
                    <form method="GET" class="p-4">
                        <div class="row">
                            <!-- Filter Kategori -->
                            <div class="form-group col-md-5">
                                <label for="category">Filter by Category</label>
                                <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ request('category') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Filter Hari -->
                            <div class="form-group col-md-5">
                                <label for="day">Filter by Day</label>
                                <select name="day" id="day" class="form-control" onchange="this.form.submit()">
                                    <option value="">All Days</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ request('day') == $i ? 'selected' : '' }}>Day
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Optional Reset -->
                            <div class="form-group col-md-2 d-flex align-items-end">
                                <a href="{{ route('question.index') }}" class="btn btn-light w-100">Reset</a>
                            </div>
                        </div>
                    </form>

                    <div class="card-body p-0">
                        <div class="row col-12">
                            @foreach ($questions as $question)
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>{{ $question->category->name }}</h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('question.edit', $question->id) }}"
                                                    class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                                                <a href="#"
                                                    onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $question->id }}').submit();"
                                                    class="btn btn-icon btn-danger"><i class="fa-solid fa-trash"></i></a>

                                                <form action="{{ route('question.destroy', $question->id) }}"
                                                    method="POST" id="delete-form-{{ $question->id }}"
                                                    style="display:none;">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="text-primary mb-2">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                Hari ke-{{ $question->day }}
                                            </h5>
                                            <h5 class="font-weight-bold mb-3">
                                                Judul: {{ $question->title }}
                                            </h5>
                                        
                                            <p>Q1: {{ $question->question1 }}</p>
                                            <p>Q2: {{ $question->question2 }}</p>
                                            <p>Q3: {{ $question->question3 }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    </div>

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
