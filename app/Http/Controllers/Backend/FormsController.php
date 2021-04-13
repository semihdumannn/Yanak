<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormsController extends BackendController
{
    public function index()
    {
        $forms = ContactForm::type(request('type'))
            ->get()
            ->map(function (ContactForm $form) {
                return
                    [
                        'id' => $form->id,
                        'name' => $form->name,
                        'type' => $form->type,
                        'type_name' => $form->typeName($form->type),
                        'email' => $form->email,
                        'message' => $form->message,
                        'status' => $form->status,
                        'log' => json_decode($form->log),
                        'created_at' => $form->created_at
                    ];

            });

        return view('backend.forms.forms', compact('forms'));
    }
}
