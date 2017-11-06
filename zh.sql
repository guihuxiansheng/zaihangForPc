-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-10-15 13:37:22
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zh`
--

-- --------------------------------------------------------

--
-- 表的结构 `zh_category`
--

CREATE TABLE `zh_category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `pr_id` int(11) DEFAULT '0',
  `level` int(1) NOT NULL DEFAULT '1',
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `zh_category`
--

INSERT INTO `zh_category` (`id`, `cate_name`, `pr_id`, `level`, `create_time`) VALUES
(1, '职场发展', 0, 1, '2017-09-22 10:09:27'),
(2, '求职', 1, 2, '2017-09-22 10:09:27'),
(3, '职场晋升', 1, 2, '0000-00-00 00:00:00'),
(4, '简历', 2, 3, '2017-09-26 04:09:52'),
(5, '面试', 2, 3, '2017-09-26 04:09:40'),
(6, '创业和投融资', 0, 1, '2017-09-26 04:09:57'),
(7, '行业经验', 0, 1, '2017-09-25 05:09:39'),
(8, '市场', 16, 2, '2017-09-25 05:09:19'),
(9, '人力', 16, 2, '2017-09-25 05:09:36'),
(10, '销售', 16, 2, '2017-09-25 05:09:16'),
(11, '整合营销', 17, 3, '2017-09-25 05:09:35'),
(12, '应用推广', 17, 3, '2017-09-25 05:09:04');

-- --------------------------------------------------------
--
-- 表的结构 `zh_expert`
--

CREATE TABLE `zh_expert` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '行家id',
  `exp_realname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '真实姓名',
  `exp_city_id` int(11) NOT NULL COMMENT '常驻城市id',
  `exp_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '活动区域：大学城',
  `exp_field_id` int(11) NOT NULL COMMENT '行业id：互联网+',
  `exp_workyear` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '工作年限：3-5年',
  `exp_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '任职机构/工作室',
  `exp_job` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '职位：工程师',
  `exp_edu_experience` text COLLATE utf8_unicode_ci NOT NULL COMMENT '教育背景',
  `show_edu` int(1) NOT NULL DEFAULT '0' COMMENT '是否公开教育经历',
  `exp_job_experience` text COLLATE utf8_unicode_ci NOT NULL COMMENT '职业经历',
  `exp_project_experience` text COLLATE utf8_unicode_ci COMMENT '项目经历',
  `exp_sociallink` text COLLATE utf8_unicode_ci COMMENT '媒体链接',
  `exp_proofpic` text COLLATE utf8_unicode_ci COMMENT '职业证明照片',
  `exp_homepic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '首页后门封面照片',
  `exp_narration` text COLLATE utf8_unicode_ci NOT NULL COMMENT '自述',
  `exp_prize` text COLLATE utf8_unicode_ci COMMENT '奖项',
  `create_time` datetime DEFAULT NULL,
  `exp_meetcount` int(11) DEFAULT NULL COMMENT '和我见过的人数',
  `exp_wishcount` int(11) DEFAULT NULL COMMENT '想见我的人数',
  `exp_responsetime` int(11) DEFAULT NULL COMMENT '我的平均回应延时',
  `money_status` int(10) NOT NULL DEFAULT '0' COMMENT '是否走后门进首页',
  `exp_examine` int(1) NOT NULL DEFAULT '0' COMMENT '是否审核通过'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zh_expert`
--

INSERT INTO `zh_expert` (`id`, `uid`, `exp_realname`, `exp_city_id`, `exp_place`, `exp_field_id`, `exp_workyear`, `exp_company`, `exp_job`, `exp_edu_experience`, `show_edu`, `exp_job_experience`, `exp_project_experience`, `exp_sociallink`, `exp_proofpic`, `exp_homepic`, `exp_narration`, `exp_prize`, `create_time`, `exp_meetcount`, `exp_wishcount`, `exp_responsetime`, `money_status`, `exp_examine`) VALUES
(1, 1, '梁逸峰', 2, '大学城', 2, '3-5年', '源酷', '演讲家', '教育经验哟哟哟', 1, '工作经验呀呀呀呀', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述', NULL, NULL, 5, 1, NULL, 1, 1),
(2, 2, '马云1', 1, '中国1', 1, '10年以上1', '阿里巴巴1', 'CEO1', '教育经验哟哟哟马云马云马云1',  1,'工作经验呀呀呀呀马云马云马云马云1', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述马云马云马云1', NULL, NULL, NULL, NULL, NULL, 1, 1),
(3, 3, '马化腾', 5, '腾讯大厦', 3, '10年以上', '腾讯有限公司', '老总', '2018-2020年在地外留学', 1, '有10年山寨经验', '做出QQ、微信', NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '世界上没有我不能山寨的产品', NULL, NULL, NULL, NULL, NULL, 0, 1),
(4, 4, '马化腾3232', 5, '腾讯大厦', 3, '10年以上', '腾讯有限公司', '老总', '2018-2020年在地外留学', 1, '有10年山寨经验', '做出QQ、微信', NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '世界上没有我不能山寨的产品', NULL, NULL, NULL, NULL, NULL, 0, 1),
(5, 5, '梁逸峰222', 2, '大学城22', 2, '3-5年', '源酷222', '演讲家', '教育经验哟哟哟22',  1,'工作经验呀呀呀呀', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述222', NULL, NULL, 5, 1, NULL, 1, 1),
(6, 6, '马云2', 1, '中国2', 1, '10年以上2', '阿里巴巴2', 'CEO2', '教育经验哟哟哟马云马云马云2', 1, '工作经验呀呀呀呀马云马云马云22马云2', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述马云马22云马云2', NULL, NULL, NULL, NULL, NULL, 1, 1),
(7, 7, '马化腾22', 5, '腾讯大厦', 3, '10年以上', '腾讯有限公司', '老总', '2018-2020年在地外留学', 1, '有10年山寨经验', '做出QQ、微信', NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '世界上没有我不能山寨的产品', NULL, NULL, NULL, NULL, NULL, 0, 1),
(8, 8, '梁逸峰a', 2, '大学城a', 2, '3-5年', '源酷', '演讲家', '教育经验哟哟哟', 1, '工作经验呀呀呀呀', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述', NULL, NULL, 5, 1, NULL, 0, 1),
(9, 9, '马云3', 1, '中国3', 1, '10年以上3', '阿里巴巴3', 'CEO3', '教育经验哟哟哟马云马云马云3', 1, '工作经验呀呀呀呀马云马云马云马云3', NULL, NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '我是个行家哟~这是自述马云马云马云3', NULL, NULL, NULL, NULL, NULL, 1, 1),
(10, 10, '马化腾a', 5, '腾讯大厦a', 3, '10年以上', '腾讯有限公司', '老总', '2018-2020年在地外留学', 1, '有10年山寨经验', '做出QQ、微信', NULL, NULL, 'data/home_exp_homepic/exp_homepic.jpeg', '世界上没有我不能山寨的产品', NULL, NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------
--
-- 表的结构 `zh_holiday`
--

CREATE TABLE `zh_holiday` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL COMMENT '城市',
  `topic_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `topic_theme` int(11) NOT NULL COMMENT '主题，首页推荐主题',
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `zh_meet`
--

CREATE TABLE `zh_meet` (
  `id` int(11) NOT NULL,
  `order_number` bigint(20) DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `expert_id` int(11) NOT NULL COMMENT '行家',
  `student_id` int(11) NOT NULL COMMENT '学员',
  `topic_id` int(11) NOT NULL COMMENT '话题',
  `expert_confirm` tinyint(4) NOT NULL DEFAULT '0' COMMENT '行家确认',
  `expert_confirm_time` int(11) DEFAULT NULL COMMENT '行家回应时间',
  `meet_question` text COLLATE utf8_unicode_ci NOT NULL COMMENT '请教的问题',
  `meet_situation` text COLLATE utf8_unicode_ci NOT NULL COMMENT '学员当前的情况',
  `meet_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地点',
  `meet_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `student_pay` tinyint(4) NOT NULL DEFAULT '0' COMMENT '学员付款',
  `meet_score` tinyint(100) DEFAULT NULL COMMENT '评价分数',
  `meet_comment` text COLLATE utf8_unicode_ci COMMENT '评价内容',
  `meet_commenttime` datetime DEFAULT NULL COMMENT '评价时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zh_meet`
--

INSERT INTO `zh_meet` (`id`, `order_number`, `create_time`, `expert_id`, `student_id`, `topic_id`, `expert_confirm`, `expert_confirm_time`, `meet_question`, `meet_situation`, `meet_place`, `meet_time`, `student_pay`, `meet_score`, `meet_comment`, `meet_commenttime`) VALUES
(1, 2017012732272, '2017-09-19', 1, 12, 1, 1, NULL, '111', '222', '月亮之上', '中秋之时', 0, NULL, NULL, NULL),
(2, 2017092716552, '2017-09-27', 1, 12, 1, 1, NULL, '111', '222', '中心南大街', '周一', 0, NULL, NULL, NULL),
(3, 2017092701239, '2017-09-20', 1, 12, 1, 1, NULL, '111', '222', '大学城', '周末', 1, NULL, NULL, NULL),
(4, 2017092723134, '2017-09-04', 1, 12, 1, 1, NULL, '111', '22233', '源酷', '周三', 2, 5, '这个行家真是极棒的！！', '2017-09-29 12:09:25'),
(5, 2017092716272, '2017-09-27', 1, 12, 1, 1, NULL, '111asd阿斯顿', '222dadasdsadas', '大厦', '中午', 0, NULL, NULL, NULL),
(6, 2017092706959, '2017-09-27', 1, 12, 1, -1, NULL, '111打算打萨达a', '大叔大叔大', NULL, NULL, 0, NULL, NULL, NULL),
(7, 2017092824591, '2017-09-28', 1, 12, 1, 0, NULL, '我有问题要问', '我情况很好', NULL, NULL, 0, NULL, NULL, NULL),
(8, 2017092801842, '2017-09-28', 1, 13, 1, -1, NULL, '我不知道怎么问好', '我很困惑', NULL, NULL, 0, NULL, NULL, NULL),
(9, 2017092862066, '2017-09-28', 1, 13, 1, 1, NULL, '月亮是圆的吗', '中秋要到了', '来月球中心找我', '中秋晚上', 2, 5, '我觉得好极了！', '2017-09-28 08:09:57'),
(10, 2017092723134, '2017-09-04', 1, 12, 1, 1, NULL, '今天几号？', '天气很好', '大讲坛', '周三', 2, 4, '这个行家不错！', '2017-09-04 11:00:00'),
(11, 2017012732272, '2017-09-19', 1, 12, 1, -1, NULL, '国庆去哪玩', '无聊', '', '', 0, NULL, NULL, NULL),
(12, 2017012732272, '2017-09-19', 3, 12, 3, 0, NULL, '我想山寨微信', '我很崇拜宁', '', '', 0, NULL, NULL, NULL),
(13, 2017092723134, '2017-09-04', 1, 12, 1, 1, NULL, '不清楚问题', '不清楚情况', '坛', '周四', 2, 3, NULL, NULL),
(14, 2017092919182, '2017-09-29', 1, 12, 2, 1, 1506671616, '我想朗诵一首词', '我是哑巴', '103室', '午时', 2, 3, '湘江北去', '2017-09-29 04:09:04'),
(15, 2017092960644, '2017-09-29', 1, 12, 2, 1, 1506677798, '明月几时有', '把酒问青天', '源酷2楼', '国庆', 2, 4, '这次见面很满意！', '2017-09-29 05:09:09');

-- --------------------------------------------------------
--
-- 表的结构 `zh_place`
--

CREATE TABLE `zh_place` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `topic_name` varchar(255) NOT NULL COMMENT '专题广告',
  `pic` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `zh_place`
--

INSERT INTO `zh_place` (`id`, `place`, `place_name`, `topic_name`, `pic`, `create_time`) VALUES
(1, 'beijing', '北京', 'psychological', 'data/home_place/psychological.jpeg', '2017-09-01 00:00:00'),
(2, 'shanghai', '上海', 'psychological', 'data/home_place/psychological.jpeg', '2017-09-01 00:00:00'),
(3, 'shenzhen', '深圳', 'psychological', 'data/home_place/psychological.jpeg', '2017-09-01 00:00:00'),
(4, 'guangzhou', '广州', 'psychological', 'data/home_place/psychological.jpeg', '2017-09-01 00:00:00'),
(5, 'hangzhou', '杭州', 'health', 'data/home_place/health.jpeg', '2017-09-01 00:00:00'),
(6, 'chengdu', '成都', 'tournationalday', 'data/home_place/tournationalday.jpeg', '2017-09-01 00:00:00'),
(7, 'xian', '西安', 'tournationalday', 'data/home_place/tournationalday.jpeg', '2017-09-01 00:00:00'),
(8, 'wuhan', '武汉', 'health', 'data/home_place/health.jpeg', '2017-09-01 00:00:00'),
(9, 'ningbo', '宁波', 'tournationalday', 'data/home_place/tournationalday.jpeg', '2017-09-01 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `zh_topic`
--

CREATE TABLE `zh_topic` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL COMMENT '专家id',
  `cate_id` int(11) NOT NULL COMMENT '最后一级分类id',
  `topic_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '话题名称',
  `topic_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '时长',
  `topic_price` float NOT NULL COMMENT '话题价格',
  `topic_outline` text COLLATE utf8_unicode_ci NOT NULL COMMENT '话题大纲/要点',
  `topic_achievement` text COLLATE utf8_unicode_ci NOT NULL COMMENT '领域资历/成就',
  `topic_ps` text COLLATE utf8_unicode_ci COMMENT '补充',
  `topic_score` float NOT NULL DEFAULT '7' COMMENT '评分',
  `topic_meet_count` int(11) DEFAULT NULL,
  `create_time` date DEFAULT NULL COMMENT '创建时间',
  `topic_spread` int(1) NOT NULL DEFAULT '0' COMMENT '是否推广',
  `topic_publish` int(1) NOT NULL DEFAULT '0' COMMENT '是否发布'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zh_topic`
--

INSERT INTO `zh_topic` (`id`, `eid`, `cate_id`, `topic_name`, `topic_time`, `topic_price`, `topic_outline`, `topic_achievement`, `topic_ps`, `topic_score`, `topic_meet_count`, `create_time`, `topic_spread`, `topic_publish`) VALUES
(1, 1, 0, '如何演讲？', '1小时', 463, '1.教你说话\r\n2.教你做准备\r\n3.教你演讲', '巡回演讲过1个月', '我会先跟你来一段。', 8, 12, NULL, 1, 1),
(2, 1, 0, '如何朗诵？', '0.5小时', 233, '1.朗诵1\r\n2.朗诵2\r\n3.朗诵3\r\n', '梁逸峰是我徒弟', '不接受录音', 6, 2, NULL, 1, 0),
(3, 3, 2, '如何快速山寨一款产品？', '2小时', 666, '1.山寨界面\r\n2.山寨功能\r\n3.补上收费功能\r\n', '山寨过各大产品', '请先成为VIP', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zh_user`
--

CREATE TABLE `zh_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `user_pwd` varchar(255) NOT NULL COMMENT '用户密码',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `user_phone` bigint(11) DEFAULT NULL COMMENT '用户手机',
  `user_address` text COMMENT '常住地址',
  `user_true_name` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `user_intro` text COMMENT '简介',
  `user_head_pic` varchar(255) DEFAULT NULL COMMENT '头像',
  `user_alipay` varchar(255) DEFAULT NULL COMMENT '支付宝账户',
  `user_alipay_name` varchar(255) DEFAULT NULL COMMENT '支付宝姓名',
  `if_specialist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否行家',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否在线',
  `user_identityId` bigint(18) DEFAULT NULL COMMENT '用户身份证号',
  `user_identification` int(1) NOT NULL DEFAULT '0' COMMENT '是否认证？0：否；1：认证',
  `admin` int(1) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '80' COMMENT '用户信用值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zh_user`
--

INSERT INTO `zh_user` (`id`, `user_name`, `user_pwd`, `create_time`, `user_phone`, `user_address`, `user_true_name`, `user_intro`, `user_head_pic`, `user_alipay`, `user_alipay_name`, `if_specialist`, `status`, `user_identityId`, `user_identification`, `admin`, `credit`) VALUES
(1, '大叔各位', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-20 00:00:00', 13071685641, '广州', '神马废物', NULL, NULL, '15646135125', '饿挖饿', 1, 0, NULL, 1, 1, 80),
(2, 'hohae', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-21 06:09:27', 13071685646, '', '', '', '', '0', '', 1, 0, NULL, 1, 0, 80),
(3, 'wef', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-21 08:09:54', 15531089637, '杭州', 'heyuan', '', NULL, NULL, NULL, 1, 0, 440982165410254856, 1, 1, 80),
(4, '马云', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-10 00:00:00', 15521046586, '北京', '给我发过', '好噶瓦人噶ighib		\r\n				', '啊万股为规范', '各位啊给我', '噶违规 ', 1, 0, 0, 1, 0, 80),
(5, 'bsfbsdz', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-25 08:09:25', 15531089567, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 0, 80),
(6, 'hohaebg', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-21 06:09:27', 13071385646, '', '', '', '', '0', '', 1, 0, NULL, 1, 0, 80),
(7, 'wefdg', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-21 08:09:54', 15831089637, '杭州', 'heyuan', '', NULL, NULL, NULL, 1, 0, 440982165410254856, 1, 1, 80),
(8, '马云1', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-10 00:00:00', 15531046586, '北京', '给我发过', '好噶瓦人噶问嘎尔gighib		\r\n				', '啊万股为规范', '各位啊给我', '噶违规 ', 1, 0, 0, 1, 0, 80),
(9, 'bsdz', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-25 08:09:25', 15551089567, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 0, 80),
(10, '123566', '1c32e7ece55649bb55e830bb78900e85', '2017-09-25 09:09:36', 13545680646, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 0, 80),
(11, 'niahog', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-25 09:09:13', 15677889952, NULL, '大黄蜂', NULL, NULL, NULL, NULL, 0, 0, 440986156303254956, 1, 0, 80),
(12, 'vwsgv', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-26 04:09:43', 13307168523, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 80),
(13, 'dahe', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-27 07:09:44', 13085646710, NULL, 'nihaoba', NULL, NULL, NULL, NULL, 0, 0, 440852165302144856, 1, 0, 80),
(14, '马云', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-10 00:00:00', 15521046586, '发改委个', '给我发过', '好噶人噶问嘎尔', '啊万股为规范', '各位啊给我', '噶违规 ', 0, 0, 0, 0, 0, 80);

-- --------------------------------------------------------

--
-- 表的结构 `zh_wishlist`
--

CREATE TABLE `zh_wishlist` (
  `id` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zh_wishlist`
--

INSERT INTO `zh_wishlist` (`id`, `expert_id`, `student_id`, `create_time`) VALUES
(1, 1, 13, '2017-10-10 03:10:11'),
(2, 3, 12, '2017-10-02 11:10:57');

-- --------------------------------------------------------

--
-- 表的结构 `zh_phonecode`
--

CREATE TABLE `zh_phonecode` (
  `id` int(11) NOT NULL COMMENT '编号',
  `phone` bigint(11) NOT NULL COMMENT '手机号码',
  `code` int(8) NOT NULL COMMENT '验证码',
  `create_time` date NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zh_head_pic`
--

CREATE TABLE `zh_head_pic` (
  `id` int(11) NOT NULL,
  `set_index` tinyint(1) NOT NULL DEFAULT '0',
  `head_img` varchar(255) NOT NULL,
  `main_word1` varchar(255) NOT NULL,
  `main_word2` varchar(255) NOT NULL,
  `described_word` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `zh_head_pic`
--

INSERT INTO `zh_head_pic` (`id`, `set_index`, `head_img`, `main_word1`, `main_word2`, `described_word`, `create_time`) VALUES
(1, 0, 'data/home_head_pic/head_pic6.jpeg', '111112', '3333', '23', '2017-10-03 05:10:02'),
(2, 1, 'data/home_head_pic/head_pic1.jpeg', '手机指路', '少走弯路', 'iphoneX，你值得拥有', '2017-09-25 00:00:00'),
(3, 0, 'data/home_head_pic/head_pic2.jpeg', '行家指路', '少走弯路', '在行，领先的知识技能共享平台', '2017-09-19 00:00:00'),
(4, 0, 'data/home_head_pic/head_pic21.jpeg', 'ai ', 'wo shi ai ', 'wo shi ai de wenzi ', '2017-10-05 10:10:59'),
(5, 0, 'data/home_head_pic/head_pic7.jpeg', 'f的fd', '是发放点水', ' 第三方', '2017-10-03 05:10:44'),
(6, 0, 'data/home_head_pic/head_pic22.jpeg', '11111', '2', '2', '2017-10-05 10:10:37'),
(7, 0, 'data/home_head_pic/head_pic19.jpeg', '22', '333333', '444', '2017-10-04 10:10:26');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- 表的结构 `zh_home_lunbo`
--

CREATE TABLE `zh_home_lunbo` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `slide_pic1` varchar(255) NOT NULL COMMENT '图片1',
  `slide_pic2` varchar(255) NOT NULL COMMENT '图片2',
  `slide_pic3` varchar(255) NOT NULL COMMENT '图片3',
  `title1` varchar(255) NOT NULL COMMENT '轮播页标题',
  `title2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `summary1` varchar(255) NOT NULL COMMENT '轮播页概要',
  `summary2` varchar(255) NOT NULL,
  `summary3` varchar(255) NOT NULL,
  `pepole_index1` varchar(255) DEFAULT NULL,
  `pepole_index2` varchar(255) NOT NULL,
  `pepole_index3` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `zh_home_lunbo`
--

INSERT INTO `zh_home_lunbo` (`id`, `status`, `slide_pic1`, `slide_pic2`, `slide_pic3`, `title1`, `title2`, `title3`, `summary1`, `summary2`, `summary3`, `pepole_index1`, `pepole_index2`, `pepole_index3`, `create_time`) VALUES
(1, 0, 'data/home_lunbo/home_lunbo1_1.jpeg', 'data/home_lunbo/home_lunbo1_2.jpeg', 'data/home_lunbo/home_lunbo1_3.jpeg', '「在行是连接人与人的<br>\r\n一万种可能。111」', '在行是我进行“数字生存实验”<br>的沃土。我要印证一个生命影响<br>另一个生命的可能。111', '「除了社交作用,<br>她们还是我的数据库,<br>知道她们需要什么<br>很重要」11', '在“有趣然而无用”大行其道的当下，<br>在行所促成的每一次经验交谈都明确的指向“有用”。<br>无论你的问题是“资金不足时如何创业”，<br>还是“姐弟恋中如何扮演好姐姐”<br>——《南方人物周刊》1111', '萧秋水,知识管理专家。<br>在行一对一服务已破百单。<br>她通过在行找到了互联网时代新的生存之道。<br>甚至通过在行开展微信私教分享课程。<br>在将认知盈余价值最大化的同时，<br>获得了可观的经济收益。11', '乔齐, <br>女装品牌Georgette.Q创始人。<br>作为在行上的行家,已经见过35个人<br>大部分是科技圈的女高管,是她的目标客户11', '', '去萧秋水的行家页11', '去乔齐的行家页11', '2017-09-25 00:00:00'),
(2, 0, 'data/home_lunbo/home_lunbo2_1.jpeg', 'data/home_lunbo/home_lunbo2_2.jpeg', 'data/home_lunbo/home_lunbo2_3.jpeg', '2', '2', '3', '1', '2', '3', '1', '2', '3', '2017-10-05 01:10:08'),
(3, 1, 'data/home_lunbo/home_lunbo5_1.jpeg', 'data/home_lunbo/home_lunbo5_2.jpeg', 'data/home_lunbo/home_lunbo5_3.jpeg', '111111111<br>1111111', '2222<br>2222222', '333333<br>3333333', '111111111<br>1111111', '2222<br>2222222', '333333<br>3333333', '111111111<br>1111111', '2222<br>2222222', '333333<br>3333333', '2017-10-05 02:10:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zh_category`
--
ALTER TABLE `zh_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_expert`
--
ALTER TABLE `zh_expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_holiday`
--
ALTER TABLE `zh_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_meet`
--
ALTER TABLE `zh_meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_place`
--
ALTER TABLE `zh_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_topic`
--
ALTER TABLE `zh_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_user`
--
ALTER TABLE `zh_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_wishlist`
--
ALTER TABLE `zh_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_phonecode`
--
ALTER TABLE `zh_phonecode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_phonecode`
--
ALTER TABLE `zh_head_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zh_phonecode`
--
ALTER TABLE `zh_home_lunbo`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `zh_category`
--
ALTER TABLE `zh_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `zh_expert`
--
ALTER TABLE `zh_expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `zh_holiday`
--
ALTER TABLE `zh_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `zh_meet`
--
ALTER TABLE `zh_meet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `zh_place`
--
ALTER TABLE `zh_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `zh_topic`
--
ALTER TABLE `zh_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `zh_user`
--
ALTER TABLE `zh_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `zh_wishlist`
--
ALTER TABLE `zh_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `zh_phonecode`
--
ALTER TABLE `zh_phonecode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `zh_head_pic`
--
ALTER TABLE `zh_head_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `zh_head_pic`
--
ALTER TABLE `zh_home_lunbo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;