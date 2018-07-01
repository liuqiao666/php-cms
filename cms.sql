-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 07 月 01 日 23:44
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `cover` varchar(32) DEFAULT NULL,
  `tag` varchar(32) DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL,
  `time` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `cover`, `tag`, `content`, `time`) VALUES
(10, '美好从未停歇', '1.jpg', '摇滚音乐', '在我们复杂而矛盾的个体里面，总在寻找一种真实的生活状态，那些让人激动不已，痛苦难耐的瞬间，无法解决的矛盾，值得回味的情感，以及凛冽而过的晚风。有些人终其一生都在寻找，可最后找到的也不过是虚无。生活就像自己站在悬崖边上，我们的选择从来不是跳或不跳，而是掉下去后，我们应该怎么办。不过，值得庆幸的是，当我们穿过穷街陋巷，顺便收获一大堆灿烂阳光时，那永远是最美的时光。', '2018-06-30 16:48:22'),
(11, '那片蓝', '640x452.jpg', '独立民谣音乐', '你以为你会忘记那片蓝，然后用波澜不惊的姿态行走于这条来去长路。当你有一天喝着小酒走在失意的街头，那片蓝却又不经意间的漂浮于心头。关于青春的故事，最纯美的情感，早已滞留在那个纯粹的夏天，消散在阳光蓝天白云绿树碧海间，剩下的是长长的一串回忆，不断温暖着冰冷的此刻我们。\r\n\r\n音乐的时光总是渐慢的把人消磨在人世间的荒诞不羁里，我们已经不再在意是否能够把自己彻底的表达，只在意身上的洁白衬衫是否依然在那片蓝里飘飘扬扬。\r\n\r\n你好，夏天。再见，那片蓝。', '2018-06-30 16:50:38'),
(12, '故事的最后', '21.png', '游戏原声音乐', '游戏里的每个故事都有结局，既有心有戚戚而恋恋不舍，也有泪目纵横而驻足轻叹。随着游戏里一段段旅程在这些好的、坏的的结局里戛然而止，我们的时光也就这么轻易的逝去了。我相信每个人内心深处都期待着自己像玩游戏一样的能够掌控全局、掌控人生的每一个选择，并能够让自己的生命有一个完美的结局，但是在质感的生活里，大部分人的人生故事却往往无声而终。\r\n\r\n无论游戏，还是电影、书籍、音乐，当我们以情感本身去抵达对方时，我们总会在这些朴实无华的作品里，寻找到闪烁着格外', '2018-06-30 16:52:23'),
(13, '山水间', '2.jpg', '广西独立音乐', '广西给人的感觉总是青青绿绿，在物华天宝般的景色里，孕育着人杰地灵般的山歌嘹亮。这里的年轻人们的青春就像漓江水一样奔流向前，不愿停息。然后在匆忙的时代里，用诚挚的音乐把人分离于两端。就像这期音乐，一端是南国乡土里散发出的浓郁气息，另外一端是城市深夜街道里孤独的背影。值得庆幸的是，闷热的亚热带气候并没有让这里年轻人们把青春本色燃尽于岁月无声中，反而通过他们的音乐让人尝到了一碗米粉背后的所有酸甜苦辣。\r\n\r\n尹吾曾经说过：“音乐的意义，不仅在于取悦我们', '2018-06-30 16:53:56'),
(14, '关于爱的表达方式', '3.jpg', '独立唱作人音乐', '温情与爱意总在音乐的漫不经心里悄然释放，然后让人沉醉在这渐慢降临的黄昏夜色。在平静的吟唱下，暗潮涌动。\r\n\r\n我不知道爱到底有多少种表达方式，我只知道爱意总是饱含着深沉与难言的歉意。在这样一个变化的时代里，坚持一些简单的、人之常情的东西，甚至比追寻艰深的真理还要困难。当遇见美好经过时，我们只能报以夏日渴望的气息，让自己远离人世间的罪与罚。然后就着这轻柔内敛的空心吉他弦音，和着情深默默的人声，回归原初的洁白。\r\n\r\n你好，再见。', '2018-06-30 16:54:48'),
(15, '总是走在寻找意义的路途中', '4.jpg', '美国独立音乐', '尽管我们可以通过人的生老病死与悲欢离合获得一些仪式感，然后借由这些仪式感所带来的心安理得让人理直气壮的活下去，但我们始终不知道存在的意义到底是什么，所以我们永远走在寻找意义的路途中。\r\n\r\n那些思索和追求人生意义的人们啊，祝愿我们能够找到那一刹的悸动和所有的痴心妄想，然后在无意义的人生里获得安宁与平静。', '2018-06-30 16:55:36');

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `content` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`content`) VALUES
('广西独立音乐'),
('游戏原声音乐'),
('独立民谣音乐'),
('摇滚音乐'),
('独立唱作人音乐'),
('美国独立音乐');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`) VALUES
(2, 'love', '5345346@qq.com', '342334', '1'),
(1, '刘巧', '1255394075@qq.com', '111', '1'),
(3, 'day', '54534@qq.com', '121343', '1'),
(4, 'qiaoqiao', '5436356@qq.com', '45345', '1'),
(5, 'liuqiao666', '3424546@qq.com', '353443', '1'),
(6, 'liuqiao', '7658678@qq.com', '232434', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
