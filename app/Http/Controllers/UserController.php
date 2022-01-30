<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $key = null;
    private $secret = null;
    private $credentials;
    private $tableName = 'students2';

    public function __construct()
    {
        //Establish database connection


    }

    public function establishConnection()
    {
        $this->credentials = new \Aws\Credentials\Credentials($this->key, $this->secret);
        $sdk = new \Aws\Sdk([
            'region' => 'ap-southeast-1',
            'version' => 'latest'
        ]);
        return $sdk->createDynamoDb();
    }

    public function index()
    {
//        $dynamodb = $this->establishConnection();
//        $request = [
//            'TableName' => $this->tableName
//        ];
//        $response = $dynamodb->scan($request);
//return $students =$response['Items']; // this is raw method without eloquent
         $students = Student::all();

        return view('index')->with('students', $students);


//        foreach ($students as $student) {
////            return $student;
//
//            echo  '<tr>
//              <td>'.$student['Name']['S'].'</td>
//              <td>'.$student['Reg']['N'].'</td>
//              <td>'.$student['CreatedAt']['S'].'</td>
//              <td><a href="edit.php?id='.$student['Id']['N'].'"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
//              <a href="delete.php?id='.$student['Id']['N'].'"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>
//              </tr><br>';
//        }
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data =  $request->all();
        $yearMonthDateMicroseconds = Date('Ymd') . round(microtime(true));
        $student = new Student();
        $student->Id = intval($yearMonthDateMicroseconds);
        $student->Name = $data['name'];
        $student->Reg = $data['reg'];
        $student->CreatedAt = now();
//        return $student;
        $student->save();
        return redirect()->route('home')->with('status', 'Added');
    }

    public function edit($id)
    {
         $student = Student::query()->where('Id', intval($id))->first(); // intval is required for type casting
        return view('edit')->with('student', $student);
    }

    public function update(Request $request,$id)
    {
        $data =  $request->all();
        $yearMonthDateMicroseconds = Date('Ymd') . round(microtime(true));
        $student = new Student();
        $attributes = [
            'Id' => intval($id),
            'Name' => $data['name'],
            'Reg' => $data['reg'],
        ];
//        return $student;
        $student->update($attributes);
        return redirect()->route('home')->with('status', 'Updated');
    }

    public function delete($id)
    {
        $student = Student::query()->where('Id', intval($id))->first();
        $student->delete();
        return redirect()->route('home')->with('status', 'deleted');
    }
}
