<footer class="py-2 bg-dark">
    <div class="container">
        <div class="row align-items-center">
            @allSetting($setting->whatsapp,$setting->facebook,$setting->instegram)
            <div class="col-md-8 text-white my-4">
                <h5 class="text-center">Contact Us</h5>
                <div class="row text-center">
                    @whatsapp($setting->whatsapp)
                    <span class='col-sm'>
                        <span class="footer-icon"><i class="fab fa-whatsapp"></i></span>
                        <span>{{$setting->whatsapp}}</span>
                    </span>
                    @endwhatsapp
                    {{-- ----------------------------------- --}}
                    @facebook($setting->facebook)
                    <span class='col-sm'>
                        <span class="footer-icon"><i class="fab fa-facebook"></i></span>
                        <span><a href="https://facebook.com/{{$setting->facebook}}" class='text-light'>{{$setting->facebook}}</a></span>
                    </span>
                    @endfacebook
                    {{-- ----------------------------------- --}}
                    @instagram($setting->instegram)
                    <span class='col-sm'>
                        <span class="footer-icon"><i class="fab fa-instagram"></i></span>
                        <span>{{$setting->instegram}}</span>
                    </span>
                    @endinstagram
                </div>
            </div>
            <div class="col-md-4  my-4">
            @else
            <div class="col-md my-4">
            @endallSetting

                <p class="m-0 text-center text-white ">Copyright &copy; Your Website {{date('Y')}}</p>
            </div>
        </div>
    </div>
    <!-- /.container -->
</footer>
