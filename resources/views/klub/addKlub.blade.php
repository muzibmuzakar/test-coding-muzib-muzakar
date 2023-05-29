@extends('layouts.app')

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Klub</h5>
                <div class="card">
                    <div class="card-body">
                        <form action={{ route('klub.store') }} method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Klub</label>
                                <input type="text" class="form-control" name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kota Klub</label>
                                <input type="text" class="form-control" name="city">
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
