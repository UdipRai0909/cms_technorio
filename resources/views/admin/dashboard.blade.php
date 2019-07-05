@extends('layouts.app')

@section('content')

    <div class="row pt-5">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>All Posts</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-chat-33 text-primary"></i>
                        {{ $posts_count }}
                        <a href="{{ route('posts') }}">
                            <span class="display-4">{{ _('posts') }}</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>Contributors</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-single-02 text-info"></i>
                        {{ $users_count }}
                        <a href="{{ route('users') }}">
                            <span class="display-4">{{ _('users') }}</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>Categories</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-send text-success"></i>
                        {{ $categories_count }}
                        <a href="{{ route('categories') }}">
                            <span class="display-4">{{ _('catg.') }}</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>Tags</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-tag text-success"></i>
                        {{ $tags_count }}
                        <a href="{{ route('tags') }}">
                            <span class="display-4">{{ _('tags') }}</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>Latest posts</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-tag text-success"></i>
                        {{ $posts -> count() }}
                        <a href="{{ route('posts') }}">
                            <span class="display-4">{{ _('recent') }}</span>
                        </a>
                    </h3>
                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <u><lead>All Trash</lead></u>
                    <h3 class="card-title display-2 pt-3 pb-3">
                        <i class="tim-icons icon-trash-simple text-success"></i>
                        {{ $trashes_count }}
                        <a href="{{ route('posts.trashed') }}">
                            <span class="display-4">{{ _('trash') }}</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });
    </script>
@endpush
