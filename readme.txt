Trong khoảng thời gian em nhận mail. Là khoảng thời gian gia đình em có chút việc . 
Nên có hơi ít thời gian để chăm chút lại bài Test cho tốt .
Em xin lỗi nếu project của em quá sơ sài hoặc không đủ tiêu chuẩn của công ty.
Em xin rút kinh nghiệm. Và em cảm ơn công ty đã tạo điều kiện cho em làm bài test này !
 

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


Bước 2: generate key cho laravel

chạy đoạn mã: php my artisan key:generate

Bước 3: command tạo ra bảng  database mà em đã tạo sẵn trong laravel:

php artisan migrate  (command tạo bảng database)
php artisan db:seed  (command tạo dữ liệu database)

Bước 4: command để install package trong laravel:
composer install(or composer update)

Bước 5: Vì laravel 7. sử dụng webpack để chạy JS và css nên phải khởi chạy command :
command:  npm install
command: npm run dev(or npm run build or npm run watch)

bước 6: Khởi chạy route:
chạy command : php artisan serve( thường sẽ là http://localhost:8000)
vào chorme và chạy (http://localhost:8000)/public/admin
Nếu muốn check api chạy (http://localhost:8000)/action


Em xin cảm ơn!


