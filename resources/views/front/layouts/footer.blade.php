        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{ asset('design/front/imgs/logo.png') }}">
                            <h4>بنك الدم</h4>
                            <p> {{ mb_strlen($settings->about_app) > 100 ? mb_substr($settings->about_app,0,100) : $settings->about_app }} </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" href="{{ url('/') }}" role="tab" aria-controls="home">الرئيسية</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" href="{{ route('about-app') }}" role="tab" aria-controls="profile">عن بنك الدم</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{ route('posts') }}" role="tab" aria-controls="messages">المقالات</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('donation-requests') }}" role="tab" aria-controls="settings">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('about-us') }}" role="tab" aria-controls="settings">من نحن</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('contact') }}" role="tab" aria-controls="settings">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="{{ $settings->android_url }}" target="_blank">
                                    <img src="{{ asset('design/front/imgs/google1.png') }}">
                                </a>
                                <a href="{{ $settings->ios_url }}" target="_blank">
                                    <img src="{{ asset('design/front/imgs/ios1.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="{{ $settings->fb_url }}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $settings->insta_url }}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $settings->tw_url }}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{ 'https://wa.me/'.$settings->phone }}" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src={{ asset('design/front/js/bootstrap.bundle.js') }}></script>
        <script src="{{ asset('design/front/js/bootstrap.bundle.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

        <!-- Toastr -->
        @jquery
        @toastr_js
        @toastr_render

        <script src="{{ asset('design/front/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('design/front/js/main.js') }}"></script>



        @stack('js')
        @stack('css')

    </body>
</html>
