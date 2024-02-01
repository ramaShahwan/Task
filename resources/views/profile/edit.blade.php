{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html>

<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

<style>

body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
      
    background: linear-gradient(to right, #2bd8bc, #9de998);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}



</style>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
            
                                   <div class="col-xl-6 col-md-12">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img src="{{asset('img/profile.jpg')}}" class="img-radius" alt="User-Profile-Image" width="150px" height="150px">
                                                                   
                                                                </div>
                                                                <h2 class="text-lg font-medium text-gray-900">
                                                                    {{ __('Profile Information') }}
                                                                </h2>
                                                                
                                                             <x-input-label for="name" :value="old('name', $user->name)" /><br><br>
                                                             <x-input-label for="name" :value="old('email', $user->email)" /><br><br>
                                                                
                                                        
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h2 class="m-b-20 p-b-5 b-b-default f-w-600">Update your account's profile</h2>
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <x-input-label for="name" :value="__('Name')" /><br>
                                                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                                    </div>
                                                                   <br><br>
                                                                    <div>
                                                                        <x-input-label for="email" :value="__('Email')" /><br>
                                                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                            
                                                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                                            <div>
                                                                                <p class="text-sm mt-2 text-gray-800">
                                                                                    {{ __('Your email address is unverified.') }}
                                                            
                                                                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                                        {{ __('Click here to re-send the verification email.') }}
                                                                                    </button>
                                                                                </p>
                                                            
                                                                                @if (session('status') === 'verification-link-sent')
                                                                                    <p class="mt-2 font-medium text-sm text-green-600">
                                                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                                                    </p>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="flex items-center gap-4">
                                                                        {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}
                                                            
                                                                        <button style="border:none; border-radius: 3px; padding:10px; background-color:#30caa0; color:white">{{ __('Save') }}</button>


                                                                        @if (session('status') === 'profile-updated')
                                                                            <p
                                                                                x-data="{ show: true }"
                                                                                x-show="show"
                                                                                x-transition
                                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                                class="text-sm text-gray-600"
                                                                            >{{ __('Saved.') }}</p>
                                                                        @endif
                                                                    </div>
                                                                   
                                                                </div>
                                                            
                                                              
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                          
                                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                                @csrf
                                                @method('put')
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                <h2 class="m-b-20 p-b-5 b-b-default f-w-600">Update your password</h2>
                                                <div>
                                                    <x-input-label for="update_password_current_password" :value="__('Current Password')" /><br>
                                                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                </div>
                                                <br><br>
                                                <div>
                                                    <x-input-label for="update_password_password" :value="__('New Password')" /><br>
                                                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                </div>
                                                <br><br>
                                                <div>
                                                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" /><br>
                                                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                </div>
                                                <br><br>
                                                <div class="flex items-center gap-4">
                                                    <button  style=" border:none; border-radius: 3px; padding:10px; background-color:#30caa0; color:white">{{ __('Save') }}</button>
                                                    @if (session('status') === 'password-updated')
                                                        <p
                                                            x-data="{ show: true }"
                                                            x-show="show"
                                                            x-transition
                                                            x-init="setTimeout(() => show = false, 2000)"
                                                            class="text-sm text-gray-600"
                                                        >{{ __('Saved.') }}</p>
                                                    @endif
                                                </div>
                                                    </div>
                                                </div>
                                            </form>


                                            {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> --}}
                                                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="card user-card-full">
                                                        <div class="row m-l-0 m-r-0">
                                                    <h2 class="m-b-20 p-b-5 b-b-default f-w-600">delete your account</h2>
                                                    <h6 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete your account?') }}
                                                    </h6>
                                        
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ __(' Please enter your password to confirm you would like to permanently delete your account.') }}
                                                    </p>
                                        
                                                    <div class="mt-6">
                                                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" /><br>
                                        
                                                        <x-text-input
                                                            id="password"
                                                            name="password"
                                                            type="password"
                                                            class="mt-1 block w-3/4"
                                                            placeholder="{{ __('Password') }}"
                                                        />
                                        
                                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                    </div>
                                        <br>
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')" style=" border-radius: 3px; padding:10px; background-color:#30caa0; color:white; border:none;">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                        
                                                        <x-danger-button class="ms-3" style=" border-radius: 3px; padding:10px; background-color:#30caa0; color:white; border:none;">
                                                            {{ __('Delete Account') }}
                                                        </x-danger-button>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            {{-- </x-modal> --}}
                                             </div>
                                                </div>
                                            </div>