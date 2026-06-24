import re

file_path = r"d:\laravel20262\arinifurniture\resources\views\frontend\layouts\footer.blade.php"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

# Replace Header Phone
content = content.replace(
    '<p>SUPPORT TEAM 24/7 AT <a href="tel:(844)555-8386">(844)555-8386</a></p>',
    '<p>SUPPORT TEAM 24/7 AT <a href="tel:{{ $global_setting->phone }}">{{ $global_setting->phone }}</a></p>'
)

# Replace Contact Info in Footer Bottom
contact_original = """                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>Megnor Comp Pvt
                                            Limited, Trade Centre, Udhana Darwaja
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile" aria-hidden="true"></i><a
                                                href="tel:(91)-2613023333">(91)-2613023333</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i><a
                                                href="mailto:demo@harvest.com">demo@harvest.com</a>
                                        </li>
                                    </ul>"""

contact_dynamic = """                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>{{ $global_setting->address }}
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile" aria-hidden="true"></i><a
                                                href="tel:{{ $global_setting->phone }}">{{ $global_setting->phone }}</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i><a
                                                href="mailto:{{ $global_setting->email }}">{{ $global_setting->email }}</a>
                                        </li>
                                    </ul>"""

content = content.replace(contact_original, contact_dynamic)

# Replace App Download
app_download_original = """                                    <a href="#" class="d-inline-block">
                                        <img src="{{ asset('frontend/image/catalog/demo/footer/down-app.png') }}" class="img-responsive"
                                            alt="">
                                    </a>"""
app_download_dynamic = """                                    <a href="#" class="d-inline-block">
                                        @if($global_setting->app_download_image)
                                            <img src="{{ asset('storage/' . $global_setting->app_download_image) }}" class="img-responsive" alt="">
                                        @else
                                            <img src="{{ asset('frontend/image/catalog/demo/footer/down-app.png') }}" class="img-responsive" alt="">
                                        @endif
                                    </a>"""
content = content.replace(app_download_original, app_download_dynamic)

# Replace Social Media
social_original = """                                    <ul class="footer-social">
                                        <li>
                                            <a href="#" class="smooth" title="">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="smooth" title="">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="smooth" title="">
                                                <i class="fa fa-wifi" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="smooth" title="">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="smooth" title="">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                    </ul>"""
social_dynamic = """                                    <ul class="footer-social">
                                        @if($global_setting->facebook_url)
                                        <li>
                                            <a href="{{ $global_setting->facebook_url }}" class="smooth" title="Facebook" target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @if($global_setting->twitter_url)
                                        <li>
                                            <a href="{{ $global_setting->twitter_url }}" class="smooth" title="Twitter" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @if($global_setting->instagram_url)
                                        <li>
                                            <a href="{{ $global_setting->instagram_url }}" class="smooth" title="Instagram" target="_blank">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @if($global_setting->youtube_url)
                                        <li>
                                            <a href="{{ $global_setting->youtube_url }}" class="smooth" title="Youtube" target="_blank">
                                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>"""
content = content.replace(social_original, social_dynamic)

# Replace Copyright
copyright_original = """                                <div class="copyright text-center">
                                    Furnicom HTML © 2019 Demo Store. All Rights Reserved. Designed by <a
                                        href="https://www.smartaddons.com/" target="_blank" class="smooth"
                                        title>SmartAddons.com</a>
                                </div>"""
copyright_dynamic = """                                <div class="copyright text-center">
                                    {{ $global_setting->copyright_text }}
                                </div>"""
content = content.replace(copyright_original, copyright_dynamic)

with open(file_path, "w", encoding="utf-8") as f:
    f.write(content)

print("Footer replaced successfully.")
