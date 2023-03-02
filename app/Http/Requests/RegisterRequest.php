<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * @OA\RequestBody(
     *     request="RegisterRequest", required=true,
     *     description="Register users.",
     *     @OA\MediaType(
     *         mediaType="application/x-www-form-urlencoded",
     *         @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="name", type="string", example="UserName",
     *                  description="The user name."
     *              ),
     *              @OA\Property(
     *                  property="email", type="string", example="UserEmail",
     *                  description="The user email."
     *              ),
     *            @OA\Property(
     *                  property="phone", type="string", example="UserPhone",
     *                  description="The user phone."
     *              ),
     *             @OA\Property(
     *                  property="password", type="string", example="UserPassword",
     *                  format="password",
     *                  description="The user password."
     *              ),
     *              @OA\Property(
     *                  property="password_confirmation", type="string", example="UserConfirmationPassword",
     *                  format="password",
     *                  description="The user password confirmation."
     *              ),
     *              required={"name","email", "phone", "password"}
     *         )
     *     )
     * )
     *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users,email',
            'phone'    => 'required|string|unique:users,phone|regex:/^\s?(\+\s?7)([- ()]*\d){10}$/',
            'password' => 'required|string|confirmed|regex:/^(?=.*[A-Za-z])(?=.*[a-z])(?=.*[A-Z])(?=.*[$%&!:]).{6,}/',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

}
