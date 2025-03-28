<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:4',
                'age'=> 'required|int',
                'sexe'=> 'required',
                'speciality'=> 'required|string',
                'profile_picture'=> 'nullable|string',
                
            
            ]);
   
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'speciality' => $request->speciality,
                // 'profile_picture' => $request->profile_picture
                'sexe' => $request->sexe,
                'age' => $request->age,
            ]);
 
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'token' => $token
            ], 201);
            
           
            // auth()->login($user);
            // return redirect()->route('login')->with('success', 'Registration successful! Please login.');
 
        } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
                return response()->json(['message' => 'Error creating user : '. $e->getMessage()], 500);
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage())->withInput();
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
    
            // Retourne uniquement JSON (Postman)
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $token
            ], 200);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);

    }
    
    public function profile(Request $request) 
    {
        $user = auth()->user();
        if(!$user) {
            //return redirect()->route('login')->with('error', 'You are not logged in');
            return response()->json(['message' => 'You are not logged in'], 500);
        }
        return response()->json($request->user()); //return response()->json($user, 200);
        
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:users,name,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:4',
                'age' => 'required|integer',
                'sexe' => 'required|string|max:10',
                'speciality' => 'required|string|max:100',
                'profile_picture' => 'nullable|string',
                'biography' => 'nullable|string',
                'year_experience' => 'nullable|integer',
            ]);


            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
            }


            if (!empty($validatedData)) {
                $user->update($validatedData);
            }


            $user->refresh();

            return response()->json([
                'message' => 'User updated successfully',
                'user' => $user
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Database error',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Unexpected error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    

}
