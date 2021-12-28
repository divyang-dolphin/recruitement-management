<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search =  $request->input('search');
        $dob =  "";
        if (!empty($request->input('dob'))) {
            $dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->format('Y-m-d');
        }

        $candidateObj = Candidate::select(
            '*',
            DB::RAW('CONCAT(first_name," ",last_name) AS full_name'),
        );
        if ($search) {
            $candidateObj->where(function ($query) use ($search) {
                $query->where(DB::RAW('CONCAT(first_name," ",last_name)'), 'like', '%' . $search . '%');
                $query->orWhere('email', 'like', '%' . $search . '%');
                $query->orWhere('mobile_number', 'like', '%' . $search . '%');
                $query->orWhere('current_location', 'like', '%' . $search . '%');
                $query->orWhere('experience', 'like', '%' . $search . '%');
                $query->orWhere('ctc', 'like', '%' . $search . '%');
                $query->orWhere('expected_ctc', 'like', '%' . $search . '%');
            });
        }
        if (!empty($dob)) {
            $candidateObj->where('dob', $dob);
            $dob = Carbon::createFromFormat('Y-m-d', $dob)->format('d/m/Y');
        }
        $candidateObj->sortable();
        $candidateObj = $candidateObj->paginate(10);

        $passData = array(
            'candidates' => $candidateObj,
            'search' => $search,
            'dob' => $dob
        );
        return view('candidate.list', $passData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate)
    {
        $passData = array(
            'data' => $candidate,
        );
        return view('candidate.add', $passData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        try {
            $requestData = $request->all();
            Candidate::create($requestData);
            return redirect(route('candidate.index'))->with('success', 'Candidate added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $passData = array(
            'data' => $candidate
        );
        return view('candidate.show', $passData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $passData = array(
            'data' => $candidate,
        );
        return view('candidate.add', $passData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        try {
            $requestData = $request->all();
            $candidate->update($requestData);
            return redirect(route('candidate.index'))->with('success', 'Candidate updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        try {
            $candidate->delete();
            return redirect(route('candidate.index'))->with('success', 'Candidate deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }
}
