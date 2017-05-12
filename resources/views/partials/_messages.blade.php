@if (Session::has('success'))
<center>
<span class="mdl-chip mdl-chip--contact" style="margin: 20px 10px">
    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">!</span>
    <span class="mdl-chip__text">{{Session::get('success')}}</span>
</span>
</center>
@endif
