@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                {{ !empty($data->id) ? 'Edit' : 'Add' }} Candidate
                            </div>
                            @if (!empty($data->id))
                                <div class="col-md-3 float-right">
                                    <a href="{{ route('candidate.create') }}" class="btn btn-outline-primary">Add
                                        Candidate</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form class="form-horizontal" name="adminCandidateForm" id="adminCandidateForm" method="post"
                        action="{{ !empty($data->id) ? route('candidate.update', $data) : route('candidate.store') }}"
                        enctype="multipart/form-data">
                        {{ !empty($data->id) ? method_field('PUT') : method_field('POST') }}
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                        id="first_name" name="first_name" placeholder="Enter First Name"
                                        value="{{ old('first_name', $data->first_name) }}">
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                        id="last_name" name="last_name" placeholder="Enter Last Name"
                                        value="{{ old('last_name', $data->last_name) }}">
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" placeholder="Enter Email" value="{{ old('email', $data->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="mobile_number" class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                        id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number"
                                        value="{{ old('mobile_number', $data->mobile_number) }}">
                                    @error('mobile_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="alternative_mobile" class="col-sm-3 col-form-label">Alternative Mobile
                                    Number</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('alternative_mobile') ? 'is-invalid' : '' }}"
                                        id="alternative_mobile" name="alternative_mobile"
                                        placeholder="Enter Alternative Mobile Number"
                                        value="{{ old('alternative_mobile', $data->alternative_mobile) }}">
                                    @error('alternative_mobile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="linkedin_profile" class="col-sm-3 col-form-label">Linkedin Profile URL</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('linkedin_profile') ? 'is-invalid' : '' }}"
                                        id="linkedin_profile" name="linkedin_profile" placeholder="Enter Linkedin Profile"
                                        value="{{ old('linkedin_profile', $data->linkedin_profile) }}">
                                    @error('linkedin_profile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="hometown" class="col-sm-3 col-form-label">Hometown</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('hometown') ? 'is-invalid' : '' }}"
                                        id="hometown" name="hometown" placeholder="Enter Hometown"
                                        value="{{ old('hometown', $data->hometown) }}">
                                    @error('hometown')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="current_location" class="col-sm-3 col-form-label">Current Location</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('current_location') ? 'is-invalid' : '' }}"
                                        id="current_location" name="current_location" placeholder="Enter Current Location"
                                        value="{{ old('current_location', $data->current_location) }}">
                                    @error('current_location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="experience" class="col-sm-3 col-form-label">Experience</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}"
                                        id="experience" name="experience" placeholder="Enter Experience"
                                        value="{{ old('experience', $data->experience) }}">
                                    @error('experience')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="selection_status" class="col-sm-3 col-form-label">Selection Status</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('selection_status') ? 'is-invalid' : '' }}"
                                        id="selection_status" name="selection_status" placeholder="Enter Selection Status"
                                        value="{{ old('selection_status', $data->selection_status) }}">
                                    @error('selection_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}"
                                        name="type" id="type">
                                        <option value="">Select Type</option>
                                        @foreach (Config::get('constants.type') as $type)
                                            <option value="{{ $type }}"
                                                {{ old('type', $data->type) == $type ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="ctc" class="col-sm-3 col-form-label">CTC</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control {{ $errors->has('ctc') ? 'is-invalid' : '' }}"
                                        id="ctc" name="ctc" placeholder="Enter CTC" value="{{ old('ctc', $data->ctc) }}">
                                    @error('ctc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="expected_ctc" class="col-sm-3 col-form-label">Expected CTC</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('expected_ctc') ? 'is-invalid' : '' }}"
                                        id="expected_ctc" name="expected_ctc" placeholder="Enter Expected CTC"
                                        value="{{ old('expected_ctc', $data->expected_ctc) }}">
                                    @error('expected_ctc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="notice_period" class="col-sm-3 col-form-label">Notice Period</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('notice_period') ? 'is-invalid' : '' }}"
                                        id="notice_period" name="notice_period" placeholder="Enter Notice Period"
                                        value="{{ old('notice_period', $data->notice_period) }}">
                                    @error('notice_period')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="dob" class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-8">
                                    <input type="text" data-provide="datepicker"
                                        class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" id="dob"
                                        name="dob" placeholder="Enter Date of Birth" {{-- value="{{ old('dob', isset($data->dob) ? Carbon\Carbon::createFromFormat('Y-m-d',$data->dob)->format('d/m/Y')) : '' }}"> --}}
                                        value="{{ old('dob', isset($data->dob) ? Carbon\Carbon::createFromFormat('Y-m-d', $data->dob)->format('d/m/Y') : '') }}">
                                    @error('dob')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="maritial_status" class="col-sm-3 col-form-label">Maritial Status</label>
                                <div class="col-sm-8">
                                    <select
                                        class="form-control {{ $errors->has('maritial_status') ? 'is-invalid' : '' }}"
                                        name="maritial_status" id="maritial_status">
                                        <option value="">Select Maritial Status</option>
                                        @foreach (Config::get('constants.maritial_status') as $maritialStatus)
                                            <option value="{{ $maritialStatus }}"
                                                {{ old('maritial_status', $data->maritial_status) == $maritialStatus ? 'selected' : '' }}>
                                                {{ $maritialStatus }}</option>
                                        @endforeach
                                    </select>
                                    @error('maritial_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <div
                                        class="form-check form-check-inline {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input"
                                            {{ old('gender', $data->gender) == 'male' ? 'checked' : '' }} type="radio"
                                            name="gender" id="gender_male" value="male">
                                        <label class="form-check-label" for="gender_male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            {{ old('gender', $data->gender) == 'female' ? 'checked' : '' }} type="radio"
                                            name="gender" id="gender_female" value="female">
                                        <label class="form-check-label" for="gender_female">Female</label>
                                    </div>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="candidate_remarks" class="col-sm-3 col-form-label">Candidate Remarks</label>
                                <div class="col-sm-8">
                                    <textarea name="candidate_remarks" id="candidate_remarks"
                                        class="form-control {{ $errors->has('candidate_remarks') ? 'is-invalid' : '' }}"
                                        cols="30" rows="5"
                                        placeholder="Enter Candidate Remarks">{{ old('candidate_remarks', $data->candidate_remarks) }}</textarea>
                                    @error('candidate_remarks')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="CV_status" class="col-sm-3 col-form-label">CV Status</label>
                                <div class="col-sm-8">
                                    <div
                                        class="form-check form-check-inline {{ $errors->has('CV_status') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input"
                                            {{ old('CV_status', $data->CV_status) == 'In Gmail' ? 'checked' : '' }}
                                            type="radio" name="CV_status" id="CV_status_gmail" value="In Gmail">
                                        <label class="form-check-label" for="CV_status_gmail">In Gmail</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            {{ old('CV_status', $data->CV_status) == 'In PC' ? 'checked' : '' }}
                                            type="radio" name="CV_status" id="CV_status_pc" value="In PC">
                                        <label class="form-check-label" for="CV_status_pc">In PC</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            {{ old('CV_status', $data->CV_status) == 'No CV' ? 'checked' : '' }}
                                            type="radio" name="CV_status" id="CV_status_no" value="No CV">
                                        <label class="form-check-label" for="CV_status_no">No CV</label>
                                    </div>
                                    @error('CV_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="technicals" class="col-sm-3 col-form-label">Technicals</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('technicals') ? 'is-invalid' : '' }}"
                                        id="technicals" name="technicals" placeholder="Enter Technicals"
                                        value="{{ old('technicals', $data->technicals) }}">
                                    @error('technicals')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="practicals" class="col-sm-3 col-form-label">Practicals</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control {{ $errors->has('practicals') ? 'is-invalid' : '' }}"
                                        id="practicals" name="practicals" placeholder="Enter Practicals"
                                        value="{{ old('practicals', $data->practicals) }}">
                                    @error('practicals')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="interviewer_remarks" class="col-sm-3 col-form-label">Interviewer
                                    Remarks</label>
                                <div class="col-sm-8">
                                    <textarea name="interviewer_remarks" id="interviewer_remarks"
                                        class="form-control {{ $errors->has('interviewer_remarks') ? 'is-invalid' : '' }}"
                                        cols="30" rows="5"
                                        placeholder="Enter Interviewer Remarks">{{ old('interviewer_remarks', $data->interviewer_remarks) }}</textarea>
                                    @error('interviewer_remarks')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="reset" class="btn btn-outline-warning float-end">Reset</button>
                                    <button type="submit" class="btn btn-outline-success float-end mx-2">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dob').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true
            });
        });
    </script>
@endpush
