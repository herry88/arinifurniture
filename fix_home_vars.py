import re

file_path = "d:/laravel20262/arinifurniture/resources/views/frontend/home.blade.php"
with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

# I will just replace the first loop with $latestProducts
content = content.replace("@foreach ($products as $product)", "@foreach ($latestProducts as $product)")
content = content.replace("count($products)", "count($latestProducts)")

with open(file_path, "w", encoding="utf-8") as f:
    f.write(content)

print("Updated home.blade.php variables")
