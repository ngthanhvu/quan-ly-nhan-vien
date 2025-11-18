@extends('layouts.auth')

@section('title', 'Verification Successful')

@section('content')
    <div class="w-full max-w-md">
        <!-- Success Icon -->
        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Verification Successful!</h1>

        <!-- Message -->
        <p class="text-center text-gray-600 mb-8">
            Your email has been successfully verified. You can now access all features of your account.
        </p>

        <!-- Success Card -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-8">
            <div class="flex items-start">
                <div class="shrink-0">
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">Account Verified</h3>
                    <div class="mt-2 text-sm text-green-700">
                        <p>Your account is now fully activated and ready to use.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continue Button -->
        <a href="/"
            class="block w-full bg-green-600 text-white text-center py-3 rounded-lg font-medium hover:bg-green-700 transition duration-200">
            Continue to Dashboard
        </a>

        <!-- Back to Login Link -->
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-800">
                Back to Login
            </a>
        </div>
    </div>
@endsection
