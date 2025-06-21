@extends('layouts.app')

@section('title', 'Quote List')

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
                <h1>Quotes</h1>
                <div class="section-header-button">
                    <a href="{{ route('quote.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Add Quote</a>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <h4 class="mr-3 mb-2">Filter by Category</h4>

                        {{-- All Badge --}}
                        <a href="{{ route('quote.index') }}"
                            class="badge badge-pill badge-filter {{ request('filter') == null ? 'badge-dark' : 'badge-light' }}">
                            All
                        </a>

                        {{-- Category Filter Badges --}}
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
                            <a href="{{ route('quote.index', ['filter' => strtolower($kategori->name)]) }}"
                                class="badge badge-pill badge-filter {{ $active ? $warna : 'badge-light' }}">
                                {{ $kategori->name }}
                            </a>
                        @endforeach
                    </div>

                    <div class="card-body p-0">
                        <div class="row col-12">
                            @foreach ($quotes as $quote)
                                <div class="col-12 col-md-6 col-lg-6 mb-4">
                                    <div class="card position-relative shadow-sm border-info">

                                        {{-- Mood Badge --}}
                                        <div class="position-absolute" style="top: 10px; right: 10px;">
                                            @php
                                                $badgeClass = match (strtolower($quote->category->name)) {
                                                    'sedih' => 'badge-primary',
                                                    'happy' => 'badge-success',
                                                    'galau', 'bingung' => 'badge-warning',
                                                    'marah' => 'badge-danger',
                                                    'tenang', 'chill' => 'badge-secondary',
                                                    default => 'badge-info',
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ $quote->category->name }}</span>
                                        </div>

                                        <div class="card-body d-flex flex-column justify-content-between"
                                            style="min-height: 200px;">
                                            <h5 class="font-weight-bold text-dark mb-3" style="font-size: 1.25rem;">
                                                {{ $quote->headline }}</h5>
                                            <p class="text-muted" style="font-size: 1rem;">{{ $quote->isi }}</p>

                                            {{-- Action Buttons --}}
                                            <div class="d-flex justify-content-end mt-4">
                                                <a href="{{ route('quote.edit', $quote->id) }}"
                                                    class="btn btn-success btn-md mr-2 px-4 py-2">
                                                    <i class="far fa-edit mr-1"></i> Edit
                                                </a>
                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $quote->id }}').submit();"
                                                    class="btn btn-danger btn-md px-4 py-2">
                                                    <i class="fa-solid fa-trash mr-1"></i> Delete
                                                </a>
                                                <form action="{{ route('quote.destroy', $quote->id) }}" method="POST"
                                                    id="delete-form-{{ $quote->id }}" style="display: none;">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        {{-- Optional Pagination or Notes --}}
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
