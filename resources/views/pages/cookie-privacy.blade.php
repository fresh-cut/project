@extends('template')
@section('main-content')
@section('title')
    {{ settings_translate('footer_cookies_privacy_text', 'Cookies Privacy Policy') }}
@endsection
@section('description'){{settings_translate('footer_cookies_privacy_text', 'Cookies Privacy Policy')}}@endsection

<style>
    p {
        font-size: 14px;
        margin-bottom: 10px;
    }
</style>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="l-drus-article__h1" style="margin-bottom: 10px">Cookies Privacy Policy</h1>
            <p align="justify">
                The Internet pages of the SC CYLEX TEHNOLOGIA INFORMAȚIEI INTERNAȚIONAL SNC use cookies. Cookies are text files that are stored in a computer system via an Internet browser
            </p>
            <p align="justify">
                Many Internet sites and servers use cookies. Many cookies contain a so-called cookie ID. A cookie ID is a unique identifier of the cookie. It consists of a character string through which Internet pages and servers can be assigned to the specific Internet browser in which the cookie was stored. This allows visited Internet sites and servers to differentiate the individual browser of the data’s subject from other Internet browsers that contain other cookies. A specific Internet browser can be recognized and identified using the unique cookie ID.
            </p>
            <p align="justify">
                Through the use of cookies, the SC CYLEX TEHNOLOGIA INFORMAȚIEI INTERNAȚIONAL SNC can provide the users of this website with more user-friendly services that would not be possible without the cookie setting.
            </p>
            <p align="justify">
                By means of a cookie, the information and offers on our website can be optimized with the user in mind. Cookies allow us, as previously mentioned, to recognize our website users. The purpose of this recognition is to make it easier for users to utilize our website. The website user that uses cookies, e.g. does not have to enter access data each time the website is accessed, because this is taken over by the website, and the cookie is thus stored on the user's computer system. Another example is the cookie of a shopping cart in an online shop. The online store remembers the articles that a customer has placed in the virtual shopping cart via a cookie.
            </p>
            <p align="justify">
                The data subject may, at any time, prevent the setting of cookies through our website by means of a corresponding setting of the Internet browser used, and may thus permanently deny the setting of cookies. Furthermore, already set cookies may be deleted at any time via an Internet browser or other software programs. This is possible in all popular Internet browsers. If the data subject deactivates the setting of cookies in the Internet browser used, not all functions of our website may be entirely usable.
            </p>
        </div>
    </div>
</section>
@endsection

