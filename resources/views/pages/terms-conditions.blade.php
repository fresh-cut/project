@extends('template')
@section('main-content')
@section('title')
    {{ settings_translate('footer_terms_conditions_text', 'Terms and Conditions') }}
@endsection
@section('description'){{settings_translate('footer_terms_conditions_text', 'Terms and Conditions')}}@endsection
<style>
    h1 {
        margin-bottom: 10px;
        font-size: 26px;
    }
    h2 {
        font-size: 18px;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    p, li {
        font-size: 14px;
    }
</style>

<section class="container mb-12">
        <div class="row">
            <div class="col-md-12">
                <h1>Terms and Conditions</h1>
                <p align="justify">
                    Terms and Conditions for the use of <a href="{{URL::route('home')}}">{{ env('APP_NAME') }}</a> administered by CyberCubex Directory INC.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <h2>1. Domain of application of Terms and Conditions</h2>
                <ol class="pl-4">
                    <li>
                        1.1 These Terms and Conditions (hereinafter collectively referred to as "Terms") of
                        <a href="{{URL::route('home')}}">{{ env('APP_NAME') }}</a>
                        (hereinafter "CyberCubex") applies to all services provided in the business directory
                        <a href="{{URL::route('home')}}">{{ env('APP_NAME') }}</a>,
                        unless there are special circumstances for a certain service.
                    </li>
                    <li>
                        1.2 In the CyberCubex Directory portal, users (hereinafter referred to as "Users") can search for different information about companies and authorized natural persons, this information being recorded directly in the CyberCubex business directory by legal representatives of firms and authorized natural persons in question or being taken from publicly accessible documents. Clients (hereinafter called "Clients") are authorized natural persons, legal persons, partners, or private associations, that present their activities in CyberCubex by using the offered services of the portal or that use the different registration requiring services.
                    </li>
                    <li>
                        1.3 The users or clients can apply for the portal services offered with or without registration solely on the basis of these terms and conditions. The validity of other conditions is excluded. The terms listed here are also valid if CyberCubex Directory fulfills an unconditioned request knowing the client's divergent conditions, even if these are different from the ones listed here. CyberCubex Directory Employees are not authorized to make additional oral agreements.
                    </li>
                </ol>

                <h2>2. Preliminary conditions for the use of CyberCubex Directory </h2>
                <ol class="pl-4">
                    <li>
                        2.1 Using the portal services the client or user agrees to comply mandatorily with the terms throughout the use of the Internet portal.
                    </li>
                    <li>
                        2.2 In order to post ads, to present their business, or to use specific services, clients must register in advance. Registration is free. If the client has not completed an application form for registration, when data were taken from public sources, CyberCubex Directory reserves the right to cancel the registration, in case it becomes impossible to update data from public sources, without explaining it in writing to the client. Conform to the requirements of the registration form, all the information should be genuine, accurate, current, and complete. The client is required to verify his publications at regular intervals and update his contact details and offers.
                    </li>
                    <li>
                        2.3 If the client does not meet the obligations concerning the absolute correctitude and completeness of the information in the fields marked mandatory, CyberCubex Directory has the right to delete his registration temporarily or permanently and to forbid the client to use the registration-based services.
                    </li>
                    <li>
                        2.4 Minors must not use portal services without parental consent. It is the responsibility of their legal representatives to determine which services are appropriate for their child.
                    </li>
                    <li>
                        2.5 Registration-based services can be used only by individuals who have unlimited legal capacity, who are over the age of eighteen, authorized legal persons, and natural persons with residence and registered office in any country in the world. Access to the portal will be automatically canceled when a customer transfers his initial residence to another place or the data will be transferred to the portal of the country where the new residence is. The client is required to inform immediately CyberCubex Directory when he changes permanently the initial residence.
                    </li>
                </ol>

                <h2>3. In the attention of clients and users</h2>
                <ol class="pl-4">
                    <li>
                        3.1 All services of the portal are free.
                    </li>
                    <li>
                        3.2 The use of the search functions and CyberCubex Directory portal services does not imply any contractual relationship between the user and the supplier. In this sense, there will not be contractual or quasi-contractual claims against the supplier CyberCubex Directory. Likewise, there will be never any claims against CyberCubex's Directory concerning the online publishing services.
                    </li>
                    <li>
                        3.3 CyberCubex Directory offers users and customers a simple use right- unrestricted in time and space- to use the provided information. This basic right is limited to the search and visualization of the information and only to personal use. Any other use of the provided information is prohibited. The industrial or commercial misuse of the information presented on the site is strictly prohibited: the creation of information directories, electronic or printed databases, the reproduction, processing, or distribution of the information to third parties is prohibited as well. The user can use the portal only in accordance with legal provisions, in particular with the regulations applied to data protection. (see section 7)
                    </li>
                    <li>
                        3.4 The visitor is aware of the fact that all rights and responsibilities arising from the use of the internet portal concerning published contents, particularly the copyright law and the right to use, for example, the database and files regarding contact information, belong to CyberCubex Directory or to third parties, especially to the clients and license suppliers. Databases of the portal are protected by copyright. When using the portal the user should consider in addition to these terms also the license terms designated by third parties.
                    </li>
                    <li>
                        3.5 CyberCubex Directory software programs, object and source codes, logos, texts, and images are protected by copyright and partially by trademark rights. Any reproduction, use, unauthorized dissemination of certain materials is prohibited and it is subject to civil and criminal law. Multiple copyrights require written authorization.
                    </li>
                    <li>
                        3.6 The user or client will make the services provided by CyberCubex Directory  (geographical coordinates, access to maps) accessible to third parties only after first obtaining written permission from CyberCubex Directory, where it is not an end client or a visitor of their web site who uses the services for his own purposes.
                    </li>
                    <li>
                        3.7 When infringing use rights, clients and users are entirely liable for any damages arising therefrom.
                    </li>
                    <li>
                        3.8 The user or client undertakes to report CyberCubex Directory without delay any occurring error or interruption of services, as well as other threats and evidence of abuse committed by others.
                    </li>
                    <li>
                        3.9 Users or clients are not allowed to post, send software viruses or any other information, data, programs or content, by e-mail or any other means, designed to interrupt, destroy or limit the functionality of any software, hardware, or telecommunication devices.
                    </li>
                    <li>
                        3.10 For all the information: photos, graphics, video, news, data, text, software, music, sound, or any other kind of content, whether it is publicly posted or privately transmitted, the entire liability rests solely with the person who has provided that particular content.
                    </li>
                    <li>
                        3.11 CyberCubex Directory does not verify any content, which registered clients or users post through the portal and does not guarantee, nor assume any responsibility for the correctness, integrity or quality of such content.
                    </li>
                    <li>
                        3.12 CyberCubex Directory has no control over the content published by the users and clients. The content of the company presentation page cannot have any reference to the followings: pornography, adult or mature content, excessive profanity, content related to racial intolerance or advocacy against any individual, group, or organization, hacking or cracking content, illicit drugs, and drug paraphernalia content, gambling or casino-related content, sales of beer or hard alcohol, sales of tobacco or tobacco related products, sales of weapons or ammunition and any other content that is illegal, promotes illegal activity or infringes on the legal rights of others. We reserve the right to delete with immediate effect the presentation page of those companies that contains them. Likewise, it must not be published any data, texts, images, files, links, software, or different contents, which is considered by CyberCubex Directory to be illegal, harmful, threatening, abusive, harassing, defamatory, vulgar, obscene, hateful, racist or objectionable in any other way.
                    </li>
                    <li>
                        3.13 Spamming the CyberCubex Directory portal is prohibited. This includes particularly sending illegal and unsolicited publicity to third parties. When sending emails, it is also prohibited to provide false information concerning the sender or to hide his identity in any other way.
                    </li>
                </ol>

                <h2>4. Obligations of registered account holders</h2>
                <ol class="pl-4">
                    <li>
                        4.1 When registering on the CyberCubex Directory portal, the account holder is not allowed to share the password assigned or selected with third parties. The account holder is responsible for all activities conducted through his password. The account holder is required to notify CyberCubex Directory immediately about any unauthorized use of his password and any other breach of security. In order to prevent possible abuses, the account holder is required to use the 'Sign Out' button available when finishing the activities in the system.
                    </li>
                    <li>
                        4.2 The client sends all the necessary information to implement the service. He reserves the right to transfer and publish data and information and, in turn, undertakes to comply with data protection regulations. CyberCubex Directory posts online and for free the published contents for its users.
                    </li>
                    <li>
                        4.3 The client is fully responsible for the accuracy and legality of the information provided by him. This is especially true for clients who have a protected professional title or who are members of a professional association (for example, architects, doctors, tradesmen, lawyers, notaries, and accountants). The client explicitly guarantees that the recorded data comply with local laws.
                    </li>
                    <li>
                        4.4 The client agrees to indemnify CyberCubex Directory regarding any third-party claims arising from illegally published information. This indemnity obligation includes the obligation to relieve entirely the operator of the portal of legal defense costs (for example lawyers, Court, Court of Appeal, and legal fees).
                    </li>
                    <li>
                        4.5 CyberCubex Directory can send information and explanations concerning Terms, in particular to the e-mail address of the client. The client is responsible for checking regularly the e-mail address through which he contacts CyberCubex Directory.
                    </li>
                    <li>
                        4.6 CyberCubex Directory has the right to regularly inform the client about news and new services offered in the form of a newsletter and to ask the client to revise his published data for accuracy and update them if necessary. If there is any reason for CyberCubex Directory to believe that the published information is false, inaccurate, outdated, or incomplete, CyberCubex Directory has the right to request from the client to update the information by e-mail at any time; if the client does not respond to the e-mail, CyberCubex Directory can delete his profile from the portal. The client has the possibility to cancel this in every newsletter.
                    </li>
                    <li>
                        4.7 The registered account holder is fully responsible for access control and for the consequences of abuse committed during his access, as a result of neglected safety measures.
                    </li>
                </ol>

                <h2>5. Rights of Use</h2>
                <ol class="pl-4">
                    <li>
                        5.1 CyberCubex Directory is authorized to store contents and to deliver them to third parties as far as it is required by law or it is necessary and/or permitted by law, in order to comply with legal regulations or judicial/ administrative orders to put into force the terms and conditions, to respond to allegations of copyright infringement by third parties, or to protect the rights, property or personal safety of CyberCubex Directory, users and clients.
                    </li>
                    <li>
                        5.2 CyberCubex Directory emphasizes that the technical processing and transmission of contents from clients can be accomplished through different networks. These contents might be slightly changed to meet the technical requirements of connecting networks or other devices (for example different Internet browsers).
                    </li>
                    <li>
                        5.3 The client undertakes that he has all the necessary rights to publish all the texts and materials online. The client transfers all the necessary rights to CyberCubex Directory for online publication of his presentations, namely: the use rights, the protection of service and other rights, in particular the right of publication, reproduction, and dissemination of corporate logos and pictures and the content and period of validity of offers as well.
                    </li>
                    <li>
                        5.4 By accessing or using our Contact Form you agree with the following conditions of use:
                        <ul class="pl-5">
                            <li type="circle">
                                You can use our platform to send an email message to a person, firm, company, or other organization identified for the purpose of obtaining information about the products and services that they may offer. You must not use our contact form to spam or otherwise send unsolicited marketing to those organizations.
                            </li>
                            <li type="circle">
                                We may use personal data in an aggregated form to monitor and evaluate our contact form services and to inform you of important changes over your actions while using CyberCubex Directory.
                            </li>
                        </ul>
                    </li>
                </ol>

                <h2>6. Limitation of Liability</h2>
                <ol class="pl-4">
                    <li>
                        6.1 CyberCubex Directory is not responsible for the contents or activities provided by the portal users and clients. This information cannot be attributed to the operator of
                        <a href="{{URL::route('home')}}">{{ env('APP_NAME') }}</a>
                        it does not represent his views. The contents include links, profile information, reviews, comments, pictures, and videos posted on the web pages of the portal.
                    </li>
                    <li>
                        6.2 CyberCubex Directory puts great emphasis on the reliability of servers operating with as few and short interruptions as possible. Still, interruptions caused by maintenance or server failures are not excluded. Therefore CyberCubex Directory does not assume responsibility for such interruptions.
                    </li>
                    <li>
                        6.3 CyberCubex Directory assumes no liability for damages arising from the use of the business directory by clients or users because in the case of such free services in a legal sense there is no service contract. There cannot be invoked/supported the claims for loss of profits, third party claims for compensation, or other direct or indirect damages resulting from interruptions.
                    </li>
                </ol>

                <h2>7. Security of personal data processing</h2>
                <ol class="pl-4">
                    <li>
                        7.1 The Ombudsman (Avocatul Poporului) Order No 52 of April 18, 2002 regarding the approval of minimum security requirements of processing personal data is the core of the technical and organizational measures necessary to maintain the confidentiality and integrity of personal data adopted and implemented by the CyberCubex Directory INC.
                    </li>
                    <li>
                        7.2 We use all the technical and organizational security measures to protect authentication information, passwords, or any other data recorded for security purposes, from deliberate or accidental manipulation, loss, destruction, or unauthorized access. The methods used to meet the protection requirements are in accordance with the generally accepted standards of this field.
                    </li>
                </ol>

                <h2>8. Rights of public content</h2>
                <ol class="pl-4">
                    <li>
                        8.1 If the client or user publishes contents or files in publicly accessible areas, he gives CyberCubex Directory the right to use these contents (in whole or in part) on a global level, to reproduce, modify, adapt and publish them, if this is done only for the sole purpose of presentation, distribution, and promotion of the content in question.
                    </li>
                    <li>
                        8.2 This right is valid only for the period of publication made by the client or user. Clients can remove their publication from the portal at any time regardless of CyberCubex Directory.
                    </li>
                    <li>
                        8.3 If the client or user does not have the right to publish a particular content, he must ensure that the content rights holder has agreed to the transfer of rights under the above provisions.
                    </li>
                    <li>
                        8.4 For current and future services to meet more precisely his requirements, the client accepts that a pseudonym will be used when he applies for services. The authenticated pseudonymous data, in accordance with the law, will not be merged with the data of the pseudonym holder. CyberCubex Directory uses these protocols only for its own purposes and in the interest of its clients to develop new services. There will be no transfer of personal data to third parties.
                    </li>
                </ol>

                <h2>9. Jurisdiction</h2>
                <ol class="pl-4">
                    <li>
                        9.1 The exclusive place for all the disputes concerning services provided by CyberCubex Directory is Oradea, Romania. For all claims of any kind arising from or in connection with a situation under terms and conditions, the Romanian legislation will be applied.
                    </li>
                </ol>

                <h2>10. Severability</h2>
                <ol class="pl-4">
                    <li>
                        10.1 If some provisions of these Terms, in whole or in part, are no longer valid, or will lose their legal effect later, the validity of the Terms will not be affected more than that. Instead of the inefficient regulations the legal provisions will come in force automatically. The same applies in case of any possible omissions in the terms.
                    </li>
                </ol>

                <h2>11. Data protection</h2>
                <ol class="pl-4">
                    <li>
                        11.1 Requests are submitted by Users via a request form. All submitted quote requests are sent for review and then published requests are visible to all CyberCubex Directory Users. By posting a quote request, in brief by using the ‘Send’ button, the User automatically agrees to the Terms and Conditions set forth below.
                    </li>
                    <li>
                        11.2 By registering for, using the Website and agreeing to the Terms and Conditions, you hereby certify that you have the authority to participating on this Website either as a service provider or a service User.
                    </li>
                    <li>
                        11.3 When a User posts a request without logging in with email address or Facebook / Google+ profile, our quote request application will do a match and check if the email address has already been added to the CyberCubex Directory database or not. If the matching process has no results, the application will automatically register the User based on the data given by the him. This way the email address will be included in the notification and newsletter system as well.
                    </li>
                </ol>

                <h2>12. Prohibitions on sending quote requests</h2>
                <ol class="pl-4">
                    <li>
                        12.1 Your personal data (address, email address, telephone number) will be processed by us only in accordance with the provisions of the Data Protection Act and will not be visible to any other CyberCubex Business Directory User, while phone number (which is not mandatory to provide) will only be visible to the service provider you choose to show to. Your personal data will not be transferred to a third party only with your express consent. We will take all necessary technical and organizational security measures to protect your login information, passwords, or any other data recorded for security purposes, against accidental or intentional manipulation, loss, destruction, or unauthorized use or access. To meet the protection requirements the methods we use are in accordance with the generally accepted standards of this field.
                    </li>
                    <li>
                        12.2 When a User logs in with a Facebook or Google account, the name and profile picture will be visible for all CyberCubex Directory Users.
                    </li>
                    <li>
                        12.3 Registered Users have the possibility to use an email address for Quote Request other than the one used for registration. Thus, all our notifications regarding the Quote Request are sent to the address set specially for the Quote Request feature. In order to change Your contact data for Quote Request, login to your CyberCubex Directory profile and choose the “Edit Profile” option from the menu. In case the contact data for Quote Request is deleted, all our notifications are sent to the email address used for registration.
                    </li>
                </ol>

                <h2>13. Fees for Use</h2>
                <ol class="pl-4">
                    <li>
                        13.1 All submitted quote requests are moderated by our data operators. Please note that the quote requests posted by the Users should not contain any kind of contact information (full address, phone number, email address)! It is also forbidden the publication of any data, texts, images, files, links, software or different contents, which are considered by CyberCubex Directory to be illegal, harmful, threatening, abusive, harassing, defamatory, vulgar, obscene, hateful, racist or objectionable in any other way. CyberCubex Directory is not responsible for the timeliness and accuracy of the data.
                    </li>
                    <li>
                        13.2 You as a User represent and warrant that the data provided by you will not violate or infringe the data protection law. You are responsible for the content, timeliness, completeness and accuracy of the data supplied by you. You expressly assure that these data are consistent with the local law. Respectively, you cannot hold us responsible for any penalties incurred by your violation of these laws.
                    </li>
                </ol>
            </div>
        </div>
</section>

@endsection

