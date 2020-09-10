<footer class="content-info">
  <div class="container">
    <div class="row">
      <div class="col-md-3" id="leftFooter">
        @php dynamic_sidebar('footer-left') @endphp
      </div>
      <div class="col-md-6" id="newsletterFooter">
        <h4>Sign up for updates from Courage</h4>
        @include('partials.newsletter-signup')
      </div>
      <div class="col-md-3" id="rightFooter">
        @php dynamic_sidebar('footer-right') @endphp
      </div>
    </div>
  </div>
</footer>

{{-- iFrame Resizer --}}
<script type="text/javascript">iFrameResize({ log:true, checkOrigin:false});</script>