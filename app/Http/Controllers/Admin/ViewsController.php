<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ModelDetail;
use App\Models\ProfileDetail;
use App\Models\SharePackage;
use App\Models\UserDeposit;
use App\Models\UserWithdrawl;

class ViewsController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.pages.index');
    }

    public function adminUsers()
    {
        $users = User::paginate(20);
        return view('admin.pages.users', compact('users'));
    }

    public function depositsPage()
    {
        $userDeposits = UserDeposit::paginate(20);
        // dd($models);
        return view('admin.pages.user-deposits', compact('userDeposits'));
    }

    public function withdrawsPage()
    {
        $userWithdraws = UserWithdrawl::paginate(20);
        // dd($models);
        return view('admin.pages.user-withdraws', compact('userWithdraws'));
    }

    public function packagesPage()
    {
        $packages = SharePackage::paginate(15);
        // dd($models);
        return view('admin.pages.packages', compact('packages'));
    }

    public function adminQueries()
    {
        $contacts = Contact::paginate(20);
        return view('admin.pages.contacts', compact('contacts'));
    }
}
