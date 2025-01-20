@extends('layouts.apps')
@section('title', 'Admin Login')
@section('content')

<style>
    .container {
        width: 100%;

    }

    .card {
        width: 100%;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s ease-in-out;
        outline: none;
        color: #333;
    }

    input:focus {
        border-color: #ff4500;
    }

    button {
        background-color: #ff4500;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    button:hover {
        background-color: #e63900;
    }
</style>


<div class="container" style="max-width:400px;">
    <div class="card">
        <h2>Admin Login</h2>
        <form action="{{route('admin.login')}}" method="post">
            @csrf
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>



@endsection