@extends('template')
@section('main-content')
@section('title')
    {{ settings_translate('footer_faq_text', 'FAQ') }}
@endsection
@section('description'){{settings_translate('footer_faq_text', 'FAQ')}}@endsection

<style>
    h1 {
        margin-bottom: 10px;
        font-size: 26px;
    }
    p {
        margin-bottom: 10px;
    }
    b {
        font-weight: bold;
    }
</style>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Frequently asked questions</h1>
            <ol>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(1);">1. What is Cylex Local Search?</p>
                        <div>
                            <div id="id_1" class="hide panel-body">
                                <p align="justify">
                                    S.C. Cylex Tehnologia Informaţiei S.N.C. is registered in Romania and manages online business directories under the brand name of Cylex Local Search.
                                </p>
                                <p align="justify">
                                    Company registrations in our business directories are free and the presentation pages can usually be found in Search Engines within the first ten results.
                                </p>
                                <p align="justify">
                                    Cylex Local Search also displays business directories in other countries - for example, we’re also present in South Africa, Spain, Canada, Australia, Hungary, France, Italy, or the United Kingdom.
                                </p>
                                <p align="justify">
                                    Our directories serve as community portals. Registered companies can upload free video clips, photos, articles, news, products and partnership requests, while users have the opportunity to evaluate the companies and review their products and services.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(2);">2. How can I add my company to Cylex Local Search?</p>
                        <div>
                            <div id="id_2" class="hide panel-body">
                                <p align="justify">
                                    It’s totally free and easy to add a company to our business directory. From the home page, click on the Register button and simply fill in the required fields.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(3);">3. Can I add more branches of the same company to Cylex?</p>
                        <div>
                            <div id="id_3" class="hide panel-body">
                                <p align="justify">
                                    If your company is represented in several places, you can easily add up to 10 branches, using the same registration process. If you have over 10 locations for your company, you can choose between 3 tools we developed to help you easily manage your online business presence.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(4);">4. How can I claim my company?</p>
                        <div>
                            <div id="id_4" class="hide panel-body">
                                <p align="justify">
                                    On your company profile, there is a button called ‘REPORT INCORRECT DATA’. Click on it and from the drop-down list, choose ‘CLAIM THIS BUSINESS’. Then on the next page, choose an email or add a different email account where you will receive step-by-step instructions for creating a user to manage your business profile.
                                </p>
                                <p align="justify">
                                    If you need any help, you can always send us an email at info@cylex-usa.com
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(5);">5. How can I update my business information on Cylex Local Search?</p>
                        <div>
                            <div id="id_5" class="hide panel-body">
                                <p align="justify">
                                    There are two easy ways to update your business details:
                                </p>
                                <ul class="pl-5">
                                    <li type="1">
                                        If you haven’t claimed your listing yet, you can find a button marked ‘REPORT INCORRECT DATA’ on your company profile. Click on it, then, from the drop-down list, choose ‘CLAIM THIS BUSINESS’. On the next page pick an email or add a different email account (during the final step) where you want to receive step-by-step instructions to create a user to manage your business profile.
                                    </li>
                                    <li type="1">
                                        If you have already claimed your listing, you can find a button marked ‘REPORT INCORRECT DATA’ on your company profile. Click on it, then from the drop-down list, choose ' EDIT YOUR PAGE’. Use the email and password you have set when you registered or claimed the listing. In case you don’t remember your login details use the 'Recover password’ button and follow the steps.
                                    </li>
                                </ul>
                                <p align="justify">
                                    If you need any help, you can always send us an email at info@cylex-usa.com
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(6);">6. Why aren’t my updates online?</p>
                        <div>
                            <div id="id_6" class="hide panel-body">
                                <p align="justify">
                                    When using the Report incorrect data function from your company profile page, you have the possibility to ask for your company presentation page to be modified by filling the form. The updated information will be checked by one of our employees, before publishing it online. If your changes are not visible, it means the approval process hasn’t been completed yet.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(7);">7. How can I delete my company from Cylex Local Search?</p>
                        <div>
                            <div id="id_7" class="hide panel-body">
                                <p align="justify">
                                    On your company profile, you can find a button marked ‘REPORT INCORRECT DATA’. Click on it, then from the drop-down list, choose 'Remove listing’. Simply click on the button, fill in the required fields and your business information will be removed from our directory once it is reviewed by one of our operators. The deletion process can only be done by the Cylex staff.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(8);">8. Why is there a difference in search results between companies with a detailed presentation page and companies without any information on their presentation page?</p>
                        <div>
                            <div id="id_8" class="hide panel-body">
                                <p align="justify">
                                    Our business directories offer the same opportunities to every company, so they can present themselves with as little or as much detail as they wish. Companies can specify information about their products, services, opening hours or add a logo, clips or photos. A detailed presentation (company description and list of services and products) translates into better search results within Cylex Local Search and other search engines, such as Google.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(9);">9. Do you have a route planner?</p>
                        <div>
                            <div id="id_9" class="hide panel-body">
                                <p align="justify">
                                    Yes, we do. When you’re on a company’s profile, simply click on the map and a pop-up will open. There you can enter your Starting point and Target destination, and the map will reveal the best route to arrive at your destination.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(10);">10. How do I correct the geographical location of my company on the map?</p>
                        <div>
                            <div id="id_10" class="hide panel-body">
                                <p align="justify">
                                    On your company profile page, using Edit your page or Sign In, you can Correct the location on the map. Drag the red marker into the right place and save.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(11);">11. Why is the location arrow in the wrong place?</p>
                        <div>
                            <div id="id_11" class="hide panel-body">
                                <p align="justify">
                                    The direct link between the map and the company’s address is created by an automated software. It is possible that because of name similarity or the absence of a road on a map, another road with a similar name may be shown instead of the street you wanted. We apologize for the discomfort created.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(12);">12. Why is my company listed in Cylex Local Search if I never added it in this business directory?</p>
                        <div>
                            <div id="id_12" class="hide panel-body">
                                <p align="justify">
                                    Cylex Local Search constantly monitors the public listing of companies on the Internet, which are recorded in our search system according to certain criteria and afterwards displayed as search results. Our business directories value the most important aspects of local search, ensuring that a business’ information is consistent, accurate and accessible throughout the web. In terms of functionality, our directory is not so different than other search engines, like Google, that collects data and displays them in their pages of links. Of course, there is always the possibility for companies to be added to our directory by their representatives, using the ‘Register’ company button.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(13);">13. How can I subscribe or unsubscribe to the newsletter?</p>
                        <div>
                            <div id="id_13" class="hide panel-body">
                                <p align="justify">
                                    If you would like to subscribe or unsubscribe from our newsletter, please send us an email at info@cylex-usa.com or you can always click on the footer (you can find it at the bottom of our e-mails).
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(14);">14. How can I boost my company’s position in search results?</p>
                        <div>
                            <div id="id_14" class="hide panel-body">
                                <p align="justify">
                                    There are a number of ways you can boost your company’s position in search results.
                                </p>
                                <ul class="pl-5">
                                    <li type="1">
                                        <b>Categories (Relevance factor)</b><br>
                                        Our ranking algorithm is based on categories and keywords. That's why you should add relevant keywords to your Cylex profile and double check your categories.
                                    </li>
                                    <li type="1">
                                        <b>Positive reviews (Review+ factor)</b><br>
                                        Nothing proves your company's worth more than having happy customers. Why not make sure everybody knows about them? Ask your satisfied clients to write a review about your company. You can do that by email after a successful business transaction or you can use our review widget to encourage them. For even more visibility, share the reviews on your social media profiles.
                                    </li>
                                    <li type="1">
                                        <b>Accurate and new info (Freshness factor)</b><br>
                                        Update your presentation page regularly. Correct and detailed information is a key factor. Even if there are no significant changes in your contact details, you can keep your page updated by always adding something new to it. Inform your clients about events, share articles and news or simply add a new photo to your gallery.
                                    </li>
                                    <li type="1">
                                        <b>Opening times (OH factor)</b><br>
                                        Since this is one of the most requested details, the profiles that have opening hours will rank higher in our directory. FindOpen, our partner website will also display these opening hours.
                                    </li>
                                    <li type="1">
                                        <b>Answer quote requests (RFQ factor)</b><br>
                                        Sending offers for the quote requests that you receive from your business category has a positive impact because winning offers can also earn you a higher ranking in our directory, not to mention the new customers that you can gain. A review from a 'Cylex Quote Requests' customer has even more value.
                                    </li>
                                    <li type="1">
                                        <b>Premium Entry</b><br>
                                        Try the Premium Entry feature. For as little as ₤9,90/month, you can enjoy a premium listing in our directory, meaning your profile will appear ad free and higher in search results.
                                    </li>
                                </ul>
                                <p align="justify" style="margin-top: 10px">
                                    In short, it’s important to make sure you fill in the company presentation page and select the most relevant categories and keywords for your field of work. Always keep your information up to date and add as many details as you can: opening hours, promotions, post about new items or services. The more keywords you insert into your company presentation page, the more search hits you’ll get in our database and in search engines like Google or Yahoo. Later on, if you want to add more keywords, click on the 'Sign In' button to enter your account, or fill in the form for the first data update by clicking the 'Edit your page' button from your company presentation page.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(15);">15. Why are keywords necessary?</p>
                        <div>
                            <div id="id_15" class="hide panel-body">
                                <p align="justify">
                                    As a business, they're important because you want to come up in search engines when people search for the keywords or phrases that are relevant to your products or services. To stand a chance of being near the top of the results, you need to include those words and phrases in your profile. Think like a customer. Identify your target audience and put yourself into the shoes of a customer when you create your initial list of keywords. Keywords represent products, services and brands that users search for. A larger keyword list could mean more appearances for your company in the search results. Select specific keywords to target specific customers E.g. if your company is a hotel the keywords could be: hotel, accommodation, etc. Using more specific keywords would mean that your listing only appears for terms that apply to your business. But keep in mind that if the keywords are too specific, you might not be able to reach as many people as you'd like.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(16);">16. What other free services does Cylex offer?</p>
                        <div>
                            <div id="id_16" class="hide panel-body">
                                <p align="justify">
                                    Most of our products and services are free. On your presentation page, with the help of 'Edit your page' button or 'Sign In' button you can publish offers, articles, news, create a products and services catalogue, upload video presentations, etc., all these services being optimized for Google search.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(17);">17. What are the advantages of being a CYLEX Community member?</p>
                        <div>
                            <div id="id_17" class="hide panel-body">
                                <p align="justify">
                                    By being part of the Cylex Community you can:
                                </p>
                                <ul class="pl-5">
                                    <li type="1">
                                        <b>Post FREE quote requests</b><br>
                                        The process is simple, all you need to do is to tell us what you need by filling a form and we’ll get you bids from local pros interested in the job. The ‘Cylex Quote Request’ platform matches your quote request to the most relevant companies in your area and contacts them. The free service enables you to receive quotations from multiple companies, in a matter of days.
                                    </li>
                                    <li type="1">
                                        <b>Each review has a personal story</b><br>
                                        Share your experiences to help others make better choices and help companies up their game.
                                        <br>
                                        Post reviews and add ratings about the experience you had with different companies.
                                        <br>
                                        The people who are part of the Cylex community or join our site are real people looking for a way to find trustworthy companies that perform high-quality work.
                                    </li>
                                    <li type="1">
                                        <b>Find last minute business deals and special offers</b><br>
                                        Get more value for your money. Discover the best deals and discount offers for businesses in your area and around the country.
                                    </li>
                                    <li type="1">
                                        <b>Register business profiles</b><br>
                                        List your business or claim a business profile created by a consumer or one of our partners. Stay in touch with your customers, bid on leads and enjoy the perks of having a business profile. It’s FREE!
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(18);">18. How can I change my profile details in Cylex Community?</p>
                        <div>
                            <div id="id_18" class="hide panel-body">
                                <p align="justify">
                                    First of all, make sure you’re logged in. Then, on the upper right corner of the page, you can find your profile name. Simply click on it and you will be redirected to your profile page. From there you can edit your profile, view your quote requests or see reviews you’ve written, or you can add companies to manage with your profile.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(19);">19. Is Cylex free?</p>
                        <div>
                            <div id="id_19" class="hide panel-body">
                                <p align="justify">
                                    When we say our business directory is free, we really mean free. There are no hidden fees or charges. Right from the start, creating your company presentation page, uploading images of your products, benefitting from the offers and everything else, is absolutely free. The directory is entirely funded by discreet adverts placed around the site. We don’t have anything to sell and we don’t want you to buy anything. Our services do not have any obligations or conditions.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(20);">20. What are Tagline Promotions?</p>
                        <div>
                            <div id="id_20" class="hide panel-body">
                                <p align="justify">
                                    Tagline Promotions help businesses attract customers and have a better ranking in the Cylex search results.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(21);">21. What do you need to be on the Top Companies List?</p>
                        <div>
                            <div id="id_21" class="hide panel-body">
                                <p align="justify">
                                    The top companies list is based on a score put together by several factors, such as audit reports, visibility index on Cylex and search engines, third-party or Cylex reviews. Ask for a free audit to see if your company can be on this list, simply by sending us an email at info@cylex-usa.com
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(22);">22. How does rich search results work?</p>
                        <div>
                            <div id="id_22" class="hide panel-body">
                                <p align="justify">
                                    When you install Cylex’s widget on your website, we also add some markups to your page along with the widget, according to Google’s requirements, to represent your total rating. Google will index it the next time it crawls your website and should display your pages containing the widget along with your star rating on search results.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="panel panel-default">
                        <p class="item" onclick="showhide(23);">23. Do you have any business directories abroad?</p>
                        <div>
                            <div id="id_23" class="hide panel-body">
                                <p align="justify">
                                    Cylex Local Search is available in the following countries:
                                </p>
                                <table class="table">
                                    <tr>
                                        <td>Argentina</td>
                                        <td colspan="2"><a href="https://www.cylex.com.ar">https://www.cylex.com.ar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Argentina</td>
                                        <td colspan="2"><a href="https://www.cylex.com.ar">https://www.cylex.com.ar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Argentina</td>
                                        <td colspan="2"><a href="https://www.cylex.com.ar">https://www.cylex.com.ar</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </li>

            </ol>

        </div>
    </div>
</section>
<script src="//code.jquery.com/jquery-3.5.1.min.js" ></script>
<script type="text/javascript">
    function showhide(n)
    {
        if (document.getElementById('id_'+n).style.display=='block')
            $("#id_"+n).slideUp();
        else
            $("#id_"+n).slideDown();
        return false;
    }
</script>
@endsection

