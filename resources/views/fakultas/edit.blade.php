@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Fakultas</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{route('fakultas.Update')}}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama" value="{{old('nama') ? old ('nama'):$fakultas->nama}}">
                        @error('nama')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="Singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" name="Singkatan"value="{{old('singkatan') ? old ('nama'):$fakultas->singkatan}}}">
                        @error('singkatan')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror
                      </div>
                    </div>
                      <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="dekan" class="form-label">Nama Dekan</label>
                        <input type="text" class="form-control" name="nama"value="{{old('dekan') ? old ('nama'):$fakultas->dekan}}}">
                        @error('dekan')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="wakil_dekan" class="form-label">Wakil Dekan</label>
                        <input type="text" class="form-control" name="Singkatan" value="{{old('wakil_dekan') ? old ('nama'):$fakultas->wakil_dekan}}}">
                        @error('wakil_dekan')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
        </div>
    </div>
    <!--end::Row-->
@endsection