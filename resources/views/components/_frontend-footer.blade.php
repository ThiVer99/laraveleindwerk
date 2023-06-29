<footer class="row justify-content-center">
    <header>
        <h2 class="fs-320 text-white text-center lh-1 ff-pmr">as</h2>
    </header>
    <div class="row col-12 col-lg-10">
        <div class="col-12 col-lg-3 text-center text-white">
            <header>
                <h3 class="py-2 ff-rmv">ADDRESS</h3>
            </header>
            <p>Pierlapont 82 <br>
                Zedelgem, 8210 <br>
                info@awesomesneakers.com <br>
                Tel: 0471280504</p>
            <div class="d-flex justify-content-evenly py-4">
                <a class="text-white" href="https://facebook.com"><i class="fs-3 bi bi-facebook"></i></a>
                <a class="text-white" href="https://twitter.com"><i class="fs-3 bi bi-twitter"></i></a>
                <a class="text-white" href="https://instagram.com"><i class="fs-3 bi bi-instagram"></i></a>
            </div>
        </div>
        @include('components._frontend-contact')
    </div>
    <p class="text-white text-center py-5">&copy;2022 by Thibo Vervaecke</p>
</footer>
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::flash />
<script src="sweetalert2.all.min.js"></script>
<script crossorigin="anonymous"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>
