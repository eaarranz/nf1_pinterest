<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Traits\ApiResponses;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PinsController extends Controller
{
    use ApiResponses;

    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['create', 'update']]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $pinValidator = Validator::make($data, [
           'name' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string','max:255'],
        ]);

        if(!$pinValidator->validate()) {
           $errors = $pinValidator->errors()->getMessages();
           return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $pin = Pin::create([
            'id' => Pin::generateID(),
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
            'content' => ""
        ]);

        return $this->successResponse($pin, Response::HTTP_CREATED);
    }
}
