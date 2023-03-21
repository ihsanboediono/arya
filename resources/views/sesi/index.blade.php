@extends ('layouts/app')

@section ('content')
<!-- //Widht=50, posisi center, memiliki border dan siku rounded, padding horizontal&vertikal=-3, menuju bagian tengah -->
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1> login </h1>
    <form action="/sesi/login" method="post">
        <!-- //menyiapkan inputan hidden, isian token sehingga proses posting data dari form yanng dimiliki     -->
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">email</label>
            <input type="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3" d-grid>
            <button name="submit" type="submit" class="btn btn-primary"> Login </button>

        </div>
    </form>
</div>

@endsection