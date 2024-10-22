<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Save the plain password before hashing
        $plainPassword = $request->password;

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($plainPassword), // Use Hash facade for password hashing
        ]);

        // Send welcome email with plain password
        Mail::to($user->email)->send(new WelcomeMail($user, $plainPassword));

        // Optionally, you can return a token or some data after registration
        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ], 201);
    }


    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user exists and verify the password
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Create a token for the authenticated user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function change_password(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|integer',
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|different:old_password',
        ]);

        // Find the user by user_id
        $user = User::where('id', $request->user_id)->first();

        // Check if the current password matches the stored password
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'Current password is incorrect',
            ], 400); // Return error if current password doesn't match
        }

        // Update the password if the current password is correct
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Return a success response
        return response()->json([
            'message' => 'Password changed successfully',
            'user' => $user,
        ], 200);
    }

    public function uploadPhoto(Request $request)
    {
        // Validate that the uploaded file is a valid image
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Check if the request has a file for 'photo'
        if ($request->hasFile('photo')) {
            try {
                // Find the user by ID
                $user = User::find($request->user_id);

                // Check if the user already has an avatar
                if ($user->avatar) {
                    // Delete the existing avatar from storage
                    $relativePath = str_replace('/storage/profile_photos/', '', $user->avatar);

                    // Delete the existing avatar from storage
                    // dd($relativePath);
                    Storage::disk('public')->delete($relativePath);
                }
                // Store the uploaded photo in the 'profile_photos' directory within the public disk
                $link = $request->file('photo')->store('profile_photos', 'public');

                // Update the user's avatar path in the database
                $user->avatar = $link;
                $user->save();

                // Return a success response
                return response()->json([
                    'message'   => 'Photo uploaded successfully!',
                    'photo_url' => Storage::url($link), // Generate a URL for the stored photo
                ], 200);
            } catch (\Exception $e) {
                // Handle any exceptions that might occur during file storage
                return response()->json([
                    'message' => 'Error uploading the photo: ' . $e->getMessage()
                ], 500);
            }
        }

        // Return an error if no photo was uploaded
        return response()->json([
            'message' => 'No photo file found in the request'
        ], 400);
    }


    public function profile(Request $request)
    {
        // dd($request->all());

        $user = User::where('id', $request->user_id)->first();
        return response()->json([
            'avatar_link' => $user->avatar,
        ], 200);
        // return response()->json([
        //     'user' => $request->user(),
        // ]);
    }
}
