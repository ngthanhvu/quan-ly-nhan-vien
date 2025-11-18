@extends('layouts.auth')

@section('title', 'Xác minh thất bại')

@section('content')
<div class="w-full max-w-md">
    <!-- Error Icon -->
    <div class="flex justify-center mb-8">
        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
    </div>

    <!-- Title -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Verification Failed</h1>

    <!-- Message -->
    <p class="text-center text-gray-600 mb-8">
        We couldn't verify your email address. The verification link may have expired or is invalid.
    </p>

    <!-- Error Card -->
    <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
        <div class="flex items-start">
            <div class="shrink-0">
                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Verification Error</h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        <li>The verification link may have expired</li>
                        <li>The link may have already been used</li>
                        <li>The link format is incorrect</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Resend Button -->
    <form action="#" method="POST" class="space-y-4">
        @csrf
        <button 
            type="submit" 
            class="w-full bg-orange-500 text-white py-3 rounded-lg font-medium hover:bg-orange-600 transition duration-200"
        >
            Resend Verification Email
        </button>
    </form>

    <!-- Additional Help -->
    <div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-4">
        <p class="text-sm text-gray-700 text-center">
            Need help? 
            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">
                Contact Support
            </a>
        </p>
    </div>

    <!-- Back to Login Link -->
    <div class="text-center mt-6">
        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-800">
            Back to Login
        </a>
    </div>
</div>
@endsection