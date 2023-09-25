<!DOCTYPE html>
<html lang="en">

<head>
@include('clients.components.head')
</head>

<body>

@include('clients.components.header')

@yield('content')
<!-- Footer Start -->
@include('clients.components.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
@include('clients.components.script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnSearch = document.getElementById('search');
    const value = document.getElementById('value');

    btnSearch.addEventListener('click', function () {
        if(value.value !== '') {
            location.href = `/articles?search=${value.value}`
        }
    })
})
</script>
</body>

</html>
