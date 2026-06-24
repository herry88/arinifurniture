import re

file1 = r"c:\Users\ACER\Downloads\furnicom-furniture-interior-html-template-2023-11-27-05-05-37-utc\Main-files-furnicom-html\furnicom_pl\index3.html"
file2 = r"d:\laravel20262\arinifurniture\resources\views\frontend\layouts\footer.blade.php"

with open(file1, "r", encoding="utf-8") as f:
    content = f.read()

start = content.find('<footer class="typefooter-3">')
end = content.find('</div>\n\n\t</div>', start)
if end == -1:
    end = content.find('</div>\n\t</div>', start)

footer_html = content[start:end+6]

# Replace asset URLs
footer_html = re.sub(r'src="(image/[^"]+)"', r'src="{{ asset(\'frontend/\1\') }}"', footer_html)

with open(file2, "w", encoding="utf-8") as f:
    f.write(footer_html)

print("Footer replaced directly from index3.html")
