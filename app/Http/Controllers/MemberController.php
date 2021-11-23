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
        $member-> firstname = "Test";
        $member -> lastname = "Test";
        $member->birthday = "24.01.2001";
        $member->save();
    }
}
