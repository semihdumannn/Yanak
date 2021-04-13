<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();

        $company->truncate();

        $data = [
            'name' => 'Yanak Aluminyum',
            'title' => 'Yanak Aluminyum Ltd. Şti.',
            'email' => 'info@semihduman.com.tr',
            'address' => 'Çakıl Mah. Elbasan Cad. No:61 Çatalca / İstanbul',
            'phone' => '0536 732 80 71',
            'socailMedya' => json_encode([
                'facebook' => 'https://www.facebook.com/alukap.alukap?fref=ts',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ]),
            'seo' => json_encode([
               'meta' => '',
               'gtm' => '',
            ]),
            'mail_host' => 'smtp.mailtrap.io',
            'mail_username' => '217332380696ac',
            'mail_password' => 'e1e0d9d2ab1331',
            'mail_ssl' => 'tls',
            'mail_type' => 'smtp',
            'mail_port' => '2525',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40273.12292422401!2d28.465958714601825!3d41.13835760528671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b545197c5fd235%3A0x246f785a09dd1b86!2sAlukap%20Al%C3%BCminyum!5e0!3m2!1str!2str!4v1581365882604!5m2!1str!2str',
        ];

        $company->create($data);
    }
}
