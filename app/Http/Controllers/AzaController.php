<?php

namespace App\Http\Controllers;

use App\Models\Aza;
use App\Models\AzaType;

use App\Models\Profile;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class AzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('create an account using', $request->except('_token'));
        // generate aza num. profile info is from the user.
        // balance and status have default values from the db
        $fresh_aza_no = $this->generateAzaNum();

        // obtain the account_type_id from the account_type field given in the request
        $aza_type_id = AzaType::where('name', $request->aza_type)->first()->id;

        // link a profile to aza
        $user_profile_link_created = auth()->user()->profile()->create([
            'fname' => auth()->user()->name,
            'user_email' => auth()->user()->email
        ]);
        // dd($user_profile_link_created);
        // link a user to aza
        if ($user_profile_link_created) {
            return (auth()->user()->azas()->create([
                'num' => $fresh_aza_no, 'aza_type_id' => $aza_type_id
            ]))
                ?  back()->with('success', 'Account Created Successfully')
                :  back()->with('danger', 'Oops! Please Try Again..');
        } else {
            return back()->with('danger', 'Error! User Profile could not be Created..');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function show(Aza $aza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function edit(Aza $aza)
    {
        return view('admin.accounts.edit', compact('aza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aza $aza)
    {
        // we're only allowed to edit d status of an account,hence we extract only the status
        if ($updated = $aza->update(['status' => $request->status ?? $aza->status]))
            return ( $aza->wasChanged('status'))
                ? back()->with('success', "Account Updated Successfully")
                : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aza $aza)
    {
        if ($aza->balance <= 0) {
            return ($deleted  = $aza->delete())
                ? back()->with('success', "$aza->num deleted Successfully")
                : back()->with('warning', 'Oops! Something went wrong. Please Try again');
        } else {
            back()->with('warning', 'Oops! Account Removal Failed : Account has funds in it');
        }
    }




    // Helpers
    private function generateAzaNum(): string
    {
        $first_number = rand(0, 2);
        $other_9_digits = rand(0, 999999999);
        return $aza_num = $first_number . $other_9_digits;
    }












    // ====================================================================================

    /**
     * View the profile for this account.
     *
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function profile(Aza $aza, Request $request)
    {
        return view('admin.profile');
    }



    /**
     * Update the profile for this account.
     *
     * @param  \App\Models\Aza  $aza
     * @return \Illuminate\Http\Response
     */
    public function profile_store(Aza $aza, Request $request)
    {
        // return 'update this user profile';
        foreach ($request->all() as $key => $val) {
        }

        // dd($request->all());
        $authUser = auth()->user();

        $userFormData = $request->except('_token', '_method');

        //   no need to validate this request

        // update the user profile using fresh data
        $authUser->profile()->update($userFormData);
        return back()->with('success', 'Profile updated');
        dd($userFormData, $authUser->profile);
    }
}
