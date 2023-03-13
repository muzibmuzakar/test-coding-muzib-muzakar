@extends('layouts.app')

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pertandingan Baru</h5>
                <div class="card">
                    <div class="card-body">
                        <form action={{ route('pertandingan.store') }} method="POST">
                            @csrf

                            <div id="parents">
                                <div id="parent">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Klub 1</label>
                                                <select class="form-select" name="inputs[0][id_klub_home]"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Klub</option>
                                                    @foreach ($klubs as $klub)
                                                        <option value={{ $klub->klub_id }}>{{ $klub->klub->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_klub_home')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Klub 2</label>
                                                <select class="form-select" name="inputs[0][id_klub_away]"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Klub</option>
                                                    @foreach ($klubs as $klub)
                                                        <option value={{ $klub->klub_id }}>{{ $klub->klub->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_klub_away')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Score 1</label>
                                                <input type="text" class="form-control" name="inputs[0][score_home]">
                                                @error('score_home')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Score 2</label>
                                                <input type="text" class="form-control" name="inputs[0][score_away]">
                                                @error('score_away')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <span class="btn btn-success" id="add">Add</span>
                        </form>
                    </div>
                </div>
                <div class="mt-3 form-text">*Jika Klub tidak ada, silahkan tambahkan terlebih dahulu pada halaman <a
                        href={{ route('klasemen.index') }}>Klasemen</a> sebagai peserta</div>
            </div>
        </div>
    </div>

    <script src={{ asset('/assets/libs/jquery/dist/jquery.min.js') }}></script>
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#parents').append(
                `<div id="parent" class="mt-4 mb-3">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Klub 1</label>
                                <select class="form-select" name="inputs[`+i+`][id_klub_home]" aria-label="Default select example">
                                    <option selected>Pilih Klub</option>
                                    @foreach ($klubs as $klub)
                                        <option value={{ $klub->klub_id }}>{{ $klub->klub->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_klub_home')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Klub 2</label>
                                <select class="form-select" name="inputs[`+i+`][id_klub_away]" aria-label="Default select example">
                                    <option selected>Pilih Klub</option>
                                    @foreach ($klubs as $klub)
                                        <option value={{ $klub->klub_id }}>{{ $klub->klub->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_klub_away')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Score 1</label>
                                <input type="text" class="form-control" name="inputs[`+i+`][score_home]">
                                @error('score_home')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Score 2</label>
                                <input type="text" class="form-control" name="inputs[`+i+`][score_away]">
                                @error('score_away')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <span class="btn btn-sm btn-danger remove-parent-row">remove</span>
                </div>`
            );
        });

        $(document).on('click','.remove-parent-row', function(){
            $(this).parents('#parent').remove();
        });
    </script>
@endsection
