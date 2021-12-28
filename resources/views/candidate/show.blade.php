@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                Show Candidate
                            </div>
                            <div class="col-md-3 float-right">
                                <a href="{{ route('candidate.create') }}" class="btn btn-outline-primary">Add Candidate</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->full_name }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->email }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="mobile_number" class="col-sm-3 col-form-label">Mobile Number :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->mobile_number }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="alternative_mobile" class="col-sm-3 col-form-label">Alternative Mobile
                                Number :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->alternative_mobile }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="linkedin_profile" class="col-sm-3 col-form-label">Linkedin Profile URL :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->linkedin_profile }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="hometown" class="col-sm-3 col-form-label">Hometown :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->hometown }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="current_location" class="col-sm-3 col-form-label">Current Location :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->current_location }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="experience" class="col-sm-3 col-form-label">Experience :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->experience }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="selection_status" class="col-sm-3 col-form-label">Selection Status :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->selection_status }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label">Type :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->type }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="ctc" class="col-sm-3 col-form-label">CTC :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->ctc }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="expected_ctc" class="col-sm-3 col-form-label">Expected CTC :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->expected_ctc }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="notice_period" class="col-sm-3 col-form-label">Notice Period :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->notice_period }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="dob" class="col-sm-3 col-form-label">Date of Birth :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ isset($data->dob) ? Carbon\Carbon::createFromFormat('Y-m-d', $data->dob)->format('d/m/Y') : '' }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="maritial_status" class="col-sm-3 col-form-label">Maritial Status :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->maritial_status }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-3 col-form-label">Gender :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->gender }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="candidate_remarks" class="col-sm-3 col-form-label">Candidate Remarks :</label>
                            <div class="col-sm-8 col-form-label">
                                {!! $data->candidate_remarks !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="CV_status" class="col-sm-3 col-form-label">CV Status :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->CV_status }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="technicals" class="col-sm-3 col-form-label">Technicals :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->technicals }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="practicals" class="col-sm-3 col-form-label">Practicals :</label>
                            <div class="col-sm-8 col-form-label">
                                {{ $data->practicals }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="interviewer_remarks" class="col-sm-3 col-form-label">Interviewer
                                Remarks :</label>
                            <div class="col-sm-8 col-form-label">
                                {!! $data->interviewer_remarks !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
