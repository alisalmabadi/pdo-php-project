-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2018 at 02:36 PM
-- Server version: 5.7.22-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjoman2_portalanjoman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amaken`
--

CREATE TABLE `tbl_amaken` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fiscal`
--

CREATE TABLE `tbl_fiscal` (
  `id` int(11) NOT NULL,
  `payamount` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `reason` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_semat`
--

CREATE TABLE `tbl_group_semat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `semat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_group_semat`
--

INSERT INTO `tbl_group_semat` (`id`, `user_id`, `group_id`, `semat_id`, `status`) VALUES
(87, 2, 2, 12, 1),
(62, 4, 2, 9, 1),
(55, 5, 2, 13, 1),
(54, 5, 1, 14, 1),
(61, 4, 1, 14, 1),
(88, 3, 1, 14, 1),
(82, 2, 5, 15, 1),
(50, 1, 2, 9, 1),
(49, 6, 2, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_meta`
--

CREATE TABLE `tbl_header_meta` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `content` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_header_meta`
--

INSERT INTO `tbl_header_meta` (`id`, `name`, `content`) VALUES
(2, 'author', 'seyyed ali salmabadi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_class`
--

CREATE TABLE `tbl_list_class` (
  `id` int(11) NOT NULL,
  `gharargah_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_course`
--

CREATE TABLE `tbl_list_course` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `teacher_name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `gharargah_name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `date_start` text COLLATE utf8_persian_ci NOT NULL,
  `date_finish` text COLLATE utf8_persian_ci NOT NULL,
  `start_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `end-time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_educate`
--

CREATE TABLE `tbl_list_educate` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `des` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_educate`
--

INSERT INTO `tbl_list_educate` (`id`, `title`, `des`, `status`) VALUES
(1, 'نهم', 'متوسطه دوم', 1),
(2, 'دهم', 'متوسطه دوم', 1),
(3, 'یازدهم', 'متوسطه دوم', 1),
(4, 'پیش دانشگاهی', 'متوسطه دوم', 1),
(5, 'دانشجوی مقطع کارشناسی', 'دارای مدرک دیپلم،در حال حاضر دانشجو', 1),
(6, 'دانشجوی مقطع کارشناسی ارشد', 'دارای مدرک لیسانس،در حال حاضر دانشجو', 1),
(7, 'دانشجوی مقطع دکتری', 'دارای مدرک کارشناسی ارشد،در حال حاضر دانشجو', 1),
(8, 'لیسانس', '', 1),
(9, 'فوق لیسانس', '', 1),
(10, 'دکتری', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_gharargah`
--

CREATE TABLE `tbl_list_gharargah` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `gharargah_mantaghe` int(11) NOT NULL,
  `gharargah_address` text COLLATE utf8_persian_ci NOT NULL,
  `gharargah_morabi` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_gharargah`
--

INSERT INTO `tbl_list_gharargah` (`id`, `title`, `gharargah_mantaghe`, `gharargah_address`, `gharargah_morabi`, `status`) VALUES
(1, 'قرارگاه منطقه 13', 13, 'تهران،خیابان دماوند', '', 1),
(2, 'قرارگاه منطقه 10', 10, 'تهران ی جایی', '', 1),
(6, 'asd', 2, 'asd', 'asd', 0),
(7, 'قرارگاه منطقه 12', 12, 'تهران', 'آقای ابراهیمی', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_group`
--

CREATE TABLE `tbl_list_group` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `des` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_group`
--

INSERT INTO `tbl_list_group` (`id`, `title`, `des`, `status`) VALUES
(1, 'دبیران', 'معلمین و دبیران مجموعه', 1),
(2, 'فارغ التحصیلان', 'دانش آموختگان اتحادیه', 1),
(5, 'کارکنان اتحادیه', 'مسئولین آموزشی،مسئول فرهنگی و ...', 1),
(6, 'مربیان مناطق', 'مربی ها و مسئولان مناطق تهران', 1),
(10, 'دانش آموزان', 'گروه دانش آموزان اتحادیه انجمن های اسلامی دانش آموزان شهر تهران', 1),
(11, 'اولیا', 'گروه اولیا دانش آموزان اتحادیه انجمن های اسلامی دانش آموزان شهر تهران', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_links`
--

CREATE TABLE `tbl_list_links` (
  `id` int(11) NOT NULL,
  `url` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `open_model` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_message`
--

CREATE TABLE `tbl_list_message` (
  `id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `text` longtext COLLATE utf8_persian_ci NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date` text COLLATE utf8_persian_ci NOT NULL,
  `year` text COLLATE utf8_persian_ci NOT NULL,
  `month` text COLLATE utf8_persian_ci NOT NULL,
  `day` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_message`
--

INSERT INTO `tbl_list_message` (`id`, `user_id_from`, `user_id_to`, `title`, `text`, `flag`, `status`, `date`, `year`, `month`, `day`) VALUES
(2, 10, 1, 'تست', '<p>تست</p>\r\n', 1, 1, '۲۳:۱۹:۲۷ +۰۳:۳۰ | چهارشنبه, ۱ آذر ۱۳۹۶', '۹۶', '۹', '۱'),
(4, 10, 4, 'سلام خسته نباشید', '<p>فردا بیاید اتحادیه</p>\r\n', 1, 1, '۲۳:۲۲:۱۰ +۰۳:۳۰ | چهارشنبه, ۱ آذر ۱۳۹۶', '۹۶', '۹', '۱'),
(5, 10, 4, 'چرا؟!', '<p>جون مادرت کار کن!</p>\r\n', 1, 1, '۲۳:۲۳:۱۴ +۰۳:۳۰ | چهارشنبه, ۱ آذر ۱۳۹۶', '۹۶', '۹', '۱'),
(6, 10, 4, 'چرا؟!', '<p>جون مادرت کار کن!</p>\r\n', 1, 1, '۲۳:۵۱:۲۵ +۰۳:۳۰ | چهارشنبه, ۱ آذر ۱۳۹۶', '۹۶', '۹', '۱'),
(7, 10, 3, 'ad', '<p>asd</p>\r\n', 0, 0, '۱۶:۲۹:۵۳ +۰۳:۳۰ | پنجشنبه, ۲ آذر ۱۳۹۶', '۹۶', '۹', '۲'),
(8, 10, 4, 'ad', '<p>asd</p>\r\n', 1, 0, '۱۶:۲۹:۵۳ +۰۳:۳۰ | پنجشنبه, ۲ آذر ۱۳۹۶', '۹۶', '۹', '۲'),
(9, 10, 1, 'این خیلی خوبه!', '<p>اینم خیلی خوبه!</p>\r\n', 1, 1, '۱۶:۳۲:۰۴ +۰۳:۳۰ | پنجشنبه, ۲ آذر ۱۳۹۶', '۹۶', '۹', '۲'),
(10, 10, 5, 'این خیلی خوبه!', '<p>\r\nسلام دوستان گرامی\r\nاین پیام کاملا واقعیه و اگه ثبت نام کنین در عرض چند ماه یه پول خوب نصیبتون میشه. برای رقابت با بیت کوین این واحد پولی اومده و برای اینکه بتونه رقابت کنه نیاز داره سئو سایت و تعداد کاربرانشو افزایش بده برا همین به اونایی که ثبت نام میکنن 50wcx اختصاص میده . قراره به زودی بشه wcx رو خرید و فروش کرد الان قیمت هر واحد ۱۰ سنته ولی اگه عرضش شروع بشه پیش بینی میشه طی یکی دوماه قیمت هرواحد به ۱۰ دلار برسه و بتدریج این مبلغ باز هم افزایش پیدا میکنه بنابراین فقط با ثبت نام طی یکی دوماه ۵۰۰ \r\n</p>\r\n', 1, 1, '۱۶:۳۲:۰۴ +۰۳:۳۰ | پنجشنبه, ۲ آذر ۱۳۹۶', '۹۶', '۹', '۲'),
(11, 10, 5, 'تست', '<p>تست</p>\r\n', 1, 0, '۲۳:۲۷:۱۴ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '۹۶', '۹', '۴'),
(12, 10, 5, 'تست', '<p>تست</p>\r\n', 1, 1, '۲۳:۳۹:۴۴ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '۹۶', '۹', '۴'),
(13, 10, 5, 'سلام آقای دولت شاهی', '<p>سلام بیا !</p>\r\n', 1, 1, '۲۱:۲۲:۳۸ +۰۳:۳۰ | یکشنبه, ۵ آذر ۱۳۹۶', '۹۶', '۹', '۵'),
(14, 10, 5, 'شسی', '<p>تست</p>\r\n', 1, 0, '۲۱:۴۳:۳۴ +۰۳:۳۰ | یکشنبه, ۵ آذر ۱۳۹۶', '۹۶', '۹', '۵'),
(15, 10, 5, 'تست2', '<p>شسی</p>\r\n', 1, 0, '۲۱:۴۸:۵۵ +۰۳:۳۰ | یکشنبه, ۵ آذر ۱۳۹۶', '۹۶', '۹', '۵'),
(16, 10, 5, 'به سامانه خوش آمدی!', '<p>این سامانه بر مبنای زبان قدرتمند php نوشته شده است.</p>\r\n', 1, 1, '۲۲:۱۰:۰۶ +۰۳:۳۰ | یکشنبه, ۵ آذر ۱۳۹۶', '۹۶', '۹', '۵'),
(17, 10, 5, 'سلام چه طوری !', '<p>شسیشسی</p>\r\n', 1, 0, '۲۳:۴۶:۲۶ +۰۳:۳۰ | یکشنبه, ۵ آذر ۱۳۹۶', '۹۶', '۹', '۵'),
(18, 10, 5, 'تست', '<p><img alt=\"smiley\" src=\"http://localhost:1604/samane_anjoman/panel/tools/ckeditor/plugins/smiley/images/regular_smile.png\" style=\"height:23px; width:23px\" title=\"smiley\" /></p>\r\n', 1, 1, '۱۰:۵۱:۵۶ +۰۳:۳۰ | دوشنبه, ۱۳ آذر ۱۳۹۶', '۹۶', '۹', '۱۳'),
(19, 10, 5, 'تست', '<p>سسس</p>\r\n', 1, 1, '۱۵:۲۰:۳۷ +۰۳:۳۰ | شنبه, ۱۹ اسفند ۱۳۹۶', '۹۶', '۱۲', '۱۹'),
(20, 10, 1, 'سشیشی', '<p>شسیشسی</p>\r\n', 0, 0, '۱۶:۰۱:۵۵ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(21, 10, 1, 'شسی', '<p>شسی</p>\r\n', 1, 1, '۱۶:۰۳:۳۵ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(22, 10, 5, 'سلام این یک پیام تست است!', '<p>سلام این یک پیام تست است!</p>\r\n', 1, 1, '۱۶:۰۸:۵۳ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(23, 10, 4, 'سلام این یک پیام تست است!', '<p>سلام این یک پیام تست است!</p>\r\n', 1, 1, '۱۶:۰۸:۵۳ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(24, 10, 3, 'سلام این یک پیام تست است!', '<p>سلام این یک پیام تست است!</p>\r\n', 0, 0, '۱۶:۰۸:۵۳ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(25, 10, 2, 'سلام این یک پیام تست 5شسیسش6ی5شس65ی!', '<p>سلام این یک پیام تست استسیبیسب!</p>\r\n', 1, 1, '۱۶:۰۸:۵۳ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲'),
(26, 10, 1, 'سلام این یک پیام تست 12385', '<p>سلام این یک پیام123</p>\r\n', 1, 0, '۱۶:۰۸:۵۳ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '۹۶', '۱۲', '۲۲');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_news`
--

CREATE TABLE `tbl_list_news` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `text` longtext COLLATE utf8_persian_ci NOT NULL,
  `year` text COLLATE utf8_persian_ci NOT NULL,
  `month` text COLLATE utf8_persian_ci NOT NULL,
  `day` text COLLATE utf8_persian_ci NOT NULL,
  `date` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_news`
--

INSERT INTO `tbl_list_news` (`id`, `title`, `text`, `year`, `month`, `day`, `date`) VALUES
(1, 'افتتاحیه ششمین دوره نمایشگاه های مدرسه انقلاب با حضور حاج آقا حاج علی اکبری', '<p>&nbsp;</p>\r\n\r\n<p>به گزارش اتحادیه انجمن های اسلامی دانش آموزان شهر تهران :نشست فانوس راه ۴ با حضور ۱۸ نفر از سرگروه های اتحادیه انجمن های اسلامی دانش آموزان شهر تهران در اردوگاه یاوران حضرت مهدی(عج) واقع در شهر مقدس قم برگزار شد. به گزارش روابط عمومی ، این اردو که شرکت کنندگان آن از انجمن های اسلامی سراسرکشور بودند برای بار نخست مخصوص سرگروه ها ، توسط دفتر مرکزی اتحادیه برگزار شد.</p>\r\n\r\n<p>همچنین در این نشست معاون پرورشی وزارت آموزش وپرورش و دبیرکل محترم اتحادیه نیز حضور پیدا کردند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1396', '10', '20', 'دوشنبه 12 آبان ماه 1396'),
(15, 'گزارش مربوط به سامانه', '<p>سلام فارغ ها سلام فارغ هاسلام فارغ هاسلام فارغ ها خوبید؟&nbsp;<img alt=\"smiley\" src=\"http://localhost:1604/samane_anjoman/panel/tools/ckeditor/plugins/smiley/images/regular_smile.png\" style=\"height:23px; width:23px\" title=\"smiley\" /></p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>به گزارش گروه بین&zwnj;الملل <a href=\"http://www.farsnews.com\">خبرگزاری فارس</a>، &laquo;یوکیا آمانو&raquo; مدیرکل آژانس بین&zwnj;المللی انرژی اتمی امروز (دوشنبه) مجددا تاکید کرد ایران به تعهداتش تحت توافق هسته&zwnj;ای پایبند بوده و بازرسان این آژانس برای اقدامات راستی&zwnj;آزمایی خود مشکلی ندارند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>آمانو طی یک کنفرانس خبری در حاشیه همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در &laquo;ابوظبی&raquo; گفت: &laquo;آژانس اتمی می&zwnj;تواند تاکید کند که چنین تعهدات هسته&zwnj;ای در حال اجرا شده است.&raquo;</p>\r\n\r\n<p>به نوشته خبرگزاری &laquo;<a href=\"http://www.reuters.com/article/us-iran-nuclear-iaea/iran-meeting-nuclear-deal-commitments-iaea-chief-idUSKBN1CZ0YZ?il=0\">رویترز</a>&raquo; وی همچنین افزود: &laquo;از ایران خواستم که تعهدات هسته&zwnj;ای خود را به طور کامل اجرا کند... این محرک اصلی دیدار با ایران بود...درخصوص فعالیت&zwnj;های بازرسان ما، آنها به وظایف خود بدون مشکلی عمل می&zwnj;کنند.&raquo;</p>\r\n\r\n<p>مدیرکل آژانس اتمی ادامه داد در دیداری که با مقامات ایرانی داشته به آنها گفته که توافق هسته&zwnj;ای &laquo;یک دستاورد مهم در زمینه راستی&zwnj;آزمایی&raquo; بوده است.</p>\r\n\r\n<p>آمانو اما از اظهار نظر درباره استراتژی جدید آمریکا علیه ایران و عدم حضور مقامات ایرانی در این همایش بین&zwnj;المللی انرژی هسته&zwnj;ای در امارات عربی متحده امتناع کرد.</p>\r\n\r\n<p>وی روز گذشته طی سفر به تهران و نشست خبری مشترک با &laquo;علی&zwnj;اکبر صالحی&raquo; رئیس سازمان انرژی اتمی ایران ضمن تایید پایبندی ایران به برجام، از همه طرف&zwnj;های توافق هسته&zwnj;ای خواست به تعهداتشان تحت برجام عمل کنند. (<a href=\"http://www.farsnews.com/13960807000572\">جزئیات بیشتر</a>)</p>\r\n\r\n<p>انتهای پیام/</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '۹۶', '۸', '۸', '۱۳:۲۳:۵۷ +۰۳:۳۰ | دوشنبه, ۸ آبان ۱۳۹۶'),
(16, 'این یک عنوان تست است...', '<p><img alt=\"\" src=\"https://cdn.isna.ir/d/2018/03/13/3/57653579.jpg\" style=\"float:left; height:354px; width:504px\" /></p>\r\n\r\n<p>در آستانه آخرین شب چهارشنبه سال بازار لوازم این شب با تقاضای زیادی همراه شده است؛ بازاری که وسایل آن تنوع زیادی دارد عمدتا به صورت قاچاق از چین می&zwnj;آید که گردش مالی چند میلیاردی دارد و متقاضیان آن هم اغلب نوجوانان هستند.</p>\r\n\r\n<p dir=\"RTL\">به گزارش ایسنا، با فرا رسیدن شب چهارشنبه&zwnj;سوری بازار لوازم این شب داغ شده است و متقاضیان زیادی برای تهیه این لوازم و وسایل اقدام می&zwnj;کنند، چراکه چهارشنبه سوری یکی از ایام باستانی و سنتی ایرانیان است که مراسم آن هر سال توسط بخش زیادی از مردم به ویژه جوان&zwnj;ترها برگزار می&zwnj;شود.</p>\r\n\r\n<p dir=\"RTL\">البته در سالیان اخیر فرا رسیدن چهارشنبه سوری همواره با نگرانی&zwnj;های زیادی روبرو است و همیشه بیمارستان&zwnj;های کشور در این شب میزبان تعداد زیادی از مجروحان و مصدومان این شب هستند؛ اتفاقی که باعث شده یک سنت قدیمی که می&zwnj;تواند موجب نشاط اجتماعی شود به یک رخداد حادثه&zwnj;ساز تبدیل گردد.</p>\r\n\r\n<p dir=\"RTL\">شاید یکی از سوالات این باشد که وسایل چهارشنبه سوری از کجا تهیه می&zwnj;شود. وسایلی که این روزها تقریبا در بازارهای بزرگ و کوچک قابل مشاهده است؛ از کنار خیابان&zwnj;ها و چهارراه&zwnj;های اصلی تا مترو و بازار بزرگ تهران.</p>\r\n\r\n<p dir=\"RTL\">یکی از مناطقی که این لوازم را عرضه می&zwnj;کند بازار بزرگ پایتخت است که دستفروشان وسایل چهارشنبه سوری را می&zwnj;فروشند. اما اصلی&zwnj;ترین منطقه&zwnj;ای در تهران که توزیع کننده این لوازم است خیابان مولوی است که به صورت عمده در آنجا قابل مشاهده است و خرده فروشان این لوازم را از این منطقه تهیه می&zwnj;کنند، برای همین معمولا این لوازم در این منطقه ارزان&zwnj;تر است.</p>\r\n\r\n<p dir=\"RTL\">به طور کلی لوازم چهارشنبه سوری را می&zwnj;توان به دو دسه تقسیم کرد. یکی لوازم کم خطر و بی&zwnj;خطر و دیگری لوازم پرخطر. بخش زیادی از وسایلی که دستفروشان عرضه می&zwnj;کنند شامل وسایل کم خطر و بی خطر می&zwnj;شود مانند بالن، سیگارت، سوتی، کپسول، آبشار و منور.</p>\r\n\r\n<p dir=\"RTL\">بعضی از این وسایل جنبه زیبایی هم دارد و در شب چهارشنبه سوری جلوه جالبی به شهر می&zwnj;دهد. بعضی دیگر هم مثل سیگارت و کپسول با اینکه خطر جدی ندارند اما سر و صدای زیادی ایجاد می&zwnj;کنند.</p>\r\n\r\n<p dir=\"RTL\">عمده لوازمی هم که در چهارشنبه پایانی سال استفاده می&zwnj;شود شامل همین لوازم است اما عده&zwnj;ای هم هستند که به سراغ لوازم پر خطرتر می&zwnj;روند؛ لوازمی که نه تنها صداهای گوش خراشی دارند بلکه درصد آسیب و تلفات&zwnj; انسانی&zwnj;شان بسیار بالاست.</p>\r\n\r\n<p dir=\"RTL\">اکلیل سرنج که برای تهیه نارنجک های دستی استفاده می&zwnj;شود یکی از این وسایل است که در این سال&zwnj;ها حوادث زیادی آفریده است. نارنجک&zwnj;های دستی معمولا توسط افراد در زیرزمین و جاهایی مانند آن تهیه می&zwnj;شود و با توجه به اشتعال پذیری بالای این مواد، امکان انفجار آن بسیار بالاست. &nbsp;</p>\r\n\r\n<p dir=\"RTL\">عمده متقاضیان این بازار هم جوان&zwnj;ها و به ویژه نوجوان&zwnj;ها هستند؛ کسانی که به دنبال تفریح و نشاط هستند اما خیلی&zwnj;هایشان نمی&zwnj;دانند چطور انرژی&zwnj;شان را تخلیه کنند و بعضا روش&zwnj;های اشتباهی را برای این کار انتخاب می&zwnj;کنند.</p>\r\n\r\n<p dir=\"RTL\">البته کودکان و نوجوانانی هم هستند که با پدر و مادرشان برای خرید این لوازم به بازار می&zwnj;آیند. والدینی که می&zwnj;خواهند نسبت به وسایلی که فرزندانشان می&zwnj;خرند نظارت کنند و حتی خودشان در شب چهارشنبه سوری کنار بچه&zwnj;ها حضور می&zwnj;یابند و در کنار هم از روی آتش می&zwnj;پرند و مراسم این شب را برگزار می&zwnj;کنند.</p>\r\n\r\n<p dir=\"RTL\">گردش مالی این بازار برخلاف تصور، بسیار بالاست و سود بالایی برای پخش&zwnj;کننده&zwnj;ها و فروشندگان این مواد دارد و صحبت از گردش مالی چند ده میلیاردی این بازار است. عمده این مواد هم به گفته فروشندگان از کشور چین و به صورت قاچاق وارد می&zwnj;شود.</p>\r\n\r\n<p dir=\"RTL\">&nbsp;نگاهی به بازار این لوازم نشان از تنوع این وسایل دارد. هر بسته بالن ۸۰۰۰ تومان، هفت ترقه بسته&zwnj;ای ۷۰۰۰ تومان، &zwnj; سوتی بسته&zwnj;ای ۸۰۰۰ تومان، آبشار ۳۰۰۰ تومان، کپسول ۲۰۰۰ تومان، پروانه بسته&zwnj;ای ۸۰۰۰ تومان، منور بسته&zwnj;ای ۱۲ هزار تومان، سیگارت بسته&zwnj;ای ۱۰ هزار تومان، کپسول بسته&zwnj;ای ۲۰ هزار تومان، مشعل ۲۰۰۰ تومان و کهکشان تکی ۱۵۰۰ تومان قیمت دارد.</p>\r\n\r\n<p dir=\"RTL\">&nbsp;</p>\r\n', '۹۶', '۱۲', '۲۴', '۰۰:۵۶:۴۷ +۰۳:۳۰ | پنجشنبه, ۲۴ اسفند ۱۳۹۶'),
(17, 'سامانه به زودی افتتاح میگردد.', '<p>تست</p>\r\n', '۹۶', '۱۲', '۲۴', '۰۱:۰۷:۱۸ +۰۳:۳۰ | پنجشنبه, ۲۴ اسفند ۱۳۹۶'),
(18, 'آموزش استفاده از سامانه', '<p>تست</p>\r\n', '۹۶', '۱۲', '۲۴', '۰۱:۰۷:۵۲ +۰۳:۳۰ | پنجشنبه, ۲۴ اسفند ۱۳۹۶'),
(19, 'اتحادیه انجمن های اسلامی دانش آموزان شهر تهران', '<p>تست</p>\r\n', '۹۶', '۱۲', '۲۴', '۰۱:۰۸:۱۸ +۰۳:۳۰ | پنجشنبه, ۲۴ اسفند ۱۳۹۶');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_reshte`
--

CREATE TABLE `tbl_list_reshte` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_reshte`
--

INSERT INTO `tbl_list_reshte` (`id`, `name`, `status`) VALUES
(1, 'ریاضی فیزیک', 1),
(2, 'تجربی', 1),
(3, 'انسانی', 1),
(4, 'فنی حرفه ای', 1),
(5, 'کار و دانش', 1),
(6, 'مهندسی مکانیک', 1),
(7, 'مهندسی صنایع', 1),
(8, 'مهندسی نرم افزار ', 1),
(9, 'مهندسی مواد و متالوژی', 1),
(10, 'مهندسی سخت افزار', 1),
(11, 'مهندسی برق', 1),
(12, 'مهندسی معماری', 1),
(13, 'مهندسی عمران', 1),
(14, 'مهندسی شیمی', 1),
(15, 'اقتصاد', 1),
(16, 'ریاضی محض', 1),
(17, 'فیزیک محض', 1),
(19, 'علم فقه و حدیث', 1),
(21, 'مهندسی آب', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_sandogh_users`
--

CREATE TABLE `tbl_list_sandogh_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sign_up_date` text COLLATE utf8_persian_ci NOT NULL,
  `user_sarane` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `user_shakhsi` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `count_vam` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `last_vam` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_sandogh_users`
--

INSERT INTO `tbl_list_sandogh_users` (`id`, `user_id`, `sign_up_date`, `user_sarane`, `user_shakhsi`, `status`, `count_vam`, `last_vam`) VALUES
(1, 1, '1396/8/1', '0', '0', 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_sandogh_variz`
--

CREATE TABLE `tbl_list_sandogh_variz` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variz_date` text COLLATE utf8_persian_ci NOT NULL,
  `amount` varchar(254) COLLATE utf8_persian_ci NOT NULL DEFAULT '10000',
  `sandogh_user_id` int(11) NOT NULL,
  `details` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_sandogh_variz`
--

INSERT INTO `tbl_list_sandogh_variz` (`id`, `user_id`, `variz_date`, `amount`, `sandogh_user_id`, `details`) VALUES
(1, 1, '1396/8/2', '10000', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_semat`
--

CREATE TABLE `tbl_list_semat` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `des` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_semat`
--

INSERT INTO `tbl_list_semat` (`id`, `group_id`, `title`, `des`, `status`) VALUES
(9, 2, 'مدریت فارغ ها', 'مدریت فارغ های اتحادیه', 1),
(10, 6, 'مربی منطقه 13', '', 1),
(11, 1, 'دبیرزبان', 'دبیر افق نوین', 1),
(12, 2, 'مدیر روابط عمومی', 'خیلی هم عالی', 1),
(13, 2, 'سرگروه', '', 1),
(14, 1, 'دبیر دین و زندگی', 'دبیر دینی دیگه!', 1),
(15, 5, 'خدمات', 'مستخدمین و ...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_terms`
--

CREATE TABLE `tbl_list_terms` (
  `id` int(11) NOT NULL,
  `start_date` text COLLATE utf8_persian_ci NOT NULL,
  `end_date` text COLLATE utf8_persian_ci NOT NULL,
  `count_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_uni`
--

CREATE TABLE `tbl_list_uni` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_uni`
--

INSERT INTO `tbl_list_uni` (`id`, `name`, `city`, `address`, `type`) VALUES
(1, 'خوارزمی', 'کرج', '', 'دولتی'),
(2, 'صنعتی شریف', 'تهران', '', 'دولتی'),
(4, 'علم و فرهنگ', 'تهران', '', 'غیرانتفاعی'),
(6, 'ایوانکی', 'ایوانکی', 'ایوانکی،دانشگاه ایوانکی', 'غیرانتفاعی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_usefull_links`
--

CREATE TABLE `tbl_list_usefull_links` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `open_model` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_user`
--

CREATE TABLE `tbl_list_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `jensiat` int(11) NOT NULL DEFAULT '1',
  `father_name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `reshteh` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `paye` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `birthday` text COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `home_address` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `home_tel` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `father_tel` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `father_job` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `uni_id` int(11) NOT NULL,
  `bio` text COLLATE utf8_persian_ci NOT NULL,
  `pic` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_list_user`
--

INSERT INTO `tbl_list_user` (`id`, `username`, `password`, `name`, `lastname`, `jensiat`, `father_name`, `reshteh`, `paye`, `birthday`, `status`, `home_address`, `home_tel`, `tel`, `father_tel`, `father_job`, `email`, `uni_id`, `bio`, `pic`) VALUES
(1, 'ali', '79380254', 'سید علی', 'سلم آبادی', 1, 'سید جلیل', '6', '5', '1377/10/20', 1, 'تهران خیابان ششم نیروهوایی کوچه 6.27 پلاک 44 طبقه دوم', '02177984103', '09904932093', '09124133813', 'کارمند', 'uclearn@yahoo.com', 0, '', 'img/users/d1292ed910759be45e95214a04f205c0).jpg'),
(2, 'miri', '0260738798198cc84cda01b0fe7ab14f', 'سید علی', 'میری', 1, 'محمد حسن', '15', '5', '1370/12/10', 1, 'حکیمیه،بلوار سرسبز', '123456789', '09393761522', '0935133813', 'نمیدونم!', 'seyedalimir@gmail.com', 0, '', 'img/users/9ccadad094b5c0fea4d764b20a4158eci.jpg'),
(3, 'alidolat', '0260738798198cc84cda01b0fe7ab14f', 'علی', 'دولت شاهی', 1, 'اصغر', '7', '5', '1377/10/21', 1, 'تهران میدان چایچی،فلکه دوم تهران پارس،کوچه 6.22', '02177984103', '091212121212', '09225617555', 'کارمند', 'alidolat@gmail.com', 0, '', 'img/users/ce6bf749fbd3313336c8b1915b1627a2t.jpg'),
(4, 'esmi', '0260738798198cc84cda01b0fe7ab14f', 'محمد علی', 'اسمی', 1, 'محمد', '7', '5', '1370/12/12', 1, 'تهران،حکیمیه،کوچه بهار،پلاک 13 طبقه دوم', '02177984103', '09393761522', '0935133813', 'کارمند', 'mohammadali@gmail.com', 0, '', 'img/users/8af8aa3f32ec27a8e90b29e89cd9f4dei.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_ip`
--

CREATE TABLE `tbl_log_ip` (
  `id` int(11) NOT NULL,
  `user_id` int(254) NOT NULL,
  `datetime` text COLLATE utf8_persian_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_log_ip`
--

INSERT INTO `tbl_log_ip` (`id`, `user_id`, `datetime`, `ip`, `type`) VALUES
(5, 4, '۱۲:۲۴:۳۳ +۰۳:۳۰ | یکشنبه, ۲۸ آبان ۱۳۹۶', '::1', 1),
(6, 4, '۱۴:۰۵:۱۴ +۰۳:۳۰ | یکشنبه, ۲۸ آبان ۱۳۹۶', '::1', 2),
(7, 4, '۲۳:۱۴:۱۲ +۰۳:۳۰ | یکشنبه, ۲۸ آبان ۱۳۹۶', '::1', 2),
(8, 4, '۱۰:۳۱:۴۵ +۰۳:۳۰ | دوشنبه, ۲۹ آبان ۱۳۹۶', '127.0.0.1', 2),
(9, 4, '۱۱:۰۱:۱۹ +۰۳:۳۰ | دوشنبه, ۲۹ آبان ۱۳۹۶', '::1', 2),
(11, 10, '۱۱:۱۴:۵۴ +۰۳:۳۰ | دوشنبه, ۲۹ آبان ۱۳۹۶', '::1', 1),
(12, 10, '۱۹:۲۱:۴۴ +۰۳:۳۰ | سه شنبه, ۳۰ آبان ۱۳۹۶', '::1', 1),
(13, 4, '۱۹:۲۹:۵۷ +۰۳:۳۰ | سه شنبه, ۳۰ آبان ۱۳۹۶', '::1', 2),
(14, 10, '۱۹:۳۲:۴۸ +۰۳:۳۰ | سه شنبه, ۳۰ آبان ۱۳۹۶', '::1', 1),
(15, 5, '۱۹:۱۸:۲۶ +۰۳:۳۰ | پنجشنبه, ۲ آذر ۱۳۹۶', '::1', 2),
(16, 4, '۰۰:۱۲:۴۵ +۰۳:۳۰ | جمعه, ۳ آذر ۱۳۹۶', '::1', 2),
(17, 4, '۲۰:۳۷:۴۳ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 2),
(18, 5, '۲۱:۱۸:۲۰ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 2),
(19, 5, '۲۲:۳۸:۱۹ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 2),
(20, 10, '۲۲:۵۱:۳۶ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 1),
(21, 4, '۲۳:۱۰:۰۰ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 2),
(22, 10, '۲۳:۲۶:۴۵ +۰۳:۳۰ | شنبه, ۴ آذر ۱۳۹۶', '::1', 1),
(23, 10, '۱۹:۲۸:۴۴ +۰۳:۳۰ | شنبه, ۱۱ آذر ۱۳۹۶', '::1', 1),
(24, 5, '۲۱:۱۶:۰۰ +۰۳:۳۰ | شنبه, ۱۱ آذر ۱۳۹۶', '::1', 2),
(25, 5, '۲۱:۰۱:۴۳ +۰۳:۳۰ | یکشنبه, ۱۲ آذر ۱۳۹۶', '::1', 2),
(26, 5, '۲۱:۰۴:۵۰ +۰۳:۳۰ | یکشنبه, ۱۲ آذر ۱۳۹۶', '::1', 2),
(27, 5, '۲۱:۴۶:۲۶ +۰۳:۳۰ | یکشنبه, ۱۲ آذر ۱۳۹۶', '::1', 2),
(28, 5, '۱۰:۴۹:۱۰ +۰۳:۳۰ | دوشنبه, ۱۳ آذر ۱۳۹۶', '::1', 2),
(29, 10, '۱۰:۵۰:۱۴ +۰۳:۳۰ | دوشنبه, ۱۳ آذر ۱۳۹۶', '::1', 1),
(30, 10, '۱۳:۱۷:۴۳ +۰۳:۳۰ | دوشنبه, ۱۳ آذر ۱۳۹۶', '::1', 1),
(31, 5, '۱۱:۵۳:۰۰ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(32, 10, '۱۲:۱۱:۳۵ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 1),
(33, 5, '۱۲:۲۴:۴۹ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(34, 5, '۱۲:۲۶:۲۴ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(35, 4, '۱۲:۳۳:۵۲ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(36, 5, '۱۳:۰۱:۰۷ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(37, 4, '۱۳:۰۳:۵۹ +۰۳:۳۰ | جمعه, ۱۷ آذر ۱۳۹۶', '::1', 2),
(38, 10, '۲۲:۲۲:۰۵ +۰۳:۳۰ | یکشنبه, ۱۹ آذر ۱۳۹۶', '::1', 1),
(39, 5, '۲۲:۲۲:۳۳ +۰۳:۳۰ | یکشنبه, ۱۹ آذر ۱۳۹۶', '::1', 2),
(40, 5, '۲۱:۰۲:۱۰ +۰۳:۳۰ | دوشنبه, ۲۰ آذر ۱۳۹۶', '::1', 2),
(41, 10, '۱۸:۴۷:۵۱ +۰۳:۳۰ | چهارشنبه, ۲۲ آذر ۱۳۹۶', '::1', 1),
(42, 5, '۱۸:۵۴:۳۲ +۰۳:۳۰ | چهارشنبه, ۲۲ آذر ۱۳۹۶', '::1', 2),
(43, 4, '۱۹:۲۴:۴۸ +۰۳:۳۰ | چهارشنبه, ۲۲ آذر ۱۳۹۶', '::1', 2),
(44, 10, '۱۱:۱۱:۱۸ +۰۳:۳۰ | جمعه, ۲۴ آذر ۱۳۹۶', '::1', 1),
(45, 5, '۱۴:۰۲:۱۶ +۰۳:۳۰ | دوشنبه, ۲۷ آذر ۱۳۹۶', '::1', 2),
(46, 5, '۱۸:۲۷:۰۳ +۰۳:۳۰ | پنجشنبه, ۳۰ آذر ۱۳۹۶', '::1', 2),
(47, 10, '۲۳:۰۶:۱۹ +۰۳:۳۰ | یکشنبه, ۱۵ بهمن ۱۳۹۶', '::1', 1),
(48, 5, '۲۳:۰۸:۴۲ +۰۳:۳۰ | یکشنبه, ۱۵ بهمن ۱۳۹۶', '::1', 2),
(49, 5, '۰۰:۲۹:۱۷ +۰۳:۳۰ | جمعه, ۱۱ اسفند ۱۳۹۶', '::1', 2),
(50, 5, '۱۰:۳۸:۰۸ +۰۳:۳۰ | پنجشنبه, ۱۷ اسفند ۱۳۹۶', '::1', 2),
(51, 10, '۱۰:۴۱:۲۵ +۰۳:۳۰ | پنجشنبه, ۱۷ اسفند ۱۳۹۶', '::1', 1),
(52, 5, '۱۴:۴۶:۲۷ +۰۳:۳۰ | شنبه, ۱۹ اسفند ۱۳۹۶', '::1', 2),
(53, 10, '۱۴:۴۷:۴۳ +۰۳:۳۰ | شنبه, ۱۹ اسفند ۱۳۹۶', '::1', 1),
(54, 10, '۱۵:۴۲:۱۶ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '::1', 1),
(55, 5, '۲۳:۲۱:۵۵ +۰۳:۳۰ | سه شنبه, ۲۲ اسفند ۱۳۹۶', '::1', 2),
(56, 1, '۲۳:۲۸:۳۱ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '::1', 2),
(57, 4, '۰۱:۴۵:۵۲ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.114.34.200', 2),
(58, 10, '۰۹:۵۰:۰۰ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.239.85.212', 1),
(59, 2, '۱۰:۰۹:۱۲ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.239.8.87', 2),
(60, 10, '۱۱:۳۴:۴۰ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.114.94.80', 1),
(61, 2, '۱۱:۳۷:۵۵ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.114.94.80', 2),
(62, 10, '۲۰:۱۶:۳۳ +۰۳:۳۰ | چهارشنبه, ۲۳ اسفند ۱۳۹۶', '5.239.39.253', 1),
(63, 4, '۱۴:۴۵:۱۲ +۰۴:۳۰ | پنجشنبه, ۳۰ فروردین ۱۳۹۷', '5.112.175.199', 2),
(64, 10, '۱۵:۲۲:۵۷ +۰۴:۳۰ | پنجشنبه, ۳۰ فروردین ۱۳۹۷', '5.112.175.199', 1),
(65, 10, '۰۰:۲۳:۲۷ +۰۴:۳۰ | یکشنبه, ۳ تیر ۱۳۹۷', '5.112.121.68', 1),
(66, 10, '۰۰:۰۴:۱۸ +۰۴:۳۰ | یکشنبه, ۳۱ تیر ۱۳۹۷', '5.112.98.158', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `lname` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `pic` text COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`id`, `name`, `lname`, `username`, `password`, `email`, `tel`, `pic`, `status`) VALUES
(4, 'علی', 'تقی زاده', 'mmfsdf', 'f9987fdc7f14e9b68dc3d67eba2bf9a2', 'alierb@yahoo.com', '139139', 'img/admins/721ad1519e6934255cd6e11126de26144.png', 1),
(5, 'asd', 'asdsad', 'mmfsdf', 'cfd7747d1993b12d84b58a69c090c76f', 'asdasd@asda.asd', '0022222', 'img/admins/721ad1519e6934255cd6e11126de26144.png', 1),
(6, 'سید حامد', 'غفوری', 'mmfsdf', '8efacd69bdfcf1f92f260ff2640d7c10', 'sadad.asdasd@sdfdsf.sdfs', '021888888', 'img/admins/721ad1519e6934255cd6e11126de26144.png', 1),
(8, 'سید علی', 'سلم آبادی', 'adminhastam', '002e693d2eae01824c6a191609c67db3', 's.alisalmabadi@yahoo.com', '09904932093', 'img/admins/721ad1519e6934255cd6e11126de26144.png', 1),
(9, 'سید مسعودsss', 'سلم ابادی', 'masoud1', 'b08267958dd46dfc9fe6ca597ffe638c', 'MASOUD@HH.D', '09354133813', 'img/admins/721ad1519e6934255cd6e11126de26144.png', 0),
(10, 'مدیر', 'سایت', 'adminali', '0260738798198cc84cda01b0fe7ab14f', 'sadad.asssdasd@sdfdsfs.sdfs', '09904932093', 'img/admins/44b01dd709739f1f621efdef83ac9a7ds.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_index`
--

CREATE TABLE `tbl_menu_index` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `target` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_menu_index`
--

INSERT INTO `tbl_menu_index` (`id`, `title`, `url`, `target`, `status`) VALUES
(30, 'تماس با ما', 'http://ayandehsazan.ir', '_blank', 1),
(40, 'درباره ما', 'http://anjomanyaran.ir', '_self', 1),
(50, 'سایت آینده سازان', 'http://ayandehsazan.ir', '_blank', 1),
(110, 'ورود به سایت اصلی', 'http://anjomanyaran.ir', '_blank', 1),
(200, 'صفحه اصلی', 'http://localhost/samane_anjoman', '_self', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `date` text COLLATE utf8_persian_ci NOT NULL,
  `refid` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `recode` int(11) NOT NULL,
  `salerefid` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_setting`
--

CREATE TABLE `tbl_payment_setting` (
  `terminalid` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_payment_setting`
--

INSERT INTO `tbl_payment_setting` (`terminalid`, `username`, `password`) VALUES
('asdasdasdasd', 'asdas', 'sdsdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `access` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_answer`
--

CREATE TABLE `tbl_poll_answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_question`
--

CREATE TABLE `tbl_poll_question` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `id` int(11) NOT NULL,
  `gharargah_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `weekdays_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sign_term`
--

CREATE TABLE `tbl_sign_term` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gharargah_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_setting`
--

CREATE TABLE `tbl_site_setting` (
  `open` int(11) NOT NULL DEFAULT '1',
  `reason` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_site_setting`
--

INSERT INTO `tbl_site_setting` (`open`, `reason`) VALUES
(1, '<p style=\"text-align:center\"><span style=\"color:#e74c3c\"><strong>در حال حاضر سامانه در حال بروزرسانی میباشد،لطفا بعدا مراجعه فرمایید.</strong></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_setting`
--

CREATE TABLE `tbl_system_setting` (
  `allow_login` int(11) NOT NULL DEFAULT '1',
  `count_news` int(11) NOT NULL,
  `index_title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `panel_title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `panel_color` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `index_color` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_system_setting`
--

INSERT INTO `tbl_system_setting` (`allow_login`, `count_news`, `index_title`, `panel_title`, `panel_color`, `index_color`) VALUES
(0, 6, 'اتحادیه انجمن های اسلامی دانش آموزان شهر تهران', 'صفحه اصلی سامانه انجمن اسلامی دانش آموزان شهر تهران', 'AB8877', '222222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_template_setting`
--

CREATE TABLE `tbl_template_setting` (
  `logo` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `meta_description` text COLLATE utf8_persian_ci NOT NULL,
  `meta_keyword` varchar(254) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_template_setting`
--

INSERT INTO `tbl_template_setting` (`logo`, `meta_description`, `meta_keyword`) VALUES
('img/logo/482b5b6acb69437300fe20b9d2d7ca5f1.png', 'اتحادیه انجمن های اسلامی دانش آموزان شهر تهران اتجادیه بزرگی است', 'سامانه اتحادیه,انجمن اسلامی دانش آموزان شهر تهران,اتحادیه,انجمن');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weekdays`
--

CREATE TABLE `tbl_weekdays` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amaken`
--
ALTER TABLE `tbl_amaken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fiscal`
--
ALTER TABLE `tbl_fiscal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_semat`
--
ALTER TABLE `tbl_group_semat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_header_meta`
--
ALTER TABLE `tbl_header_meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_list_class`
--
ALTER TABLE `tbl_list_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_course`
--
ALTER TABLE `tbl_list_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_educate`
--
ALTER TABLE `tbl_list_educate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_gharargah`
--
ALTER TABLE `tbl_list_gharargah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_list_group`
--
ALTER TABLE `tbl_list_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_list_links`
--
ALTER TABLE `tbl_list_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_message`
--
ALTER TABLE `tbl_list_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_news`
--
ALTER TABLE `tbl_list_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_reshte`
--
ALTER TABLE `tbl_list_reshte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_list_sandogh_users`
--
ALTER TABLE `tbl_list_sandogh_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_sandogh_variz`
--
ALTER TABLE `tbl_list_sandogh_variz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_semat`
--
ALTER TABLE `tbl_list_semat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_list_terms`
--
ALTER TABLE `tbl_list_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_uni`
--
ALTER TABLE `tbl_list_uni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_usefull_links`
--
ALTER TABLE `tbl_list_usefull_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_user`
--
ALTER TABLE `tbl_list_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log_ip`
--
ALTER TABLE `tbl_log_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`,`tel`);

--
-- Indexes for table `tbl_menu_index`
--
ALTER TABLE `tbl_menu_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poll_answer`
--
ALTER TABLE `tbl_poll_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poll_question`
--
ALTER TABLE `tbl_poll_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sign_term`
--
ALTER TABLE `tbl_sign_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_weekdays`
--
ALTER TABLE `tbl_weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amaken`
--
ALTER TABLE `tbl_amaken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fiscal`
--
ALTER TABLE `tbl_fiscal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group_semat`
--
ALTER TABLE `tbl_group_semat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_header_meta`
--
ALTER TABLE `tbl_header_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_list_class`
--
ALTER TABLE `tbl_list_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_course`
--
ALTER TABLE `tbl_list_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_educate`
--
ALTER TABLE `tbl_list_educate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_list_gharargah`
--
ALTER TABLE `tbl_list_gharargah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_list_group`
--
ALTER TABLE `tbl_list_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_list_links`
--
ALTER TABLE `tbl_list_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_message`
--
ALTER TABLE `tbl_list_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_list_news`
--
ALTER TABLE `tbl_list_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_list_reshte`
--
ALTER TABLE `tbl_list_reshte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_list_sandogh_users`
--
ALTER TABLE `tbl_list_sandogh_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_list_sandogh_variz`
--
ALTER TABLE `tbl_list_sandogh_variz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_list_semat`
--
ALTER TABLE `tbl_list_semat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_list_terms`
--
ALTER TABLE `tbl_list_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_uni`
--
ALTER TABLE `tbl_list_uni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_list_usefull_links`
--
ALTER TABLE `tbl_list_usefull_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_user`
--
ALTER TABLE `tbl_list_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_log_ip`
--
ALTER TABLE `tbl_log_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_menu_index`
--
ALTER TABLE `tbl_menu_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poll_answer`
--
ALTER TABLE `tbl_poll_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poll_question`
--
ALTER TABLE `tbl_poll_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sign_term`
--
ALTER TABLE `tbl_sign_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_weekdays`
--
ALTER TABLE `tbl_weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
