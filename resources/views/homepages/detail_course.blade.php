@extends('homepages.master')
@section('title', 'Detail')
@section('content')

<div class="container">
    <div class="dt-header">
        <div class="dt-link">
        <ol id="crumbs" class="clearfix">
            <li class="crumb">
                <a href="/">{{ Lang::get('label.home') }}</a>
            </li>
            <li class="crumb">
                <span>&nbsp; &gt; </span><a href="/course">{{ Lang::get('label.all') }} {{ Lang::get('label.subjects') }}</a>  </li>
            <li class="crumb">
                <span>&nbsp; &gt; </span><a href="#">Education &amp; Teacher Training</a>
            </li>
            <li class="crumb">
                <span>&nbsp; &gt; </span>Teaching Critical Thinking through Art with the National Gallery of Art
            </li>
        </ol> 

        </div>

        <div class="dt-content row">
            <div class="col-md-3">
                <img src="{!! Config::get('social.img.url') !!}/foundations_of_happiness_at_work-318210.jpg">
            </div>
            <div class="col-md-5 dt-name">
                <h3 id="dt-title">Teaching Critical Thinking through Art with the National Gallery of Art</h3>
                <p id="dt-intro">Learn how to integrate works of art using Artful Thinking routines, effective strategies from Project Zero at Harvard University, in this online course for teachers of all levels and subjects.</p>
            </div>
            <div class="col-md-3 dt-action">
                <h6>{{ Lang::get('label.self_paced') }}</h6>
                <button type="button" class="btn btn-success btn-lg btn-block">{{ Lang::get('label.enroll_now') }}</button>
                <div class="dt-confirm">
                    <input type="checkbox" value="true" class="email-opt-in" name="opt-in" id="opt-in-email">
                    <label class="register-emails">{{ Lang::get('label.i_would_like_to_receive_email') }}
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-main row">
        <div class="dt-left col-md-8">
            <h4 class="course-info-heading">{{ Lang::get('label.about_this_course') }}</h4>
            <p>Based on the National Gallery of Art’s popular When you enroll, all the resources you need to strengthen critical thinking skills by using art for your classroom will be immediately available. We recommend that you spend a few hours learning and practicing each section before progressing to the next. The online course environment features over 20 videos and interactive tools: including a zoom tool to examine works of art at full resolution, polls to compare your thoughts with those of other participants, and discussion boards where teachers around the world will share ideas, plans, and results. Authentic lesson demonstration videos model routines led by real classroom and museum educators with students of varying ages. Interview videos provide focal points for teachers on topics like using thinking routines with emerging language learners and making accommodations for all learners. Having access to a global network of educators who, just like you, want to hone their abilities to teach critical thinking skills will be an added and enduring bonus to your course experience.</p>

            <h4 class="course-info-heading">{{ Lang::get('label.what_you_ll_learn') }}</h4>
            <ul>
                <li>How to use <strong>Artful Thinking Routines</strong> to strengthen thinking.</li>
                <li>How to facilitate meaningful conversations in your classroom using art for artful learning and artful teaching.</li>
                <li>How to help learners of all levels develop more discerning descriptions, evidence-based reasoning, and meaningful questioning habits.</li>
                <li>Key strategies for using content information to push original thinking deeper.</li>
                <li>Exciting, immersive activities for any type of classroom.</li>
                <li>How to use learning resources from the National Gallery of Art, including downloadable artful thinking lesson plans</li>
            </ul>

            <a href="#!" class="see-more-cta toggle-display" aria-hidden="true">
                <h5 class="course-info-heading">
                    <i class="far fa-file-alt"></i>{{ Lang::get('label.view_course_syllabus') }}
                </h5>
            </a>
            <h5 class="course-info-heading">{{ Lang::get('label.meet_the_instructor') }}</h5>
            <div class="dt-teacher row">
                @foreach (range(0, 2) as $number)
                <div class="dt-teacher-item col-md-4">
                    <a href="#">
                        <img src="{!! Config::get('social.img.url') !!}/foundations_of_happiness_at_work-318210.jpg">
                        <p class="instructor-name" aria-hidden="true">Julie Carmean</p>
                    </a>
                    <p class="instructor-position">Museum Educator and Coordinator of Professional Development</p>
                    <span class="instructor-org">The National Gallery of Art, Washington</span>                 
                </div>
                @endforeach
            </div>
            <hr>
            <h4 class="course-info-heading">{{ Lang::get('label.pursue_a_verified_certificate') }} ($25 USD)</h4>
            <a href="#"><img src="{!! Config::get('social.img.url') !!}/cert-verified-thumb.png" id="img-degree"></a>
            <div class="dt-degree">
            <ul>
                <li class="media-block">
                    <span class="fa fa-2x fa-rocket" aria-hidden="true"></span>
                    <h4 class="verified-list__title">{{ Lang::get('label.official_and_verified') }}</h4>
                    <p class="verified-list__desc">{{ Lang::get('label.receive_an_instructor-signed') }}</p>
                </li>
                <li class="media-block">
                    <span class="fa fa-2x fa-road" aria-hidden="true"></span>
                    <h4 class="verified-list__title">{{ Lang::get('label.easily_shareable') }}</h4>
                    <p class="verified-list__desc">{{ Lang::get('label.add_the_certificate') }}</p>
                </li>
                <li class="media-block">
                    <span class="fa fa-2x fa-trophy" aria-hidden="true"></span>
                    <h4 class="verified-list__title">{{ Lang::get('label.proven_motivator') }}</h4>
                    <p class="verified-list__desc">{{ Lang::get('label.give_yourself_an_additional') }}</p>
                </li>
                <li class="media-block">
                    <span class="fa fa-2x fa-heart" aria-hidden="true"></span>
                    <h4 class="verified-list__title">{{ Lang::get('label.support_our_mission') }}</h4>
                    <p class="verified-list__desc">{{ Lang::get('label.edx_a_non-profit') }}</p>
                </li>
            </ul>
            </div>
        </div>
        <div class="dt-right col-md-4">
            <ul>
                <li>
                    <span class="far fa-clock fa-lg" aria-hidden="true"></span>{{ Lang::get('label.length') }}:
                    <span class="block-list__desc">6 weeks</span>
                </li>
                <li>
                    <span class="fas fa-tachometer-alt" aria-hidden="true"></span>{{ Lang::get('label.effort') }}:
                    <span class="block-list__desc">3 to 4 hours per week</span>
                </li>
                <li>
                    <span class="fa fa-tag fa-lg" aria-hidden="true"></span>{{ Lang::get('label.price') }}:
                    <span class="block-list__desc">FREE Add a Verified Certificate for $25 USD</span>
                </li>
                <li>
                    <span class="fa fa-university fa-lg" aria-hidden="true"></span>{{ Lang::get('label.institution') }}:
                    <span class="block-list__desc"><a href="#">SmithsonianX</a></span>
                </li>
                <li>
                    <span class="fa fa-graduation-cap fa-lg" aria-hidden="true"></span>{{ Lang::get('label.subjects') }}:
                    <span class="block-list__desc"><a href="#">Education & Teacher Training</a></span>
                </li>
                <li>
                    <span class="fa fa-certificate fa-lg" aria-hidden="true"></span>{{ Lang::get('label.level') }}:
                    <span class="block-list__desc">Introductory</span>
                </li>
                <li>
                    <span class="far fa-comment fa-lg" aria-hidden="true"></span>{{ Lang::get('label.language') }}:
                    <span class="block-list__desc">English</span>
                </li>
                <li>
                    <span class="far fa-file-video fa-lg" aria-hidden="true"></span>{{ Lang::get('label.video_transcripts') }}:
                    <span class="block-list__desc">English</span>
                </li>
            </ul>
        
            <div class="social-share txt-center">
                <p class="course-info-heading sub">{{ Lang::get('label.share_this_course_with_a_friend') }}</p>
                <div class="social-media-sharing">
                <a href="#" class="sm-share-link addthis_button_facebook" title="Facebook">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#" class="sm-share-link addthis_button_twitter" title="Twitter">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" class="sm-share-link addthis_button_linkedin" target="_blank" title="LinkedIn">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                </a>
                <a href="#" class="sm-share-link addthis_button_google_plusone_share">
                    <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                </a>
                <a href="#" class="sm-share-link addthis_button_email" target="_blank" title="Email">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </a>
                <div class="atclear"></div>
                </div>
            </div>
        </div>
    </div>
</div>          
@endsection
