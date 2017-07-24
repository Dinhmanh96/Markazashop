CREATE TABLE IF NOT EXISTS `news_search` (
 `id` int(5) NOT NULL AUTO_INCREMENT,
 `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 `link` varchar(250) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `news_search` (`id`, `title`, `description`, `link`) VALUES
(1, 'TẠO LOGO TUYỆT ĐẸP BẰNG CSS', '2Cwebvn xin giới thiệu đến các bạn cách tạo logo tuyệt đẹp bằng css.','http://2cweb.vn/news/html-css/tao-logo-tuyet-dep-bang-css-10-44.html'),
(2, 'TẠO FORM LOGIN HOÀN CHỈNH BẰNG KỸ THUẬT AJAX VÀ VALIDATE JQUERY', 'Hôm nay 2Cwebvn sẽ sử dụng công nghệ Ajax kết hợp với plugin Validate của jQuery để làm form login hoàn chỉnh.','http://2cweb.vn/news/php-mysql/tao-form-login-hoan-chinh-bang-ky-thuat-ajax-va-validate-jquery-12-36.html'),
(3, 'TẠO HIỆU ỨNG CHỮ DROP CAP TUYỆT ĐẸP VỚI CSS3', 'Hôm nay 2Cwebvn xin giới thiệu đến các bạn hiệu ứng chữ bằng Drop Cap tuyệt đẹp với CSS3','http://2cweb.vn/news/html-css/tao-hieu-ung-chu-drop-cap-tuyet-dep-voi-css3-10-27.html'),
(4, 'TẠO TOOLTIP ĐƠN GIẢN KHÔNG CẦN JAVASCRIPT', '2Cwebvn sẽ giới thiệu đến các bạn cách làm tooltip đơn giản cho các link mà không cần dùng đến 1 dòng code nào của Javascript hay Jquery, chỉ dùng Css và Css mà thôi','http://2cweb.vn/news/html-css/tao-tooltip-don-gian-khong-can-javascript-10-24.html'),
(5, 'TẠO TRANG BÁO LỖI DATABASE TÙY CHỈNH TRONG WORDPRESS', '2Cwebvn sẽ giới thiệu đến các bạn làm thế nào hiển thị tùy chỉnh trang báo lỗi "Lỗi thiết lập kết nối cơ sở dữ liệu" khi dùng worpress.  ','http://2cweb.vn/news/wordpress-cms/tao-trang-bao-loi-database-tuy-chinh-trong-wordpress-17-9.html'),
(6, 'HƯỚNG DẪN - 10 BƯỚC CÀI ĐẶT JOOMLA 2.5 TRÊN LOCALHOST', '2Cwebvn hôm nay xin giới thiệu đến các bạn cách cài đặt joomla 2.5 trên localhost chỉ với 10 bước đơn giản','http://2cweb.vn/news/joomla-cms/huong-dan-10-buoc-cai-dat-joomla-25-tren-localhost-16-16.html'),
(7, 'HƯỚNG DẪN - PHÓNG TO ẢNH CÙNG VỚI TIÊU ĐỀ VỚI ZOOM THUMNAIL IMAGE JQUERY', '2Cwebvn sẽ giúp bạn tìm hiểu làm thế nào để phóng to hình ảnh thu nhỏ, đồng thời hiện tiêu đề trong hình ảnh thumnail khi người dùng hover vào hình ảnh đó','http://2cweb.vn/news/jquery-javascript/huong-dan-phong-to-anh-cung-voi-tieu-de-voi-zoom-thumnail-image-jquery-11-15.html'),
(8, 'BỘ SƯU TẬP TRANH VẼ CỦA FAN DÀNH CHO GHIBILI', 'Hôm nay, 2Cwebvn xin chia sẽ đến các bạn bộ sưu tập mà các fan hâm mộ trên thế giới dành tặng cho những bộ phim của Ghibli. ','http://2cweb.vn/news/graphic-design/bo-suu-tap-tranh-ve-cua-fan-danh-cho-ghibili-6-42.html'),
(9, 'BỘ SƯU TẬP NHỮNG TÁC PHẨM TUYỆT ĐẸP CỦA CHARIS TSEVIS', 'Charis Tsevis là một nhà thiết kế đồ họa người Hy Lạp. Ông bắt đầu studio của mình với cái tên "Tsevis Visual Design" tại Athens','http://2cweb.vn/news/graphic-design/bo-suu-tap-nhung-tac-pham-tuyet-dep-cua-charis-tsevis-6-11.html');




