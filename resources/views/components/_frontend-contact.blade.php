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
