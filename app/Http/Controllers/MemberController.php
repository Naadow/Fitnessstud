<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;


class MemberController extends Controller
{
    public function index()
    {
        return Member::get();
    }

    public function store(Request $request)
    {
        $member = new \App\Member();
        $member-> firstname = $request->firstname;
        $member -> lastname = $request->lastname;
        $member->birthday = $request->birthday;
        $member->save();
        return Member::get();
    }



}
