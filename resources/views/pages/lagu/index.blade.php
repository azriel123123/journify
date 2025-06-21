@extends('layouts.app')

@section('title', 'Daftar Lagu')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush
<style>
    .badge-filter {
        margin-right: 8px;
        margin-bottom: 8px;
        padding: 10px 16px;
        font-size: 0.9rem;
        cursor: pointer;
    }
</style>

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lagu</h1>
                <div class="section-header-button">
                    <a href="{{ route('song.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Upload Lagu</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Lagu</h4>
                    </div>
                    <div class="d-flex flex-wrap mb-4 px-3">
                        <a href="{{ route('song.index') }}"
                            class="badge badge-pill badge-filter {{ request('filter') == null ? 'badge-dark' : 'badge-light' }}">
                            All
                        </a>

                        @foreach ($categories as $kategori)
                            @php
                                $active = request('filter') == strtolower($kategori->name);
                                $warna = match (strtolower($kategori->name)) {
                                    'sedih' => 'badge-primary',
                                    'happy' => 'badge-success',
                                    'galau', 'bingung' => 'badge-warning',
                                    'marah' => 'badge-danger',
                                    'tenang', 'chill' => 'badge-secondary',
                                    default => 'badge-info',
                                };
                            @endphp

                            <a href="{{ route('song.index', ['filter' => strtolower($kategori->name)]) }}"
                                class="badge badge-pill badge-filter {{ $active ? $warna : 'badge-light' }}">
                                {{ $kategori->name }}
                            </a>
                        @endforeach
                    </div>



                    <div class="row">
                        @foreach ($lagus as $lagu)
                            <div class="col-12 col-md-6 mb-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>{{ $lagu->judul }}</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('song.edit', $lagu->id) }}" class="btn btn-icon btn-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $lagu->id }}').submit();"
                                                class="btn btn-icon btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            <form action="{{ route('song.destroy', $lagu->id) }}" method="POST"
                                                id="delete-form-{{ $lagu->id }}" style="display:none;">
                                                @csrf @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Penyanyi:</strong> {{ $lagu->penyanyi }}</p>

                                        @php
                                            $mood = strtolower($lagu->category->name);
                                            $badgeClass = match ($mood) {
                                                'sedih' => 'badge-primary',
                                                'happy' => 'badge-success',
                                                'galau', 'bingung', 'campur aduk' => 'badge-warning',
                                                'marah' => 'badge-danger',
                                                'tenang', 'chill' => 'badge-secondary',
                                                default => 'badge-light',
                                            };
                                        @endphp

                                        <p>
                                            <strong>Kategori Mood:</strong>
                                            <span class="badge {{ $badgeClass }}">{{ $lagu->category->name }}</span>
                                        </p>

                                        <audio controls style="width: 100%;">
                                            <source src="{{ asset('storage/' . $lagu->file) }}" type="audio/mpeg">
                                            Browser kamu tidak mendukung pemutar audio.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
