{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8" />

 
     <style>
 
* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 22px;
  /* display: grid;  */
  grid-template-columns: 2fr 2fr;
  grid-gap: 10px;
  align-items: center;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #30caa0;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}


  label {
    text-align: left;
  }

     </style>
 
    </head>
     <body>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="container"  style="padding-left: 20%;">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
               
    
                <label for="name"><b>Name</b></label><br>
                <input type="text" placeholder="Enter your name" name="name" id="name" required>
                <br><br>
                <label for="email"><b>Email</b></label><br>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>
                <br><br>
                <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <br><br>
                <label for="password_confirmation"><b>Repeat Password</b></label><br>
                <input type="password" placeholder="Repeat Password" name="password_confirmation" id="password_confirmation" required>
                <br><br>
                <button type="submit" class="registerbtn" style="background-color:#30caa0;">Register</button>

                <div class="center">
                  <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
                </div>
            </div>
          
            
          </form>
        
    </body>
</html>

