<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->get();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'prodi'=> 'required',
            'kelas'=> 'required',
            'angkatan'=> 'required',
        ]);

        $student = new Student;
        // kiri objek model - kanan dari request
        $student->nama = $request->nama;
        $student->nim = $request->nim;
        $student->prodi = $request->prodi;
        $student->kelas = $request->kelas;
        $student->angkatan = $request->angkatan;

        $student->save();

        return redirect()->route('students')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'prodi'=> 'required',
            'kelas'=> 'required',
            'angkatan'=> 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('students')-> with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = DB::table('students') -> where('id', $id)->delete();
        return redirect() -> route('students');
    }
}
