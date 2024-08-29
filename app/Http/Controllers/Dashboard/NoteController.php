<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Users;
use App\Repositories\INoteRepository;
use App\Repositories\IUserRepository;
use App\Requests\dashboard\StoreNoteRequest;
use App\Requests\dashboard\UpdateNoteRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private $noteRepository  , $userRepository;

    public function __construct(INoteRepository $noteRepository   ,IUserRepository $userRepository){

        $this->noteRepository = $noteRepository;
        $this->userRepository = $userRepository;
       
    }

    public function index()
    {
         $notes = $this->noteRepository->getWith(["Users"]);
          return view('dashboard.notes.index' , compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = $this->userRepository->getAllWhere(["user_type" =>  2]);
         return view('dashboard.notes.create'  ,  compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
        $this->noteRepository->create($request->all());
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = $this->noteRepository->findWith($id ,["Users"] )  ;
        $users = $this->userRepository->getAllWhere(["user_type" =>  2]);
        return view('dashboard.notes.edit' , compact(['note'  , 'users' ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoteRequest  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request,$id)
    {
        $this->noteRepository->update($request->validated() , $id);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $this->noteRepository->forceDelete($id);
        return response()->json();
    }

    public function deleteAll(Request $request) {
         $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->noteRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }
}
