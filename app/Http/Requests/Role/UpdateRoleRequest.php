<?php

namespace App\Http\Requests\Role;

use App\Models\ManagementAccess\Role;
// use Gate
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

//rule ini hanya untuk update request
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //create middleware from kernel at here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('role')->ignore($this->role),],
        ];
    }
}
