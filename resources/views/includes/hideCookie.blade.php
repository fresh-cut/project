
@if (!isset($_COOKIE['cookie-agree']) && !isset($_COOKIE['cookie-decline']))

<style>
    #cookie-alert {
        background: #292929;
        color: white;
        position: fixed;
        width: 100%;
        bottom: 0%;
        border-top: 1px solid #e8eaeb;
        font-size: 0.77778rem;
        text-align: center;
        padding: 12px;
        z-index: 3999;
    }
    .agree {
        border: none;
        outline: none;
        background: #facc16;
        border-radius: 25px;
        color: #292929;
        font-weight: 700;
        cursor: pointer;
        padding: 0.3755rem 1.1755rem;
        margin: 0 0.27rem;
    }
    .agree:hover {
        background: #faf3e6;
        color: #292929;
        font-weight: 700;
    }
    .decline {
        border: none;
        outline: none;
        background: #7d818e;
        border-radius: 25px;
        color: #292929;
        font-weight: 700;
        cursor: pointer;
        padding: 0.3755rem 1.1755rem;
        margin: 0 0.27rem;
    }
    .decline:hover {
        background: #faf3e6;
        color: #292929;
        font-weight: 700;
    }
    .cookie {
        color: white;
        text-decoration: underline;
    }
</style>

<script>
    function acceptCookie(obj) {
        var expiryDate=new Date();
        expiryDate.setMonth(expiryDate.getMonth()+12);
        document.cookie="cookie-agree=1; path=/; expires="+expiryDate.toUTCString();
        document.getElementById("cookie-alert").style.display = "none";
    }
    function rejectCookie(obj) {
        var expiryDate=new Date();
        expiryDate.setDate(expiryDate.getDate()+7);
        document.cookie="cookie-decline=1; path=/; expires="+expiryDate.toUTCString();
        document.getElementById("cookie-alert").style.display = "none";
    }
</script>

<div id="cookie-alert">
    This website use cookie.
    We use cookies for internal purposes only to help us to provide you with a better user experience.
    <a class="cookie" href="{{ route('cookies-privacy') }}">Cookie policy</a>
    <div style="margin-top: 10px">
        <a href="javascript:rejectCookie();" class="decline">DECLINE</a>
        <a href="javascript:acceptCookie();" class="agree">ACCEPT</a>
    </div>
</div>
@endif
