@extends('layouts.app')

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Peserta</h5>
                <div class="card">
                    <div class="card-body">
                        <form action={{ route('klasemen.store') }} method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Klub</label>
                                <select class="form-select js-example-basic-multiple" name="klub_id[]" multiple="multiple">
                                    @foreach ($klubs as $klub)
                                        <option value={{ $klub->id }}>{{ $klub->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <select class="form-select" name="klub_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($klubs as $klub)
                                        <option value={{ $klub->id }}>{{ $klub->name }}</option>
                                    @endforeach
                                </select> --}}
                                @error('klub_id')
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
    <script src={{ asset('/assets/libs/jquery/dist/jquery.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Pilih Klub',
                allowClear: true
            });
        });
    </script>
@endsection
