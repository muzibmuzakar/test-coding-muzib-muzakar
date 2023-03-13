@extends('layouts.app')

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">List Pertandingan</h5>
                    </div>
                    <div>
                        <a href={{ route('pertandingan.create') }} class="btn btn-success m-1">Tambah Pertandingan</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <tbody>
                            @foreach ($pertandingans as $key=>$pertandingan)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $pertandingan->klub_home->name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $pertandingan->score_home }} - {{ $pertandingan->score_away }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $pertandingan->klub_away->name }}</h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
