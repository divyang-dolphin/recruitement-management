<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateCommentRequest;
use App\Models\Candidate;
use App\Models\CandidateComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CandidateComment $candidateComment,Candidate $candidate)
    {
        $candidateCommentsObj = CandidateComment::select(
            '*',
        );
        $candidateCommentsObj->with('commentUser');
        $candidateCommentsObj->where('candidate_id',$candidate->id);
        $candidateCommentsObj->orderBy('created_at','desc');
        $candidateCommentsObj = $candidateCommentsObj->get();
        // print '<pre>';
        // print_r($candidateCommentsObj->toArray());
        // print '<pre>';
        // exit;
        $passData = array(
            'data' => $candidateComment,
            'candidateComments' => $candidateCommentsObj,
            'candidate' => $candidate
        );
        return view('candidate-comment.list', $passData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateCommentRequest $request, Candidate $candidate)
    {
        try {
            $requestData = $request->all();
            $requestData['candidate_id'] = $requestData['candidate'];
            $requestData['created_by'] = Auth::id();
            $requestData['updated_by'] = Auth::id();
            CandidateComment::create($requestData);
            return redirect()->back()->with('success', 'Candidate comment added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
