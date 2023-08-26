@extends('layouts.master')
@section('page_title', 'Daftarkan Murid')
@section('content')
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title">Isi data berikut untuk mendaftarkan</h6>

            {!! Qs::getPanelOptions() !!}
        </div>

        <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation"
            action="{{ route('students.store') }}" data-fouc>
            @csrf
            <h6>Data Pribadi</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap: <span class="text-danger">*</span></label>
                            <input value="{{ old('name') }}" required type="text" name="name"
                                placeholder="Nama Lengkap" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat: <span class="text-danger">*</span></label>
                            <input value="{{ old('address') }}" class="form-control" placeholder="Alamat" name="address"
                                type="text" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                placeholder="Email ">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin: <span class="text-danger">*</span></label>
                            <select class="select form-control" id="gender" name="gender" required data-fouc
                                data-placeholder="Pilih Jenis Kelamin">
                                <option value=""></option>
                                <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">Laki-Laki</option>
                                <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="Female">Perempuan
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Handphone:</label>
                            <input value="{{ old('phone') }}" type="text" name="phone" class="form-control"
                                placeholder="">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Handphone Orang Tua:</label>
                            <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control"
                                placeholder="">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Lahir :</label>
                            <input name="dob" value="{{ old('dob') }}" type="text" class="form-control date-pick"
                                placeholder="Pilih Tanggal Lahir">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nal_id">Provinsi : <span class="text-danger">*</span></label>
                            <select data-placeholder="Pilih Provinsi" required name="nal_id" id="nal_id"
                                class="select-search form-control">
                                <option value=""></option>
                                @foreach ($nationals as $nal)
                                    <option {{ old('nal_id') == $nal->id ? 'selected' : '' }}
                                        value="{{ $nal->id }}">{{ $nal->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="state_id">Kabupaten : <span class="text-danger">*</span></label>
                        <select onchange="getLGA(this.value)" required data-placeholder="Pilih Kabupaten"
                            class="select-search form-control" name="state_id" id="state_id">
                            <option value=""></option>
                            @foreach ($states as $st)
                                <option {{ old('state_id') == $st->id ? 'selected' : '' }} value="{{ $st->id }}">
                                    {{ $st->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="lga_id">Kecamatan : <span class="text-danger">*</span></label>
                        <select required data-placeholder="Pilih terlebih dahulu Kabupaten"
                            class="select-search form-control" name="lga_id" id="lga_id">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bg_id">Golongan Darah : </label>
                            <select class="select form-control" id="bg_id" name="bg_id" data-fouc
                                data-placeholder="Pilih Golongan Darah">
                                <option value=""></option>
                                @foreach (App\Models\BloodGroup::all() as $bg)
                                    <option {{ old('bg_id') == $bg->id ? 'selected' : '' }}
                                        value="{{ $bg->id }}">{{ $bg->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="d-block">Upload Foto Identitas :</label>
                            <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo"
                                class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Mendukung Format: jpeg, png. Max file size 2Mb</span>
                        </div>
                    </div>
                </div>

            </fieldset>

            <h6>Student Data</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="my_class_id">Kelas: <span class="text-danger">*</span></label>
                            <select onchange="getClassSections(this.value)" data-placeholder="Pilih Kelas" required
                                name="my_class_id" id="my_class_id" class="select-search form-control">
                                <option value=""></option>
                                @foreach ($my_classes as $c)
                                    <option {{ old('my_class_id') == $c->id ? 'selected' : '' }}
                                        value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="section_id">Tingkat Kelas : <span class="text-danger">*</span></label>
                            <select data-placeholder="Pilih Kelas Terlebih dahulu" required name="section_id"
                                id="section_id" class="select-search form-control">
                                <option {{ old('section_id') ? 'selected' : '' }} value="{{ old('section_id') }}">
                                    {{ old('section_id') ? 'Selected' : '' }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="my_parent_id">Orang Tua : </label>
                            <select data-placeholder="Pilih Orang Tua" name="my_parent_id" id="my_parent_id"
                                class="select-search form-control">
                                <option value=""></option>
                                @foreach ($parents as $p)
                                    <option {{ old('my_parent_id') == Qs::hash($p->id) ? 'selected' : '' }}
                                        value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="year_admitted">Tahun Didaftarkan : <span class="text-danger">*</span></label>
                            <select data-placeholder="Pilih Tahun" required name="year_admitted" id="year_admitted"
                                class="select-search form-control">
                                <option value=""></option>
                                @for ($y = date('Y', strtotime('- 10 years')); $y <= date('Y'); $y++)
                                    <option {{ old('year_admitted') == $y ? 'selected' : '' }}
                                        value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="dorm_id">Ruangan: </label>
                        <select data-placeholder="Pilih Ruang" name="dorm_id" id="dorm_id"
                            class="select-search form-control">
                            <option value=""></option>
                            @foreach ($dorms as $d)
                                <option {{ old('dorm_id') == $d->id ? 'selected' : '' }} value="{{ $d->id }}">
                                    {{ $d->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Ruangan:</label>
                            <input type="text" name="dorm_room_no" placeholder="No Ruangan" class="form-control"
                                value="{{ old('dorm_room_no') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sport House:</label>
                            <input type="text" name="house" placeholder="Sport House" class="form-control"
                                value="{{ old('house') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Penerimaan:</label>
                            <input type="text" name="adm_no" placeholder="Admission Number" class="form-control"
                                value="{{ old('adm_no') }}">
                        </div>
                    </div>
                </div>
            </fieldset>

        </form>
    </div>
@endsection
