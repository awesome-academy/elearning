<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 ">
    <!-- Footer Links -->
    <div class="container text-center text-md-left">
    <!-- Grid row -->
        <div class="row">
        <!-- Grid column -->
            <div class="col-md-2 footer-col">
        <!-- Content -->
            <br>
            <img src="{!! Config::get('social.img.url') !!}/logo-footer.fde85fe42f6b.png">
            <div class="footer-language-selector">
                <label for="footer-language-select"><span class="icon fa fa-globe" aria-hidden="true"></span></label>
                <form action="{{ route('switchLang') }}" class="form-lang" method="post">
                <select name="locale" onchange='this.form.submit();'>
                    <option value="en">{{ trans('label.lang.en') }}</option>
                    <option value="vi"{{ Lang::locale() === 'vi' ? 'selected' : '' }}>{{ trans('label.lang.vi') }}</option>
                </select>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- Grid column -->
        <hr class="clearfix w-100 d-md-none">
          <!-- Grid column -->
        <div class="col-md-2 footer-col mx-auto">
        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">FOES</h5>
        <ul class="list-unstyled">
            <li><a href="#!">{{ Lang::get('label.about') }}</a></li>
            <li><a href="#!">FOES {{ Lang::get('label.about') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.affiliates') }}</a></li>
            <li><a href="#!">Open edX </a></li>
            <li><a href="#!">{{ Lang::get('label.careers') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.news') }}</a></li>
        </ul>
        </div>
        <!-- Grid column -->
        <hr class="clearfix w-100 d-md-none">
        <!-- Grid column -->
        <div class="col-md-3 footer-col mx-auto">
        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ Lang::get('label.legal') }}</h5>
        <ul class="list-unstyled">
            <li><a href="#!">{{ Lang::get('label.terms_of_service_&_honor') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.code') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.privacy_policy') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.accessibility_policy') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.trademark_policy') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.sitemap') }}</a></li>
        </ul>
        </div>
        <!-- Grid column -->
        <hr class="clearfix w-100 d-md-none">
        <!-- Grid column -->
        <div class="col-md-2 footer-col mx-auto">
        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ Lang::get('label.connect') }}</h5>
        <ul class="list-unstyled">
            <li><a href="#!">{{ Lang::get('label.blog') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.contact_us') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.help_center') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.media_kit') }}</a></li>
            <li><a href="#!">{{ Lang::get('label.donate') }}</a></li>
        </ul>
        </div>
        <!-- Grid column -->
        <div class="col-md-3 footer-col mx-auto">
        <!-- Links -->
        <ul class="list-inline footer-li">
            <li>
                <a href="#" class="social-links external" title="Facebook" rel="noreferrer">
                <span class="fab fa-2x fa-facebook-square" aria-hidden="true"></span></a>
            </li>
            <li>
                <a href="#" class="social-links external" title="Twitter" rel="noreferrer">
                <span class="fab fa-2x fa-twitter-square" aria-hidden="true"></span></a>
            </li>
            <li>
                <a href="#" class="social-links external" title="Youtube" rel="noreferrer">
                <span class="fab fa-2x fa-youtube-square" aria-hidden="true"></span></a>
            </li>
            <li>
                <a href="#" class="social-links external" title="LinkedIn" rel="noreferrer">
                <span class="fab fa-2x fa-linkedin" aria-hidden="true"></span></a>
            </li>
            <li>
                <a href="#" class="social-links external" title="Google+" rel="noreferrer">
                <span class="fab fa-2x fa-google-plus-square" aria-hidden="true"></span></a>
            </li>
            <li>
                <a href="#" class="social-links external" title="Reddit" rel="noreferrer">
                <span class="fab fa-2x fa-reddit-square" aria-hidden="true"></span></a>
            </li>
        </ul>
        <div class="footer-li">
            <img src="{!! Config::get('social.img.url') !!}/app_store_badge_135x40.d0558d910630.svg">&nbsp;
            <img src="{!! Config::get('social.img.url') !!}/google_play_badge_45.6ea466e328da.png">
        </div>
        <p class="copyright"><br>© 2012–2019 FOES Inc. <br>FOES, Open Edu, and Framgia are registered trademarks of edX Inc.</p>
      </div>
    </div>
        <!-- Grid row -->
  </div>
  <br>
</div>
</footer>
