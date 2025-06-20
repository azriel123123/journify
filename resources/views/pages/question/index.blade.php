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
                    <div class="card-body p-0">
                        <div class="row col-12">
                            @foreach ($questions as $question)
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>{{ $question->category->name }}</h4>
                                        <div class="card-header-action">
                                          <a href="{{ route('question.edit', $question->id) }}" class="btn btn-icon btn-success"><i
                                                    class="far fa-edit"></i></a>
                                             <a href="#"
                                                onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $question->id }}').submit();"
                                                class="btn btn-icon btn-danger"><i class="fa-solid fa-trash"></i></a>

                                            <form action="{{ route('question.destroy', $question->id) }}" method="POST"
                                                id="delete-form-{{ $question->id }}" style="display:none;">
                                                @csrf @method('DELETE')
                                            </form>       
                                            <a href="{{ route('question.show', $question->id) }}" class="btn btn-icon btn-info"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
