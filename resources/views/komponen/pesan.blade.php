<!-- //deteksi error -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
        <li>
            {{ $item }}
        </li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::get('success'))

<div class="alert alert-success">{{ Session::get('success') }}</div>
<!-- <script src="sweetalert2.all.min.js"></script>
<script>
    Swal.fire('Any fool can use a computer')
</script> -->
@endif