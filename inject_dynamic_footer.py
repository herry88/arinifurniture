import re

file_path = r"d:\laravel20262\arinifurniture\resources\views\frontend\layouts\footer.blade.php"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace(
    '<p>SUPPORT TEAM 24/7 AT <a href="tel:(844)555-8386">(844)555-8386</a></p>',
    '<p>SUPPORT TEAM 24/7 AT <a href="tel:{{ $global_setting->phone ?? \'(844)555-8386\' }}">{{ $global_setting->phone ?? \'(844)555-8386\' }}</a></p>'
)

content = content.replace(
    'Megnor Comp Pvt Limited, Trade Centre, Udhana Darwaja',
    '{{ $global_setting->address ?? \'Megnor Comp Pvt Limited, Trade Centre, Udhana Darwaja\' }}'
)

content = content.replace(
    '<a href="tel:(91)-2613023333">(91)-2613023333</a>',
    '<a href="tel:{{ $global_setting->phone ?? \'(91)-2613023333\' }}">{{ $global_setting->phone ?? \'(91)-2613023333\' }}</a>'
)

content = content.replace(
    '<a href="mailto:demo@harvest.com">demo@harvest.com</a>',
    '<a href="mailto:{{ $global_setting->email ?? \'demo@harvest.com\' }}">{{ $global_setting->email ?? \'demo@harvest.com\' }}</a>'
)

app_download_orig = '<img src="{{ asset(\'frontend/image/catalog/demo/footer/down-app.png\') }}" class="img-responsive" alt="">'
app_download_dyn = """@if(isset($global_setting) && $global_setting->app_download_image)
										<img src="{{ asset('storage/' . $global_setting->app_download_image) }}" class="img-responsive" alt="">
										@else
										<img src="{{ asset('frontend/image/catalog/demo/footer/down-app.png') }}" class="img-responsive" alt="">
										@endif"""
content = content.replace(app_download_orig, app_download_dyn)

content = content.replace(
    '<a href="#" class="smooth" title="">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-facebook"',
    '<a href="{{ $global_setting->facebook_url ?? \'#\' }}" class="smooth" title="Facebook" target="_blank">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-facebook"'
)

content = content.replace(
    '<a href="#" class="smooth" title="">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-twitter"',
    '<a href="{{ $global_setting->twitter_url ?? \'#\' }}" class="smooth" title="Twitter" target="_blank">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-twitter"'
)

content = content.replace(
    '<a href="#" class="smooth" title="">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-wifi"',
    '<a href="{{ $global_setting->instagram_url ?? \'#\' }}" class="smooth" title="Instagram" target="_blank">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-instagram"'
)

content = content.replace(
    '<a href="#" class="smooth" title="">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-google-plus"',
    '<a href="{{ $global_setting->youtube_url ?? \'#\' }}" class="smooth" title="Youtube" target="_blank">\n\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-youtube-play"'
)

copyright_orig = """Furnicom HTML © 2019 Demo Store. All Rights Reserved. Designed by <a href="https://www.smartaddons.com/" target="_blank" class="smooth" title>SmartAddons.com</a>"""
copyright_dyn = """{{ $global_setting->copyright_text ?? 'Furnicom HTML © 2019 Demo Store. All Rights Reserved. Designed by SmartAddons.com' }}"""
content = content.replace(copyright_orig, copyright_dyn)

with open(file_path, "w", encoding="utf-8") as f:
    f.write(content)

print("Dynamic variables injected.")
