@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col s6 offset-s3">
      <h1 class="center">Please Login</h1>

      <form action="/login" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="input-field s12">
            <input type="email" id="email" name="email" class="validate" required>
            <label for="email" data-error="valid email please (e.g. email@coolsite.com)">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            <input type="password" id="password" name="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="form-actions s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
          </div>
        </div>

        @include('layouts.errors')

      </form>
    </div>
  </div>



@endsection
