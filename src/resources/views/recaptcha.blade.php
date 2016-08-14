<div class="g-recaptcha" data-sitekey="{{ $public_key }}" {!! $options !!}></div>
<script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js{{ isset($lang) ? '?hl=' . $lang : '' }}"></script>