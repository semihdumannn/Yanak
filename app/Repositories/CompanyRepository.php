<?php


namespace App\Repositories;


use App\Models\Company;

class CompanyRepository
{
    public function all()
    {
        return Company::all()
            ->map(function ($company) {
                return [
                    'name' => $company->name,
                    'title' => $company->title,
                    'email' => $company->email,
                    'address' => $company->address,
                    'phone' => $company->phone,
                    'socailMedya' => json_decode($company->socailMedya, true),
                    'seo' => json_decode($company->seo, true),
                    'maps' => $company->maps,
                    'mail_host' => $company->mail_host,
                    'mail_username' => $company->mail_username,
                    'mail_password' => $company->mail_password,
                    'mail_port' => $company->mail_port,
                    'mail_ssl' => $company->mail_ssl,
                    'mail_type' => $company->mail_type
                ];
            })
            ->toArray();
    }

    public function update($data)
    {
        $company = Company::find(1);
        try {
            $company->update($data);
            session()->flash('result','success');
            session()->flash('message','İşlem Başarılı');
        }catch (\Exception $exception)
        {
            throwException($exception->getMessage());
        }

    }
}