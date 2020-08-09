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
        $students = Student::orderByDesc('created_at')->paginate(3);

        return view('admin.index', compact('students'));
    }

    public function action(Request $request)
    {
//        $search = $request->get('search');
//        $data = Student::where('full_name', 'like', '%' . $search . '%')
////                    ->orWhere('email', 'like', '%' . $search . '%')
//                    ->orderBy('id', 'desc')
//                    ->get();
//        return json_decode($data);
//
            $query = $request->get('search');
            if ($query != '') {
                $data = Student::where('full_name', 'like', '%' . $query . '%')
//                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();

            } else {
                $data = DB::table('student')->orderBy('created_at', 'desc')->get();

            }
            $total_row = $data->count();
            if ($total_row > 0) {
                $output = '';
                foreach ($data as $row) {

                    $output .= '  <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img class="images-studen img img-fluid" src="images/{{$student->images}}" alt="">
                            <div class="form-button">
                                <a href="{{url('.'.admin/'.'.$student->id.'.'/edit'.')}}" class="btn btn-primary button-fix">Chỉnh
                                    Sửa</a>
                                <form action="{{url('.'.admin/'.'.$student->id)}}" class="delete-method" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('.'DELETE'.')}}
                                    <input type="submit" name="submit" class="btn btn-primary button-fix delete-form"
                                           onclick="return confirm(\'Are you sure?\')" value="xóa">
                                </form>
                            </div>
                            <h5 class="card-title name">Họ và tên: {{$student->full_name}}</h5>
                            <h5 class="card-title name">Email: {{$student->email}}</h5>
                            <h5 class="card-title name">Giới tính: {{$student->gender ==0 ?"Nam" :"Nữ"}}</h5>
                            <h5 class="card-title name">Năm
                                sinh: {{date(\'d-m-Y\', strtotime($student->date_of_birth))}}</h5>
                            <h5 class="card-title name">Quê Quán: {{$student->countries->name}}</h5>

                        </div>
                    </div>
                </div>';
                }
            } else {
                $output =
                    '<tr><td align="center" colspan="5">
                    No data Found
                    </td></tr>';
            }
            $data = [
                'table_data' => $output,
            ];

            echo json_encode($data);

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
