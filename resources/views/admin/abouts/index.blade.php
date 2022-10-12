@extends('layouts.admin.app')
@section('title', 'Abouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Abouts /</span> All
                    Abouts
                </h4>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Abouts</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($abouts as $i => $about)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $about->title }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.about.edit', $about->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no banners!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
