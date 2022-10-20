<?php

namespace App\Rules;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class validDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $expiration = ProductResource::collection(Product::valid_until());;

        return $expiration > now();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The valid date must be after now';
    }
}
