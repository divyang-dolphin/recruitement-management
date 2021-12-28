@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Candidate
                        <a href="{{ route('candidate.create') }}" class="btn btn-outline-primary">Add Candidate</a>
                    </h5>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="" id="configreset">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Find or Search Candidates...!" value="{{ $search }}">
                                    @error('search')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="dob" name="dob"
                                        placeholder="Find or Search Date of Birth...!" value="{{ $dob }}">
                                    @error('search')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-outline-success">Search</button>
                                    <button class="btn btn-outline-warning" id="butReset" name="butReset">Reset</button>
                                </div>
                            </div>
                        </form>
                        <br />
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>Full Name</th> --}}
                                    <th>@sortablelink('full_name', 'Full Name')</th>
                                    <th>@sortablelink('email', 'Email')</th>
                                    <th>@sortablelink('mobile_number', 'Mobile Number')</th>
                                    <th>@sortablelink('current_location', 'Current Location')</th>
                                    <th>@sortablelink('experience', 'Experience')</th>
                                    <th>@sortablelink('ctc', 'CTC')</th>
                                    <th>@sortablelink('expected_ctc', 'Expected CTC')</th>
                                    <th width="9%" class="text-center">@sortablelink('dob', 'Date of Birth')</th>
                                    <th width="13%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($candidates as $key => $candidate)
                                    <tr>
                                        <td>{{ ($candidates->currentpage() - 1) * $candidates->perpage() + $key + 1 }}
                                        </td>
                                        <td>{{ $candidate->full_name }}</td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->mobile_number }}</td>
                                        <td>{{ $candidate->current_location }}</td>
                                        <td>{{ $candidate->experience }}</td>
                                        <td>{{ $candidate->ctc }}</td>
                                        <td>{{ $candidate->expected_ctc }}</td>
                                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $candidate->dob)->format('d/m/Y') }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('candidate.destroy', $candidate) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                <a href="{{ route('candidate.edit', ['candidate' => $candidate->id]) }}"
                                                    class="btn btn-sm btn-outline-success"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('candidate.show', ['candidate' => $candidate->id]) }}"
                                                    class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-sm btn-outline-danger" type="submit"><i
                                                        class="fas fa-trash-alt"></i></button>
                                                <a href="{{ route('candidate-comment.index', ['candidate' => $candidate->id]) }}"
                                                    class="btn btn-sm btn-outline-secondary"><i class="fas fa-comments"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10 text-center">No record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $candidates->links() }}
                        {{-- {!! $candidates->appends(\Request::except('page'))->render() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".alert-success").delay(5000).fadeOut("slow");
            $('#dob').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true
            });

            $('#butReset').click(function() {
                console.log('sdgfssfsdf123');
                $('#search').val(null);
                $('#dob').val(null);
                // $('#configreset')[0].reset();
            });
        });
    </script>
@endpush
