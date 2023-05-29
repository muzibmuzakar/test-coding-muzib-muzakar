<?php use App\Models\Pertandingan; ?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Klasemen</h5>
                        </div>
                        <div>
                            <a href={{ route('klasemen.create') }} class="btn btn-success m-1">Tambah Peserta</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Klub</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Ma</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Me</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">S</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">K</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">GM</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">GK</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Point</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($klasemens as $key => $klasemen)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $key + 1 }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $klasemen->klub->name }}</h6>
                                        <span class="fw-normal">{{ $klasemen->city }}</span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->ma }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->me }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->s }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->k }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->gm }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $klasemen->gk }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4">{{ $klasemen->point }}</h6>
                                    </td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <table>
                        <thead>
                            <tr>
                                <th>Tim</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($klasemens as $clubId => $poin)
                                <tr>
                                    <td>{{ $clubId }}</td>
                                    <td>{{ $poin }}</td>
                                    <td>{{ Pertandingan::calculateGoals($clubId, true) }}</td>
                                    <td>{{ Pertandingan::calculateGoals($clubId, false) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
