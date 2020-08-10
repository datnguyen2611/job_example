<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\EditRequest;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderByDesc('created_at')->paginate(10);

        return view('admin.index', compact('students'));
    }

    public function action(Request $request)
    {
        $search = $request->get('search');
        $data = Student::where('full_name', 'like', '%' . $search . '%')
//                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->get()->paginate(10);
        return json_decode($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
//        dd($request->all());
        if (!$request->hasFile('images')) {
            $request['images'] = 'default.png';

        }
        $name = $request->file('images')->getClientOriginalName();
        $request->file('images')->move('images', $name);
        $request['images'] = $name;
        $upload = Student::create([
            'images' => $name,
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'date_of_birth' => $request['birth-date'],
            'country_id' => $request['country_code']
        ]);
//        dd($request);
//        $create = Student::create($request);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        $countries = Country::all();
        return view('admin.edit', compact(['students', 'countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
//        dd($request->images);
        $stundent = Student::findOrFail($id);
        $getRequest = $request->all();
        if (!$request->hasFile('images')) {
            $request['images'] = 'default.png';

        }
        $name = $request->file('images')->getClientOriginalName();
        $request->file('images')->move('images', $name);
        $request['images'] = $name;
        $upload = ([
            'images' => $name,
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'date_of_birth' => $request['birth-date'],
            'country_id' => $request['country_code']
        ]);
        $stundent->update($upload);
        return redirect('admin')->with('success', 'your item has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrfail($id);
        $students->delete();
        return redirect('/admin');
    }
}
