<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $company = Company::create([
            'name' => $request->name,
        ]);
        $company->addMediaFromRequest('photo')->toMediaCollection('companies');

        return 'Success';
    }

    public function show(Company $company)
    {
        // TASK: retrieve the full URL to the uploaded photo file, using Spatie Media Library

        $photo = Storage::url($company->getFirstMediaUrl('companies'));

        return view('companies.show', compact('company', 'photo'));
    }

}
