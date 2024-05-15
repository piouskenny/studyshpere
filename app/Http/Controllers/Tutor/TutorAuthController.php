<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use App\Models\TutorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TutorAuthController extends Controller
{
    public function signup()
    {
        return view('Tutor.signup');
    }

    public function addQualification()
    {
        return view('Tutor.addQualification');
    }



    public function create(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);


        $tutor = Tutor::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('tutor_addQualification_page')->with('tutor', $tutor);
    }

    public function uploadQualification(Request $request, $id)
    {
        $user = Tutor::find($id);

        $request->validate([
            'tutor_id' => 'required | integer',
            'degree' => 'required | string',
            'field_specialization' => 'string',
            'years_experience' => 'integer',
            'certification' => 'required|mimes:pdf,docx,jpeg|max:3072'
        ]);


        $certification_name = time() . '-' . $request->certification . '.' . $request->certification->extension();

        $request->certification->move(public_path('course_img'), $certification_name);

        $tutorinfo = TutorInfo::create([
            'tutor_id' => $id,
            'degree' => $request->degree,
            'field_specialization' => $request->field_specialization,
            'years_experience' => $request->years_experience,
            'certification' => $certification_name
        ]);

        return view('Tutor.dashboard')->with('user', $user);

        dd($request->all());
    }

    public function logout()
    {
        $tutorInfo = session()->pull('Tutor');
        Auth::logout();
        return redirect(route('login_page'));
    }
}
