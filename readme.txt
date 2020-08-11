Trong khoảng thời gian em nhận mail. Là khoảng thời gian gia đình em có chút việc .
Nên có hơi ít thời gian để chăm chút lại project tốt nhất .
Em xin lỗi nếu project của em quá sơ sài hoặc không đủ tiêu chuẩn của công ty.
Em xin rút kinh nghiệm. Và em cảm ơn công ty đã tạo điều kiện cho em làm bài test này !

(note: cần có composer và nodejs )
Sau khi clone project:
Bước 1:
Trong laravel có file .env.example ->copy
và tạo riêng 1 file .env ở bên ngoài cùng cấp với file .env.example
->paste file .env.example sang ->.env

cập nhập file .env như sau:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(tên database đã được tạo sẵn bằng phpmyadmin)
DB_USERNAME=root(xampp default sẽ là root )
DB_PASSWORD=  (pass database nếu không có mặc định sẽ rỗng)


Bước 2: command để install package trong laravel:
composer install(or composer update)
Bước 3: generate key cho laravel

chạy đoạn mã: php my artisan key:generate

Bước 4: command tạo ra bảng  database mà em đã tạo sẵn trong laravel:

php artisan migrate  (command tạo bảng database)
php artisan db:seed  (command tạo dữ liệu database)


Bước 5: Vì laravel 7. sử dụng webpack để chạy JS và css nên phải khởi chạy command :
command:  npm install
command: npm run dev(or npm run build or npm run watch)

bước 6: Khởi chạy route:
chạy command : php artisan serve( thường sẽ là http://localhost:8000)
vào chorme và chạy (http://localhost:8000)/public/admin (nếu dùng xampp)
Nếu muốn check api chạy (http://localhost:8000)/action (nếu dùng xampp)

(note: nếu bị lỗi propety"name"->xin hãy check xem country đã có dữ liệu hay  chưa . nếu chưa xin chạy: php artisan db:seed --class=CountrySeeder)
Em xin cảm ơn!


