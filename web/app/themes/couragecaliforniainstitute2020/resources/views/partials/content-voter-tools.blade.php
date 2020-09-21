<section id="top">
    @php the_content() @endphp
</section>

<section id="tools">
    <div class="row">
        <div class="col-lg-4 action-links">
            <a href="#register" class="action-link active">Register to vote</a>
            <a href="#verify" class="action-link">Check your Voter Registration</a>
            <a href="#absentee" class="action-link">Request an Absentee Ballot</a>
            <a href="#reminders" class="action-link">Get Reminders</a>
        </div>
        <div class="col-lg-8 actions">
            <div id="register" class="action active">
                <iframe src="https://register.vote.org/?partner=838814" width="100%" marginheight="0" frameborder="0" id="frame1" scrollable="no"></iframe>
            </div>
            <div id="verify" class="action">
                <iframe src="https://verify.vote.org/?partner=838814" width="100%" marginheight="0" frameborder="0" id="frame2" scrollable="no"></iframe>
            </div>
            <div id="absentee" class="action">
                <iframe src="https://absentee.vote.org/?partner=838814" width="100%" marginheight="0" frameborder="0" id="frame3" scrollable="no"></iframe>
            </div>
            <div id="reminders" class="action">
                <iframe src="https://reminders.vote.org/?partner=838814" width="100%" marginheight="0" frameborder="0" id="frame4" scrollable="no"></iframe>
            </div>
        </div>
    </div>
</section>