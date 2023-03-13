@extends('layouts.app')

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Klub</h5>
                <div class="card">
                    <div class="card-body">
                        <form action={{ route('klub.update', $klub->id) }} method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label class="form-label">Nama Klub</label>
                                <input type="text" class="form-control" name="name" value={{ $klub->name }}>
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kota Klub</label>
                                <input type="text" class="form-control" name="city" value={{ $klub->city }}>
                                @error('city')
                                    <div>{{ $message }}</div>
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
