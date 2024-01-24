<?php

namespace App\Repository\Users;

use App\Http\Requests\UserRequest;
use App\Interfaces\Users\UserRepositoryInterface;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $user = Auth::user();
        return view('Dashboard.User.profile', compact('user'));
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {

            $user = Auth::user();

            $user->name = $request->name;

            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->company = $request->company;
            $user->commercial_registration = $request->commercial_registration;
            $user->company_email = $request->company_email;
            $user->birthdate = $request->birthdate;
            $user->gender = $request->gender;
            $user->city = $request->city;
            $user->mobile_number = $request->mobile_number;
            $user->landline_number = $request->landline_number;
            $user->website = $request->website;
            $user->facebook_page = $request->facebook_page;
            $user->whatsapp_number = $request->whatsapp_number;
            $user->contact_person = $request->contact_person;

            $user->save();

            // update photo
            if ($request->has('photo')) {
                // Delete old photo
                if ($user->image) {
                    $old_img = $user->image->filename;
                    $this->Delete_attachment('upload_image', 'users/' . $old_img, $request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'users', 'upload_image', $request->id, 'App\Models\User');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
