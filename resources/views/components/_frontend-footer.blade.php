<footer class="row justify-content-center">
    <header>
        <h2 class="fs-320 text-white text-center lh-1 ff-pmr">as</h2>
    </header>
    <div class="row col-12 col-lg-10">
        <div class="col-12 col-lg-3 text-center text-white">
            <header>
                <h3 class="py-2 ff-rmv">ADDRESS</h3>
            </header>
            <p>500 Terry Francois Street <br>
                San Francisco, CA 94158 <br>
                info@mysite.com <br>
                Tel: 123-456-7890</p>
            <div class="d-flex justify-content-evenly py-4">
                <a class="text-white" href="https://facebook.com"><i class="fs-3 bi bi-facebook"></i></a>
                <a class="text-white" href="https://twitter.com"><i class="fs-3 bi bi-twitter"></i></a>
                <a class="text-white" href="https://instagram.com"><i class="fs-3 bi bi-instagram"></i></a>
            </div>
        </div>
        <div class="lh-1 col-12 col-lg-6 text-center text-white pt-4 pt-lg-0">
            <header>
                <h3 class="py-2 ff-rmv">CONTACT US</h3>
            </header>
            <form action="{{action('App\Http\Controllers\ContactController@store')}}" method="post" class="row text-white">
                @csrf
                @method('POST')
                <div class="col-12 col-lg-6">
                    <input name="name" class="contact-input text-white" placeholder="Name" type="text">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                    <input name="email" class="contact-input mt-2 text-white" placeholder="Email" type="email">
                    @error('email')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                    <input name="phone" class="contact-input mt-2 text-white" placeholder="Phone" type="tel">
                    @error('phone')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12 col-lg-6">
                    <textarea name="message" class="contact-input contact-input-message mt-2 mt-lg-0 text-white"
                              placeholder="Type your Message Here..." type="text" required></textarea>
                    @error('message')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-main-border mt-2 ff-rmv">Submit</button>
                </div>
            </form>
        </div>
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
