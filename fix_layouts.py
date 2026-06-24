import os

directory = r"d:\laravel20262\arinifurniture\resources\views\adminpage"

for root, _, files in os.walk(directory):
    for file in files:
        if file.endswith(".blade.php"):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            if "adminpage.layouts.main" in content:
                new_content = content.replace("adminpage.layouts.main", "adminpage.master")
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f"Fixed {filepath}")
print("Done fixing layouts.")
