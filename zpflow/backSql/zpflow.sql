/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : zpflow

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-12-05 21:48:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announce
-- ----------------------------
DROP TABLE IF EXISTS `announce`;
CREATE TABLE `announce` (
  `ancID` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `recID` int(11) NOT NULL COMMENT '招聘年度ID',
  `ancName` varchar(125) NOT NULL COMMENT '公告名称',
  `ancInfo` text NOT NULL COMMENT '公告内容',
  `ancPubUid` int(11) DEFAULT NULL COMMENT '发布人ID',
  `ancTime` timestamp NULL DEFAULT NULL COMMENT '发布时间',
  `ancType` char(1) DEFAULT NULL COMMENT '公告类别（A=招聘简介，B=公司简介）',
  `ancStatus` int(1) NOT NULL DEFAULT '0' COMMENT '发布状态（0=未发布，1=已发布）',
  PRIMARY KEY (`ancID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announce
-- ----------------------------
INSERT INTO `announce` VALUES ('4', '1', '上海市杨浦区2017年青年储备人才招聘', '<p><span style=\"text-align: start;\">如果，注定要一个人度过情人节，你的</span><a href=\"http://www.jj59.com/xinqingsuibi/\" class=\"keywordlink\" style=\"text-align: start;\">心情</a><span style=\"text-align: start;\">怎么样呢。你大概会独自伤悲，看着路边牵手走过的情侣，背过脸，偷偷抹一把眼泪。我要奉劝你：即便如此，你一定不要随便找一个人牵手，你甚至要勇敢地说，“我单身，我骄傲”。相比那些找到爱情的人，你有更多选择爱谁的权利，不是吗？</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><a href=\"http://www.jj59.com/zti/shangxin/\" class=\"keywordlink\" style=\"text-align: start;\">伤心</a><span style=\"text-align: start;\">之后，你还是要面对现实，如果有那么一个人值得你喜欢，恰好对方也不怎么讨厌你，那就试着聊几句吧。在情人节这个特殊的日子，问候一声，哪怕得到的结果是——那个人已经有了爱情，至少，也能给自己一个交代。毕竟，曾经有那么一点心动，曾经遇见了。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　一个人的情人节，你要好好吃一顿，你要照顾好自己，不要因为没有爱情的滋润，虐待身体。你不要和父母在一起，因为你不能听到父母催促你早点成家的声音，那样会影响你的情绪，也会影响父母的情绪。负面的情绪，会让人</span><a href=\"http://www.jj59.com/liuxingfeizhuliu/\" class=\"keywordlink\" style=\"text-align: start;\">颓废</a><span style=\"text-align: start;\">。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　如果身边有和你一样单身的朋友，可以一起聚一聚，找一个热闹一点的地方，海阔天空地聊天，大声地唱歌，释放心情，放飞爱情的梦想。一个人，不能压抑太久，会憋出毛病来的。与其形影相随，不如走进热闹的世界，把自己变成人海中的一朵浪花，一滴水，听听海浪的声音。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　如果有人在情人节打探你拥有爱情的情况，你不要觉得难为情。一个人单着，当然会底气不足，然而，你不要打肿脸充胖子，不要谎称自己有爱情。说不定，有人想要为你牵红线。如果你不实话实说，那将是一场错过爱情的悲剧。你也会落下不够诚实的坏印象。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　你一定不要想不开，不就是兜兜转转找不到爱情么？然不成，还要自杀？你不够伟大，你的自杀不会引起社会轰动，也不会有人同情你，顶多，来几个消防战士，履行工作职责，挽救你的生命。最后，你还得到派出所待一会，接受批评教育，尴尬的气氛，一定让你想再次自杀。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　有没有爱情，你都要好好活下去，生命只有一次，谁都不是九条命的狐狸。留得青山在，不愁没柴烧。生命好端端的，健</span><a href=\"http://www.jj59.com/zti/jiankang/\" class=\"keywordlink\" style=\"text-align: start;\">健康</a><span style=\"text-align: start;\">康的，你再努力一点，把</span><a href=\"http://www.jj59.com/zti/shenghuo/\" class=\"keywordlink\" style=\"text-align: start;\">生活</a><span style=\"text-align: start;\">过好一点点，指不定，爱情就光顾你了，下一个情人节，就有人愿意和你牵手同行，还卿卿我我地拥抱。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　当然，最好的结果，就在这个情人节，你便遇见了有一点点喜欢的人，虽然，只是爱情的破土，就已经足够幸运了。要知道，有多少人在情人节的夜晚，手捧着玫瑰花，却没有等到爱的人出现。天亮了，花都凋谢了，只有泪水还没有干透。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><a href=\"http://www.jj59.com/zheliwenzhang/\" class=\"keywordlink\" style=\"text-align: start;\">人生</a><span style=\"text-align: start;\">本是一场旅行，沿途会遇到很多很多的人，但只有那么一两个人会和你擦出爱情的火花。所有的酸甜苦辣，都会因为爱情变得更加美好，因此，你要敞开心扉，面对单身的事实，执念爱情的美好，走好每一步，走出精彩。</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　</span><br style=\"text-align: start;\"><span style=\"text-align: start;\">　　作者：朱钟洋；笔名：布衣粗食。</span></p>', '1', '2017-10-23 14:12:03', 'A', '2');
INSERT INTO `announce` VALUES ('5', '1', '复古风格', '辅导班VB地点GV你', '1', '2017-10-24 12:23:03', 'B', '2');
INSERT INTO `announce` VALUES ('6', '1', '十月秋意忧伤', '<p style=\"text-align: start;\">十月的空间，无论是天宇的胸襟，还是大地的经纬都是一尘不染，那些纤尘不染的宝石蓝天空，显得秋高气爽，白云宛如飘逸舒卷成洁净的湖水，在阳光折射千丝万缕的波光，翱翔的大雁在天空中一会儿排出人字形，一会儿又为之字状，刹那间变幻成v形状，已到深秋，大雁不得不急急忙忙飞向北国某个地方，无暇顾及秋风秋<a href=\"http://www.sanwen.net/sanwen/yu/\" target=\"_blank\">雨</a>的萧瑟，一如既往地飞翔到冰天<a href=\"http://www.sanwen.net/shige/xue/\" target=\"_blank\">雪</a>地的北国领地，漫漫征途，无畏无惧千辛万苦，在这漫长的迁途中充满<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧伤</a>，同时充满一种期望与向往，度过一季寒<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">冬</a>腊月，当大地回暖苏醒，又将成为南飞的大雁，怀一股坚韧不拔的毅力，迎接<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春</a>光明媚春意盎然气息的拥抱，<a href=\"http://www.sanwen.net/suibi/suiyue/\" target=\"_blank\">岁月</a>与大雁都在周而复始中完成季节变幻的流转，十月承上启下，在冬隔壁的秋姑娘，恍如枕着一水清盈，凝望叶落归根的情怀，落英缤纷的情殇，眺望枫情醉红山岚叠嶂的激情，仰望<a href=\"http://yueliang.sanwen8.cn/\" target=\"_blank\">秋月</a>相思情长，满天星斗的无比苍凉，当丹桂飘香熏过眉月之后，当漫山遍野菊氤之际，又当清风雨露吹拂岸边芦苇之时，仿佛聆听到<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">夜</a>莺<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧愁</a>的吟唱，倾听到窸窣若隐若现中的几分惆怅，在深秋的原野那一曲铜萧的婉约沉闷的声响，在<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">秋夜</a>里平添几分<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">悲伤</a>，十月我聆听那秋韵里的一笺忧伤，</p><p style=\"text-align: start;\">十月渐渐离我们而去，清秋渐远，凉凉的风吹不散这哀怨的<a href=\"http://tongku.sanwen8.cn/\" target=\"_blank\">悲痛</a>，沾满潮湿的酸楚，固执地徘徊在心头久久不肯离去；而<a href=\"http://jimo.sanwen8.cn/\" target=\"_blank\">孤独</a>的忧伤像漫天雪花密密麻麻地往心深处落下，积起冰寒的<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">伤感</a>渐近麻木，就想让失去<a href=\"http://linghun.sanwen8.cn/\" target=\"_blank\">灵魂</a>的知觉在无人的角落里，随处飘荡，随处游离，一缕魂，任风吹。这个秋，带给我无穷无尽的心愁，尘落在<a href=\"http://www.sanwen.net/sanwen/xinqing/\" target=\"_blank\">情感</a>的渡头，悲苦地遥望，最终换来是满目的苍凉。</p><p style=\"text-align: start;\">秋的意境中悄然聆听到冬姑娘拨动心弦，晶莹剔透的雪花已经在北国飘舞，雪域高原处已经白雪皑皑冰凌悬挂山崖，天山上的雪莲花含苞欲放，我的思绪伴着淡墨清茗，相伴秋中的<a href=\"http://www.sanwen.net/\" target=\"_blank\">文字</a>，跟随冬的韵律去听一曲清歌，扣心自问：是谁的<a href=\"http://zhijian.sanwen.net/\" target=\"_blank\">指尖</a>流过了千年的时光，纤弱成一株<a href=\"http://qiutian.sanwen8.cn/\" target=\"_blank\">秋天</a>的柳荷。锦瑟的心事中，散着淡淡哀怨，延续念念不忘的笙歌幽<a href=\"http://meng.sanwen8.cn/\" target=\"_blank\">梦</a>。</p><p style=\"text-align: start;\">夜，总是布满了孤独的影子，忧伤也变得张牙舞爪，放肆在我身体各个部位撕咬 ；疲惫的我，连最后的挣扎都不想把握，一双眼，两行泪，望穿幽夜，凉等，痴情心，无处归。天明天又黑，春去春又回，我的<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春天</a>，最终迷失在刺骨的<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">寒冬</a>里，再也走不回。爬满难过的心，踱步都不能从容，惆怅的步伐比铅还沉重。时过境迁的风景已看不到走过的繁华，零碎的残屑让人想像不出这里也曾旖旎过，这里也曾辉煌过。可是，所有的变故都会被尘风吹落，被一个叫“无情”的东西刮走，一点不留。</p><p style=\"text-align: start;\">悲戚戚的心，夜风都不敢从我身边划过，都怕被这心冷着。我想告知风儿，能否过来吹吹我，帮我吹醒这些忧伤的茧，红尘的梦，让我变得快<a href=\"http://zuowen.sanwen.net/z/219426-kuaile\" target=\"_blank\">快乐</a>乐，远离这些尘世之琐。风儿听不见我裂心的呼唤，风儿听不见我散落的酸楚。谁也不会了解我，谁也不知我，缘不见，情丢失，都在这个秋天里，一转眼，化成烟。</p>', '1', '2017-10-23 14:13:06', 'A', '2');
INSERT INTO `announce` VALUES ('7', '1', '十月秋意忧伤', '<p style=\"text-align: start;\">十月的空间，无论是天宇的胸襟，还是大地的经纬都是一尘不染，那些纤尘不染的宝石蓝天空，显得秋高气爽，白云宛如飘逸舒卷成洁净的湖水，在阳光折射千丝万缕的波光，翱翔的大雁在天空中一会儿排出人字形，一会儿又为之字状，刹那间变幻成v形状，已到深秋，大雁不得不急急忙忙飞向北国某个地方，无暇顾及秋风秋<a href=\"http://www.sanwen.net/sanwen/yu/\" target=\"_blank\">雨</a>的萧瑟，一如既往地飞翔到冰天<a href=\"http://www.sanwen.net/shige/xue/\" target=\"_blank\">雪</a>地的北国领地，漫漫征途，无畏无惧千辛万苦，在这漫长的迁途中充满<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧伤</a>，同时充满一种期望与向往，度过一季寒<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">冬</a>腊月，当大地回暖苏醒，又将成为南飞的大雁，怀一股坚韧不拔的毅力，迎接<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春</a>光明媚春意盎然气息的拥抱，<a href=\"http://www.sanwen.net/suibi/suiyue/\" target=\"_blank\">岁月</a>与大雁都在周而复始中完成季节变幻的流转，十月承上启下，在冬隔壁的秋姑娘，恍如枕着一水清盈，凝望叶落归根的情怀，落英缤纷的情殇，眺望枫情醉红山岚叠嶂的激情，仰望<a href=\"http://yueliang.sanwen8.cn/\" target=\"_blank\">秋月</a>相思情长，满天星斗的无比苍凉，当丹桂飘香熏过眉月之后，当漫山遍野菊氤之际，又当清风雨露吹拂岸边芦苇之时，仿佛聆听到<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">夜</a>莺<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧愁</a>的吟唱，倾听到窸窣若隐若现中的几分惆怅，在深秋的原野那一曲铜萧的婉约沉闷的声响，在<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">秋夜</a>里平添几分<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">悲伤</a>，十月我聆听那秋韵里的一笺忧伤，</p><p style=\"text-align: start;\">十月渐渐离我们而去，清秋渐远，凉凉的风吹不散这哀怨的<a href=\"http://tongku.sanwen8.cn/\" target=\"_blank\">悲痛</a>，沾满潮湿的酸楚，固执地徘徊在心头久久不肯离去；而<a href=\"http://jimo.sanwen8.cn/\" target=\"_blank\">孤独</a>的忧伤像漫天雪花密密麻麻地往心深处落下，积起冰寒的<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">伤感</a>渐近麻木，就想让失去<a href=\"http://linghun.sanwen8.cn/\" target=\"_blank\">灵魂</a>的知觉在无人的角落里，随处飘荡，随处游离，一缕魂，任风吹。这个秋，带给我无穷无尽的心愁，尘落在<a href=\"http://www.sanwen.net/sanwen/xinqing/\" target=\"_blank\">情感</a>的渡头，悲苦地遥望，最终换来是满目的苍凉。</p><p style=\"text-align: start;\">秋的意境中悄然聆听到冬姑娘拨动心弦，晶莹剔透的雪花已经在北国飘舞，雪域高原处已经白雪皑皑冰凌悬挂山崖，天山上的雪莲花含苞欲放，我的思绪伴着淡墨清茗，相伴秋中的<a href=\"http://www.sanwen.net/\" target=\"_blank\">文字</a>，跟随冬的韵律去听一曲清歌，扣心自问：是谁的<a href=\"http://zhijian.sanwen.net/\" target=\"_blank\">指尖</a>流过了千年的时光，纤弱成一株<a href=\"http://qiutian.sanwen8.cn/\" target=\"_blank\">秋天</a>的柳荷。锦瑟的心事中，散着淡淡哀怨，延续念念不忘的笙歌幽<a href=\"http://meng.sanwen8.cn/\" target=\"_blank\">梦</a>。</p><p style=\"text-align: start;\">夜，总是布满了孤独的影子，忧伤也变得张牙舞爪，放肆在我身体各个部位撕咬 ；疲惫的我，连最后的挣扎都不想把握，一双眼，两行泪，望穿幽夜，凉等，痴情心，无处归。天明天又黑，春去春又回，我的<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春天</a>，最终迷失在刺骨的<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">寒冬</a>里，再也走不回。爬满难过的心，踱步都不能从容，惆怅的步伐比铅还沉重。时过境迁的风景已看不到走过的繁华，零碎的残屑让人想像不出这里也曾旖旎过，这里也曾辉煌过。可是，所有的变故都会被尘风吹落，被一个叫“无情”的东西刮走，一点不留。</p><p style=\"text-align: start;\">悲戚戚的心，夜风都不敢从我身边划过，都怕被这心冷着。我想告知风儿，能否过来吹吹我，帮我吹醒这些忧伤的茧，红尘的梦，让我变得快<a href=\"http://zuowen.sanwen.net/z/219426-kuaile\" target=\"_blank\">快乐</a>乐，远离这些尘世之琐。风儿听不见我裂心的呼唤，风儿听不见我散落的酸楚。谁也不会了解我，谁也不知我，缘不见，情丢失，都在这个秋天里，一转眼，化成烟。</p>', '1', '2017-10-23 14:13:06', 'A', '2');
INSERT INTO `announce` VALUES ('8', '1', '十月秋意忧伤', '<p style=\"text-align: start;\">十月的空间，无论是天宇的胸襟，还是大地的经纬都是一尘不染，那些纤尘不染的宝石蓝天空，显得秋高气爽，白云宛如飘逸舒卷成洁净的湖水，在阳光折射千丝万缕的波光，翱翔的大雁在天空中一会儿排出人字形，一会儿又为之字状，刹那间变幻成v形状，已到深秋，大雁不得不急急忙忙飞向北国某个地方，无暇顾及秋风秋<a href=\"http://www.sanwen.net/sanwen/yu/\" target=\"_blank\">雨</a>的萧瑟，一如既往地飞翔到冰天<a href=\"http://www.sanwen.net/shige/xue/\" target=\"_blank\">雪</a>地的北国领地，漫漫征途，无畏无惧千辛万苦，在这漫长的迁途中充满<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧伤</a>，同时充满一种期望与向往，度过一季寒<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">冬</a>腊月，当大地回暖苏醒，又将成为南飞的大雁，怀一股坚韧不拔的毅力，迎接<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春</a>光明媚春意盎然气息的拥抱，<a href=\"http://www.sanwen.net/suibi/suiyue/\" target=\"_blank\">岁月</a>与大雁都在周而复始中完成季节变幻的流转，十月承上启下，在冬隔壁的秋姑娘，恍如枕着一水清盈，凝望叶落归根的情怀，落英缤纷的情殇，眺望枫情醉红山岚叠嶂的激情，仰望<a href=\"http://yueliang.sanwen8.cn/\" target=\"_blank\">秋月</a>相思情长，满天星斗的无比苍凉，当丹桂飘香熏过眉月之后，当漫山遍野菊氤之际，又当清风雨露吹拂岸边芦苇之时，仿佛聆听到<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">夜</a>莺<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧愁</a>的吟唱，倾听到窸窣若隐若现中的几分惆怅，在深秋的原野那一曲铜萧的婉约沉闷的声响，在<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">秋夜</a>里平添几分<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">悲伤</a>，十月我聆听那秋韵里的一笺忧伤，</p><p style=\"text-align: start;\">十月渐渐离我们而去，清秋渐远，凉凉的风吹不散这哀怨的<a href=\"http://tongku.sanwen8.cn/\" target=\"_blank\">悲痛</a>，沾满潮湿的酸楚，固执地徘徊在心头久久不肯离去；而<a href=\"http://jimo.sanwen8.cn/\" target=\"_blank\">孤独</a>的忧伤像漫天雪花密密麻麻地往心深处落下，积起冰寒的<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">伤感</a>渐近麻木，就想让失去<a href=\"http://linghun.sanwen8.cn/\" target=\"_blank\">灵魂</a>的知觉在无人的角落里，随处飘荡，随处游离，一缕魂，任风吹。这个秋，带给我无穷无尽的心愁，尘落在<a href=\"http://www.sanwen.net/sanwen/xinqing/\" target=\"_blank\">情感</a>的渡头，悲苦地遥望，最终换来是满目的苍凉。</p><p style=\"text-align: start;\">秋的意境中悄然聆听到冬姑娘拨动心弦，晶莹剔透的雪花已经在北国飘舞，雪域高原处已经白雪皑皑冰凌悬挂山崖，天山上的雪莲花含苞欲放，我的思绪伴着淡墨清茗，相伴秋中的<a href=\"http://www.sanwen.net/\" target=\"_blank\">文字</a>，跟随冬的韵律去听一曲清歌，扣心自问：是谁的<a href=\"http://zhijian.sanwen.net/\" target=\"_blank\">指尖</a>流过了千年的时光，纤弱成一株<a href=\"http://qiutian.sanwen8.cn/\" target=\"_blank\">秋天</a>的柳荷。锦瑟的心事中，散着淡淡哀怨，延续念念不忘的笙歌幽<a href=\"http://meng.sanwen8.cn/\" target=\"_blank\">梦</a>。</p><p style=\"text-align: start;\">夜，总是布满了孤独的影子，忧伤也变得张牙舞爪，放肆在我身体各个部位撕咬 ；疲惫的我，连最后的挣扎都不想把握，一双眼，两行泪，望穿幽夜，凉等，痴情心，无处归。天明天又黑，春去春又回，我的<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春天</a>，最终迷失在刺骨的<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">寒冬</a>里，再也走不回。爬满难过的心，踱步都不能从容，惆怅的步伐比铅还沉重。时过境迁的风景已看不到走过的繁华，零碎的残屑让人想像不出这里也曾旖旎过，这里也曾辉煌过。可是，所有的变故都会被尘风吹落，被一个叫“无情”的东西刮走，一点不留。</p><p style=\"text-align: start;\">悲戚戚的心，夜风都不敢从我身边划过，都怕被这心冷着。我想告知风儿，能否过来吹吹我，帮我吹醒这些忧伤的茧，红尘的梦，让我变得快<a href=\"http://zuowen.sanwen.net/z/219426-kuaile\" target=\"_blank\">快乐</a>乐，远离这些尘世之琐。风儿听不见我裂心的呼唤，风儿听不见我散落的酸楚。谁也不会了解我，谁也不知我，缘不见，情丢失，都在这个秋天里，一转眼，化成烟。</p>', '1', '2017-10-18 14:13:06', 'A', '2');
INSERT INTO `announce` VALUES ('9', '1', '十月秋意忧伤', '<p style=\"text-align: start;\">十月的空间，无论是天宇的胸襟，还是大地的经纬都是一尘不染，那些纤尘不染的宝石蓝天空，显得秋高气爽，白云宛如飘逸舒卷成洁净的湖水，在阳光折射千丝万缕的波光，翱翔的大雁在天空中一会儿排出人字形，一会儿又为之字状，刹那间变幻成v形状，已到深秋，大雁不得不急急忙忙飞向北国某个地方，无暇顾及秋风秋<a href=\"http://www.sanwen.net/sanwen/yu/\" target=\"_blank\">雨</a>的萧瑟，一如既往地飞翔到冰天<a href=\"http://www.sanwen.net/shige/xue/\" target=\"_blank\">雪</a>地的北国领地，漫漫征途，无畏无惧千辛万苦，在这漫长的迁途中充满<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧伤</a>，同时充满一种期望与向往，度过一季寒<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">冬</a>腊月，当大地回暖苏醒，又将成为南飞的大雁，怀一股坚韧不拔的毅力，迎接<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春</a>光明媚春意盎然气息的拥抱，<a href=\"http://www.sanwen.net/suibi/suiyue/\" target=\"_blank\">岁月</a>与大雁都在周而复始中完成季节变幻的流转，十月承上启下，在冬隔壁的秋姑娘，恍如枕着一水清盈，凝望叶落归根的情怀，落英缤纷的情殇，眺望枫情醉红山岚叠嶂的激情，仰望<a href=\"http://yueliang.sanwen8.cn/\" target=\"_blank\">秋月</a>相思情长，满天星斗的无比苍凉，当丹桂飘香熏过眉月之后，当漫山遍野菊氤之际，又当清风雨露吹拂岸边芦苇之时，仿佛聆听到<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">夜</a>莺<a href=\"http://youshang.sanwen8.cn/\" target=\"_blank\">忧愁</a>的吟唱，倾听到窸窣若隐若现中的几分惆怅，在深秋的原野那一曲铜萧的婉约沉闷的声响，在<a href=\"http://ye.sanwen8.cn/\" target=\"_blank\">秋夜</a>里平添几分<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">悲伤</a>，十月我聆听那秋韵里的一笺忧伤，</p><p style=\"text-align: start;\">十月渐渐离我们而去，清秋渐远，凉凉的风吹不散这哀怨的<a href=\"http://tongku.sanwen8.cn/\" target=\"_blank\">悲痛</a>，沾满潮湿的酸楚，固执地徘徊在心头久久不肯离去；而<a href=\"http://jimo.sanwen8.cn/\" target=\"_blank\">孤独</a>的忧伤像漫天雪花密密麻麻地往心深处落下，积起冰寒的<a href=\"http://www.sanwen.net/sanwen/shanggan/\" target=\"_blank\">伤感</a>渐近麻木，就想让失去<a href=\"http://linghun.sanwen8.cn/\" target=\"_blank\">灵魂</a>的知觉在无人的角落里，随处飘荡，随处游离，一缕魂，任风吹。这个秋，带给我无穷无尽的心愁，尘落在<a href=\"http://www.sanwen.net/sanwen/xinqing/\" target=\"_blank\">情感</a>的渡头，悲苦地遥望，最终换来是满目的苍凉。</p><p style=\"text-align: start;\">秋的意境中悄然聆听到冬姑娘拨动心弦，晶莹剔透的雪花已经在北国飘舞，雪域高原处已经白雪皑皑冰凌悬挂山崖，天山上的雪莲花含苞欲放，我的思绪伴着淡墨清茗，相伴秋中的<a href=\"http://www.sanwen.net/\" target=\"_blank\">文字</a>，跟随冬的韵律去听一曲清歌，扣心自问：是谁的<a href=\"http://zhijian.sanwen.net/\" target=\"_blank\">指尖</a>流过了千年的时光，纤弱成一株<a href=\"http://qiutian.sanwen8.cn/\" target=\"_blank\">秋天</a>的柳荷。锦瑟的心事中，散着淡淡哀怨，延续念念不忘的笙歌幽<a href=\"http://meng.sanwen8.cn/\" target=\"_blank\">梦</a>。</p><p style=\"text-align: start;\">夜，总是布满了孤独的影子，忧伤也变得张牙舞爪，放肆在我身体各个部位撕咬 ；疲惫的我，连最后的挣扎都不想把握，一双眼，两行泪，望穿幽夜，凉等，痴情心，无处归。天明天又黑，春去春又回，我的<a href=\"http://chuntian.sanwen8.cn/\" target=\"_blank\">春天</a>，最终迷失在刺骨的<a href=\"http://dongtian.sanwen8.cn/\" target=\"_blank\">寒冬</a>里，再也走不回。爬满难过的心，踱步都不能从容，惆怅的步伐比铅还沉重。时过境迁的风景已看不到走过的繁华，零碎的残屑让人想像不出这里也曾旖旎过，这里也曾辉煌过。可是，所有的变故都会被尘风吹落，被一个叫“无情”的东西刮走，一点不留。</p><p style=\"text-align: start;\">悲戚戚的心，夜风都不敢从我身边划过，都怕被这心冷着。我想告知风儿，能否过来吹吹我，帮我吹醒这些忧伤的茧，红尘的梦，让我变得快<a href=\"http://zuowen.sanwen.net/z/219426-kuaile\" target=\"_blank\">快乐</a>乐，远离这些尘世之琐。风儿听不见我裂心的呼唤，风儿听不见我散落的酸楚。谁也不会了解我，谁也不知我，缘不见，情丢失，都在这个秋天里，一转眼，化成烟。</p>', '1', '2017-10-14 14:13:06', 'A', '2');
INSERT INTO `announce` VALUES ('13', '1', 'fgfeg', '<p>ertretrtertr</p><p>edffgvdffgfdgdfgfdgdf刚刚梵蒂冈地方<br></p>', '1', '2017-10-23 16:02:40', 'A', '2');
INSERT INTO `announce` VALUES ('14', '1', '法规的规定非', '<p>梵蒂冈地方个</p><p>个地方gdfgfgdg郭德纲爸爸</p><p>保存VB从VBv</p><p>不橙V不橙V吧<br></p>', '1', '2017-10-23 16:02:56', 'A', '2');
INSERT INTO `announce` VALUES ('15', '1', '东风股份', '<p>仍然通过人体tyrtyrtyytryrtyrtyt</p><p>gdfgfdggfdgdf法规的法规</p><p>发个地方官方</p><p>梵蒂冈地方个</p><p>股份的股份<br></p>', '1', '2017-10-23 16:03:18', 'A', '2');
INSERT INTO `announce` VALUES ('16', '1', '古典风格', '<p>光伏发电个梵蒂冈</p><p>法规的法规<br></p>', '1', '2017-10-23 16:03:27', 'A', '2');
INSERT INTO `announce` VALUES ('17', '1', '苟富贵', '丰东股份个', '1', '2017-10-23 16:03:37', 'A', '2');
INSERT INTO `announce` VALUES ('18', '1', '给发个梵蒂冈', '梵蒂冈地方个电饭锅', '1', '2017-10-23 16:03:45', 'A', '2');
INSERT INTO `announce` VALUES ('19', '1', 'fdfs', '导出佛挡杀佛的个发个非官方发个梵蒂冈分割否', '1', '2017-10-24 12:22:59', 'B', '2');
INSERT INTO `announce` VALUES ('20', '1', '三个风格', '古典风格的法规的法规', '1', '2017-10-24 12:23:11', 'B', '2');
INSERT INTO `announce` VALUES ('21', '1', '郭德纲法规', '梵蒂冈地方个电饭锅发郭德纲法规法规的发官方', '1', '2017-10-24 12:23:22', 'B', '2');
INSERT INTO `announce` VALUES ('22', '1', '固定法规的法规', '古典风格的法规的法规', '1', '2017-10-24 12:23:28', 'B', '2');
INSERT INTO `announce` VALUES ('23', '1', '官方固定法规的法规', '官方大哥大哥发个非官方', '1', '2017-10-24 12:23:36', 'B', '2');
INSERT INTO `announce` VALUES ('24', '1', '固定法规的法规梵蒂冈地方个', '大飞哥太热同仁堂如果对方是个发固定法规的法规', '1', '2017-10-24 12:23:46', 'B', '2');
INSERT INTO `announce` VALUES ('25', '1', '第三方的', '是非得失电动蝶阀的法师打发打发斯蒂芬东方时尚的方法', '1', '2017-10-24 12:23:56', 'B', '2');
INSERT INTO `announce` VALUES ('26', '1', '顺丰到付东方闪电否', '&nbsp;第三方地方斯蒂芬似懂非懂辅导费', '1', '2017-10-24 12:24:06', 'B', '2');
INSERT INTO `announce` VALUES ('27', '1', '发多个发给对方', '的发个梵蒂冈梵蒂冈地方个地方', '1', '2017-10-24 12:24:18', 'B', '2');
INSERT INTO `announce` VALUES ('28', '1', '的方式固定发给对方', '古典风格大法规的法规分隔符古典风格地方法规', '1', '2017-10-24 12:24:27', 'B', '2');
INSERT INTO `announce` VALUES ('29', '1', '发光飞碟干', '发的噶发个梵蒂冈梵蒂冈法规的法规发光飞碟干大飞哥地方规定个', '1', '2017-10-24 12:25:15', 'B', '2');
INSERT INTO `announce` VALUES ('30', '1', '给多少法规的法规大发发给', '丰东股份噶梵蒂冈地方发噶', '1', '2017-10-24 12:25:23', 'B', '2');
INSERT INTO `announce` VALUES ('31', '1', '教育局', '几个号激光焊接好结核杆菌涵盖经济后果', '1', '2017-10-24 12:26:13', 'B', '2');
INSERT INTO `announce` VALUES ('32', '1', '几个好久好久', '&nbsp;结核杆菌刚回家后几个号激光焊接', '1', '2017-10-24 12:26:20', 'B', '2');
INSERT INTO `announce` VALUES ('33', '1', '结果进环境', '济公活佛几个号激光焊接', '1', '2017-10-24 12:26:26', 'B', '2');
INSERT INTO `announce` VALUES ('34', '1', '价格很高', '京东方换届大会几点回家', '1', '2017-10-24 12:30:56', 'B', '2');
INSERT INTO `announce` VALUES ('35', '1', '房间号感觉', '好几个环境刚回家', '1', '2017-10-24 12:31:03', 'B', '2');
INSERT INTO `announce` VALUES ('36', '1', '脚后跟结过婚', '黑寡妇脚后跟结过婚就', '1', '2017-10-24 12:31:09', 'B', '2');
INSERT INTO `announce` VALUES ('37', '1', '结果环境规划就', '脚后跟结过婚就', '1', '2017-10-24 12:31:15', 'B', '2');
INSERT INTO `announce` VALUES ('38', '1', '激光焊接', '和赶紧回家', '1', '2017-10-24 12:31:21', 'B', '2');
INSERT INTO `announce` VALUES ('39', '1', '好久好感觉', '涵盖激光焊接', '1', '2017-10-24 12:31:27', 'B', '2');
INSERT INTO `announce` VALUES ('40', '1', '几个号激光焊接', '涵盖激光焊接', '1', '2017-10-24 12:31:33', 'B', '2');
INSERT INTO `announce` VALUES ('41', '1', '结果环境规划', '涵盖激光焊接和', '1', '2017-10-24 12:31:48', 'B', '2');
INSERT INTO `announce` VALUES ('42', '1', '结果环境规划', '结果环境规划结婚', '1', '2017-10-24 12:31:54', 'B', '2');
INSERT INTO `announce` VALUES ('43', '1', '好久好久', '还关节电话交换机的话', '1', '2017-10-24 12:32:01', 'B', '2');
INSERT INTO `announce` VALUES ('44', '1', '激光焊接', '黑寡妇建华大街换届大会建华大街', '1', '2017-10-24 12:32:08', 'B', '2');
INSERT INTO `announce` VALUES ('45', '1', '几个号激光焊接干活', '&nbsp;脚后跟结过婚几个号激光焊接干活就', '1', '2017-10-24 12:32:16', 'B', '2');
INSERT INTO `announce` VALUES ('46', '1', '几个号激光焊接', '涵盖激光焊接和感觉', '1', '2017-10-24 12:32:23', 'B', '2');
INSERT INTO `announce` VALUES ('47', '1', '结果集回复感觉', '官方几号放假官方', '1', '2017-10-24 12:32:33', 'B', '2');
INSERT INTO `announce` VALUES ('48', '1', '减肥减肥刚回家', '房间号附加费环境规划', '1', '2017-10-24 12:32:39', 'B', '2');

-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeID` varchar(64) NOT NULL COMMENT '代码ID',
  `codeTypeID` varchar(64) DEFAULT NULL COMMENT '代码分类ID',
  `codeName` varchar(64) DEFAULT NULL COMMENT '代码名称',
  `codeOrder` int(11) DEFAULT NULL COMMENT '排序',
  `codeStatus` int(1) DEFAULT '1' COMMENT '状态（1：有效，2：无效）',
  `codePid` varchar(64) DEFAULT NULL COMMENT '代码父ID',
  `isLeaf` int(1) DEFAULT NULL COMMENT '是否叶子节点(1：是，0：不是)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1679 DEFAULT CHARSET=utf8 COMMENT='代码';

-- ----------------------------
-- Records of code
-- ----------------------------
INSERT INTO `code` VALUES ('1', '01', 'PC', '第一批', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('2', '02', 'PC', '第二批', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('3', '03', 'PC', '第三批', '3', '1', '-1', '1');
INSERT INTO `code` VALUES ('4', '04', 'PC', '第四批', '4', '1', '-1', '1');
INSERT INTO `code` VALUES ('5', '05', 'PC', '第五批', '5', '1', '-1', '1');
INSERT INTO `code` VALUES ('6', '06', 'PC', '第六批', '6', '1', '-1', '1');
INSERT INTO `code` VALUES ('7', '07', 'PC', '第七批', '7', '1', '-1', '1');
INSERT INTO `code` VALUES ('8', '08', 'PC', '第八批', '8', '1', '-1', '1');
INSERT INTO `code` VALUES ('9', '09', 'PC', '第九批', '9', '1', '-1', '1');
INSERT INTO `code` VALUES ('10', '10', 'PC', '第十批', '10', '1', '-1', '1');
INSERT INTO `code` VALUES ('11', '0', 'YN', '否', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('12', '1', 'YN', '是', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('13', '1', 'XB', '男', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('14', '2', 'XB', '女', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('15', '01', 'AI', '汉族', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('16', '02', 'AI', '少数民族', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('17', '1', 'AB', '所有城市', '377', '1', '-1', '0');
INSERT INTO `code` VALUES ('18', '11', 'AB', '北京市', '378', '1', '1', '0');
INSERT INTO `code` VALUES ('19', '110100', 'AB', '北京市市辖区', '379', '1', '11', '1');
INSERT INTO `code` VALUES ('20', '110101', 'AB', '北京市东城区', '380', '1', '11', '1');
INSERT INTO `code` VALUES ('21', '110102', 'AB', '北京市西城区', '381', '1', '11', '1');
INSERT INTO `code` VALUES ('22', '110103', 'AB', '北京市崇文区', '382', '1', '11', '1');
INSERT INTO `code` VALUES ('23', '110104', 'AB', '北京市宣武区', '383', '1', '11', '1');
INSERT INTO `code` VALUES ('24', '110105', 'AB', '北京市朝阳区', '384', '1', '11', '1');
INSERT INTO `code` VALUES ('25', '110106', 'AB', '北京市丰台区', '385', '1', '11', '1');
INSERT INTO `code` VALUES ('26', '110107', 'AB', '北京市石景山区', '386', '1', '11', '1');
INSERT INTO `code` VALUES ('27', '110108', 'AB', '北京市海淀区', '387', '1', '11', '1');
INSERT INTO `code` VALUES ('28', '110109', 'AB', '北京市门头沟区', '388', '1', '11', '1');
INSERT INTO `code` VALUES ('29', '110111', 'AB', '北京市房山区', '389', '1', '11', '1');
INSERT INTO `code` VALUES ('30', '110112', 'AB', '北京市通州区', '390', '1', '11', '1');
INSERT INTO `code` VALUES ('31', '110113', 'AB', '北京市顺义区', '391', '1', '11', '1');
INSERT INTO `code` VALUES ('32', '110114', 'AB', '北京市昌平区', '392', '1', '11', '1');
INSERT INTO `code` VALUES ('33', '110115', 'AB', '北京市大兴区', '393', '1', '11', '1');
INSERT INTO `code` VALUES ('34', '110116', 'AB', '北京市怀柔区', '394', '1', '11', '1');
INSERT INTO `code` VALUES ('35', '110117', 'AB', '北京市平谷区', '395', '1', '11', '1');
INSERT INTO `code` VALUES ('36', '12', 'AB', '天津市', '396', '1', '1', '0');
INSERT INTO `code` VALUES ('37', '120100', 'AB', '天津市市辖区', '397', '1', '12', '1');
INSERT INTO `code` VALUES ('38', '120101', 'AB', '天津市和平区', '398', '1', '12', '1');
INSERT INTO `code` VALUES ('39', '120102', 'AB', '天津市河东区', '399', '1', '12', '1');
INSERT INTO `code` VALUES ('40', '120103', 'AB', '天津市河西区', '400', '1', '12', '1');
INSERT INTO `code` VALUES ('41', '120104', 'AB', '天津市南开区', '401', '1', '12', '1');
INSERT INTO `code` VALUES ('42', '120105', 'AB', '天津市河北区', '402', '1', '12', '1');
INSERT INTO `code` VALUES ('43', '120106', 'AB', '天津市红桥区', '403', '1', '12', '1');
INSERT INTO `code` VALUES ('44', '120107', 'AB', '天津市塘沽区', '404', '1', '12', '1');
INSERT INTO `code` VALUES ('45', '120108', 'AB', '天津市汉沽区', '405', '1', '12', '1');
INSERT INTO `code` VALUES ('46', '120109', 'AB', '天津市大港区', '406', '1', '12', '1');
INSERT INTO `code` VALUES ('47', '120110', 'AB', '天津市东丽区', '407', '1', '12', '1');
INSERT INTO `code` VALUES ('48', '120111', 'AB', '天津市西青区', '408', '1', '12', '1');
INSERT INTO `code` VALUES ('49', '120112', 'AB', '天津市津南区', '409', '1', '12', '1');
INSERT INTO `code` VALUES ('50', '120113', 'AB', '天津市北辰区', '410', '1', '12', '1');
INSERT INTO `code` VALUES ('51', '120114', 'AB', '天津市武清区', '411', '1', '12', '1');
INSERT INTO `code` VALUES ('52', '120115', 'AB', '天津市宝坻区', '412', '1', '12', '1');
INSERT INTO `code` VALUES ('53', '13', 'AB', '河北省', '413', '1', '1', '0');
INSERT INTO `code` VALUES ('54', '130100', 'AB', '河北省石家庄市', '414', '1', '13', '1');
INSERT INTO `code` VALUES ('55', '130200', 'AB', '河北省唐山市', '415', '1', '13', '1');
INSERT INTO `code` VALUES ('56', '130300', 'AB', '河北省秦皇岛市', '416', '1', '13', '1');
INSERT INTO `code` VALUES ('57', '130400', 'AB', '河北省邯郸市', '417', '1', '13', '1');
INSERT INTO `code` VALUES ('58', '130500', 'AB', '河北省邢台市', '418', '1', '13', '1');
INSERT INTO `code` VALUES ('59', '130600', 'AB', '河北省保定市', '419', '1', '13', '1');
INSERT INTO `code` VALUES ('60', '130700', 'AB', '河北省张家口市', '420', '1', '13', '1');
INSERT INTO `code` VALUES ('61', '130800', 'AB', '河北省承德市', '421', '1', '13', '1');
INSERT INTO `code` VALUES ('62', '130900', 'AB', '河北省沧洲市', '422', '1', '13', '1');
INSERT INTO `code` VALUES ('63', '131000', 'AB', '河北省廊坊市', '423', '1', '13', '1');
INSERT INTO `code` VALUES ('64', '131100', 'AB', '河北省衡水市', '424', '1', '13', '1');
INSERT INTO `code` VALUES ('65', '14', 'AB', '山西省', '425', '1', '1', '0');
INSERT INTO `code` VALUES ('66', '140100', 'AB', '山西省太原市', '426', '1', '14', '1');
INSERT INTO `code` VALUES ('67', '140200', 'AB', '山西省大同市', '427', '1', '14', '1');
INSERT INTO `code` VALUES ('68', '140300', 'AB', '山西省阳泉市', '428', '1', '14', '1');
INSERT INTO `code` VALUES ('69', '140400', 'AB', '山西省长治市', '429', '1', '14', '1');
INSERT INTO `code` VALUES ('70', '140500', 'AB', '山西省晋城市', '430', '1', '14', '1');
INSERT INTO `code` VALUES ('71', '140600', 'AB', '山西省朔州市', '431', '1', '14', '1');
INSERT INTO `code` VALUES ('72', '140700', 'AB', '山西省晋中市', '432', '1', '14', '1');
INSERT INTO `code` VALUES ('73', '140800', 'AB', '山西省运城市', '433', '1', '14', '1');
INSERT INTO `code` VALUES ('74', '140900', 'AB', '山西省忻州市', '434', '1', '14', '1');
INSERT INTO `code` VALUES ('75', '141000', 'AB', '山西省临汾市', '435', '1', '14', '1');
INSERT INTO `code` VALUES ('76', '141100', 'AB', '山西省吕梁市', '436', '1', '14', '1');
INSERT INTO `code` VALUES ('77', '15', 'AB', '内蒙古', '437', '1', '1', '0');
INSERT INTO `code` VALUES ('78', '150100', 'AB', '内蒙古自治区呼和浩特市', '438', '1', '15', '1');
INSERT INTO `code` VALUES ('79', '150200', 'AB', '内蒙古自治区包头市', '439', '1', '15', '1');
INSERT INTO `code` VALUES ('80', '150300', 'AB', '内蒙古自治区乌海市', '440', '1', '15', '1');
INSERT INTO `code` VALUES ('81', '150400', 'AB', '内蒙古自治区赤峰市', '441', '1', '15', '1');
INSERT INTO `code` VALUES ('82', '150500', 'AB', '内蒙古自治区通辽市', '442', '1', '15', '1');
INSERT INTO `code` VALUES ('83', '150600', 'AB', '内蒙古自治区鄂尔多斯市', '443', '1', '15', '1');
INSERT INTO `code` VALUES ('84', '150700', 'AB', '内蒙古自治区呼伦贝尔市', '444', '1', '15', '1');
INSERT INTO `code` VALUES ('85', '150800', 'AB', '内蒙古自治区巴彦淖尔市', '445', '1', '15', '1');
INSERT INTO `code` VALUES ('86', '150900', 'AB', '内蒙古自治区乌兰察布市', '446', '1', '15', '1');
INSERT INTO `code` VALUES ('87', '152100', 'AB', '内蒙古自治区呼伦贝尔盟', '447', '1', '15', '1');
INSERT INTO `code` VALUES ('88', '152200', 'AB', '内蒙古自治区兴安盟', '448', '1', '15', '1');
INSERT INTO `code` VALUES ('89', '152300', 'AB', '内蒙古自治区哲里木盟', '449', '1', '15', '1');
INSERT INTO `code` VALUES ('90', '152500', 'AB', '内蒙古自治区锡林郭勒盟', '450', '1', '15', '1');
INSERT INTO `code` VALUES ('91', '152600', 'AB', '内蒙古自治区乌兰察布盟', '451', '1', '15', '1');
INSERT INTO `code` VALUES ('92', '152700', 'AB', '内蒙古自治区伊克昭盟', '452', '1', '15', '1');
INSERT INTO `code` VALUES ('93', '152800', 'AB', '内蒙古自治区巴彦淖尔盟', '453', '1', '15', '1');
INSERT INTO `code` VALUES ('94', '152900', 'AB', '内蒙古自治区阿拉善盟', '454', '1', '15', '1');
INSERT INTO `code` VALUES ('95', '21', 'AB', '辽宁省', '455', '1', '1', '0');
INSERT INTO `code` VALUES ('96', '210100', 'AB', '辽宁省沈阳市', '456', '1', '21', '1');
INSERT INTO `code` VALUES ('97', '210200', 'AB', '辽宁省大连市', '457', '1', '21', '1');
INSERT INTO `code` VALUES ('98', '210300', 'AB', '辽宁省鞍山市', '458', '1', '21', '1');
INSERT INTO `code` VALUES ('99', '210400', 'AB', '辽宁省抚顺市', '459', '1', '21', '1');
INSERT INTO `code` VALUES ('100', '210500', 'AB', '辽宁省本溪市', '460', '1', '21', '1');
INSERT INTO `code` VALUES ('101', '210600', 'AB', '辽宁省丹东市', '461', '1', '21', '1');
INSERT INTO `code` VALUES ('102', '210700', 'AB', '辽宁省锦洲市', '462', '1', '21', '1');
INSERT INTO `code` VALUES ('103', '210800', 'AB', '辽宁省营口市', '463', '1', '21', '1');
INSERT INTO `code` VALUES ('104', '210900', 'AB', '辽宁省阜新市', '464', '1', '21', '1');
INSERT INTO `code` VALUES ('105', '211000', 'AB', '辽宁省辽阳市', '465', '1', '21', '1');
INSERT INTO `code` VALUES ('106', '211100', 'AB', '辽宁省盘锦市', '466', '1', '21', '1');
INSERT INTO `code` VALUES ('107', '211200', 'AB', '辽宁省铁岭市', '467', '1', '21', '1');
INSERT INTO `code` VALUES ('108', '211300', 'AB', '辽宁省朝阳市', '468', '1', '21', '1');
INSERT INTO `code` VALUES ('109', '211400', 'AB', '辽宁省锦西市', '469', '1', '21', '1');
INSERT INTO `code` VALUES ('110', '22', 'AB', '吉林省', '470', '1', '1', '0');
INSERT INTO `code` VALUES ('111', '220100', 'AB', '吉林省长春市', '471', '1', '22', '1');
INSERT INTO `code` VALUES ('112', '220200', 'AB', '吉林省吉林市', '472', '1', '22', '1');
INSERT INTO `code` VALUES ('113', '220300', 'AB', '吉林省四平市', '473', '1', '22', '1');
INSERT INTO `code` VALUES ('114', '220400', 'AB', '吉林省辽源市', '474', '1', '22', '1');
INSERT INTO `code` VALUES ('115', '220500', 'AB', '吉林省通化市', '475', '1', '22', '1');
INSERT INTO `code` VALUES ('116', '220600', 'AB', '吉林省白山市', '476', '1', '22', '1');
INSERT INTO `code` VALUES ('117', '220700', 'AB', '吉林省松原市', '477', '1', '22', '1');
INSERT INTO `code` VALUES ('118', '220800', 'AB', '吉林省白城市', '478', '1', '22', '1');
INSERT INTO `code` VALUES ('119', '222400', 'AB', '吉林省延边朝鲜族自治州', '479', '1', '22', '1');
INSERT INTO `code` VALUES ('120', '23', 'AB', '黑龙江', '480', '1', '1', '0');
INSERT INTO `code` VALUES ('121', '230100', 'AB', '黑龙江省哈尔滨市', '481', '1', '23', '1');
INSERT INTO `code` VALUES ('122', '230200', 'AB', '黑龙江省齐齐哈尔市', '482', '1', '23', '1');
INSERT INTO `code` VALUES ('123', '230300', 'AB', '黑龙江省鸡西市', '483', '1', '23', '1');
INSERT INTO `code` VALUES ('124', '230400', 'AB', '黑龙江省鹤岗市', '484', '1', '23', '1');
INSERT INTO `code` VALUES ('125', '230500', 'AB', '黑龙江省双鸭山市', '485', '1', '23', '1');
INSERT INTO `code` VALUES ('126', '230600', 'AB', '黑龙江省大庆市', '486', '1', '23', '1');
INSERT INTO `code` VALUES ('127', '230700', 'AB', '黑龙江省伊春市', '487', '1', '23', '1');
INSERT INTO `code` VALUES ('128', '230800', 'AB', '黑龙江省佳木斯市', '488', '1', '23', '1');
INSERT INTO `code` VALUES ('129', '230900', 'AB', '黑龙江省七台河市', '489', '1', '23', '1');
INSERT INTO `code` VALUES ('130', '231000', 'AB', '黑龙江省牡丹江市', '490', '1', '23', '1');
INSERT INTO `code` VALUES ('131', '231100', 'AB', '黑龙江省黑河市', '491', '1', '23', '1');
INSERT INTO `code` VALUES ('132', '231200', 'AB', '黑龙江省绥化市', '492', '1', '23', '1');
INSERT INTO `code` VALUES ('133', '232100', 'AB', '黑龙江省松花江地区', '493', '1', '23', '1');
INSERT INTO `code` VALUES ('134', '232300', 'AB', '黑龙江省绥化地区', '494', '1', '23', '1');
INSERT INTO `code` VALUES ('135', '232700', 'AB', '黑龙江省大兴安岭地区', '495', '1', '23', '1');
INSERT INTO `code` VALUES ('136', '31', 'AB', '上海市', '496', '1', '1', '0');
INSERT INTO `code` VALUES ('137', '310101', 'AB', '上海市黄浦区', '497', '1', '31', '1');
INSERT INTO `code` VALUES ('138', '310103', 'AB', '上海市卢湾区', '498', '1', '31', '1');
INSERT INTO `code` VALUES ('139', '310104', 'AB', '上海市徐汇区', '499', '1', '31', '1');
INSERT INTO `code` VALUES ('140', '310105', 'AB', '上海市长宁区', '500', '1', '31', '1');
INSERT INTO `code` VALUES ('141', '310106', 'AB', '上海市静安区', '501', '1', '31', '1');
INSERT INTO `code` VALUES ('142', '310107', 'AB', '上海市普陀区', '502', '1', '31', '1');
INSERT INTO `code` VALUES ('143', '310109', 'AB', '上海市虹口区', '503', '1', '31', '1');
INSERT INTO `code` VALUES ('144', '310110', 'AB', '上海市杨浦区', '504', '1', '31', '1');
INSERT INTO `code` VALUES ('145', '310112', 'AB', '上海市闵行区', '505', '1', '31', '1');
INSERT INTO `code` VALUES ('146', '310113', 'AB', '上海市宝山区', '506', '1', '31', '1');
INSERT INTO `code` VALUES ('147', '310114', 'AB', '上海市嘉定区', '507', '1', '31', '1');
INSERT INTO `code` VALUES ('148', '310115', 'AB', '上海市浦东新区', '508', '1', '31', '1');
INSERT INTO `code` VALUES ('149', '310116', 'AB', '上海市金山区', '509', '1', '31', '1');
INSERT INTO `code` VALUES ('150', '310117', 'AB', '上海市松江区', '510', '1', '31', '1');
INSERT INTO `code` VALUES ('151', '310118', 'AB', '上海市青浦区', '511', '1', '31', '1');
INSERT INTO `code` VALUES ('152', '310120', 'AB', '上海市奉贤区', '512', '1', '31', '1');
INSERT INTO `code` VALUES ('153', '310121', 'AB', '上海市崇明县', '513', '1', '31', '1');
INSERT INTO `code` VALUES ('154', '32', 'AB', '江苏省', '514', '1', '1', '0');
INSERT INTO `code` VALUES ('155', '320100', 'AB', '江苏省南京市', '515', '1', '32', '1');
INSERT INTO `code` VALUES ('156', '320200', 'AB', '江苏省无锡市', '516', '1', '32', '1');
INSERT INTO `code` VALUES ('157', '320300', 'AB', '江苏省徐州市', '517', '1', '32', '1');
INSERT INTO `code` VALUES ('158', '320400', 'AB', '江苏省常州市', '518', '1', '32', '1');
INSERT INTO `code` VALUES ('159', '320500', 'AB', '江苏省苏州市', '519', '1', '32', '1');
INSERT INTO `code` VALUES ('160', '320600', 'AB', '江苏省南通市', '520', '1', '32', '1');
INSERT INTO `code` VALUES ('161', '320700', 'AB', '江苏省连云港市', '521', '1', '32', '1');
INSERT INTO `code` VALUES ('162', '320800', 'AB', '江苏省淮安市', '522', '1', '32', '1');
INSERT INTO `code` VALUES ('163', '320900', 'AB', '江苏省盐城市', '523', '1', '32', '1');
INSERT INTO `code` VALUES ('164', '321000', 'AB', '江苏省扬州市', '524', '1', '32', '1');
INSERT INTO `code` VALUES ('165', '321100', 'AB', '江苏省镇江市', '525', '1', '32', '1');
INSERT INTO `code` VALUES ('166', '321200', 'AB', '江苏省泰州市', '526', '1', '32', '1');
INSERT INTO `code` VALUES ('167', '321300', 'AB', '江苏省宿迁市', '527', '1', '32', '1');
INSERT INTO `code` VALUES ('168', '33', 'AB', '浙江省', '528', '1', '1', '0');
INSERT INTO `code` VALUES ('169', '330100', 'AB', '浙江省杭州市', '529', '1', '33', '1');
INSERT INTO `code` VALUES ('170', '330200', 'AB', '浙江省宁波市', '530', '1', '33', '1');
INSERT INTO `code` VALUES ('171', '330300', 'AB', '浙江省温州市', '531', '1', '33', '1');
INSERT INTO `code` VALUES ('172', '330400', 'AB', '浙江省嘉兴市', '532', '1', '33', '1');
INSERT INTO `code` VALUES ('173', '330500', 'AB', '浙江省湖洲市', '533', '1', '33', '1');
INSERT INTO `code` VALUES ('174', '330600', 'AB', '浙江省绍兴市', '534', '1', '33', '1');
INSERT INTO `code` VALUES ('175', '330700', 'AB', '浙江省金华市', '535', '1', '33', '1');
INSERT INTO `code` VALUES ('176', '330800', 'AB', '浙江省衢州市', '536', '1', '33', '1');
INSERT INTO `code` VALUES ('177', '330900', 'AB', '浙江省舟山市', '537', '1', '33', '1');
INSERT INTO `code` VALUES ('178', '331000', 'AB', '浙江省台州市', '538', '1', '33', '1');
INSERT INTO `code` VALUES ('179', '331100', 'AB', '浙江省丽水市', '539', '1', '33', '1');
INSERT INTO `code` VALUES ('180', '332500', 'AB', '浙江省丽水地区', '540', '1', '33', '1');
INSERT INTO `code` VALUES ('181', '332600', 'AB', '浙江省台州地区', '541', '1', '33', '1');
INSERT INTO `code` VALUES ('182', '34', 'AB', '安徽省', '542', '1', '1', '0');
INSERT INTO `code` VALUES ('183', '340100', 'AB', '安徽省合肥市', '543', '1', '34', '1');
INSERT INTO `code` VALUES ('184', '340200', 'AB', '安徽省芜湖市', '544', '1', '34', '1');
INSERT INTO `code` VALUES ('185', '340300', 'AB', '安徽省蚌埠市', '545', '1', '34', '1');
INSERT INTO `code` VALUES ('186', '340400', 'AB', '安徽省淮南市', '546', '1', '34', '1');
INSERT INTO `code` VALUES ('187', '340500', 'AB', '安徽省马鞍山市', '547', '1', '34', '1');
INSERT INTO `code` VALUES ('188', '340600', 'AB', '安徽省淮北市', '548', '1', '34', '1');
INSERT INTO `code` VALUES ('189', '340700', 'AB', '安徽省铜陵市', '549', '1', '34', '1');
INSERT INTO `code` VALUES ('190', '340800', 'AB', '安徽省安庆市', '550', '1', '34', '1');
INSERT INTO `code` VALUES ('191', '341000', 'AB', '安徽省黄山市', '551', '1', '34', '1');
INSERT INTO `code` VALUES ('192', '341100', 'AB', '安徽省滁州市', '552', '1', '34', '1');
INSERT INTO `code` VALUES ('193', '341200', 'AB', '安徽省阜阳市', '553', '1', '34', '1');
INSERT INTO `code` VALUES ('194', '341300', 'AB', '安徽省宿州市', '554', '1', '34', '1');
INSERT INTO `code` VALUES ('195', '341400', 'AB', '安徽省巢湖市', '555', '1', '34', '1');
INSERT INTO `code` VALUES ('196', '341500', 'AB', '安徽省六安市', '556', '1', '34', '1');
INSERT INTO `code` VALUES ('197', '341600', 'AB', '安徽省亳州市', '557', '1', '34', '1');
INSERT INTO `code` VALUES ('198', '341700', 'AB', '安徽省池州市', '558', '1', '34', '1');
INSERT INTO `code` VALUES ('199', '341800', 'AB', '安徽省宣城市', '559', '1', '34', '1');
INSERT INTO `code` VALUES ('200', '35', 'AB', '福建省', '560', '1', '1', '0');
INSERT INTO `code` VALUES ('201', '350100', 'AB', '福建省福州市', '561', '1', '35', '1');
INSERT INTO `code` VALUES ('202', '350200', 'AB', '福建省厦门市', '562', '1', '35', '1');
INSERT INTO `code` VALUES ('203', '350300', 'AB', '福建省莆田市', '563', '1', '35', '1');
INSERT INTO `code` VALUES ('204', '350400', 'AB', '福建省三明市', '564', '1', '35', '1');
INSERT INTO `code` VALUES ('205', '350500', 'AB', '福建省泉州市', '565', '1', '35', '1');
INSERT INTO `code` VALUES ('206', '350600', 'AB', '福建省漳州市', '566', '1', '35', '1');
INSERT INTO `code` VALUES ('207', '350700', 'AB', '福建省南平市', '567', '1', '35', '1');
INSERT INTO `code` VALUES ('208', '350800', 'AB', '福建省龙岩市', '568', '1', '35', '1');
INSERT INTO `code` VALUES ('209', '350900', 'AB', '福建省宁德市', '569', '1', '35', '1');
INSERT INTO `code` VALUES ('210', '36', 'AB', '江西省', '570', '1', '1', '0');
INSERT INTO `code` VALUES ('211', '360100', 'AB', '江西省南昌市', '571', '1', '36', '1');
INSERT INTO `code` VALUES ('212', '360200', 'AB', '江西省景德镇市', '572', '1', '36', '1');
INSERT INTO `code` VALUES ('213', '360300', 'AB', '江西省萍乡市', '573', '1', '36', '1');
INSERT INTO `code` VALUES ('214', '360400', 'AB', '江西省九江市', '574', '1', '36', '1');
INSERT INTO `code` VALUES ('215', '360500', 'AB', '江西省新余市', '575', '1', '36', '1');
INSERT INTO `code` VALUES ('216', '360600', 'AB', '江西省鹰潭市', '576', '1', '36', '1');
INSERT INTO `code` VALUES ('217', '360700', 'AB', '江西省赣州市', '577', '1', '36', '1');
INSERT INTO `code` VALUES ('218', '360800', 'AB', '江西省吉安市', '578', '1', '36', '1');
INSERT INTO `code` VALUES ('219', '360900', 'AB', '江西省宜春市', '579', '1', '36', '1');
INSERT INTO `code` VALUES ('220', '361000', 'AB', '江西省抚州市', '580', '1', '36', '1');
INSERT INTO `code` VALUES ('221', '361100', 'AB', '江西省上饶市', '581', '1', '36', '1');
INSERT INTO `code` VALUES ('222', '37', 'AB', '山东省', '582', '1', '1', '0');
INSERT INTO `code` VALUES ('223', '370100', 'AB', '山东省济南市', '583', '1', '37', '1');
INSERT INTO `code` VALUES ('224', '370200', 'AB', '山东省青岛市', '584', '1', '37', '1');
INSERT INTO `code` VALUES ('225', '370300', 'AB', '山东省淄博市', '585', '1', '37', '1');
INSERT INTO `code` VALUES ('226', '370400', 'AB', '山东省枣庄市', '586', '1', '37', '1');
INSERT INTO `code` VALUES ('227', '370500', 'AB', '山东省东营市', '587', '1', '37', '1');
INSERT INTO `code` VALUES ('228', '370600', 'AB', '山东省烟台市', '588', '1', '37', '1');
INSERT INTO `code` VALUES ('229', '370700', 'AB', '山东省潍坊市', '589', '1', '37', '1');
INSERT INTO `code` VALUES ('230', '370800', 'AB', '山东省济宁市', '590', '1', '37', '1');
INSERT INTO `code` VALUES ('231', '370900', 'AB', '山东省泰安市', '591', '1', '37', '1');
INSERT INTO `code` VALUES ('232', '371000', 'AB', '山东省威海市', '592', '1', '37', '1');
INSERT INTO `code` VALUES ('233', '371100', 'AB', '山东省日照市', '593', '1', '37', '1');
INSERT INTO `code` VALUES ('234', '371200', 'AB', '山东省莱芜市', '594', '1', '37', '1');
INSERT INTO `code` VALUES ('235', '371300', 'AB', '山东省临沂市', '595', '1', '37', '1');
INSERT INTO `code` VALUES ('236', '371400', 'AB', '山东省德州市', '596', '1', '37', '1');
INSERT INTO `code` VALUES ('237', '371500', 'AB', '山东省聊城市', '597', '1', '37', '1');
INSERT INTO `code` VALUES ('238', '371600', 'AB', '山东省滨州市', '598', '1', '37', '1');
INSERT INTO `code` VALUES ('239', '371700', 'AB', '山东省菏泽市', '599', '1', '37', '1');
INSERT INTO `code` VALUES ('240', '41', 'AB', '河南省', '600', '1', '1', '0');
INSERT INTO `code` VALUES ('241', '410100', 'AB', '河南省郑州市', '601', '1', '41', '1');
INSERT INTO `code` VALUES ('242', '410200', 'AB', '河南省开封市', '602', '1', '41', '1');
INSERT INTO `code` VALUES ('243', '410300', 'AB', '河南省洛阳市', '603', '1', '41', '1');
INSERT INTO `code` VALUES ('244', '410400', 'AB', '河南省平顶山市', '604', '1', '41', '1');
INSERT INTO `code` VALUES ('245', '410500', 'AB', '河南省安阳市', '605', '1', '41', '1');
INSERT INTO `code` VALUES ('246', '410600', 'AB', '河南省鹤壁市', '606', '1', '41', '1');
INSERT INTO `code` VALUES ('247', '410700', 'AB', '河南省新乡市', '607', '1', '41', '1');
INSERT INTO `code` VALUES ('248', '410800', 'AB', '河南省焦作市', '608', '1', '41', '1');
INSERT INTO `code` VALUES ('249', '410900', 'AB', '河南省濮阳市', '609', '1', '41', '1');
INSERT INTO `code` VALUES ('250', '411000', 'AB', '河南省许昌市', '610', '1', '41', '1');
INSERT INTO `code` VALUES ('251', '411100', 'AB', '河南省漯河市', '611', '1', '41', '1');
INSERT INTO `code` VALUES ('252', '411200', 'AB', '河南省三门峡市', '612', '1', '41', '1');
INSERT INTO `code` VALUES ('253', '411300', 'AB', '河南省南阳市', '613', '1', '41', '1');
INSERT INTO `code` VALUES ('254', '411400', 'AB', '河南省商丘市', '614', '1', '41', '1');
INSERT INTO `code` VALUES ('255', '411500', 'AB', '河南省信阳市', '615', '1', '41', '1');
INSERT INTO `code` VALUES ('256', '411600', 'AB', '河南省周口市', '616', '1', '41', '1');
INSERT INTO `code` VALUES ('257', '411700', 'AB', '河南省驻马店市', '617', '1', '41', '1');
INSERT INTO `code` VALUES ('258', '419000', 'AB', '河南省省直辖县级行政区划', '618', '1', '41', '1');
INSERT INTO `code` VALUES ('259', '42', 'AB', '湖北省', '619', '1', '1', '0');
INSERT INTO `code` VALUES ('260', '420100', 'AB', '湖北省武汉市', '620', '1', '42', '1');
INSERT INTO `code` VALUES ('261', '420200', 'AB', '湖北省黄石市', '621', '1', '42', '1');
INSERT INTO `code` VALUES ('262', '420300', 'AB', '湖北省十堰市', '622', '1', '42', '1');
INSERT INTO `code` VALUES ('263', '420400', 'AB', '湖北省沙市市', '623', '1', '42', '1');
INSERT INTO `code` VALUES ('264', '420500', 'AB', '湖北省宜昌市', '624', '1', '42', '1');
INSERT INTO `code` VALUES ('265', '420600', 'AB', '湖北省襄樊市', '625', '1', '42', '1');
INSERT INTO `code` VALUES ('266', '420700', 'AB', '湖北省鄂州市', '626', '1', '42', '1');
INSERT INTO `code` VALUES ('267', '420800', 'AB', '湖北省荆门市', '627', '1', '42', '1');
INSERT INTO `code` VALUES ('268', '420900', 'AB', '湖北省孝感市', '628', '1', '42', '1');
INSERT INTO `code` VALUES ('269', '421000', 'AB', '湖北省荆州市', '629', '1', '42', '1');
INSERT INTO `code` VALUES ('270', '421100', 'AB', '湖北省黄冈市', '630', '1', '42', '1');
INSERT INTO `code` VALUES ('271', '421200', 'AB', '湖北省咸宁市', '631', '1', '42', '1');
INSERT INTO `code` VALUES ('272', '421300', 'AB', '湖北省随州市', '632', '1', '42', '1');
INSERT INTO `code` VALUES ('273', '422600', 'AB', '湖北省郧阳地区', '633', '1', '42', '1');
INSERT INTO `code` VALUES ('274', '422800', 'AB', '湖北省恩施土家族苗族自治州', '634', '1', '42', '1');
INSERT INTO `code` VALUES ('275', '422900', 'AB', '湖北省省直辖行政单位', '635', '1', '42', '1');
INSERT INTO `code` VALUES ('276', '43', 'AB', '湖南省', '636', '1', '1', '0');
INSERT INTO `code` VALUES ('277', '430100', 'AB', '湖南省长沙市', '637', '1', '43', '1');
INSERT INTO `code` VALUES ('278', '430200', 'AB', '湖南省株洲市', '638', '1', '43', '1');
INSERT INTO `code` VALUES ('279', '430300', 'AB', '湖南省湘潭市', '639', '1', '43', '1');
INSERT INTO `code` VALUES ('280', '430400', 'AB', '湖南省衡阳市', '640', '1', '43', '1');
INSERT INTO `code` VALUES ('281', '430500', 'AB', '湖南省邵阳市', '641', '1', '43', '1');
INSERT INTO `code` VALUES ('282', '430600', 'AB', '湖南省岳阳市', '642', '1', '43', '1');
INSERT INTO `code` VALUES ('283', '430700', 'AB', '湖南省常德市', '643', '1', '43', '1');
INSERT INTO `code` VALUES ('284', '430800', 'AB', '湖南省张家界市', '644', '1', '43', '1');
INSERT INTO `code` VALUES ('285', '430900', 'AB', '湖南省益阳市', '645', '1', '43', '1');
INSERT INTO `code` VALUES ('286', '431000', 'AB', '湖南省郴州市', '646', '1', '43', '1');
INSERT INTO `code` VALUES ('287', '431100', 'AB', '湖南省永州市', '647', '1', '43', '1');
INSERT INTO `code` VALUES ('288', '431200', 'AB', '湖南省怀化市', '648', '1', '43', '1');
INSERT INTO `code` VALUES ('289', '431300', 'AB', '湖南省娄底市', '649', '1', '43', '1');
INSERT INTO `code` VALUES ('290', '432900', 'AB', '湖南省零陵地区', '650', '1', '43', '1');
INSERT INTO `code` VALUES ('291', '433100', 'AB', '湖南省湘西土家族苗族自治州', '651', '1', '43', '1');
INSERT INTO `code` VALUES ('292', '44', 'AB', '广东省', '652', '1', '1', '0');
INSERT INTO `code` VALUES ('293', '440100', 'AB', '广东省广州市', '653', '1', '44', '1');
INSERT INTO `code` VALUES ('294', '440200', 'AB', '广东省韶关市', '654', '1', '44', '1');
INSERT INTO `code` VALUES ('295', '440300', 'AB', '广东省深圳市', '655', '1', '44', '1');
INSERT INTO `code` VALUES ('296', '440400', 'AB', '广东省珠海市', '656', '1', '44', '1');
INSERT INTO `code` VALUES ('297', '440500', 'AB', '广东省汕头市', '657', '1', '44', '1');
INSERT INTO `code` VALUES ('298', '440600', 'AB', '广东省佛山市', '658', '1', '44', '1');
INSERT INTO `code` VALUES ('299', '440700', 'AB', '广东省江门市', '659', '1', '44', '1');
INSERT INTO `code` VALUES ('300', '440800', 'AB', '广东省湛江市', '660', '1', '44', '1');
INSERT INTO `code` VALUES ('301', '440900', 'AB', '广东省茂名市', '661', '1', '44', '1');
INSERT INTO `code` VALUES ('302', '441200', 'AB', '广东省肇庆市', '662', '1', '44', '1');
INSERT INTO `code` VALUES ('303', '441300', 'AB', '广东省惠州市', '663', '1', '44', '1');
INSERT INTO `code` VALUES ('304', '441400', 'AB', '广东省梅州市', '664', '1', '44', '1');
INSERT INTO `code` VALUES ('305', '441500', 'AB', '广东省汕尾市', '665', '1', '44', '1');
INSERT INTO `code` VALUES ('306', '441600', 'AB', '广东省河源市', '666', '1', '44', '1');
INSERT INTO `code` VALUES ('307', '441700', 'AB', '广东省阳江市', '667', '1', '44', '1');
INSERT INTO `code` VALUES ('308', '441800', 'AB', '广东省清远市', '668', '1', '44', '1');
INSERT INTO `code` VALUES ('309', '441900', 'AB', '广东省东莞市', '669', '1', '44', '1');
INSERT INTO `code` VALUES ('310', '442000', 'AB', '广东省中山市', '670', '1', '44', '1');
INSERT INTO `code` VALUES ('311', '445100', 'AB', '广东省潮州市', '671', '1', '44', '1');
INSERT INTO `code` VALUES ('312', '445200', 'AB', '广东省揭阳市', '672', '1', '44', '1');
INSERT INTO `code` VALUES ('313', '445300', 'AB', '广东省云浮市', '673', '1', '44', '1');
INSERT INTO `code` VALUES ('314', '45', 'AB', '广西壮族自治区', '674', '1', '1', '0');
INSERT INTO `code` VALUES ('315', '450100', 'AB', '广西壮族自治区南宁市', '675', '1', '45', '1');
INSERT INTO `code` VALUES ('316', '450200', 'AB', '广西壮族自治区柳州市', '676', '1', '45', '1');
INSERT INTO `code` VALUES ('317', '450300', 'AB', '广西壮族自治区桂林市', '677', '1', '45', '1');
INSERT INTO `code` VALUES ('318', '450400', 'AB', '广西壮族自治区梧州市', '678', '1', '45', '1');
INSERT INTO `code` VALUES ('319', '450500', 'AB', '广西壮族自治区北海市', '679', '1', '45', '1');
INSERT INTO `code` VALUES ('320', '450600', 'AB', '广西壮族自治区防城港市', '680', '1', '45', '1');
INSERT INTO `code` VALUES ('321', '450700', 'AB', '广西壮族自治区钦州市', '681', '1', '45', '1');
INSERT INTO `code` VALUES ('322', '450800', 'AB', '广西壮族自治区贵港市', '682', '1', '45', '1');
INSERT INTO `code` VALUES ('323', '450900', 'AB', '广西壮族自治区玉林市', '683', '1', '45', '1');
INSERT INTO `code` VALUES ('324', '451000', 'AB', '广西壮族自治区百色市', '684', '1', '45', '1');
INSERT INTO `code` VALUES ('325', '451100', 'AB', '广西壮族自治区贺州市', '685', '1', '45', '1');
INSERT INTO `code` VALUES ('326', '451200', 'AB', '广西壮族自治区河池市', '686', '1', '45', '1');
INSERT INTO `code` VALUES ('327', '451300', 'AB', '广西壮族自治区来宾市', '687', '1', '45', '1');
INSERT INTO `code` VALUES ('328', '451400', 'AB', '广西壮族自治区崇左市', '688', '1', '45', '1');
INSERT INTO `code` VALUES ('329', '46', 'AB', '海南省', '689', '1', '1', '0');
INSERT INTO `code` VALUES ('330', '460000', 'AB', '海南省', '690', '1', '46', '1');
INSERT INTO `code` VALUES ('331', '50', 'AB', '重庆市', '691', '1', '1', '0');
INSERT INTO `code` VALUES ('332', '500100', 'AB', '重庆市市辖区', '692', '1', '50', '1');
INSERT INTO `code` VALUES ('333', '500101', 'AB', '重庆市万州区', '693', '1', '50', '1');
INSERT INTO `code` VALUES ('334', '500102', 'AB', '重庆市涪陵区', '694', '1', '50', '1');
INSERT INTO `code` VALUES ('335', '500103', 'AB', '重庆市渝中区', '695', '1', '50', '1');
INSERT INTO `code` VALUES ('336', '500104', 'AB', '重庆市大渡口区', '696', '1', '50', '1');
INSERT INTO `code` VALUES ('337', '500105', 'AB', '重庆市江北区', '697', '1', '50', '1');
INSERT INTO `code` VALUES ('338', '500106', 'AB', '重庆市沙坪坝区', '698', '1', '50', '1');
INSERT INTO `code` VALUES ('339', '500107', 'AB', '重庆市九龙坡区', '699', '1', '50', '1');
INSERT INTO `code` VALUES ('340', '500108', 'AB', '重庆市南岸区', '700', '1', '50', '1');
INSERT INTO `code` VALUES ('341', '500109', 'AB', '重庆市北碚区', '701', '1', '50', '1');
INSERT INTO `code` VALUES ('342', '500110', 'AB', '重庆市万盛区', '702', '1', '50', '1');
INSERT INTO `code` VALUES ('343', '500111', 'AB', '重庆市双桥区', '703', '1', '50', '1');
INSERT INTO `code` VALUES ('344', '500112', 'AB', '重庆市渝北区', '704', '1', '50', '1');
INSERT INTO `code` VALUES ('345', '500113', 'AB', '重庆市巴南区', '705', '1', '50', '1');
INSERT INTO `code` VALUES ('346', '500114', 'AB', '重庆市黔江区', '706', '1', '50', '1');
INSERT INTO `code` VALUES ('347', '500115', 'AB', '重庆市长寿区', '707', '1', '50', '1');
INSERT INTO `code` VALUES ('348', '500116', 'AB', '重庆市江津区', '708', '1', '50', '1');
INSERT INTO `code` VALUES ('349', '500117', 'AB', '重庆市合川区', '709', '1', '50', '1');
INSERT INTO `code` VALUES ('350', '500118', 'AB', '重庆市永川区', '710', '1', '50', '1');
INSERT INTO `code` VALUES ('351', '500119', 'AB', '重庆市南川区', '711', '1', '50', '1');
INSERT INTO `code` VALUES ('352', '51', 'AB', '四川省', '712', '1', '1', '0');
INSERT INTO `code` VALUES ('353', '510100', 'AB', '四川省成都市', '713', '1', '51', '1');
INSERT INTO `code` VALUES ('354', '510200', 'AB', '四川省重庆市', '714', '1', '51', '1');
INSERT INTO `code` VALUES ('355', '510300', 'AB', '四川省自贡市', '715', '1', '51', '1');
INSERT INTO `code` VALUES ('356', '510400', 'AB', '四川省攀枝花市', '716', '1', '51', '1');
INSERT INTO `code` VALUES ('357', '510500', 'AB', '四川省泸州市', '717', '1', '51', '1');
INSERT INTO `code` VALUES ('358', '510600', 'AB', '四川省德阳市', '718', '1', '51', '1');
INSERT INTO `code` VALUES ('359', '510700', 'AB', '四川省绵阳市', '719', '1', '51', '1');
INSERT INTO `code` VALUES ('360', '510800', 'AB', '四川省广元市', '720', '1', '51', '1');
INSERT INTO `code` VALUES ('361', '510900', 'AB', '四川省遂宁市', '721', '1', '51', '1');
INSERT INTO `code` VALUES ('362', '511000', 'AB', '四川省内江市', '722', '1', '51', '1');
INSERT INTO `code` VALUES ('363', '511100', 'AB', '四川省乐山市', '723', '1', '51', '1');
INSERT INTO `code` VALUES ('364', '511200', 'AB', '四川省万县市', '724', '1', '51', '1');
INSERT INTO `code` VALUES ('365', '511300', 'AB', '四川省南充市', '725', '1', '51', '1');
INSERT INTO `code` VALUES ('366', '511400', 'AB', '四川省眉山市', '726', '1', '51', '1');
INSERT INTO `code` VALUES ('367', '511500', 'AB', '四川省宜宾市', '727', '1', '51', '1');
INSERT INTO `code` VALUES ('368', '511600', 'AB', '四川省广安市', '728', '1', '51', '1');
INSERT INTO `code` VALUES ('369', '511700', 'AB', '四川省达州市', '729', '1', '51', '1');
INSERT INTO `code` VALUES ('370', '511800', 'AB', '四川省雅安市', '730', '1', '51', '1');
INSERT INTO `code` VALUES ('371', '511900', 'AB', '四川省巴中市', '731', '1', '51', '1');
INSERT INTO `code` VALUES ('372', '512000', 'AB', '四川省资阳市', '732', '1', '51', '1');
INSERT INTO `code` VALUES ('373', '512300', 'AB', '四川省培陵地区', '733', '1', '51', '1');
INSERT INTO `code` VALUES ('374', '512500', 'AB', '四川省宜宾地区', '734', '1', '51', '1');
INSERT INTO `code` VALUES ('375', '513000', 'AB', '四川省达川地区', '735', '1', '51', '1');
INSERT INTO `code` VALUES ('376', '513100', 'AB', '四川省雅安地区', '736', '1', '51', '1');
INSERT INTO `code` VALUES ('377', '513200', 'AB', '四川省阿坝藏族羌族自治州', '737', '1', '51', '1');
INSERT INTO `code` VALUES ('378', '513300', 'AB', '四川省甘孜藏族自治州', '738', '1', '51', '1');
INSERT INTO `code` VALUES ('379', '513400', 'AB', '四川省凉山彝族自治州', '739', '1', '51', '1');
INSERT INTO `code` VALUES ('380', '513500', 'AB', '四川省黔江地区', '740', '1', '51', '1');
INSERT INTO `code` VALUES ('381', '513600', 'AB', '四川省广安地区', '741', '1', '51', '1');
INSERT INTO `code` VALUES ('382', '513700', 'AB', '四川省巴中地区', '742', '1', '51', '1');
INSERT INTO `code` VALUES ('383', '52', 'AB', '贵州省', '743', '1', '1', '0');
INSERT INTO `code` VALUES ('384', '520100', 'AB', '贵州省贵阳市', '744', '1', '52', '1');
INSERT INTO `code` VALUES ('385', '520200', 'AB', '贵州省六盘水市', '745', '1', '52', '1');
INSERT INTO `code` VALUES ('386', '520300', 'AB', '贵州省遵义市', '746', '1', '52', '1');
INSERT INTO `code` VALUES ('387', '520400', 'AB', '贵州省安顺市', '747', '1', '52', '1');
INSERT INTO `code` VALUES ('388', '522100', 'AB', '贵州省遵义地区', '748', '1', '52', '1');
INSERT INTO `code` VALUES ('389', '522200', 'AB', '贵州省铜仁地区', '749', '1', '52', '1');
INSERT INTO `code` VALUES ('390', '522300', 'AB', '贵州省黔西南布依族苗族自治州', '750', '1', '52', '1');
INSERT INTO `code` VALUES ('391', '522400', 'AB', '贵州省毕节地区', '751', '1', '52', '1');
INSERT INTO `code` VALUES ('392', '522500', 'AB', '贵州省安顺地区', '752', '1', '52', '1');
INSERT INTO `code` VALUES ('393', '522600', 'AB', '贵州省黔东南苗族侗族自治县', '753', '1', '52', '1');
INSERT INTO `code` VALUES ('394', '522700', 'AB', '贵州省黔南布依族苗族自治州', '754', '1', '52', '1');
INSERT INTO `code` VALUES ('395', '53', 'AB', '云南省', '755', '1', '1', '0');
INSERT INTO `code` VALUES ('396', '530100', 'AB', '云南省昆明市', '756', '1', '53', '1');
INSERT INTO `code` VALUES ('397', '530200', 'AB', '云南省东川市', '757', '1', '53', '1');
INSERT INTO `code` VALUES ('398', '530300', 'AB', '云南省曲靖市', '758', '1', '53', '1');
INSERT INTO `code` VALUES ('399', '530400', 'AB', '云南省玉溪市', '759', '1', '53', '1');
INSERT INTO `code` VALUES ('400', '530500', 'AB', '云南省保山市', '760', '1', '53', '1');
INSERT INTO `code` VALUES ('401', '530600', 'AB', '云南省昭通市', '761', '1', '53', '1');
INSERT INTO `code` VALUES ('402', '530700', 'AB', '云南省丽江市', '762', '1', '53', '1');
INSERT INTO `code` VALUES ('403', '530800', 'AB', '云南省普洱市', '763', '1', '53', '1');
INSERT INTO `code` VALUES ('404', '530900', 'AB', '云南省临沧市', '764', '1', '53', '1');
INSERT INTO `code` VALUES ('405', '532100', 'AB', '云南省昭通地区', '765', '1', '53', '1');
INSERT INTO `code` VALUES ('406', '532200', 'AB', '云南省曲靖地区', '766', '1', '53', '1');
INSERT INTO `code` VALUES ('407', '532300', 'AB', '云南省楚雄彝族自治州', '767', '1', '53', '1');
INSERT INTO `code` VALUES ('408', '532400', 'AB', '云南省玉溪地区', '768', '1', '53', '1');
INSERT INTO `code` VALUES ('409', '532500', 'AB', '云南省红河哈尼族彝族自治州', '769', '1', '53', '1');
INSERT INTO `code` VALUES ('410', '532600', 'AB', '云南省文山壮族苗族自治州', '770', '1', '53', '1');
INSERT INTO `code` VALUES ('411', '532700', 'AB', '云南省思茅地区', '771', '1', '53', '1');
INSERT INTO `code` VALUES ('412', '532800', 'AB', '云南省西双版纳傣族自治州', '772', '1', '53', '1');
INSERT INTO `code` VALUES ('413', '532900', 'AB', '云南省大理白族自治州', '773', '1', '53', '1');
INSERT INTO `code` VALUES ('414', '533000', 'AB', '云南省保山地区', '774', '1', '53', '1');
INSERT INTO `code` VALUES ('415', '533100', 'AB', '云南省德宏傣族景颇族自治州', '775', '1', '53', '1');
INSERT INTO `code` VALUES ('416', '533200', 'AB', '云南省丽江地区', '776', '1', '53', '1');
INSERT INTO `code` VALUES ('417', '533300', 'AB', '云南省怒江傈傈族自治州', '777', '1', '53', '1');
INSERT INTO `code` VALUES ('418', '533400', 'AB', '云南省迪庆藏族自治州', '778', '1', '53', '1');
INSERT INTO `code` VALUES ('419', '533500', 'AB', '云南省临沧地区', '779', '1', '53', '1');
INSERT INTO `code` VALUES ('420', '54', 'AB', '西藏自治区', '780', '1', '1', '0');
INSERT INTO `code` VALUES ('421', '540100', 'AB', '西藏自治区拉萨市', '781', '1', '54', '1');
INSERT INTO `code` VALUES ('422', '542100', 'AB', '西藏自治区昌都地区', '782', '1', '54', '1');
INSERT INTO `code` VALUES ('423', '542200', 'AB', '西藏自治区山南地区', '783', '1', '54', '1');
INSERT INTO `code` VALUES ('424', '542300', 'AB', '西藏自治区日喀则地区', '784', '1', '54', '1');
INSERT INTO `code` VALUES ('425', '542400', 'AB', '西藏自治区那曲地区', '785', '1', '54', '1');
INSERT INTO `code` VALUES ('426', '542500', 'AB', '西藏自治区阿里地区', '786', '1', '54', '1');
INSERT INTO `code` VALUES ('427', '542600', 'AB', '西藏自治区林芝地区', '787', '1', '54', '1');
INSERT INTO `code` VALUES ('428', '61', 'AB', '陕西省', '788', '1', '1', '0');
INSERT INTO `code` VALUES ('429', '610100', 'AB', '陕西省西安市', '789', '1', '61', '1');
INSERT INTO `code` VALUES ('430', '610200', 'AB', '陕西省铜川市', '790', '1', '61', '1');
INSERT INTO `code` VALUES ('431', '610300', 'AB', '陕西省宝鸡市', '791', '1', '61', '1');
INSERT INTO `code` VALUES ('432', '610400', 'AB', '陕西省咸阳市', '792', '1', '61', '1');
INSERT INTO `code` VALUES ('433', '610500', 'AB', '陕西省渭南市', '793', '1', '61', '1');
INSERT INTO `code` VALUES ('434', '610600', 'AB', '陕西省延安市', '794', '1', '61', '1');
INSERT INTO `code` VALUES ('435', '610700', 'AB', '陕西省汉中市', '795', '1', '61', '1');
INSERT INTO `code` VALUES ('436', '610800', 'AB', '陕西省榆林市', '796', '1', '61', '1');
INSERT INTO `code` VALUES ('437', '610900', 'AB', '陕西省安康市', '797', '1', '61', '1');
INSERT INTO `code` VALUES ('438', '611000', 'AB', '陕西省商洛市', '798', '1', '61', '1');
INSERT INTO `code` VALUES ('439', '62', 'AB', '甘肃省', '799', '1', '1', '0');
INSERT INTO `code` VALUES ('440', '620100', 'AB', '甘肃省兰州市', '800', '1', '62', '1');
INSERT INTO `code` VALUES ('441', '620200', 'AB', '甘肃省嘉峪关市', '801', '1', '62', '1');
INSERT INTO `code` VALUES ('442', '620300', 'AB', '甘肃省金昌市', '802', '1', '62', '1');
INSERT INTO `code` VALUES ('443', '620400', 'AB', '甘肃省白银市', '803', '1', '62', '1');
INSERT INTO `code` VALUES ('444', '620500', 'AB', '甘肃省天水市', '804', '1', '62', '1');
INSERT INTO `code` VALUES ('445', '620600', 'AB', '甘肃省武威市', '805', '1', '62', '1');
INSERT INTO `code` VALUES ('446', '620700', 'AB', '甘肃省张掖市', '806', '1', '62', '1');
INSERT INTO `code` VALUES ('447', '620800', 'AB', '甘肃省平凉市', '807', '1', '62', '1');
INSERT INTO `code` VALUES ('448', '620900', 'AB', '甘肃省酒泉市', '808', '1', '62', '1');
INSERT INTO `code` VALUES ('449', '621000', 'AB', '甘肃省庆阳市', '809', '1', '62', '1');
INSERT INTO `code` VALUES ('450', '621100', 'AB', '甘肃省定西市', '810', '1', '62', '1');
INSERT INTO `code` VALUES ('451', '621200', 'AB', '甘肃省陇南市', '811', '1', '62', '1');
INSERT INTO `code` VALUES ('452', '622900', 'AB', '甘肃省临夏回族自治州', '812', '1', '62', '1');
INSERT INTO `code` VALUES ('453', '623000', 'AB', '甘肃省甘南藏族自治州', '813', '1', '62', '1');
INSERT INTO `code` VALUES ('454', '63', 'AB', '青海省', '814', '1', '1', '0');
INSERT INTO `code` VALUES ('455', '630100', 'AB', '青海省西宁市', '815', '1', '63', '1');
INSERT INTO `code` VALUES ('456', '632100', 'AB', '青海省海东地区', '816', '1', '63', '1');
INSERT INTO `code` VALUES ('457', '632200', 'AB', '青海省海北藏族自治州', '817', '1', '63', '1');
INSERT INTO `code` VALUES ('458', '632300', 'AB', '青海省黄南藏族自治州', '818', '1', '63', '1');
INSERT INTO `code` VALUES ('459', '632500', 'AB', '青海省海南藏族自治州', '819', '1', '63', '1');
INSERT INTO `code` VALUES ('460', '632600', 'AB', '青海省果洛藏族自治州', '820', '1', '63', '1');
INSERT INTO `code` VALUES ('461', '632700', 'AB', '青海省玉树藏族自治州', '821', '1', '63', '1');
INSERT INTO `code` VALUES ('462', '632800', 'AB', '青海省海西蒙古族藏族自治州', '822', '1', '63', '1');
INSERT INTO `code` VALUES ('463', '64', 'AB', '宁夏回族自治区', '823', '1', '1', '0');
INSERT INTO `code` VALUES ('464', '640100', 'AB', '宁夏回族自治区银川市', '824', '1', '64', '1');
INSERT INTO `code` VALUES ('465', '640200', 'AB', '宁夏回族自治区石嘴山市', '825', '1', '64', '1');
INSERT INTO `code` VALUES ('466', '640300', 'AB', '宁夏回族自治区吴忠市', '826', '1', '64', '1');
INSERT INTO `code` VALUES ('467', '640400', 'AB', '宁夏回族自治区固原市', '827', '1', '64', '1');
INSERT INTO `code` VALUES ('468', '640500', 'AB', '宁夏回族自治区固中卫市', '828', '1', '64', '1');
INSERT INTO `code` VALUES ('469', '642100', 'AB', '宁夏回族自治区银南地区', '829', '1', '64', '1');
INSERT INTO `code` VALUES ('470', '642200', 'AB', '宁夏回族自治区固原地区', '830', '1', '64', '1');
INSERT INTO `code` VALUES ('471', '65', 'AB', '新疆维吾尔自治区', '831', '1', '1', '0');
INSERT INTO `code` VALUES ('472', '650100', 'AB', '新疆维吾尔自治区乌鲁木齐市', '832', '1', '65', '1');
INSERT INTO `code` VALUES ('473', '650200', 'AB', '新疆维吾尔自治区克拉玛依市', '833', '1', '65', '1');
INSERT INTO `code` VALUES ('474', '652100', 'AB', '新疆维吾尔自治区吐鲁番地区', '834', '1', '65', '1');
INSERT INTO `code` VALUES ('475', '652200', 'AB', '新疆维吾尔自治区哈密地区', '835', '1', '65', '1');
INSERT INTO `code` VALUES ('476', '652300', 'AB', '新疆维吾尔自治区昌吉回族自治州', '836', '1', '65', '1');
INSERT INTO `code` VALUES ('477', '652700', 'AB', '新疆维吾尔自治区博尔塔拉蒙古自治州', '837', '1', '65', '1');
INSERT INTO `code` VALUES ('478', '652800', 'AB', '新疆维吾尔自治区巴音郭楞蒙古自治州', '838', '1', '65', '1');
INSERT INTO `code` VALUES ('479', '652900', 'AB', '新疆维吾尔自治区阿克苏地区', '839', '1', '65', '1');
INSERT INTO `code` VALUES ('480', '653000', 'AB', '新疆维吾尔自治区克孜勒苏柯尔克孜自治州', '840', '1', '65', '1');
INSERT INTO `code` VALUES ('481', '653100', 'AB', '新疆维吾尔自治区喀什地区', '841', '1', '65', '1');
INSERT INTO `code` VALUES ('482', '653200', 'AB', '新疆维吾尔自治区和田地区', '842', '1', '65', '1');
INSERT INTO `code` VALUES ('483', '654000', 'AB', '新疆维吾尔自治区伊犁哈萨克自治州', '843', '1', '65', '1');
INSERT INTO `code` VALUES ('484', '654100', 'AB', '新疆维吾尔自治区伊犁地区', '844', '1', '65', '1');
INSERT INTO `code` VALUES ('485', '654200', 'AB', '新疆维吾尔自治区塔城地区', '845', '1', '65', '1');
INSERT INTO `code` VALUES ('486', '654300', 'AB', '新疆维吾尔自治区阿勒泰地区', '846', '1', '65', '1');
INSERT INTO `code` VALUES ('487', '659000', 'AB', '新疆维吾尔自治区直辖县级行政区划', '847', '1', '65', '1');
INSERT INTO `code` VALUES ('488', '71', 'AB', '台湾省', '848', '1', '1', '0');
INSERT INTO `code` VALUES ('489', '710000', 'AB', '台湾省', '849', '1', '71', '1');
INSERT INTO `code` VALUES ('490', '81', 'AB', '香港特别行政区', '850', '1', '1', '0');
INSERT INTO `code` VALUES ('491', '810000', 'AB', '香港特别行政区', '851', '1', '81', '1');
INSERT INTO `code` VALUES ('492', '82', 'AB', '澳门特别行政区', '852', '1', '1', '0');
INSERT INTO `code` VALUES ('493', '820000', 'AB', '澳门特别行政区', '853', '1', '82', '1');
INSERT INTO `code` VALUES ('494', '01', 'AG', '中共党员', '5', '1', '-1', '1');
INSERT INTO `code` VALUES ('495', '02', 'AG', '中共预备党员', '6', '1', '-1', '1');
INSERT INTO `code` VALUES ('496', '03', 'AG', '共青团员', '7', '1', '-1', '1');
INSERT INTO `code` VALUES ('497', '04', 'AG', '民革会员', '8', '1', '-1', '1');
INSERT INTO `code` VALUES ('498', '05', 'AG', '民盟盟员', '9', '1', '-1', '1');
INSERT INTO `code` VALUES ('499', '06', 'AG', '民建会员', '10', '1', '-1', '1');
INSERT INTO `code` VALUES ('500', '07', 'AG', '民进会员', '11', '1', '-1', '1');
INSERT INTO `code` VALUES ('501', '08', 'AG', '农工党党员', '12', '1', '-1', '1');
INSERT INTO `code` VALUES ('502', '09', 'AG', '致公党党员', '13', '1', '-1', '1');
INSERT INTO `code` VALUES ('503', '10', 'AG', '九三学社社员', '14', '1', '-1', '1');
INSERT INTO `code` VALUES ('504', '11', 'AG', '台盟盟员', '15', '1', '-1', '1');
INSERT INTO `code` VALUES ('505', '12', 'AG', '无党派民主人士', '16', '1', '-1', '1');
INSERT INTO `code` VALUES ('506', '13', 'AG', '群众', '17', '1', '-1', '1');
INSERT INTO `code` VALUES ('507', '20', 'AG', '台、港、澳地区人员', '18', '1', '-1', '1');
INSERT INTO `code` VALUES ('508', '30', 'AG', '外籍人员', '19', '1', '-1', '1');
INSERT INTO `code` VALUES ('509', '10', 'CG', '未婚', '20', '1', '-1', '1');
INSERT INTO `code` VALUES ('510', '20', 'CG', '已婚', '21', '1', '-1', '1');
INSERT INTO `code` VALUES ('511', '21', 'CG', '初婚', '22', '1', '-1', '1');
INSERT INTO `code` VALUES ('512', '22', 'CG', '再婚', '23', '1', '-1', '1');
INSERT INTO `code` VALUES ('513', '23', 'CG', '复婚', '24', '1', '-1', '1');
INSERT INTO `code` VALUES ('514', '30', 'CG', '丧偶', '25', '1', '-1', '1');
INSERT INTO `code` VALUES ('515', '40', 'CG', '离婚', '26', '1', '-1', '1');
INSERT INTO `code` VALUES ('516', '90', 'CG', '未说明的婚姻状况', '27', '1', '-1', '1');
INSERT INTO `code` VALUES ('517', '0', 'BC', '所有学位', '28', '1', '-1', '0');
INSERT INTO `code` VALUES ('518', '1', 'BC', '名誉博士', '29', '1', '0', '0');
INSERT INTO `code` VALUES ('519', '101', 'BC', '名誉博士', '30', '1', '1', '1');
INSERT INTO `code` VALUES ('520', '102', 'BC', '其他', '31', '1', '1', '1');
INSERT INTO `code` VALUES ('521', '2', 'BC', '博士', '32', '1', '0', '0');
INSERT INTO `code` VALUES ('522', '201', 'BC', '哲学博士', '33', '1', '2', '1');
INSERT INTO `code` VALUES ('523', '202', 'BC', '经济学博士', '34', '1', '2', '1');
INSERT INTO `code` VALUES ('524', '203', 'BC', '法学博士', '35', '1', '2', '1');
INSERT INTO `code` VALUES ('525', '204', 'BC', '教育学博士', '36', '1', '2', '1');
INSERT INTO `code` VALUES ('526', '205', 'BC', '文学博士', '37', '1', '2', '1');
INSERT INTO `code` VALUES ('527', '206', 'BC', '历史学博士', '38', '1', '2', '1');
INSERT INTO `code` VALUES ('528', '207', 'BC', '理学博士', '39', '1', '2', '1');
INSERT INTO `code` VALUES ('529', '208', 'BC', '工学博士', '40', '1', '2', '1');
INSERT INTO `code` VALUES ('530', '209', 'BC', '农学博士', '41', '1', '2', '1');
INSERT INTO `code` VALUES ('531', '210', 'BC', '医学博士', '42', '1', '2', '1');
INSERT INTO `code` VALUES ('532', '211', 'BC', '军事学博士', '43', '1', '2', '1');
INSERT INTO `code` VALUES ('533', '212', 'BC', '管理学博士', '44', '1', '2', '1');
INSERT INTO `code` VALUES ('534', '245', 'BC', '临床医学博士', '45', '1', '2', '1');
INSERT INTO `code` VALUES ('535', '248', 'BC', '兽医博士', '46', '1', '2', '1');
INSERT INTO `code` VALUES ('536', '250', 'BC', '口腔医学博士', '47', '1', '2', '1');
INSERT INTO `code` VALUES ('537', '251', 'BC', '其他', '48', '1', '2', '1');
INSERT INTO `code` VALUES ('538', '3', 'BC', '硕士', '49', '1', '0', '0');
INSERT INTO `code` VALUES ('539', '301', 'BC', '哲学硕士', '50', '1', '3', '1');
INSERT INTO `code` VALUES ('540', '302', 'BC', '经济学硕士', '51', '1', '3', '1');
INSERT INTO `code` VALUES ('541', '303', 'BC', '法学硕士', '52', '1', '3', '1');
INSERT INTO `code` VALUES ('542', '304', 'BC', '教育学硕士', '53', '1', '3', '1');
INSERT INTO `code` VALUES ('543', '305', 'BC', '文学硕士', '54', '1', '3', '1');
INSERT INTO `code` VALUES ('544', '306', 'BC', '历史学硕士', '55', '1', '3', '1');
INSERT INTO `code` VALUES ('545', '307', 'BC', '理学硕士', '56', '1', '3', '1');
INSERT INTO `code` VALUES ('546', '308', 'BC', '工学硕士', '57', '1', '3', '1');
INSERT INTO `code` VALUES ('547', '309', 'BC', '农学硕士', '58', '1', '3', '1');
INSERT INTO `code` VALUES ('548', '310', 'BC', '医学硕士', '59', '1', '3', '1');
INSERT INTO `code` VALUES ('549', '311', 'BC', '军事学硕士', '60', '1', '3', '1');
INSERT INTO `code` VALUES ('550', '312', 'BC', '管理学硕士', '61', '1', '3', '1');
INSERT INTO `code` VALUES ('551', '341', 'BC', '法律硕士', '62', '1', '3', '1');
INSERT INTO `code` VALUES ('552', '342', 'BC', '教育硕士', '63', '1', '3', '1');
INSERT INTO `code` VALUES ('553', '343', 'BC', '工程硕士', '64', '1', '3', '1');
INSERT INTO `code` VALUES ('554', '344', 'BC', '建筑学硕士', '65', '1', '3', '1');
INSERT INTO `code` VALUES ('555', '345', 'BC', '临床学硕士', '66', '1', '3', '1');
INSERT INTO `code` VALUES ('556', '346', 'BC', '工商管理硕士', '67', '1', '3', '1');
INSERT INTO `code` VALUES ('557', '347', 'BC', '农业推广硕士', '68', '1', '3', '1');
INSERT INTO `code` VALUES ('558', '348', 'BC', '兽医硕士', '69', '1', '3', '1');
INSERT INTO `code` VALUES ('559', '349', 'BC', '公共管理硕士', '70', '1', '3', '1');
INSERT INTO `code` VALUES ('560', '350', 'BC', '口腔医学硕士', '71', '1', '3', '1');
INSERT INTO `code` VALUES ('561', '351', 'BC', '公共卫生硕士', '72', '1', '3', '1');
INSERT INTO `code` VALUES ('562', '352', 'BC', '军事硕士', '73', '1', '3', '1');
INSERT INTO `code` VALUES ('563', '391', 'BC', '高级工商管理硕士(EMBA)', '74', '1', '3', '1');
INSERT INTO `code` VALUES ('564', '392', 'BC', '其他', '75', '1', '3', '1');
INSERT INTO `code` VALUES ('565', '4', 'BC', '学士', '76', '1', '0', '0');
INSERT INTO `code` VALUES ('566', '401', 'BC', '哲学学士', '77', '1', '4', '1');
INSERT INTO `code` VALUES ('567', '402', 'BC', '经济学学士', '78', '1', '4', '1');
INSERT INTO `code` VALUES ('568', '403', 'BC', '法学学士', '79', '1', '4', '1');
INSERT INTO `code` VALUES ('569', '404', 'BC', '教育学学士', '80', '1', '4', '1');
INSERT INTO `code` VALUES ('570', '405', 'BC', '文学学士', '81', '1', '4', '1');
INSERT INTO `code` VALUES ('571', '406', 'BC', '历史学学士', '82', '1', '4', '1');
INSERT INTO `code` VALUES ('572', '407', 'BC', '理学学士', '83', '1', '4', '1');
INSERT INTO `code` VALUES ('573', '408', 'BC', '工学学士', '84', '1', '4', '1');
INSERT INTO `code` VALUES ('574', '409', 'BC', '农学学士', '85', '1', '4', '1');
INSERT INTO `code` VALUES ('575', '410', 'BC', '医学学士', '86', '1', '4', '1');
INSERT INTO `code` VALUES ('576', '411', 'BC', '军事学学士', '87', '1', '4', '1');
INSERT INTO `code` VALUES ('577', '412', 'BC', '管理学学士', '88', '1', '4', '1');
INSERT INTO `code` VALUES ('578', '444', 'BC', '建筑学学士', '89', '1', '4', '1');
INSERT INTO `code` VALUES ('579', '445', 'BC', '其他', '90', '1', '4', '1');
INSERT INTO `code` VALUES ('580', '5', 'BC', '其他类', '91', '1', '0', '1');
INSERT INTO `code` VALUES ('581', '0', 'AJ', '所有专业代码', '859', '1', '-1', '0');
INSERT INTO `code` VALUES ('582', '10', 'AJ', '哲学', '860', '1', '0', '0');
INSERT INTO `code` VALUES ('583', '101', 'AJ', '哲学类', '861', '1', '10', '0');
INSERT INTO `code` VALUES ('584', '1010100', 'AJ', '哲学', '862', '1', '101', '1');
INSERT INTO `code` VALUES ('585', '1010200', 'AJ', '逻辑学', '863', '1', '101', '1');
INSERT INTO `code` VALUES ('586', '1010300', 'AJ', '宗教学', '864', '1', '101', '1');
INSERT INTO `code` VALUES ('587', '1010400', 'AJ', '伦理学', '865', '1', '101', '1');
INSERT INTO `code` VALUES ('588', '1014100', 'AJ', '应用美学', '866', '1', '101', '1');
INSERT INTO `code` VALUES ('589', '1014200', 'AJ', '宗教事务管理', '867', '1', '101', '1');
INSERT INTO `code` VALUES ('590', '1014300', 'AJ', '哲学类其他相关专业', '868', '1', '101', '1');
INSERT INTO `code` VALUES ('591', '20', 'AJ', '经济学', '869', '1', '0', '0');
INSERT INTO `code` VALUES ('592', '201', 'AJ', '经济学类', '870', '1', '20', '0');
INSERT INTO `code` VALUES ('593', '2010100', 'AJ', '经济学', '871', '1', '201', '1');
INSERT INTO `code` VALUES ('594', '2010200', 'AJ', '国际经济与贸易', '872', '1', '201', '1');
INSERT INTO `code` VALUES ('595', '2010300', 'AJ', '财政学', '873', '1', '201', '1');
INSERT INTO `code` VALUES ('596', '2010400', 'AJ', '金融学', '874', '1', '201', '1');
INSERT INTO `code` VALUES ('597', '2010500', 'AJ', '国民经济管理', '875', '1', '201', '1');
INSERT INTO `code` VALUES ('598', '2010600', 'AJ', '贸易经济', '876', '1', '201', '1');
INSERT INTO `code` VALUES ('599', '2010700', 'AJ', '保险', '877', '1', '201', '1');
INSERT INTO `code` VALUES ('600', '2010800', 'AJ', '环境经济', '878', '1', '201', '1');
INSERT INTO `code` VALUES ('601', '2010900', 'AJ', '金融工程', '879', '1', '201', '1');
INSERT INTO `code` VALUES ('602', '2011000', 'AJ', '税务', '880', '1', '201', '1');
INSERT INTO `code` VALUES ('603', '2011100', 'AJ', '信用管理', '881', '1', '201', '1');
INSERT INTO `code` VALUES ('604', '2011200', 'AJ', '网络经济学', '882', '1', '201', '1');
INSERT INTO `code` VALUES ('605', '2011300', 'AJ', '体育经济', '883', '1', '201', '1');
INSERT INTO `code` VALUES ('606', '2014100', 'AJ', '货币银行学', '884', '1', '201', '1');
INSERT INTO `code` VALUES ('607', '2014200', 'AJ', '农业经济', '885', '1', '201', '1');
INSERT INTO `code` VALUES ('608', '2014400', 'AJ', '劳动经济', '886', '1', '201', '1');
INSERT INTO `code` VALUES ('609', '2014500', 'AJ', '投资经济', '887', '1', '201', '1');
INSERT INTO `code` VALUES ('610', '2014600', 'AJ', '金融经济', '888', '1', '201', '1');
INSERT INTO `code` VALUES ('611', '2014700', 'AJ', '国际金融', '889', '1', '201', '1');
INSERT INTO `code` VALUES ('612', '2014800', 'AJ', '国际贸易', '890', '1', '201', '1');
INSERT INTO `code` VALUES ('613', '2015100', 'AJ', '民航计划财务', '891', '1', '201', '1');
INSERT INTO `code` VALUES ('614', '2015200', 'AJ', '物资经济', '892', '1', '201', '1');
INSERT INTO `code` VALUES ('615', '2015300', 'AJ', '工程造价', '893', '1', '201', '1');
INSERT INTO `code` VALUES ('616', '2015400', 'AJ', '计划统计', '894', '1', '201', '1');
INSERT INTO `code` VALUES ('617', '2015500', 'AJ', '旅游经济', '895', '1', '201', '1');
INSERT INTO `code` VALUES ('618', '2015600', 'AJ', '金融与保险', '896', '1', '201', '1');
INSERT INTO `code` VALUES ('619', '2015700', 'AJ', '社会保险', '897', '1', '201', '1');
INSERT INTO `code` VALUES ('620', '2015800', 'AJ', '报关与国际货运', '898', '1', '201', '1');
INSERT INTO `code` VALUES ('621', '2015900', 'AJ', '国际文化经贸交流', '899', '1', '201', '1');
INSERT INTO `code` VALUES ('622', '2016100', 'AJ', '国际商务', '900', '1', '201', '1');
INSERT INTO `code` VALUES ('623', '2016200', 'AJ', '资源开发', '901', '1', '201', '1');
INSERT INTO `code` VALUES ('624', '2016300', 'AJ', '涉外税收', '902', '1', '201', '1');
INSERT INTO `code` VALUES ('625', '2016400', 'AJ', '企业商务', '903', '1', '201', '1');
INSERT INTO `code` VALUES ('626', '2016500', 'AJ', '促销与广告', '904', '1', '201', '1');
INSERT INTO `code` VALUES ('627', '2016600', 'AJ', '财政税收', '905', '1', '201', '1');
INSERT INTO `code` VALUES ('628', '2016700', 'AJ', '人文旅游资源开发', '906', '1', '201', '1');
INSERT INTO `code` VALUES ('629', '2016800', 'AJ', '国际贸易与金融', '907', '1', '201', '1');
INSERT INTO `code` VALUES ('630', '2016900', 'AJ', '人口与计划生育统计学', '908', '1', '201', '1');
INSERT INTO `code` VALUES ('631', '2017000', 'AJ', '人口与经济学', '909', '1', '201', '1');
INSERT INTO `code` VALUES ('632', '2017100', 'AJ', '旅游资源开发与利用', '910', '1', '201', '1');
INSERT INTO `code` VALUES ('633', '2017200', 'AJ', '邮政金融', '911', '1', '201', '1');
INSERT INTO `code` VALUES ('634', '2017300', 'AJ', '国际工程项目开发', '912', '1', '201', '1');
INSERT INTO `code` VALUES ('635', '2017400', 'AJ', '工业外贸', '913', '1', '201', '1');
INSERT INTO `code` VALUES ('636', '2017500', 'AJ', '航材管理与外贸', '914', '1', '201', '1');
INSERT INTO `code` VALUES ('637', '2017600', 'AJ', '合作经济', '915', '1', '201', '1');
INSERT INTO `code` VALUES ('638', '2017700', 'AJ', '金融与证券', '916', '1', '201', '1');
INSERT INTO `code` VALUES ('639', '2017800', 'AJ', '投资预算', '917', '1', '201', '1');
INSERT INTO `code` VALUES ('640', '2017900', 'AJ', '拍卖与典当', '918', '1', '201', '1');
INSERT INTO `code` VALUES ('641', '2018000', 'AJ', '商务谈判与报关', '919', '1', '201', '1');
INSERT INTO `code` VALUES ('642', '2018100', 'AJ', '证券与期货', '920', '1', '201', '1');
INSERT INTO `code` VALUES ('643', '2018200', 'AJ', '证券实务', '921', '1', '201', '1');
INSERT INTO `code` VALUES ('644', '2018300', 'AJ', '财政金融', '922', '1', '201', '1');
INSERT INTO `code` VALUES ('645', '2018400', 'AJ', '机电产品营销与外贸', '923', '1', '201', '1');
INSERT INTO `code` VALUES ('646', '2018500', 'AJ', '证券与保险', '924', '1', '201', '1');
INSERT INTO `code` VALUES ('647', '2018600', 'AJ', '医疗保险', '925', '1', '201', '1');
INSERT INTO `code` VALUES ('648', '2018700', 'AJ', '技术贸易', '926', '1', '201', '1');
INSERT INTO `code` VALUES ('649', '2018800', 'AJ', '汽车贸易', '927', '1', '201', '1');
INSERT INTO `code` VALUES ('650', '2018900', 'AJ', '国际货运代理', '928', '1', '201', '1');
INSERT INTO `code` VALUES ('651', '2019000', 'AJ', '经济类其他专业', '929', '1', '201', '1');
INSERT INTO `code` VALUES ('652', '30', 'AJ', '法学', '930', '1', '0', '0');
INSERT INTO `code` VALUES ('653', '301', 'AJ', '法学类', '931', '1', '30', '0');
INSERT INTO `code` VALUES ('654', '3010100', 'AJ', '法学', '932', '1', '301', '1');
INSERT INTO `code` VALUES ('655', '3010200', 'AJ', '知识产权法', '933', '1', '301', '1');
INSERT INTO `code` VALUES ('656', '3012000', 'AJ', '监狱学', '934', '1', '301', '1');
INSERT INTO `code` VALUES ('657', '3012100', 'AJ', '军事法学', '935', '1', '301', '1');
INSERT INTO `code` VALUES ('658', '3014100', 'AJ', '经济法', '936', '1', '301', '1');
INSERT INTO `code` VALUES ('659', '3014200', 'AJ', '国际经济法', '937', '1', '301', '1');
INSERT INTO `code` VALUES ('660', '3014300', 'AJ', '法律', '938', '1', '301', '1');
INSERT INTO `code` VALUES ('661', '3014400', 'AJ', '涉外经济与法律', '939', '1', '301', '1');
INSERT INTO `code` VALUES ('662', '3014500', 'AJ', '经济法律事务', '940', '1', '301', '1');
INSERT INTO `code` VALUES ('663', '3014600', 'AJ', '律师与法律服务', '941', '1', '301', '1');
INSERT INTO `code` VALUES ('664', '3014700', 'AJ', '律师事务', '942', '1', '301', '1');
INSERT INTO `code` VALUES ('665', '3014800', 'AJ', '行政法律事务', '943', '1', '301', '1');
INSERT INTO `code` VALUES ('666', '3014900', 'AJ', '农业经济法', '944', '1', '301', '1');
INSERT INTO `code` VALUES ('667', '3015000', 'AJ', '法学类其他专业', '945', '1', '301', '1');
INSERT INTO `code` VALUES ('668', '302', 'AJ', '马克思主义理论类', '946', '1', '30', '0');
INSERT INTO `code` VALUES ('669', '3020100', 'AJ', '科学社会主义与国际共产主义运动', '947', '1', '302', '1');
INSERT INTO `code` VALUES ('670', '3020200', 'AJ', '中国革命史与中国共产党党史', '948', '1', '302', '1');
INSERT INTO `code` VALUES ('671', '3020300', 'AJ', '马克思主义理论类其他专业', '949', '1', '302', '1');
INSERT INTO `code` VALUES ('672', '303', 'AJ', '社会学类', '950', '1', '30', '0');
INSERT INTO `code` VALUES ('673', '3030100', 'AJ', '社会学', '951', '1', '303', '1');
INSERT INTO `code` VALUES ('674', '3030200', 'AJ', '社会工作', '952', '1', '303', '1');
INSERT INTO `code` VALUES ('675', '3034200', 'AJ', '人口社会学与人口工作', '953', '1', '303', '1');
INSERT INTO `code` VALUES ('676', '3034300', 'AJ', '行政管理办公自动化', '954', '1', '303', '1');
INSERT INTO `code` VALUES ('677', '3034400', 'AJ', '信息应用', '955', '1', '303', '1');
INSERT INTO `code` VALUES ('678', '3034500', 'AJ', '社区服务', '956', '1', '303', '1');
INSERT INTO `code` VALUES ('679', '3034600', 'AJ', '空中乘务', '957', '1', '303', '1');
INSERT INTO `code` VALUES ('680', '3034700', 'AJ', '老年人服务', '958', '1', '303', '1');
INSERT INTO `code` VALUES ('681', '3034800', 'AJ', '儿童青少年服务', '959', '1', '303', '1');
INSERT INTO `code` VALUES ('682', '3034900', 'AJ', '社会救助', '960', '1', '303', '1');
INSERT INTO `code` VALUES ('683', '3035000', 'AJ', '社区管理', '961', '1', '303', '1');
INSERT INTO `code` VALUES ('684', '3035100', 'AJ', '导游服务', '962', '1', '303', '1');
INSERT INTO `code` VALUES ('685', '3035200', 'AJ', '饭店服务', '963', '1', '303', '1');
INSERT INTO `code` VALUES ('686', '3035300', 'AJ', '成果转让及中介服务', '964', '1', '303', '1');
INSERT INTO `code` VALUES ('687', '3035400', 'AJ', '家政', '965', '1', '303', '1');
INSERT INTO `code` VALUES ('688', '3035500', 'AJ', '英语导游', '966', '1', '303', '1');
INSERT INTO `code` VALUES ('689', '3035600', 'AJ', '群众文化管理', '967', '1', '303', '1');
INSERT INTO `code` VALUES ('690', '3035700', 'AJ', '安全保卫', '968', '1', '303', '1');
INSERT INTO `code` VALUES ('691', '3035800', 'AJ', '政治保卫', '969', '1', '303', '1');
INSERT INTO `code` VALUES ('692', '3035900', 'AJ', '群众文化艺术', '970', '1', '303', '1');
INSERT INTO `code` VALUES ('693', '3036000', 'AJ', '卫生监督与管理', '971', '1', '303', '1');
INSERT INTO `code` VALUES ('694', '3036100', 'AJ', '秘书与交通法规', '972', '1', '303', '1');
INSERT INTO `code` VALUES ('695', '3036200', 'AJ', '礼宾礼仪', '973', '1', '303', '1');
INSERT INTO `code` VALUES ('696', '3036300', 'AJ', '国际导游', '974', '1', '303', '1');
INSERT INTO `code` VALUES ('697', '3036400', 'AJ', '旅游及航空服务', '975', '1', '303', '1');
INSERT INTO `code` VALUES ('698', '3036500', 'AJ', '彝族文化资源管理', '976', '1', '303', '1');
INSERT INTO `code` VALUES ('699', '3036600', 'AJ', '社会学类其他转呀', '977', '1', '303', '1');
INSERT INTO `code` VALUES ('700', '304', 'AJ', '政治学类', '978', '1', '30', '0');
INSERT INTO `code` VALUES ('701', '3040100', 'AJ', '政治学与行政学', '979', '1', '304', '1');
INSERT INTO `code` VALUES ('702', '3040200', 'AJ', '国际政治', '980', '1', '304', '1');
INSERT INTO `code` VALUES ('703', '3040300', 'AJ', '外交学', '981', '1', '304', '1');
INSERT INTO `code` VALUES ('704', '3040400', 'AJ', '思想政治教育', '982', '1', '304', '1');
INSERT INTO `code` VALUES ('705', '3040500', 'AJ', '国际文化交流', '983', '1', '304', '1');
INSERT INTO `code` VALUES ('706', '3044100', 'AJ', '国际关系', '984', '1', '304', '1');
INSERT INTO `code` VALUES ('707', '3044200', 'AJ', '政治学类其他专业', '985', '1', '304', '1');
INSERT INTO `code` VALUES ('708', '305', 'AJ', '公安学类', '986', '1', '30', '0');
INSERT INTO `code` VALUES ('709', '3050100', 'AJ', '治安学', '987', '1', '305', '1');
INSERT INTO `code` VALUES ('710', '3050200', 'AJ', '侦查学', '988', '1', '305', '1');
INSERT INTO `code` VALUES ('711', '3050300', 'AJ', '边防管理', '989', '1', '305', '1');
INSERT INTO `code` VALUES ('712', '3050400', 'AJ', '火灾勘查', '990', '1', '305', '1');
INSERT INTO `code` VALUES ('713', '3050500', 'AJ', '禁毒学', '991', '1', '305', '1');
INSERT INTO `code` VALUES ('714', '3054100', 'AJ', '船艇指挥', '992', '1', '305', '1');
INSERT INTO `code` VALUES ('715', '3054200', 'AJ', '刑事侦察', '993', '1', '305', '1');
INSERT INTO `code` VALUES ('716', '3054300', 'AJ', '经济犯罪侦察', '994', '1', '305', '1');
INSERT INTO `code` VALUES ('717', '3054400', 'AJ', '警察指挥与战术', '995', '1', '305', '1');
INSERT INTO `code` VALUES ('718', '3054500', 'AJ', '公安文秘', '996', '1', '305', '1');
INSERT INTO `code` VALUES ('719', '3054600', 'AJ', '司法警务', '997', '1', '305', '1');
INSERT INTO `code` VALUES ('720', '3054700', 'AJ', '公安学类其他专业', '998', '1', '305', '1');
INSERT INTO `code` VALUES ('721', '40', 'AJ', '教育学', '999', '1', '0', '0');
INSERT INTO `code` VALUES ('722', '401', 'AJ', '教育学类', '1000', '1', '40', '0');
INSERT INTO `code` VALUES ('723', '4010100', 'AJ', '教育学', '1001', '1', '401', '1');
INSERT INTO `code` VALUES ('724', '4010200', 'AJ', '学前教育', '1002', '1', '401', '1');
INSERT INTO `code` VALUES ('725', '4010300', 'AJ', '特殊教育', '1003', '1', '401', '1');
INSERT INTO `code` VALUES ('726', '4010400', 'AJ', '教育技术学', '1004', '1', '401', '1');
INSERT INTO `code` VALUES ('727', '4010500', 'AJ', '小学教育', '1005', '1', '401', '1');
INSERT INTO `code` VALUES ('728', '4010600', 'AJ', '艺术教育', '1006', '1', '401', '1');
INSERT INTO `code` VALUES ('729', '4010700', 'AJ', '人文教育', '1007', '1', '401', '1');
INSERT INTO `code` VALUES ('730', '4010800', 'AJ', '科学教育', '1008', '1', '401', '1');
INSERT INTO `code` VALUES ('731', '4014100', 'AJ', '学前辅导与保育', '1009', '1', '401', '1');
INSERT INTO `code` VALUES ('732', '4014200', 'AJ', '幼儿艺体教育', '1010', '1', '401', '1');
INSERT INTO `code` VALUES ('733', '4014300', 'AJ', '综合理科教育', '1011', '1', '401', '1');
INSERT INTO `code` VALUES ('734', '4014400', 'AJ', '实验管理与教学', '1012', '1', '401', '1');
INSERT INTO `code` VALUES ('735', '4014500', 'AJ', '电化教育', '1013', '1', '401', '1');
INSERT INTO `code` VALUES ('736', '4014600', 'AJ', '体育卫生教育', '1014', '1', '401', '1');
INSERT INTO `code` VALUES ('737', '4014700', 'AJ', '政史教育', '1015', '1', '401', '1');
INSERT INTO `code` VALUES ('738', '4014800', 'AJ', '政治与法律教育', '1016', '1', '401', '1');
INSERT INTO `code` VALUES ('739', '4014900', 'AJ', '舞蹈表演与教育', '1017', '1', '401', '1');
INSERT INTO `code` VALUES ('740', '4015000', 'AJ', '现代教育与实验技术', '1018', '1', '401', '1');
INSERT INTO `code` VALUES ('741', '4015100', 'AJ', '儿童教育', '1019', '1', '401', '1');
INSERT INTO `code` VALUES ('742', '4015200', 'AJ', '少儿思想教育', '1020', '1', '401', '1');
INSERT INTO `code` VALUES ('743', '4015300', 'AJ', '初等教育', '1021', '1', '401', '1');
INSERT INTO `code` VALUES ('744', '4015400', 'AJ', '综合文科教育', '1022', '1', '401', '1');
INSERT INTO `code` VALUES ('745', '4015500', 'AJ', '体育现代教育技术', '1023', '1', '401', '1');
INSERT INTO `code` VALUES ('746', '4015600', 'AJ', '青年教育', '1024', '1', '401', '1');
INSERT INTO `code` VALUES ('747', '4015700', 'AJ', '教育信息技术', '1025', '1', '401', '1');
INSERT INTO `code` VALUES ('748', '4015800', 'AJ', '教育学类其他专业', '1026', '1', '401', '1');
INSERT INTO `code` VALUES ('749', '402', 'AJ', '体育学类', '1027', '1', '40', '0');
INSERT INTO `code` VALUES ('750', '4020100', 'AJ', '体育教育', '1028', '1', '402', '1');
INSERT INTO `code` VALUES ('751', '4020200', 'AJ', '运动训练', '1029', '1', '402', '1');
INSERT INTO `code` VALUES ('752', '4020300', 'AJ', '社会体育', '1030', '1', '402', '1');
INSERT INTO `code` VALUES ('753', '4020400', 'AJ', '运动人体科学', '1031', '1', '402', '1');
INSERT INTO `code` VALUES ('754', '4020500', 'AJ', '民族传统体育', '1032', '1', '402', '1');
INSERT INTO `code` VALUES ('755', '4020600', 'AJ', '旅游体育', '1033', '1', '402', '1');
INSERT INTO `code` VALUES ('756', '4024100', 'AJ', '体育保健康复', '1034', '1', '402', '1');
INSERT INTO `code` VALUES ('757', '4024200', 'AJ', '武术', '1035', '1', '402', '1');
INSERT INTO `code` VALUES ('758', '4024300', 'AJ', '竞技体育', '1036', '1', '402', '1');
INSERT INTO `code` VALUES ('759', '4024400', 'AJ', '武术与搏击', '1037', '1', '402', '1');
INSERT INTO `code` VALUES ('760', '4024500', 'AJ', '体育健身与保安', '1038', '1', '402', '1');
INSERT INTO `code` VALUES ('761', '4024600', 'AJ', '足球运动技术', '1039', '1', '402', '1');
INSERT INTO `code` VALUES ('762', '4024700', 'AJ', '舞蹈与健身技术', '1040', '1', '402', '1');
INSERT INTO `code` VALUES ('763', '4024800', 'AJ', '体育学类其他专业', '1041', '1', '402', '1');
INSERT INTO `code` VALUES ('764', '403', 'AJ', '职业技术教育类', '1042', '1', '40', '0');
INSERT INTO `code` VALUES ('765', '4030100', 'AJ', '农艺教育', '1043', '1', '403', '1');
INSERT INTO `code` VALUES ('766', '4030200', 'AJ', '园艺教育', '1044', '1', '403', '1');
INSERT INTO `code` VALUES ('767', '4030300', 'AJ', '特用作物教育', '1045', '1', '403', '1');
INSERT INTO `code` VALUES ('768', '4030400', 'AJ', '林木生产教育', '1046', '1', '403', '1');
INSERT INTO `code` VALUES ('769', '4030600', 'AJ', '畜禽生产教育', '1047', '1', '403', '1');
INSERT INTO `code` VALUES ('770', '4030700', 'AJ', '水产养殖教育', '1048', '1', '403', '1');
INSERT INTO `code` VALUES ('771', '4030800', 'AJ', '应用生物教育', '1049', '1', '403', '1');
INSERT INTO `code` VALUES ('772', '4030900', 'AJ', '农业机械教育', '1050', '1', '403', '1');
INSERT INTO `code` VALUES ('773', '4031000', 'AJ', '农业建筑与环境控制教育', '1051', '1', '403', '1');
INSERT INTO `code` VALUES ('774', '4031100', 'AJ', '农产品储运与加工教育', '1052', '1', '403', '1');
INSERT INTO `code` VALUES ('775', '4031200', 'AJ', '农业经营管理教育', '1053', '1', '403', '1');
INSERT INTO `code` VALUES ('776', '4031300', 'AJ', '机械制造工艺教育', '1054', '1', '403', '1');
INSERT INTO `code` VALUES ('777', '4031400', 'AJ', '机械维修及检测技术教育', '1055', '1', '403', '1');
INSERT INTO `code` VALUES ('778', '4031500', 'AJ', '机电技术教育', '1056', '1', '403', '1');
INSERT INTO `code` VALUES ('779', '4031600', 'AJ', '电气技术教育', '1057', '1', '403', '1');
INSERT INTO `code` VALUES ('780', '4031700', 'AJ', '汽车维修工程教育', '1058', '1', '403', '1');
INSERT INTO `code` VALUES ('781', '4031800', 'AJ', '应用电子技术教育', '1059', '1', '403', '1');
INSERT INTO `code` VALUES ('782', '4031900', 'AJ', '制浆造纸工艺教育', '1060', '1', '403', '1');
INSERT INTO `code` VALUES ('783', '4032000', 'AJ', '印刷工艺教育', '1061', '1', '403', '1');
INSERT INTO `code` VALUES ('784', '4032100', 'AJ', '橡塑制品成型工艺教育', '1062', '1', '403', '1');
INSERT INTO `code` VALUES ('785', '4032200', 'AJ', '食品工艺教育', '1063', '1', '403', '1');
INSERT INTO `code` VALUES ('786', '4032300', 'AJ', '纺织工艺教育', '1064', '1', '403', '1');
INSERT INTO `code` VALUES ('787', '4032400', 'AJ', '染整工艺教育', '1065', '1', '403', '1');
INSERT INTO `code` VALUES ('788', '4032500', 'AJ', '化工工艺教育', '1066', '1', '403', '1');
INSERT INTO `code` VALUES ('789', '4032600', 'AJ', '化工分析与检测技术教育', '1067', '1', '403', '1');
INSERT INTO `code` VALUES ('790', '4032700', 'AJ', '建筑材料工程教育', '1068', '1', '403', '1');
INSERT INTO `code` VALUES ('791', '4032800', 'AJ', '建筑工程教育', '1069', '1', '403', '1');
INSERT INTO `code` VALUES ('792', '4032900', 'AJ', '服装设计与工艺教育', '1070', '1', '403', '1');
INSERT INTO `code` VALUES ('793', '4033000', 'AJ', '装潢设计与工艺教育', '1071', '1', '403', '1');
INSERT INTO `code` VALUES ('794', '4033100', 'AJ', '旅游管理与服务教育', '1072', '1', '403', '1');
INSERT INTO `code` VALUES ('795', '4033200', 'AJ', '食品营养与检验教育', '1073', '1', '403', '1');
INSERT INTO `code` VALUES ('796', '4033300', 'AJ', '烹饪与营养教育', '1074', '1', '403', '1');
INSERT INTO `code` VALUES ('797', '4033400', 'AJ', '财务会计教育', '1075', '1', '403', '1');
INSERT INTO `code` VALUES ('798', '4033500', 'AJ', '文秘教育', '1076', '1', '403', '1');
INSERT INTO `code` VALUES ('799', '4033600', 'AJ', '市场营销教育', '1077', '1', '403', '1');
INSERT INTO `code` VALUES ('800', '4033700', 'AJ', '职业技术教育管理', '1078', '1', '403', '1');
INSERT INTO `code` VALUES ('801', '4034100', 'AJ', '劳动技术教育', '1079', '1', '403', '1');
INSERT INTO `code` VALUES ('802', '4034200', 'AJ', '现代信息技术教育', '1080', '1', '403', '1');
INSERT INTO `code` VALUES ('803', '4034300', 'AJ', '职业技术教育类其他专业', '1081', '1', '403', '1');
INSERT INTO `code` VALUES ('804', '50', 'AJ', '文学', '1082', '1', '0', '0');
INSERT INTO `code` VALUES ('805', '501', 'AJ', '中国语言文学类', '1083', '1', '50', '0');
INSERT INTO `code` VALUES ('806', '5010100', 'AJ', '汉语言文学', '1084', '1', '501', '1');
INSERT INTO `code` VALUES ('807', '5010200', 'AJ', '汉语言', '1085', '1', '501', '1');
INSERT INTO `code` VALUES ('808', '5010300', 'AJ', '对外汉语', '1086', '1', '501', '1');
INSERT INTO `code` VALUES ('809', '5010400', 'AJ', '中国少数民族语言文学', '1087', '1', '501', '1');
INSERT INTO `code` VALUES ('810', '5010500', 'AJ', '古典文献', '1088', '1', '501', '1');
INSERT INTO `code` VALUES ('811', '5010600', 'AJ', '中国语言文化', '1089', '1', '501', '1');
INSERT INTO `code` VALUES ('812', '5010700', 'AJ', '应用语言学', '1090', '1', '501', '1');
INSERT INTO `code` VALUES ('813', '5014100', 'AJ', '中国文学', '1091', '1', '501', '1');
INSERT INTO `code` VALUES ('814', '5014200', 'AJ', '维吾尔语言文学', '1092', '1', '501', '1');
INSERT INTO `code` VALUES ('815', '5014300', 'AJ', '朝鲜语言文学', '1093', '1', '501', '1');
INSERT INTO `code` VALUES ('816', '5014400', 'AJ', '汉语言文学教育', '1094', '1', '501', '1');
INSERT INTO `code` VALUES ('817', '5014500', 'AJ', '秘书', '1095', '1', '501', '1');
INSERT INTO `code` VALUES ('818', '5014600', 'AJ', '涉外秘书', '1096', '1', '501', '1');
INSERT INTO `code` VALUES ('819', '5014700', 'AJ', '秘书学', '1097', '1', '501', '1');
INSERT INTO `code` VALUES ('820', '5014800', 'AJ', '公共关系与文秘', '1098', '1', '501', '1');
INSERT INTO `code` VALUES ('821', '5014900', 'AJ', '涉外文秘与公共关系', '1099', '1', '501', '1');
INSERT INTO `code` VALUES ('822', '5015000', 'AJ', '文秘与办公自动化', '1100', '1', '501', '1');
INSERT INTO `code` VALUES ('823', '5015100', 'AJ', '科技文秘', '1101', '1', '501', '1');
INSERT INTO `code` VALUES ('824', '5015200', 'AJ', '汉语言文学与文化传播', '1102', '1', '501', '1');
INSERT INTO `code` VALUES ('825', '5015300', 'AJ', '中文应用', '1103', '1', '501', '1');
INSERT INTO `code` VALUES ('826', '5015400', 'AJ', '经济秘书', '1104', '1', '501', '1');
INSERT INTO `code` VALUES ('827', '5015500', 'AJ', '文秘', '1105', '1', '501', '1');
INSERT INTO `code` VALUES ('828', '5015600', 'AJ', '茶文化', '1106', '1', '501', '1');
INSERT INTO `code` VALUES ('829', '5015700', 'AJ', '旅游文化', '1107', '1', '501', '1');
INSERT INTO `code` VALUES ('830', '5015800', 'AJ', '保卫与文秘', '1108', '1', '501', '1');
INSERT INTO `code` VALUES ('831', '5015900', 'AJ', '司法文秘', '1109', '1', '501', '1');
INSERT INTO `code` VALUES ('832', '5016000', 'AJ', '商务文秘', '1110', '1', '501', '1');
INSERT INTO `code` VALUES ('833', '5016100', 'AJ', '高级文员职业技术', '1111', '1', '501', '1');
INSERT INTO `code` VALUES ('834', '5016200', 'AJ', '民族语言', '1112', '1', '501', '1');
INSERT INTO `code` VALUES ('835', '5016300', 'AJ', '藏汉翻译', '1113', '1', '501', '1');
INSERT INTO `code` VALUES ('836', '5016400', 'AJ', '藏汉英翻译', '1114', '1', '501', '1');
INSERT INTO `code` VALUES ('837', '5016500', 'AJ', '公关礼仪', '1115', '1', '501', '1');
INSERT INTO `code` VALUES ('838', '5016600', 'AJ', '中国语言文学类其他专业', '1116', '1', '501', '1');
INSERT INTO `code` VALUES ('839', '502', 'AJ', '外国语言文学类', '1117', '1', '50', '0');
INSERT INTO `code` VALUES ('840', '5020100', 'AJ', '英语', '1118', '1', '502', '1');
INSERT INTO `code` VALUES ('841', '5020200', 'AJ', '俄语', '1119', '1', '502', '1');
INSERT INTO `code` VALUES ('842', '5020300', 'AJ', '德语', '1120', '1', '502', '1');
INSERT INTO `code` VALUES ('843', '5020400', 'AJ', '法语', '1121', '1', '502', '1');
INSERT INTO `code` VALUES ('844', '5020500', 'AJ', '西班牙语', '1122', '1', '502', '1');
INSERT INTO `code` VALUES ('845', '5020600', 'AJ', '阿拉伯语', '1123', '1', '502', '1');
INSERT INTO `code` VALUES ('846', '5020700', 'AJ', '日语', '1124', '1', '502', '1');
INSERT INTO `code` VALUES ('847', '5020800', 'AJ', '波斯语', '1125', '1', '502', '1');
INSERT INTO `code` VALUES ('848', '5020900', 'AJ', '朝鲜语', '1126', '1', '502', '1');
INSERT INTO `code` VALUES ('849', '5021000', 'AJ', '菲律宾语', '1127', '1', '502', '1');
INSERT INTO `code` VALUES ('850', '5021100', 'AJ', '梵语巴利语', '1128', '1', '502', '1');
INSERT INTO `code` VALUES ('851', '5021200', 'AJ', '印度尼西亚语', '1129', '1', '502', '1');
INSERT INTO `code` VALUES ('852', '5021300', 'AJ', '印地语', '1130', '1', '502', '1');
INSERT INTO `code` VALUES ('853', '5021400', 'AJ', '柬埔寨语', '1131', '1', '502', '1');
INSERT INTO `code` VALUES ('854', '5021500', 'AJ', '老挝语', '1132', '1', '502', '1');
INSERT INTO `code` VALUES ('855', '5021600', 'AJ', '缅甸语', '1133', '1', '502', '1');
INSERT INTO `code` VALUES ('856', '5021700', 'AJ', '马来语', '1134', '1', '502', '1');
INSERT INTO `code` VALUES ('857', '5021800', 'AJ', '蒙古语', '1135', '1', '502', '1');
INSERT INTO `code` VALUES ('858', '5021900', 'AJ', '僧加罗语', '1136', '1', '502', '1');
INSERT INTO `code` VALUES ('859', '5022000', 'AJ', '泰语', '1137', '1', '502', '1');
INSERT INTO `code` VALUES ('860', '5022100', 'AJ', '乌尔都语', '1138', '1', '502', '1');
INSERT INTO `code` VALUES ('861', '5022200', 'AJ', '希伯莱语', '1139', '1', '502', '1');
INSERT INTO `code` VALUES ('862', '5022300', 'AJ', '越南语', '1140', '1', '502', '1');
INSERT INTO `code` VALUES ('863', '5022400', 'AJ', '豪萨语', '1141', '1', '502', '1');
INSERT INTO `code` VALUES ('864', '5022500', 'AJ', '斯瓦希里语', '1142', '1', '502', '1');
INSERT INTO `code` VALUES ('865', '5022600', 'AJ', '阿尔巴尼亚语', '1143', '1', '502', '1');
INSERT INTO `code` VALUES ('866', '5022700', 'AJ', '保加利亚语', '1144', '1', '502', '1');
INSERT INTO `code` VALUES ('867', '5022800', 'AJ', '波兰语', '1145', '1', '502', '1');
INSERT INTO `code` VALUES ('868', '5022900', 'AJ', '捷克语', '1146', '1', '502', '1');
INSERT INTO `code` VALUES ('869', '5023000', 'AJ', '罗马尼亚语', '1147', '1', '502', '1');
INSERT INTO `code` VALUES ('870', '5023100', 'AJ', '葡萄牙语', '1148', '1', '502', '1');
INSERT INTO `code` VALUES ('871', '5023200', 'AJ', '瑞典语', '1149', '1', '502', '1');
INSERT INTO `code` VALUES ('872', '5023300', 'AJ', '塞尔维亚—克罗地亚语', '1150', '1', '502', '1');
INSERT INTO `code` VALUES ('873', '5023400', 'AJ', '土耳其语', '1151', '1', '502', '1');
INSERT INTO `code` VALUES ('874', '5023500', 'AJ', '希腊语', '1152', '1', '502', '1');
INSERT INTO `code` VALUES ('875', '5023600', 'AJ', '匈牙利语', '1153', '1', '502', '1');
INSERT INTO `code` VALUES ('876', '5023700', 'AJ', '意大利语', '1154', '1', '502', '1');
INSERT INTO `code` VALUES ('877', '5023800', 'AJ', '捷克语--斯洛伐克语', '1155', '1', '502', '1');
INSERT INTO `code` VALUES ('878', '5023900', 'AJ', '泰米尔语', '1156', '1', '502', '1');
INSERT INTO `code` VALUES ('879', '5024000', 'AJ', '普什图语', '1157', '1', '502', '1');
INSERT INTO `code` VALUES ('880', '5024100', 'AJ', '世界语', '1158', '1', '502', '1');
INSERT INTO `code` VALUES ('881', '5024200', 'AJ', '孟加拉语', '1159', '1', '502', '1');
INSERT INTO `code` VALUES ('882', '5024300', 'AJ', '尼泊尔语', '1160', '1', '502', '1');
INSERT INTO `code` VALUES ('883', '5024400', 'AJ', '塞尔维亚语－克罗地亚语', '1161', '1', '502', '1');
INSERT INTO `code` VALUES ('884', '5024500', 'AJ', '荷兰语', '1162', '1', '502', '1');
INSERT INTO `code` VALUES ('885', '5024600', 'AJ', '芬兰语', '1163', '1', '502', '1');
INSERT INTO `code` VALUES ('886', '5028100', 'AJ', '英语教育', '1164', '1', '502', '1');
INSERT INTO `code` VALUES ('887', '5028200', 'AJ', '日语教育', '1165', '1', '502', '1');
INSERT INTO `code` VALUES ('888', '5028300', 'AJ', '外贸英语(经贸英语)', '1166', '1', '502', '1');
INSERT INTO `code` VALUES ('889', '5028400', 'AJ', '外贸日语(经贸日语)', '1167', '1', '502', '1');
INSERT INTO `code` VALUES ('890', '5028500', 'AJ', '应用英语', '1168', '1', '502', '1');
INSERT INTO `code` VALUES ('891', '5028600', 'AJ', '实用英语', '1169', '1', '502', '1');
INSERT INTO `code` VALUES ('892', '5028700', 'AJ', '专门用途英语', '1170', '1', '502', '1');
INSERT INTO `code` VALUES ('893', '5028800', 'AJ', '旅游英语', '1171', '1', '502', '1');
INSERT INTO `code` VALUES ('894', '5028900', 'AJ', '应用日语', '1172', '1', '502', '1');
INSERT INTO `code` VALUES ('895', '5029000', 'AJ', '商务日语', '1173', '1', '502', '1');
INSERT INTO `code` VALUES ('896', '5029100', 'AJ', '旅游日语', '1174', '1', '502', '1');
INSERT INTO `code` VALUES ('897', '5029200', 'AJ', '商务英语', '1175', '1', '502', '1');
INSERT INTO `code` VALUES ('898', '5029300', 'AJ', '应用德语', '1176', '1', '502', '1');
INSERT INTO `code` VALUES ('899', '5029400', 'AJ', '应用西班牙语', '1177', '1', '502', '1');
INSERT INTO `code` VALUES ('900', '5029500', 'AJ', '应用法语', '1178', '1', '502', '1');
INSERT INTO `code` VALUES ('901', '5029600', 'AJ', '韩语', '1179', '1', '502', '1');
INSERT INTO `code` VALUES ('902', '5029700', 'AJ', '外国语言文学类其他专业', '1180', '1', '502', '1');
INSERT INTO `code` VALUES ('903', '503', 'AJ', '新闻传播学类', '1181', '1', '50', '0');
INSERT INTO `code` VALUES ('904', '5030100', 'AJ', '新闻学', '1182', '1', '503', '1');
INSERT INTO `code` VALUES ('905', '5030200', 'AJ', '广播电视新闻学', '1183', '1', '503', '1');
INSERT INTO `code` VALUES ('906', '5030300', 'AJ', '广告学', '1184', '1', '503', '1');
INSERT INTO `code` VALUES ('907', '5030400', 'AJ', '编辑出版学', '1185', '1', '503', '1');
INSERT INTO `code` VALUES ('908', '5030500', 'AJ', '传播学', '1186', '1', '503', '1');
INSERT INTO `code` VALUES ('909', '5034100', 'AJ', '播音', '1187', '1', '503', '1');
INSERT INTO `code` VALUES ('910', '5034200', 'AJ', '广告与广告管理', '1188', '1', '503', '1');
INSERT INTO `code` VALUES ('911', '5034300', 'AJ', '出版与电脑编辑技术', '1189', '1', '503', '1');
INSERT INTO `code` VALUES ('912', '5034400', 'AJ', '新闻学与大众传播', '1190', '1', '503', '1');
INSERT INTO `code` VALUES ('913', '5034500', 'AJ', '广告策划与现代文秘', '1191', '1', '503', '1');
INSERT INTO `code` VALUES ('914', '5034600', 'AJ', '广告策划与制作', '1192', '1', '503', '1');
INSERT INTO `code` VALUES ('915', '5034700', 'AJ', '新闻与广告', '1193', '1', '503', '1');
INSERT INTO `code` VALUES ('916', '5034800', 'AJ', '信息传播与策划', '1194', '1', '503', '1');
INSERT INTO `code` VALUES ('917', '5034900', 'AJ', '军事新闻', '1195', '1', '503', '1');
INSERT INTO `code` VALUES ('918', '5035000', 'AJ', '藏语新闻', '1196', '1', '503', '1');
INSERT INTO `code` VALUES ('919', '5035100', 'AJ', '电子编辑', '1197', '1', '503', '1');
INSERT INTO `code` VALUES ('920', '5035200', 'AJ', '广播电视工程', '1198', '1', '503', '1');
INSERT INTO `code` VALUES ('921', '5035300', 'AJ', '新闻传播学类其他专业', '1199', '1', '503', '1');
INSERT INTO `code` VALUES ('922', '504', 'AJ', '艺术类', '1200', '1', '50', '0');
INSERT INTO `code` VALUES ('923', '5040100', 'AJ', '音乐学', '1201', '1', '504', '1');
INSERT INTO `code` VALUES ('924', '5040200', 'AJ', '作曲与作曲技术理论', '1202', '1', '504', '1');
INSERT INTO `code` VALUES ('925', '5040300', 'AJ', '音乐表演', '1203', '1', '504', '1');
INSERT INTO `code` VALUES ('926', '5040400', 'AJ', '绘画', '1204', '1', '504', '1');
INSERT INTO `code` VALUES ('927', '5040500', 'AJ', '雕塑', '1205', '1', '504', '1');
INSERT INTO `code` VALUES ('928', '5040600', 'AJ', '美术学', '1206', '1', '504', '1');
INSERT INTO `code` VALUES ('929', '5040700', 'AJ', '艺术设计学', '1207', '1', '504', '1');
INSERT INTO `code` VALUES ('930', '5040800', 'AJ', '艺术设计', '1208', '1', '504', '1');
INSERT INTO `code` VALUES ('931', '5040900', 'AJ', '舞蹈学', '1209', '1', '504', '1');
INSERT INTO `code` VALUES ('932', '5041000', 'AJ', '舞蹈编导', '1210', '1', '504', '1');
INSERT INTO `code` VALUES ('933', '5041100', 'AJ', '戏剧学', '1211', '1', '504', '1');
INSERT INTO `code` VALUES ('934', '5041200', 'AJ', '表演', '1212', '1', '504', '1');
INSERT INTO `code` VALUES ('935', '5041300', 'AJ', '导演', '1213', '1', '504', '1');
INSERT INTO `code` VALUES ('936', '5041400', 'AJ', '戏剧影视文学', '1214', '1', '504', '1');
INSERT INTO `code` VALUES ('937', '5041500', 'AJ', '戏剧影视美术设计', '1215', '1', '504', '1');
INSERT INTO `code` VALUES ('938', '5041600', 'AJ', '摄影', '1216', '1', '504', '1');
INSERT INTO `code` VALUES ('939', '5041700', 'AJ', '录音艺术', '1217', '1', '504', '1');
INSERT INTO `code` VALUES ('940', '5041800', 'AJ', '动画', '1218', '1', '504', '1');
INSERT INTO `code` VALUES ('941', '5041900', 'AJ', '播音与主持艺术', '1219', '1', '504', '1');
INSERT INTO `code` VALUES ('942', '5042000', 'AJ', '广播电视编导', '1220', '1', '504', '1');
INSERT INTO `code` VALUES ('943', '5042100', 'AJ', '影视教育', '1221', '1', '504', '1');
INSERT INTO `code` VALUES ('944', '5042200', 'AJ', '艺术学', '1222', '1', '504', '1');
INSERT INTO `code` VALUES ('945', '5044100', 'AJ', '演唱', '1223', '1', '504', '1');
INSERT INTO `code` VALUES ('946', '5044200', 'AJ', '管弦（打击）乐器演奏', '1224', '1', '504', '1');
INSERT INTO `code` VALUES ('947', '5044300', 'AJ', '中国乐器演奏', '1225', '1', '504', '1');
INSERT INTO `code` VALUES ('948', '5044400', 'AJ', '乐器修造艺术', '1226', '1', '504', '1');
INSERT INTO `code` VALUES ('949', '5044500', 'AJ', '油画', '1227', '1', '504', '1');
INSERT INTO `code` VALUES ('950', '5044600', 'AJ', '环境艺术设计', '1228', '1', '504', '1');
INSERT INTO `code` VALUES ('951', '5044700', 'AJ', '工艺美术学', '1229', '1', '504', '1');
INSERT INTO `code` VALUES ('952', '5044800', 'AJ', '染织艺术设计', '1230', '1', '504', '1');
INSERT INTO `code` VALUES ('953', '5044900', 'AJ', '服装艺术设计', '1231', '1', '504', '1');
INSERT INTO `code` VALUES ('954', '5045000', 'AJ', '装潢艺术设计', '1232', '1', '504', '1');
INSERT INTO `code` VALUES ('955', '5045100', 'AJ', '装饰艺术设计', '1233', '1', '504', '1');
INSERT INTO `code` VALUES ('956', '5045200', 'AJ', '文艺编导', '1234', '1', '504', '1');
INSERT INTO `code` VALUES ('957', '5045300', 'AJ', '影像工程', '1235', '1', '504', '1');
INSERT INTO `code` VALUES ('958', '5045400', 'AJ', '音乐教育', '1236', '1', '504', '1');
INSERT INTO `code` VALUES ('959', '5045500', 'AJ', '美术教育', '1237', '1', '504', '1');
INSERT INTO `code` VALUES ('960', '5045600', 'AJ', '广告艺术设计', '1238', '1', '504', '1');
INSERT INTO `code` VALUES ('961', '5045700', 'AJ', '产品造型设计', '1239', '1', '504', '1');
INSERT INTO `code` VALUES ('962', '5045800', 'AJ', '节目主持人', '1240', '1', '504', '1');
INSERT INTO `code` VALUES ('963', '5045900', 'AJ', '影视广告', '1241', '1', '504', '1');
INSERT INTO `code` VALUES ('964', '5046000', 'AJ', '电视摄像', '1242', '1', '504', '1');
INSERT INTO `code` VALUES ('965', '5046100', 'AJ', '电视节目制作', '1243', '1', '504', '1');
INSERT INTO `code` VALUES ('966', '5046200', 'AJ', '电视照明设计', '1244', '1', '504', '1');
INSERT INTO `code` VALUES ('967', '5046300', 'AJ', '电影表演', '1245', '1', '504', '1');
INSERT INTO `code` VALUES ('968', '5046400', 'AJ', '广告与装潢', '1246', '1', '504', '1');
INSERT INTO `code` VALUES ('969', '5046500', 'AJ', '美术装潢设计', '1247', '1', '504', '1');
INSERT INTO `code` VALUES ('970', '5046600', 'AJ', '服装与表演', '1248', '1', '504', '1');
INSERT INTO `code` VALUES ('971', '5046700', 'AJ', '社会音乐', '1249', '1', '504', '1');
INSERT INTO `code` VALUES ('972', '5046800', 'AJ', '音乐', '1250', '1', '504', '1');
INSERT INTO `code` VALUES ('973', '5046900', 'AJ', '首饰设计', '1251', '1', '504', '1');
INSERT INTO `code` VALUES ('974', '5047000', 'AJ', '室内与家具设计', '1252', '1', '504', '1');
INSERT INTO `code` VALUES ('975', '5047100', 'AJ', '室内装饰', '1253', '1', '504', '1');
INSERT INTO `code` VALUES ('976', '5047200', 'AJ', '室内设计', '1254', '1', '504', '1');
INSERT INTO `code` VALUES ('977', '5047300', 'AJ', '广播电视文学', '1255', '1', '504', '1');
INSERT INTO `code` VALUES ('978', '5047400', 'AJ', '家具与室内装饰技术', '1256', '1', '504', '1');
INSERT INTO `code` VALUES ('979', '5047500', 'AJ', '工艺美术设计', '1257', '1', '504', '1');
INSERT INTO `code` VALUES ('980', '5047600', 'AJ', '形象设计', '1258', '1', '504', '1');
INSERT INTO `code` VALUES ('981', '5047700', 'AJ', '花卉设计', '1259', '1', '504', '1');
INSERT INTO `code` VALUES ('982', '5047800', 'AJ', '影视艺术', '1260', '1', '504', '1');
INSERT INTO `code` VALUES ('983', '5047900', 'AJ', '电脑艺术设计', '1261', '1', '504', '1');
INSERT INTO `code` VALUES ('984', '5048000', 'AJ', '室内装潢设计及施工管理', '1262', '1', '504', '1');
INSERT INTO `code` VALUES ('985', '5048100', 'AJ', '音响工程', '1263', '1', '504', '1');
INSERT INTO `code` VALUES ('986', '5048200', 'AJ', '美容美发设计', '1264', '1', '504', '1');
INSERT INTO `code` VALUES ('987', '5048300', 'AJ', '广播与电视技术', '1265', '1', '504', '1');
INSERT INTO `code` VALUES ('988', '5048400', 'AJ', '影视戏剧', '1266', '1', '504', '1');
INSERT INTO `code` VALUES ('989', '5048500', 'AJ', '钢琴调律', '1267', '1', '504', '1');
INSERT INTO `code` VALUES ('990', '5048600', 'AJ', '影视表演', '1268', '1', '504', '1');
INSERT INTO `code` VALUES ('991', '5048700', 'AJ', '摄影摄像技术', '1269', '1', '504', '1');
INSERT INTO `code` VALUES ('992', '5048800', 'AJ', '陶瓷美术', '1270', '1', '504', '1');
INSERT INTO `code` VALUES ('993', '5048900', 'AJ', '军乐', '1271', '1', '504', '1');
INSERT INTO `code` VALUES ('994', '5049000', 'AJ', '舞蹈', '1272', '1', '504', '1');
INSERT INTO `code` VALUES ('995', '5049100', 'AJ', '平面设计', '1273', '1', '504', '1');
INSERT INTO `code` VALUES ('996', '5049200', 'AJ', '广告艺术', '1274', '1', '504', '1');
INSERT INTO `code` VALUES ('997', '5049300', 'AJ', '互联网广告设计', '1275', '1', '504', '1');
INSERT INTO `code` VALUES ('998', '5049400', 'AJ', '影视美术', '1276', '1', '504', '1');
INSERT INTO `code` VALUES ('999', '5049500', 'AJ', '影视武打设计', '1277', '1', '504', '1');
INSERT INTO `code` VALUES ('1000', '5049600', 'AJ', '图形艺术与设计', '1278', '1', '504', '1');
INSERT INTO `code` VALUES ('1001', '5049700', 'AJ', '多媒体艺术设计', '1279', '1', '504', '1');
INSERT INTO `code` VALUES ('1002', '5049800', 'AJ', '现代传媒设计', '1280', '1', '504', '1');
INSERT INTO `code` VALUES ('1003', '5049900', 'AJ', '艺术类其他专业', '1281', '1', '504', '1');
INSERT INTO `code` VALUES ('1004', '505', 'AJ', '文学类其他专业', '1282', '1', '50', '1');
INSERT INTO `code` VALUES ('1005', '60', 'AJ', '历史学', '1283', '1', '0', '0');
INSERT INTO `code` VALUES ('1006', '601', 'AJ', '历史学类', '1284', '1', '60', '0');
INSERT INTO `code` VALUES ('1007', '6010100', 'AJ', '历史学', '1285', '1', '601', '1');
INSERT INTO `code` VALUES ('1008', '6010200', 'AJ', '世界历史', '1286', '1', '601', '1');
INSERT INTO `code` VALUES ('1009', '6010300', 'AJ', '考古学', '1287', '1', '601', '1');
INSERT INTO `code` VALUES ('1010', '6010400', 'AJ', '博物馆学', '1288', '1', '601', '1');
INSERT INTO `code` VALUES ('1011', '6010500', 'AJ', '民族学', '1289', '1', '601', '1');
INSERT INTO `code` VALUES ('1012', '6010600', 'AJ', '文物保护技术', '1290', '1', '601', '1');
INSERT INTO `code` VALUES ('1013', '6014100', 'AJ', '历史学教育', '1291', '1', '601', '1');
INSERT INTO `code` VALUES ('1014', '6014200', 'AJ', '历史与文化旅游', '1292', '1', '601', '1');
INSERT INTO `code` VALUES ('1015', '6014300', 'AJ', '文物鉴赏与文化旅游', '1293', '1', '601', '1');
INSERT INTO `code` VALUES ('1016', '6014400', 'AJ', '文物鉴赏与保护', '1294', '1', '601', '1');
INSERT INTO `code` VALUES ('1017', '6014500', 'AJ', '文物鉴定与修复', '1295', '1', '601', '1');
INSERT INTO `code` VALUES ('1018', '6014600', 'AJ', '仿古建筑与旅游', '1296', '1', '601', '1');
INSERT INTO `code` VALUES ('1019', '6014700', 'AJ', '历史学类其他专业', '1297', '1', '601', '1');
INSERT INTO `code` VALUES ('1020', '70', 'AJ', '理学', '1298', '1', '0', '0');
INSERT INTO `code` VALUES ('1021', '701', 'AJ', '数学类', '1299', '1', '70', '0');
INSERT INTO `code` VALUES ('1022', '7010100', 'AJ', '数学与应用数学', '1300', '1', '701', '1');
INSERT INTO `code` VALUES ('1023', '7010200', 'AJ', '信息与计算科学', '1301', '1', '701', '1');
INSERT INTO `code` VALUES ('1024', '7014100', 'AJ', '计算数学及其应用软件', '1302', '1', '701', '1');
INSERT INTO `code` VALUES ('1025', '7014200', 'AJ', '信息科学', '1303', '1', '701', '1');
INSERT INTO `code` VALUES ('1026', '7014300', 'AJ', '数学教育', '1304', '1', '701', '1');
INSERT INTO `code` VALUES ('1027', '7014400', 'AJ', '医学信息学', '1305', '1', '701', '1');
INSERT INTO `code` VALUES ('1028', '7014500', 'AJ', '数学类其他专业', '1306', '1', '701', '1');
INSERT INTO `code` VALUES ('1029', '702', 'AJ', '物理学类', '1307', '1', '70', '0');
INSERT INTO `code` VALUES ('1030', '7020100', 'AJ', '物理学', '1308', '1', '702', '1');
INSERT INTO `code` VALUES ('1031', '7020200', 'AJ', '应用物理学', '1309', '1', '702', '1');
INSERT INTO `code` VALUES ('1032', '7020300', 'AJ', '声学', '1310', '1', '702', '1');
INSERT INTO `code` VALUES ('1033', '7024100', 'AJ', '物理学教育', '1311', '1', '702', '1');
INSERT INTO `code` VALUES ('1034', '7024200', 'AJ', '物理学类其他专业', '1312', '1', '702', '1');
INSERT INTO `code` VALUES ('1035', '703', 'AJ', '化学类', '1313', '1', '70', '0');
INSERT INTO `code` VALUES ('1036', '7030100', 'AJ', '化学', '1314', '1', '703', '1');
INSERT INTO `code` VALUES ('1037', '7030200', 'AJ', '应用化学', '1315', '1', '703', '1');
INSERT INTO `code` VALUES ('1038', '7034100', 'AJ', '化学教育', '1316', '1', '703', '1');
INSERT INTO `code` VALUES ('1039', '7034200', 'AJ', '化学类其他专业', '1317', '1', '703', '1');
INSERT INTO `code` VALUES ('1040', '704', 'AJ', '生物科学类', '1318', '1', '70', '0');
INSERT INTO `code` VALUES ('1041', '7040100', 'AJ', '生物科学', '1319', '1', '704', '1');
INSERT INTO `code` VALUES ('1042', '7040200', 'AJ', '生物技术', '1320', '1', '704', '1');
INSERT INTO `code` VALUES ('1043', '7040300', 'AJ', '生物信息学', '1321', '1', '704', '1');
INSERT INTO `code` VALUES ('1044', '7040400', 'AJ', '生物信息技术', '1322', '1', '704', '1');
INSERT INTO `code` VALUES ('1045', '7040500', 'AJ', '生物科学与生物技术', '1323', '1', '704', '1');
INSERT INTO `code` VALUES ('1046', '7044100', 'AJ', '微生物学', '1324', '1', '704', '1');
INSERT INTO `code` VALUES ('1047', '7044200', 'AJ', '生物学教育', '1325', '1', '704', '1');
INSERT INTO `code` VALUES ('1048', '7044300', 'AJ', '微生物应用技术', '1326', '1', '704', '1');
INSERT INTO `code` VALUES ('1049', '7044400', 'AJ', '生物技术应用', '1327', '1', '704', '1');
INSERT INTO `code` VALUES ('1050', '7044500', 'AJ', '生物科学类其他专业', '1328', '1', '704', '1');
INSERT INTO `code` VALUES ('1051', '705', 'AJ', '天文学类', '1329', '1', '70', '0');
INSERT INTO `code` VALUES ('1052', '7050100', 'AJ', '天文学', '1330', '1', '705', '1');
INSERT INTO `code` VALUES ('1053', '7050200', 'AJ', '天文学类其他专业', '1331', '1', '705', '1');
INSERT INTO `code` VALUES ('1054', '706', 'AJ', '地质学类', '1332', '1', '70', '0');
INSERT INTO `code` VALUES ('1055', '7060100', 'AJ', '地质学', '1333', '1', '706', '1');
INSERT INTO `code` VALUES ('1056', '7060200', 'AJ', '地球化学', '1334', '1', '706', '1');
INSERT INTO `code` VALUES ('1057', '7060300', 'AJ', '地质学类其他专业', '1335', '1', '706', '1');
INSERT INTO `code` VALUES ('1058', '707', 'AJ', '地理科学类', '1336', '1', '70', '0');
INSERT INTO `code` VALUES ('1059', '7070100', 'AJ', '地理科学', '1337', '1', '707', '1');
INSERT INTO `code` VALUES ('1060', '7070200', 'AJ', '资源环境与城乡规划管理', '1338', '1', '707', '1');
INSERT INTO `code` VALUES ('1061', '7070300', 'AJ', '地理信息系统', '1339', '1', '707', '1');
INSERT INTO `code` VALUES ('1062', '7074100', 'AJ', '地理学', '1340', '1', '707', '1');
INSERT INTO `code` VALUES ('1063', '7074200', 'AJ', '地理学教育', '1341', '1', '707', '1');
INSERT INTO `code` VALUES ('1064', '7074200', 'AJ', '地理科学类其他专业', '1342', '1', '707', '1');
INSERT INTO `code` VALUES ('1065', '708', 'AJ', '地球物理学类', '1343', '1', '70', '0');
INSERT INTO `code` VALUES ('1066', '7080100', 'AJ', '地球物理学', '1344', '1', '708', '1');
INSERT INTO `code` VALUES ('1067', '7084100', 'AJ', '信息技术与地球物理', '1345', '1', '708', '1');
INSERT INTO `code` VALUES ('1068', '7084200', 'AJ', '地球物理学类其他专业', '1346', '1', '708', '1');
INSERT INTO `code` VALUES ('1069', '709', 'AJ', '大气科学类', '1347', '1', '70', '0');
INSERT INTO `code` VALUES ('1070', '7090100', 'AJ', '大气科学', '1348', '1', '709', '1');
INSERT INTO `code` VALUES ('1071', '7090200', 'AJ', '应用气象学', '1349', '1', '709', '1');
INSERT INTO `code` VALUES ('1072', '7091800', 'AJ', '大气探测', '1350', '1', '709', '1');
INSERT INTO `code` VALUES ('1073', '7094100', 'AJ', '应用气象技术', '1351', '1', '709', '1');
INSERT INTO `code` VALUES ('1074', '7094200', 'AJ', '气象预报', '1352', '1', '709', '1');
INSERT INTO `code` VALUES ('1075', '7094300', 'AJ', '大气科学类其他专业', '1353', '1', '709', '1');
INSERT INTO `code` VALUES ('1076', '710', 'AJ', '海洋科学类', '1354', '1', '70', '0');
INSERT INTO `code` VALUES ('1077', '7100100', 'AJ', '海洋科学', '1355', '1', '710', '1');
INSERT INTO `code` VALUES ('1078', '7100200', 'AJ', '海洋技术', '1356', '1', '710', '1');
INSERT INTO `code` VALUES ('1079', '7100300', 'AJ', '海洋管理', '1357', '1', '710', '1');
INSERT INTO `code` VALUES ('1080', '7100400', 'AJ', '军事海洋学', '1358', '1', '710', '1');
INSERT INTO `code` VALUES ('1081', '7101800', 'AJ', '海洋学', '1359', '1', '710', '1');
INSERT INTO `code` VALUES ('1082', '7101900', 'AJ', '海洋科学类其他专业', '1360', '1', '710', '1');
INSERT INTO `code` VALUES ('1083', '711', 'AJ', '力学类', '1361', '1', '70', '0');
INSERT INTO `code` VALUES ('1084', '7110100', 'AJ', '理论与应用力学', '1362', '1', '711', '1');
INSERT INTO `code` VALUES ('1085', '7110200', 'AJ', '力学类其他专业', '1363', '1', '711', '1');
INSERT INTO `code` VALUES ('1086', '712', 'AJ', '电子信息科学类', '1364', '1', '70', '0');
INSERT INTO `code` VALUES ('1087', '7120100', 'AJ', '电子信息科学与技术', '1365', '1', '712', '1');
INSERT INTO `code` VALUES ('1088', '7120200', 'AJ', '微电子学', '1366', '1', '712', '1');
INSERT INTO `code` VALUES ('1089', '7120300', 'AJ', '光信息科学与技术', '1367', '1', '712', '1');
INSERT INTO `code` VALUES ('1090', '7120500', 'AJ', '信息安全', '1368', '1', '712', '1');
INSERT INTO `code` VALUES ('1091', '7124100', 'AJ', '光电技术应用', '1369', '1', '712', '1');
INSERT INTO `code` VALUES ('1092', '7124200', 'AJ', '网络与信息安全', '1370', '1', '712', '1');
INSERT INTO `code` VALUES ('1093', '7124300', 'AJ', '计算机应用及安全管理', '1371', '1', '712', '1');
INSERT INTO `code` VALUES ('1094', '7124400', 'AJ', '电子信息科学类其他专业', '1372', '1', '712', '1');
INSERT INTO `code` VALUES ('1095', '713', 'AJ', '材料科学类', '1373', '1', '70', '0');
INSERT INTO `code` VALUES ('1096', '7130100', 'AJ', '材料物理', '1374', '1', '713', '1');
INSERT INTO `code` VALUES ('1097', '7130200', 'AJ', '材料化学', '1375', '1', '713', '1');
INSERT INTO `code` VALUES ('1098', '7130300', 'AJ', '材料科学类其他专业', '1376', '1', '713', '1');
INSERT INTO `code` VALUES ('1099', '714', 'AJ', '环境科学类', '1377', '1', '70', '0');
INSERT INTO `code` VALUES ('1100', '7140100', 'AJ', '环境科学', '1378', '1', '714', '1');
INSERT INTO `code` VALUES ('1101', '7140200', 'AJ', '生态学', '1379', '1', '714', '1');
INSERT INTO `code` VALUES ('1102', '7144100', 'AJ', '城市建设与环境工程', '1380', '1', '714', '1');
INSERT INTO `code` VALUES ('1103', '7144200', 'AJ', '环境科学类其他专业', '1381', '1', '714', '1');
INSERT INTO `code` VALUES ('1104', '715', 'AJ', '心理学类', '1382', '1', '70', '0');
INSERT INTO `code` VALUES ('1105', '7150100', 'AJ', '心理学', '1383', '1', '715', '1');
INSERT INTO `code` VALUES ('1106', '7150200', 'AJ', '应用心理学', '1384', '1', '715', '1');
INSERT INTO `code` VALUES ('1107', '7152100', 'AJ', '军事心理学', '1385', '1', '715', '1');
INSERT INTO `code` VALUES ('1108', '7154100', 'AJ', '心理咨询', '1386', '1', '715', '1');
INSERT INTO `code` VALUES ('1109', '7154200', 'AJ', '心理学类其他专业', '1387', '1', '715', '1');
INSERT INTO `code` VALUES ('1110', '716', 'AJ', '统计学类', '1388', '1', '70', '0');
INSERT INTO `code` VALUES ('1111', '7160100', 'AJ', '统计学', '1389', '1', '716', '1');
INSERT INTO `code` VALUES ('1112', '7164100', 'AJ', '统计科学', '1390', '1', '716', '1');
INSERT INTO `code` VALUES ('1113', '7164200', 'AJ', '电算化会计与统计', '1391', '1', '716', '1');
INSERT INTO `code` VALUES ('1114', '7164300', 'AJ', '统计与会计', '1392', '1', '716', '1');
INSERT INTO `code` VALUES ('1115', '7164400', 'AJ', '统计学类其他类专业', '1393', '1', '716', '1');
INSERT INTO `code` VALUES ('1116', '717', 'AJ', '系统科学类', '1394', '1', '70', '0');
INSERT INTO `code` VALUES ('1117', '7170100', 'AJ', '系统理论', '1395', '1', '717', '1');
INSERT INTO `code` VALUES ('1118', '7173100', 'AJ', '系统工程', '1396', '1', '717', '1');
INSERT INTO `code` VALUES ('1119', '7173200', 'AJ', '系统科学类其他专业', '1397', '1', '717', '1');
INSERT INTO `code` VALUES ('1120', '718', 'AJ', '理学类其他专业', '1398', '1', '70', '1');
INSERT INTO `code` VALUES ('1121', '80', 'AJ', '工学', '1399', '1', '0', '0');
INSERT INTO `code` VALUES ('1122', '801', 'AJ', '地矿类', '1400', '1', '80', '0');
INSERT INTO `code` VALUES ('1123', '8010100', 'AJ', '采矿工程', '1401', '1', '801', '1');
INSERT INTO `code` VALUES ('1124', '8010200', 'AJ', '石油工程', '1402', '1', '801', '1');
INSERT INTO `code` VALUES ('1125', '8010300', 'AJ', '矿物加工工程', '1403', '1', '801', '1');
INSERT INTO `code` VALUES ('1126', '8010400', 'AJ', '勘查技术与工程', '1404', '1', '801', '1');
INSERT INTO `code` VALUES ('1127', '8010500', 'AJ', '资源勘查工程', '1405', '1', '801', '1');
INSERT INTO `code` VALUES ('1128', '8010600', 'AJ', '地质工程', '1406', '1', '801', '1');
INSERT INTO `code` VALUES ('1129', '8010700', 'AJ', '矿物资源工程', '1407', '1', '801', '1');
INSERT INTO `code` VALUES ('1130', '8014100', 'AJ', '石油与天然气地质勘查技术', '1408', '1', '801', '1');
INSERT INTO `code` VALUES ('1131', '8014200', 'AJ', '矿山地质', '1409', '1', '801', '1');
INSERT INTO `code` VALUES ('1132', '8014300', 'AJ', '采矿技术', '1410', '1', '801', '1');
INSERT INTO `code` VALUES ('1133', '8014400', 'AJ', '石油与天然气开采', '1411', '1', '801', '1');
INSERT INTO `code` VALUES ('1134', '8014500', 'AJ', '钻井技术', '1412', '1', '801', '1');
INSERT INTO `code` VALUES ('1135', '8014600', 'AJ', '矿井通风与安全技术', '1413', '1', '801', '1');
INSERT INTO `code` VALUES ('1136', '8014700', 'AJ', '选矿技术', '1414', '1', '801', '1');
INSERT INTO `code` VALUES ('1137', '8014800', 'AJ', '岩土与基础工程设计', '1415', '1', '801', '1');
INSERT INTO `code` VALUES ('1138', '8014900', 'AJ', '矿山工程技术', '1416', '1', '801', '1');
INSERT INTO `code` VALUES ('1139', '8015000', 'AJ', '岩土与基础工程技术', '1417', '1', '801', '1');
INSERT INTO `code` VALUES ('1140', '8015100', 'AJ', '黄金地质勘查与管理', '1418', '1', '801', '1');
INSERT INTO `code` VALUES ('1141', '8015200', 'AJ', '黄金选冶工艺与技术', '1419', '1', '801', '1');
INSERT INTO `code` VALUES ('1142', '8015300', 'AJ', '洁净煤技术', '1420', '1', '801', '1');
INSERT INTO `code` VALUES ('1143', '8015400', 'AJ', '工程地震与工程勘查', '1421', '1', '801', '1');
INSERT INTO `code` VALUES ('1144', '8015500', 'AJ', '煤化工', '1422', '1', '801', '1');
INSERT INTO `code` VALUES ('1145', '8015600', 'AJ', '综合机械化采煤技术', '1423', '1', '801', '1');
INSERT INTO `code` VALUES ('1146', '8015700', 'AJ', '地矿类其他专业', '1424', '1', '801', '1');
INSERT INTO `code` VALUES ('1147', '802', 'AJ', '材料类', '1425', '1', '80', '0');
INSERT INTO `code` VALUES ('1148', '8020100', 'AJ', '冶金工程', '1426', '1', '802', '1');
INSERT INTO `code` VALUES ('1149', '8020200', 'AJ', '金属材料工程', '1427', '1', '802', '1');
INSERT INTO `code` VALUES ('1150', '8020300', 'AJ', '无机非金属材料工程', '1428', '1', '802', '1');
INSERT INTO `code` VALUES ('1151', '8020400', 'AJ', '高分子材料与工程', '1429', '1', '802', '1');
INSERT INTO `code` VALUES ('1152', '8020500', 'AJ', '材料科学与工程', '1430', '1', '802', '1');
INSERT INTO `code` VALUES ('1153', '8020600', 'AJ', '复合材料与工程', '1431', '1', '802', '1');
INSERT INTO `code` VALUES ('1154', '8020700', 'AJ', '焊接技术与工程', '1432', '1', '802', '1');
INSERT INTO `code` VALUES ('1155', '8020800', 'AJ', '宝石与材料工艺学', '1433', '1', '802', '1');
INSERT INTO `code` VALUES ('1156', '8020900', 'AJ', '粉体材料科学与工程', '1434', '1', '802', '1');
INSERT INTO `code` VALUES ('1157', '8021000', 'AJ', '再生资源科学与技术', '1435', '1', '802', '1');
INSERT INTO `code` VALUES ('1158', '8021100', 'AJ', '稀土工程', '1436', '1', '802', '1');
INSERT INTO `code` VALUES ('1159', '8022200', 'AJ', '军用材料工程', '1437', '1', '802', '1');
INSERT INTO `code` VALUES ('1160', '8024100', 'AJ', '钢铁冶金', '1438', '1', '802', '1');
INSERT INTO `code` VALUES ('1161', '8024200', 'AJ', '有色金属冶金', '1439', '1', '802', '1');
INSERT INTO `code` VALUES ('1162', '8024300', 'AJ', '金属材料与热处理', '1440', '1', '802', '1');
INSERT INTO `code` VALUES ('1163', '8024400', 'AJ', '金属压力加工', '1441', '1', '802', '1');
INSERT INTO `code` VALUES ('1164', '8024500', 'AJ', '硅酸盐工程', '1442', '1', '802', '1');
INSERT INTO `code` VALUES ('1165', '8024600', 'AJ', '腐蚀与防护', '1443', '1', '802', '1');
INSERT INTO `code` VALUES ('1166', '8024700', 'AJ', '炼铁', '1444', '1', '802', '1');
INSERT INTO `code` VALUES ('1167', '8024800', 'AJ', '炼钢', '1445', '1', '802', '1');
INSERT INTO `code` VALUES ('1168', '8024900', 'AJ', '硅酸盐工艺', '1446', '1', '802', '1');
INSERT INTO `code` VALUES ('1169', '8025000', 'AJ', '高分子材料加工', '1447', '1', '802', '1');
INSERT INTO `code` VALUES ('1170', '8025100', 'AJ', '涂装防护工艺', '1448', '1', '802', '1');
INSERT INTO `code` VALUES ('1171', '8025200', 'AJ', '炼钢及铁合金', '1449', '1', '802', '1');
INSERT INTO `code` VALUES ('1172', '8025300', 'AJ', '化学装潢材料及应用', '1450', '1', '802', '1');
INSERT INTO `code` VALUES ('1173', '8025400', 'AJ', '金属结构与焊接', '1451', '1', '802', '1');
INSERT INTO `code` VALUES ('1174', '8025500', 'AJ', '建筑装饰材料与工程', '1452', '1', '802', '1');
INSERT INTO `code` VALUES ('1175', '8025600', 'AJ', '宝石学', '1453', '1', '802', '1');
INSERT INTO `code` VALUES ('1176', '8025700', 'AJ', '宝石加工及鉴定', '1454', '1', '802', '1');
INSERT INTO `code` VALUES ('1177', '8025800', 'AJ', '宝石与贸易', '1455', '1', '802', '1');
INSERT INTO `code` VALUES ('1178', '8025900', 'AJ', '建筑材料与塑胶加工', '1456', '1', '802', '1');
INSERT INTO `code` VALUES ('1179', '8026000', 'AJ', '珠宝首饰设计与制作', '1457', '1', '802', '1');
INSERT INTO `code` VALUES ('1180', '8026100', 'AJ', '产品涂饰与装璜', '1458', '1', '802', '1');
INSERT INTO `code` VALUES ('1181', '8026200', 'AJ', '金银珠宝工艺及制品', '1459', '1', '802', '1');
INSERT INTO `code` VALUES ('1182', '8026300', 'AJ', '磨料磨具制造', '1460', '1', '802', '1');
INSERT INTO `code` VALUES ('1183', '8026400', 'AJ', '超硬材料及制品', '1461', '1', '802', '1');
INSERT INTO `code` VALUES ('1184', '8026500', 'AJ', '装饰与装潢材料', '1462', '1', '802', '1');
INSERT INTO `code` VALUES ('1185', '8026600', 'AJ', '珠宝鉴赏与工艺', '1463', '1', '802', '1');
INSERT INTO `code` VALUES ('1186', '8026700', 'AJ', '新型材料应用', '1464', '1', '802', '1');
INSERT INTO `code` VALUES ('1187', '8026800', 'AJ', '贵金属材料成型及控制', '1465', '1', '802', '1');
INSERT INTO `code` VALUES ('1188', '8026900', 'AJ', '电线电缆制造技术', '1466', '1', '802', '1');
INSERT INTO `code` VALUES ('1189', '8027000', 'AJ', '珠宝技术与工艺', '1467', '1', '802', '1');
INSERT INTO `code` VALUES ('1190', '8027100', 'AJ', '珠宝加工与鉴定', '1468', '1', '802', '1');
INSERT INTO `code` VALUES ('1191', '8027200', 'AJ', '宝石鉴定与营销', '1469', '1', '802', '1');
INSERT INTO `code` VALUES ('1192', '8027300', 'AJ', '高分子材料应用', '1470', '1', '802', '1');
INSERT INTO `code` VALUES ('1193', '8027400', 'AJ', '焊接工程及自动化', '1471', '1', '802', '1');
INSERT INTO `code` VALUES ('1194', '8027500', 'AJ', '材料类其他专业', '1472', '1', '802', '1');
INSERT INTO `code` VALUES ('1195', '803', 'AJ', '机械类', '1473', '1', '80', '0');
INSERT INTO `code` VALUES ('1196', '8030100', 'AJ', '机械设计制造及其自动化', '1474', '1', '803', '1');
INSERT INTO `code` VALUES ('1197', '8030200', 'AJ', '材料成型及控制工程', '1475', '1', '803', '1');
INSERT INTO `code` VALUES ('1198', '8030300', 'AJ', '工业设计', '1476', '1', '803', '1');
INSERT INTO `code` VALUES ('1199', '8030400', 'AJ', '过程装备与控制工程', '1477', '1', '803', '1');
INSERT INTO `code` VALUES ('1200', '8030500', 'AJ', '机械工程及自动化', '1478', '1', '803', '1');
INSERT INTO `code` VALUES ('1201', '8030600', 'AJ', '车辆工程', '1479', '1', '803', '1');
INSERT INTO `code` VALUES ('1202', '8030700', 'AJ', '机械电子工程', '1480', '1', '803', '1');
INSERT INTO `code` VALUES ('1203', '8034100', 'AJ', '机械制造工艺与设备', '1481', '1', '803', '1');
INSERT INTO `code` VALUES ('1204', '8034200', 'AJ', '热加工工艺及设备', '1482', '1', '803', '1');
INSERT INTO `code` VALUES ('1205', '8034300', 'AJ', '铸造', '1483', '1', '803', '1');
INSERT INTO `code` VALUES ('1206', '8034400', 'AJ', '焊接工艺及设备', '1484', '1', '803', '1');
INSERT INTO `code` VALUES ('1207', '8034500', 'AJ', '机械设计及制造', '1485', '1', '803', '1');
INSERT INTO `code` VALUES ('1208', '8034600', 'AJ', '化工设备与机械', '1486', '1', '803', '1');
INSERT INTO `code` VALUES ('1209', '8034700', 'AJ', '汽车与拖拉机', '1487', '1', '803', '1');
INSERT INTO `code` VALUES ('1210', '8034900', 'AJ', '设备工程与管理', '1488', '1', '803', '1');
INSERT INTO `code` VALUES ('1211', '8035000', 'AJ', '模具设计与制造', '1489', '1', '803', '1');
INSERT INTO `code` VALUES ('1212', '8035100', 'AJ', '内燃机制造与维修', '1490', '1', '803', '1');
INSERT INTO `code` VALUES ('1213', '8035200', 'AJ', '汽车、拖拉机制造与维修', '1491', '1', '803', '1');
INSERT INTO `code` VALUES ('1214', '8035300', 'AJ', '船舶制造与维修', '1492', '1', '803', '1');
INSERT INTO `code` VALUES ('1215', '8035400', 'AJ', '船舶机械制造与维修', '1493', '1', '803', '1');
INSERT INTO `code` VALUES ('1216', '8035500', 'AJ', '农业机械制造与维修', '1494', '1', '803', '1');
INSERT INTO `code` VALUES ('1217', '8035600', 'AJ', '化工机械制造与维修', '1495', '1', '803', '1');
INSERT INTO `code` VALUES ('1218', '8035700', 'AJ', '精密医疗机械制造与维修', '1496', '1', '803', '1');
INSERT INTO `code` VALUES ('1219', '8035800', 'AJ', '工程机械制造与维修', '1497', '1', '803', '1');
INSERT INTO `code` VALUES ('1220', '8035900', 'AJ', '建材机械制造与维修', '1498', '1', '803', '1');
INSERT INTO `code` VALUES ('1221', '8036000', 'AJ', '机械设备及自动化', '1499', '1', '803', '1');
INSERT INTO `code` VALUES ('1222', '8036100', 'AJ', '飞机及发动机维修', '1500', '1', '803', '1');
INSERT INTO `code` VALUES ('1223', '8036200', 'AJ', '制药机械制造与维修', '1501', '1', '803', '1');
INSERT INTO `code` VALUES ('1224', '8036300', 'AJ', '液压技术应用', '1502', '1', '803', '1');
INSERT INTO `code` VALUES ('1225', '8036400', 'AJ', '焊接', '1503', '1', '803', '1');
INSERT INTO `code` VALUES ('1226', '8036500', 'AJ', '机电一体化', '1504', '1', '803', '1');
INSERT INTO `code` VALUES ('1227', '8036600', 'AJ', '汽车技术', '1505', '1', '803', '1');
INSERT INTO `code` VALUES ('1228', '8036700', 'AJ', '汽车检测与维修', '1506', '1', '803', '1');
INSERT INTO `code` VALUES ('1229', '8036800', 'AJ', '工程机械', '1507', '1', '803', '1');
INSERT INTO `code` VALUES ('1230', '8036900', 'AJ', '电子机械制造与维修', '1508', '1', '803', '1');
INSERT INTO `code` VALUES ('1231', '8037000', 'AJ', '汽车工艺与维修', '1509', '1', '803', '1');
INSERT INTO `code` VALUES ('1232', '8037100', 'AJ', '飞机维修工程', '1510', '1', '803', '1');
INSERT INTO `code` VALUES ('1233', '8037200', 'AJ', '机电技术应用', '1511', '1', '803', '1');
INSERT INTO `code` VALUES ('1234', '8037300', 'AJ', '机械及自动化技术', '1512', '1', '803', '1');
INSERT INTO `code` VALUES ('1235', '8037400', 'AJ', '冶金机械', '1513', '1', '803', '1');
INSERT INTO `code` VALUES ('1236', '8037500', 'AJ', '数控机床加工技术', '1514', '1', '803', '1');
INSERT INTO `code` VALUES ('1237', '8037600', 'AJ', '舰船动力机械与装置', '1515', '1', '803', '1');
INSERT INTO `code` VALUES ('1238', '8037700', 'AJ', '飞机控制设备与仪表', '1516', '1', '803', '1');
INSERT INTO `code` VALUES ('1239', '8037800', 'AJ', '假肢矫形', '1517', '1', '803', '1');
INSERT INTO `code` VALUES ('1240', '8037900', 'AJ', '药剂设备', '1518', '1', '803', '1');
INSERT INTO `code` VALUES ('1241', '8038000', 'AJ', '玩具', '1519', '1', '803', '1');
INSERT INTO `code` VALUES ('1242', '8038100', 'AJ', '船舶技术', '1520', '1', '803', '1');
INSERT INTO `code` VALUES ('1243', '8038200', 'AJ', '印刷机械操作与维修', '1521', '1', '803', '1');
INSERT INTO `code` VALUES ('1244', '8038300', 'AJ', '机械电子技术', '1522', '1', '803', '1');
INSERT INTO `code` VALUES ('1245', '8038400', 'AJ', '汽车维修与营销', '1523', '1', '803', '1');
INSERT INTO `code` VALUES ('1246', '8038500', 'AJ', '工程机械控制技术', '1524', '1', '803', '1');
INSERT INTO `code` VALUES ('1247', '8038600', 'AJ', '热能机械', '1525', '1', '803', '1');
INSERT INTO `code` VALUES ('1248', '8038700', 'AJ', '飞机机电设备维修', '1526', '1', '803', '1');
INSERT INTO `code` VALUES ('1249', '8038800', 'AJ', '汽车工程', '1527', '1', '803', '1');
INSERT INTO `code` VALUES ('1250', '8038900', 'AJ', '智能建筑控制工程', '1528', '1', '803', '1');
INSERT INTO `code` VALUES ('1251', '8039000', 'AJ', '机电设备维修', '1529', '1', '803', '1');
INSERT INTO `code` VALUES ('1252', '8039100', 'AJ', '机械运用与维修', '1530', '1', '803', '1');
INSERT INTO `code` VALUES ('1253', '8039200', 'AJ', '机械设备维修与管理', '1531', '1', '803', '1');
INSERT INTO `code` VALUES ('1254', '8039300', 'AJ', '机械类其他专业', '1532', '1', '803', '1');
INSERT INTO `code` VALUES ('1255', '804', 'AJ', '仪器仪表类', '1533', '1', '80', '0');
INSERT INTO `code` VALUES ('1256', '8040100', 'AJ', '测控技术与仪器', '1534', '1', '804', '1');
INSERT INTO `code` VALUES ('1257', '8044100', 'AJ', '自动化仪表及应用', '1535', '1', '804', '1');
INSERT INTO `code` VALUES ('1258', '8044200', 'AJ', '计量测试技术', '1536', '1', '804', '1');
INSERT INTO `code` VALUES ('1259', '8044300', 'AJ', '检测技术与应用', '1537', '1', '804', '1');
INSERT INTO `code` VALUES ('1260', '8044400', 'AJ', '热工检测与控制技术', '1538', '1', '804', '1');
INSERT INTO `code` VALUES ('1261', '8044500', 'AJ', '医用电子仪器', '1539', '1', '804', '1');
INSERT INTO `code` VALUES ('1262', '8044600', 'AJ', '医用放射线设备', '1540', '1', '804', '1');
INSERT INTO `code` VALUES ('1263', '8044700', 'AJ', '理化检验及分离技术', '1541', '1', '804', '1');
INSERT INTO `code` VALUES ('1264', '8044800', 'AJ', '计量技术及管理', '1542', '1', '804', '1');
INSERT INTO `code` VALUES ('1265', '8044900', 'AJ', '工业仪表及自动化', '1543', '1', '804', '1');
INSERT INTO `code` VALUES ('1266', '8045000', 'AJ', '眼镜技术', '1544', '1', '804', '1');
INSERT INTO `code` VALUES ('1267', '8045100', 'AJ', '验光制镜', '1545', '1', '804', '1');
INSERT INTO `code` VALUES ('1268', '8045200', 'AJ', '机电产品质量检验', '1546', '1', '804', '1');
INSERT INTO `code` VALUES ('1269', '8045300', 'AJ', '电子仪器及电气维修', '1547', '1', '804', '1');
INSERT INTO `code` VALUES ('1270', '8045400', 'AJ', '电气及仪表应用技术', '1548', '1', '804', '1');
INSERT INTO `code` VALUES ('1271', '8045500', 'AJ', '分析测试技术与仪器维修', '1549', '1', '804', '1');
INSERT INTO `code` VALUES ('1272', '8045600', 'AJ', '分析与检测技术', '1550', '1', '804', '1');
INSERT INTO `code` VALUES ('1273', '8045700', 'AJ', '视光技术', '1551', '1', '804', '1');
INSERT INTO `code` VALUES ('1274', '8045800', 'AJ', '计算机与自动检测', '1552', '1', '804', '1');
INSERT INTO `code` VALUES ('1275', '8045900', 'AJ', '电子测量与仪器', '1553', '1', '804', '1');
INSERT INTO `code` VALUES ('1276', '8046000', 'AJ', '测绘仪器', '1554', '1', '804', '1');
INSERT INTO `code` VALUES ('1277', '8046100', 'AJ', '航空仪电维修工程', '1555', '1', '804', '1');
INSERT INTO `code` VALUES ('1278', '8046200', 'AJ', '光学仪器维修', '1556', '1', '804', '1');
INSERT INTO `code` VALUES ('1279', '8046300', 'AJ', '声像设备维修工程', '1557', '1', '804', '1');
INSERT INTO `code` VALUES ('1280', '8046400', 'AJ', '医疗仪器维修', '1558', '1', '804', '1');
INSERT INTO `code` VALUES ('1281', '8046500', 'AJ', '油料质量与计量', '1559', '1', '804', '1');
INSERT INTO `code` VALUES ('1282', '8046600', 'AJ', '质量检测技术与控制', '1560', '1', '804', '1');
INSERT INTO `code` VALUES ('1283', '8046700', 'AJ', '产品质量检验', '1561', '1', '804', '1');
INSERT INTO `code` VALUES ('1284', '8046800', 'AJ', '无损检测', '1562', '1', '804', '1');
INSERT INTO `code` VALUES ('1285', '8046900', 'AJ', '视光与配镜技术', '1563', '1', '804', '1');
INSERT INTO `code` VALUES ('1286', '8047000', 'AJ', '仪器仪表类其他专业', '1564', '1', '804', '1');
INSERT INTO `code` VALUES ('1287', '805', 'AJ', '能源动力类', '1565', '1', '80', '0');
INSERT INTO `code` VALUES ('1288', '8050100', 'AJ', '热能与动力工程', '1566', '1', '805', '1');
INSERT INTO `code` VALUES ('1289', '8050200', 'AJ', '核工程与核技术', '1567', '1', '805', '1');
INSERT INTO `code` VALUES ('1290', '8050300', 'AJ', '工程物理', '1568', '1', '805', '1');
INSERT INTO `code` VALUES ('1291', '8054100', 'AJ', '热能工程', '1569', '1', '805', '1');
INSERT INTO `code` VALUES ('1292', '8054200', 'AJ', '制冷与低温技术', '1570', '1', '805', '1');
INSERT INTO `code` VALUES ('1293', '8054300', 'AJ', '工业炉与热能利用', '1571', '1', '805', '1');
INSERT INTO `code` VALUES ('1294', '8054400', 'AJ', '电厂热能动力', '1572', '1', '805', '1');
INSERT INTO `code` VALUES ('1295', '8054500', 'AJ', '火电厂集控运行', '1573', '1', '805', '1');
INSERT INTO `code` VALUES ('1296', '8054600', 'AJ', '燃料输送系统自动化', '1574', '1', '805', '1');
INSERT INTO `code` VALUES ('1297', '8054700', 'AJ', '采暖与通风', '1575', '1', '805', '1');
INSERT INTO `code` VALUES ('1298', '8054800', 'AJ', '制冷与空调', '1576', '1', '805', '1');
INSERT INTO `code` VALUES ('1299', '8054900', 'AJ', '制冷与供暖', '1577', '1', '805', '1');
INSERT INTO `code` VALUES ('1300', '8055000', 'AJ', '城市热能应用技术', '1578', '1', '805', '1');
INSERT INTO `code` VALUES ('1301', '8055100', 'AJ', '热工自动化', '1579', '1', '805', '1');
INSERT INTO `code` VALUES ('1302', '8055200', 'AJ', '城市能源管理', '1580', '1', '805', '1');
INSERT INTO `code` VALUES ('1303', '8055300', 'AJ', '能源动力类其他专业', '1581', '1', '805', '1');
INSERT INTO `code` VALUES ('1304', '806', 'AJ', '电气信息类', '1582', '1', '80', '0');
INSERT INTO `code` VALUES ('1305', '8060100', 'AJ', '电气工程及其自动化', '1583', '1', '806', '1');
INSERT INTO `code` VALUES ('1306', '8060200', 'AJ', '自动化', '1584', '1', '806', '1');
INSERT INTO `code` VALUES ('1307', '8060300', 'AJ', '电子信息工程', '1585', '1', '806', '1');
INSERT INTO `code` VALUES ('1308', '8060400', 'AJ', '通信工程', '1586', '1', '806', '1');
INSERT INTO `code` VALUES ('1309', '8060500', 'AJ', '计算机科学与技术', '1587', '1', '806', '1');
INSERT INTO `code` VALUES ('1310', '8060600', 'AJ', '电子科学与技术', '1588', '1', '806', '1');
INSERT INTO `code` VALUES ('1311', '8060700', 'AJ', '生物医学工程', '1589', '1', '806', '1');
INSERT INTO `code` VALUES ('1312', '8060800', 'AJ', '电气工程与自动化', '1590', '1', '806', '1');
INSERT INTO `code` VALUES ('1313', '8060900', 'AJ', '信息工程', '1591', '1', '806', '1');
INSERT INTO `code` VALUES ('1314', '8061000', 'AJ', '光源与照明', '1592', '1', '806', '1');
INSERT INTO `code` VALUES ('1315', '8061100', 'AJ', '软件工程', '1593', '1', '806', '1');
INSERT INTO `code` VALUES ('1316', '8061200', 'AJ', '影视艺术技术', '1594', '1', '806', '1');
INSERT INTO `code` VALUES ('1317', '8061300', 'AJ', '网络工程', '1595', '1', '806', '1');
INSERT INTO `code` VALUES ('1318', '8061400', 'AJ', '信息显示与光电技术', '1596', '1', '806', '1');
INSERT INTO `code` VALUES ('1319', '8061500', 'AJ', '集成电路设计与集成系统', '1597', '1', '806', '1');
INSERT INTO `code` VALUES ('1320', '8061600', 'AJ', '光电信息工程', '1598', '1', '806', '1');
INSERT INTO `code` VALUES ('1321', '8061700', 'AJ', '广播电视工程', '1599', '1', '806', '1');
INSERT INTO `code` VALUES ('1322', '8061800', 'AJ', '电气信息工程', '1600', '1', '806', '1');
INSERT INTO `code` VALUES ('1323', '8064100', 'AJ', '电机电器及其控制', '1601', '1', '806', '1');
INSERT INTO `code` VALUES ('1324', '8064200', 'AJ', '工业自动化', '1602', '1', '806', '1');
INSERT INTO `code` VALUES ('1325', '8064300', 'AJ', '电气技术', '1603', '1', '806', '1');
INSERT INTO `code` VALUES ('1326', '8064400', 'AJ', '电机制造与运行', '1604', '1', '806', '1');
INSERT INTO `code` VALUES ('1327', '8064500', 'AJ', '电器制造', '1605', '1', '806', '1');
INSERT INTO `code` VALUES ('1328', '8064600', 'AJ', '电机与电器', '1606', '1', '806', '1');
INSERT INTO `code` VALUES ('1329', '8064700', 'AJ', '发电厂及电力系统', '1607', '1', '806', '1');
INSERT INTO `code` VALUES ('1330', '8064800', 'AJ', '电力系统继电保护', '1608', '1', '806', '1');
INSERT INTO `code` VALUES ('1331', '8064900', 'AJ', '电网监控技术', '1609', '1', '806', '1');
INSERT INTO `code` VALUES ('1332', '8065000', 'AJ', '输电线路工程', '1610', '1', '806', '1');
INSERT INTO `code` VALUES ('1333', '8065100', 'AJ', '供用电技术', '1611', '1', '806', '1');
INSERT INTO `code` VALUES ('1334', '8065200', 'AJ', '工业电气自动化技术', '1612', '1', '806', '1');
INSERT INTO `code` VALUES ('1335', '8065300', 'AJ', '生产过程自动化技术', '1613', '1', '806', '1');
INSERT INTO `code` VALUES ('1336', '8065400', 'AJ', '工业自动化仪表', '1614', '1', '806', '1');
INSERT INTO `code` VALUES ('1337', '8065500', 'AJ', '工业用电', '1615', '1', '806', '1');
INSERT INTO `code` VALUES ('1338', '8065600', 'AJ', '用电管理与监察', '1616', '1', '806', '1');
INSERT INTO `code` VALUES ('1339', '8065700', 'AJ', '建筑电气工程', '1617', '1', '806', '1');
INSERT INTO `code` VALUES ('1340', '8065800', 'AJ', '微电子技术', '1618', '1', '806', '1');
INSERT INTO `code` VALUES ('1341', '8065900', 'AJ', '应用电子技术', '1619', '1', '806', '1');
INSERT INTO `code` VALUES ('1342', '8066000', 'AJ', '计算机及应用', '1620', '1', '806', '1');
INSERT INTO `code` VALUES ('1343', '8066100', 'AJ', '计算机软件', '1621', '1', '806', '1');
INSERT INTO `code` VALUES ('1344', '8066200', 'AJ', '自动控制', '1622', '1', '806', '1');
INSERT INTO `code` VALUES ('1345', '8066300', 'AJ', '计算机科学教育', '1623', '1', '806', '1');
INSERT INTO `code` VALUES ('1346', '8066500', 'AJ', '电子与信息技术', '1624', '1', '806', '1');
INSERT INTO `code` VALUES ('1347', '8066600', 'AJ', '计算机通信', '1625', '1', '806', '1');
INSERT INTO `code` VALUES ('1348', '8066700', 'AJ', '计算机应用技术', '1626', '1', '806', '1');
INSERT INTO `code` VALUES ('1349', '8066800', 'AJ', '无线电技术', '1627', '1', '806', '1');
INSERT INTO `code` VALUES ('1350', '8066900', 'AJ', '电子设备结构设计与工艺', '1628', '1', '806', '1');
INSERT INTO `code` VALUES ('1351', '8067000', 'AJ', '电子设备维修', '1629', '1', '806', '1');
INSERT INTO `code` VALUES ('1352', '8067100', 'AJ', '计算机应用与维护及相关专业', '1630', '1', '806', '1');
INSERT INTO `code` VALUES ('1353', '8067200', 'AJ', '办公自动化设备运行与维修', '1631', '1', '806', '1');
INSERT INTO `code` VALUES ('1354', '8067300', 'AJ', '机床数控技术', '1632', '1', '806', '1');
INSERT INTO `code` VALUES ('1355', '8067400', 'AJ', '通信线路', '1633', '1', '806', '1');
INSERT INTO `code` VALUES ('1356', '8067500', 'AJ', '光纤通信', '1634', '1', '806', '1');
INSERT INTO `code` VALUES ('1357', '8067600', 'AJ', '程控交换技术', '1635', '1', '806', '1');
INSERT INTO `code` VALUES ('1358', '8067700', 'AJ', '通信技术', '1636', '1', '806', '1');
INSERT INTO `code` VALUES ('1359', '8067800', 'AJ', '移动通信', '1637', '1', '806', '1');
INSERT INTO `code` VALUES ('1360', '8067900', 'AJ', '卫星通信', '1638', '1', '806', '1');
INSERT INTO `code` VALUES ('1361', '8068000', 'AJ', '电子技术及微机应用', '1639', '1', '806', '1');
INSERT INTO `code` VALUES ('1362', '8068100', 'AJ', '微型计算机及应用', '1640', '1', '806', '1');
INSERT INTO `code` VALUES ('1363', '8068200', 'AJ', '办公自动化技术', '1641', '1', '806', '1');
INSERT INTO `code` VALUES ('1364', '8068300', 'AJ', '计算机与信息管理', '1642', '1', '806', '1');
INSERT INTO `code` VALUES ('1365', '8068400', 'AJ', '工业电子技术', '1643', '1', '806', '1');
INSERT INTO `code` VALUES ('1366', '8068500', 'AJ', '计算机辅助机械设计', '1644', '1', '806', '1');
INSERT INTO `code` VALUES ('1367', '8068600', 'AJ', '计算机与邮政通信', '1645', '1', '806', '1');
INSERT INTO `code` VALUES ('1368', '8068700', 'AJ', '数据与图文通信', '1646', '1', '806', '1');
INSERT INTO `code` VALUES ('1369', '8068800', 'AJ', '国际邮政通信', '1647', '1', '806', '1');
INSERT INTO `code` VALUES ('1370', '8068900', 'AJ', '邮政自动化', '1648', '1', '806', '1');
INSERT INTO `code` VALUES ('1371', '8069000', 'AJ', '信息处理与自动化', '1649', '1', '806', '1');
INSERT INTO `code` VALUES ('1372', '8069100', 'AJ', '电器与电脑', '1650', '1', '806', '1');
INSERT INTO `code` VALUES ('1373', '8069200', 'AJ', '金融网技术', '1651', '1', '806', '1');
INSERT INTO `code` VALUES ('1374', '8069300', 'AJ', '数控技术及应用', '1652', '1', '806', '1');
INSERT INTO `code` VALUES ('1375', '8069400', 'AJ', '电子设备应用技术', '1653', '1', '806', '1');
INSERT INTO `code` VALUES ('1376', '8069500', 'AJ', '网络技术与信息处理', '1654', '1', '806', '1');
INSERT INTO `code` VALUES ('1377', '8069600', 'AJ', '声像技术', '1655', '1', '806', '1');
INSERT INTO `code` VALUES ('1378', '8069700', 'AJ', '计算机网络与软件应用', '1656', '1', '806', '1');
INSERT INTO `code` VALUES ('1379', '8069800', 'AJ', '电子工程', '1657', '1', '806', '1');
INSERT INTO `code` VALUES ('1380', '8069900', 'AJ', '通信与可视技术', '1658', '1', '806', '1');
INSERT INTO `code` VALUES ('1381', '8061900', 'AJ', '电气信息类其他专业', '1659', '1', '806', '1');
INSERT INTO `code` VALUES ('1382', '807', 'AJ', '土建类', '1660', '1', '80', '0');
INSERT INTO `code` VALUES ('1383', '8070100', 'AJ', '建筑学', '1661', '1', '807', '1');
INSERT INTO `code` VALUES ('1384', '8070200', 'AJ', '城市规划', '1662', '1', '807', '1');
INSERT INTO `code` VALUES ('1385', '8070300', 'AJ', '土木工程', '1663', '1', '807', '1');
INSERT INTO `code` VALUES ('1386', '8070400', 'AJ', '建筑环境与设备工程', '1664', '1', '807', '1');
INSERT INTO `code` VALUES ('1387', '8070500', 'AJ', '给水排水工程', '1665', '1', '807', '1');
INSERT INTO `code` VALUES ('1388', '8070600', 'AJ', '城市地下空间工程', '1666', '1', '807', '1');
INSERT INTO `code` VALUES ('1389', '8072100', 'AJ', '军港建筑工程', '1667', '1', '807', '1');
INSERT INTO `code` VALUES ('1390', '8072200', 'AJ', '野战给水工程', '1668', '1', '807', '1');
INSERT INTO `code` VALUES ('1391', '8072300', 'AJ', '给排水与采暖通风工程', '1669', '1', '807', '1');
INSERT INTO `code` VALUES ('1392', '8072400', 'AJ', '道路桥梁与渡河工程', '1670', '1', '807', '1');
INSERT INTO `code` VALUES ('1393', '8072500', 'AJ', '野战工程', '1671', '1', '807', '1');
INSERT INTO `code` VALUES ('1394', '8074100', 'AJ', '建筑工程', '1672', '1', '807', '1');
INSERT INTO `code` VALUES ('1395', '8074200', 'AJ', '城镇建设', '1673', '1', '807', '1');
INSERT INTO `code` VALUES ('1396', '8074300', 'AJ', '交通土建工程', '1674', '1', '807', '1');
INSERT INTO `code` VALUES ('1397', '8074400', 'AJ', '供热通风与空调工程', '1675', '1', '807', '1');
INSERT INTO `code` VALUES ('1398', '8074500', 'AJ', '工业设备安装工程', '1676', '1', '807', '1');
INSERT INTO `code` VALUES ('1399', '8074600', 'AJ', '供热空调与燃气工程', '1677', '1', '807', '1');
INSERT INTO `code` VALUES ('1400', '8074700', 'AJ', '建筑设计', '1678', '1', '807', '1');
INSERT INTO `code` VALUES ('1401', '8074800', 'AJ', '建筑装饰技术', '1679', '1', '807', '1');
INSERT INTO `code` VALUES ('1402', '8074900', 'AJ', '房屋建筑工程', '1680', '1', '807', '1');
INSERT INTO `code` VALUES ('1403', '8075000', 'AJ', '公路与城市道路工程', '1681', '1', '807', '1');
INSERT INTO `code` VALUES ('1404', '8075100', 'AJ', '铁道与桥梁工程', '1682', '1', '807', '1');
INSERT INTO `code` VALUES ('1405', '8075200', 'AJ', '建筑材料检验与制品工艺', '1683', '1', '807', '1');
INSERT INTO `code` VALUES ('1406', '8075300', 'AJ', '房屋设备安装', '1684', '1', '807', '1');
INSERT INTO `code` VALUES ('1407', '8075400', 'AJ', '工业与民用建筑工程', '1685', '1', '807', '1');
INSERT INTO `code` VALUES ('1408', '8075500', 'AJ', '公路与桥梁', '1686', '1', '807', '1');
INSERT INTO `code` VALUES ('1409', '8075600', 'AJ', '建筑电器技术', '1687', '1', '807', '1');
INSERT INTO `code` VALUES ('1410', '8075700', 'AJ', '铁道工程', '1688', '1', '807', '1');
INSERT INTO `code` VALUES ('1411', '8075800', 'AJ', '房屋建筑与装饰', '1689', '1', '807', '1');
INSERT INTO `code` VALUES ('1412', '8075900', 'AJ', '水利水电建筑工程', '1690', '1', '807', '1');
INSERT INTO `code` VALUES ('1413', '8076000', 'AJ', '建筑电气技术', '1691', '1', '807', '1');
INSERT INTO `code` VALUES ('1414', '8076100', 'AJ', '供水供热与空调', '1692', '1', '807', '1');
INSERT INTO `code` VALUES ('1415', '8076200', 'AJ', '岩土工程', '1693', '1', '807', '1');
INSERT INTO `code` VALUES ('1416', '8076300', 'AJ', '公路养护机械化', '1694', '1', '807', '1');
INSERT INTO `code` VALUES ('1417', '8076400', 'AJ', '建筑施工管理技术', '1695', '1', '807', '1');
INSERT INTO `code` VALUES ('1418', '8076500', 'AJ', '交通土建工程实验与测试技术', '1696', '1', '807', '1');
INSERT INTO `code` VALUES ('1419', '8076600', 'AJ', '城市燃气与热力工程', '1697', '1', '807', '1');
INSERT INTO `code` VALUES ('1420', '8076700', 'AJ', '土木工程施工技术及管理', '1698', '1', '807', '1');
INSERT INTO `code` VALUES ('1421', '8076800', 'AJ', '城市供用电技术', '1699', '1', '807', '1');
INSERT INTO `code` VALUES ('1422', '8076900', 'AJ', '城市水净化技术', '1700', '1', '807', '1');
INSERT INTO `code` VALUES ('1423', '8077000', 'AJ', '建筑设备安装与运行', '1701', '1', '807', '1');
INSERT INTO `code` VALUES ('1424', '8077100', 'AJ', '建筑水电设备工程', '1702', '1', '807', '1');
INSERT INTO `code` VALUES ('1425', '8077200', 'AJ', '市政工程', '1703', '1', '807', '1');
INSERT INTO `code` VALUES ('1426', '8077300', 'AJ', '建筑施工技术', '1704', '1', '807', '1');
INSERT INTO `code` VALUES ('1427', '8077400', 'AJ', '营房结构工程', '1705', '1', '807', '1');
INSERT INTO `code` VALUES ('1428', '8077500', 'AJ', '机场营房建筑与管理', '1706', '1', '807', '1');
INSERT INTO `code` VALUES ('1429', '8077600', 'AJ', '通风空调与给排水', '1707', '1', '807', '1');
INSERT INTO `code` VALUES ('1430', '8077700', 'AJ', '土木工程技术', '1708', '1', '807', '1');
INSERT INTO `code` VALUES ('1431', '8077800', 'AJ', '道路与桥梁工程', '1709', '1', '807', '1');
INSERT INTO `code` VALUES ('1432', '8077900', 'AJ', '建筑工程质量控制技术', '1710', '1', '807', '1');
INSERT INTO `code` VALUES ('1433', '8078000', 'AJ', '岩土工程施工与管理', '1711', '1', '807', '1');
INSERT INTO `code` VALUES ('1434', '8078100', 'AJ', '土木工程质量检测', '1712', '1', '807', '1');
INSERT INTO `code` VALUES ('1435', '8078200', 'AJ', '暖通空调设备及自动化', '1713', '1', '807', '1');
INSERT INTO `code` VALUES ('1436', '8078300', 'AJ', '土建类其他专业', '1714', '1', '807', '1');
INSERT INTO `code` VALUES ('1437', '808', 'AJ', '水利类', '1715', '1', '80', '0');
INSERT INTO `code` VALUES ('1438', '8080100', 'AJ', '水利水电工程', '1716', '1', '808', '1');
INSERT INTO `code` VALUES ('1439', '8080200', 'AJ', '水文与水资源工程', '1717', '1', '808', '1');
INSERT INTO `code` VALUES ('1440', '8080300', 'AJ', '港口航道与海岸工程', '1718', '1', '808', '1');
INSERT INTO `code` VALUES ('1441', '8080400', 'AJ', '港口海岸及治河工程', '1719', '1', '808', '1');
INSERT INTO `code` VALUES ('1442', '8084100', 'AJ', '水利工程', '1720', '1', '808', '1');
INSERT INTO `code` VALUES ('1443', '8084200', 'AJ', '水电站动力设备', '1721', '1', '808', '1');
INSERT INTO `code` VALUES ('1444', '8084300', 'AJ', '水电站设备及自动化', '1722', '1', '808', '1');
INSERT INTO `code` VALUES ('1445', '8084400', 'AJ', '水电站与水电网', '1723', '1', '808', '1');
INSERT INTO `code` VALUES ('1446', '8084500', 'AJ', '水利类其他专业', '1724', '1', '808', '1');
INSERT INTO `code` VALUES ('1447', '809', 'AJ', '测绘类', '1725', '1', '80', '0');
INSERT INTO `code` VALUES ('1448', '8090100', 'AJ', '测绘工程', '1726', '1', '809', '1');
INSERT INTO `code` VALUES ('1449', '8090200', 'AJ', '遥感科学与技术', '1727', '1', '809', '1');
INSERT INTO `code` VALUES ('1450', '8091700', 'AJ', '摄影测量与遥感', '1728', '1', '809', '1');
INSERT INTO `code` VALUES ('1451', '8091800', 'AJ', '地图与地理信息系统', '1729', '1', '809', '1');
INSERT INTO `code` VALUES ('1452', '8094100', 'AJ', '测量工程', '1730', '1', '809', '1');
INSERT INTO `code` VALUES ('1453', '8094200', 'AJ', '航空摄影测量', '1731', '1', '809', '1');
INSERT INTO `code` VALUES ('1454', '8094300', 'AJ', '地籍测量与土地管理', '1732', '1', '809', '1');
INSERT INTO `code` VALUES ('1455', '8094400', 'AJ', '环境监测', '1733', '1', '809', '1');
INSERT INTO `code` VALUES ('1456', '8094500', 'AJ', '环境治理工程', '1734', '1', '809', '1');
INSERT INTO `code` VALUES ('1457', '8094600', 'AJ', '港口及航道工程', '1735', '1', '809', '1');
INSERT INTO `code` VALUES ('1458', '8094700', 'AJ', '工程测量', '1736', '1', '809', '1');
INSERT INTO `code` VALUES ('1459', '8094800', 'AJ', '环境监测与治理', '1737', '1', '809', '1');
INSERT INTO `code` VALUES ('1460', '8094900', 'AJ', '光电测量', '1738', '1', '809', '1');
INSERT INTO `code` VALUES ('1461', '8095000', 'AJ', '大地测量', '1739', '1', '809', '1');
INSERT INTO `code` VALUES ('1462', '8095100', 'AJ', '军事工程测量', '1740', '1', '809', '1');
INSERT INTO `code` VALUES ('1463', '8095200', 'AJ', '地籍测量与管理', '1741', '1', '809', '1');
INSERT INTO `code` VALUES ('1464', '8095300', 'AJ', '海道测量', '1742', '1', '809', '1');
INSERT INTO `code` VALUES ('1465', '8095400', 'AJ', '地图印刷', '1743', '1', '809', '1');
INSERT INTO `code` VALUES ('1466', '8095500', 'AJ', '海图制图', '1744', '1', '809', '1');
INSERT INTO `code` VALUES ('1467', '8095600', 'AJ', '地图制图', '1745', '1', '809', '1');
INSERT INTO `code` VALUES ('1468', '8095700', 'AJ', '计算机制图', '1746', '1', '809', '1');
INSERT INTO `code` VALUES ('1469', '8095800', 'AJ', '环境监控技术', '1747', '1', '809', '1');
INSERT INTO `code` VALUES ('1470', '8095900', 'AJ', '现代测绘技术', '1748', '1', '809', '1');
INSERT INTO `code` VALUES ('1471', '8096000', 'AJ', '测绘类其他专业', '1749', '1', '809', '1');
INSERT INTO `code` VALUES ('1472', '810', 'AJ', '环境与安全类', '1750', '1', '80', '0');
INSERT INTO `code` VALUES ('1473', '8100100', 'AJ', '环境工程', '1751', '1', '810', '1');
INSERT INTO `code` VALUES ('1474', '8100200', 'AJ', '安全工程', '1752', '1', '810', '1');
INSERT INTO `code` VALUES ('1475', '8101800', 'AJ', '核技术与核安全（工程物理）', '1753', '1', '810', '1');
INSERT INTO `code` VALUES ('1476', '8101900', 'AJ', '化学防护工程', '1754', '1', '810', '1');
INSERT INTO `code` VALUES ('1477', '8102000', 'AJ', '伪装工程', '1755', '1', '810', '1');
INSERT INTO `code` VALUES ('1478', '8104100', 'AJ', '室内环境控制工程', '1756', '1', '810', '1');
INSERT INTO `code` VALUES ('1479', '8104200', 'AJ', '环境保护与监测', '1757', '1', '810', '1');
INSERT INTO `code` VALUES ('1480', '8104300', 'AJ', '室内环境工程与设计', '1758', '1', '810', '1');
INSERT INTO `code` VALUES ('1481', '8104400', 'AJ', '安全技术', '1759', '1', '810', '1');
INSERT INTO `code` VALUES ('1482', '8104500', 'AJ', '核潜艇环境工程', '1760', '1', '810', '1');
INSERT INTO `code` VALUES ('1483', '8104600', 'AJ', '环境净化与监测技术', '1761', '1', '810', '1');
INSERT INTO `code` VALUES ('1484', '8104700', 'AJ', '公路环境检测与保护', '1762', '1', '810', '1');
INSERT INTO `code` VALUES ('1485', '8104800', 'AJ', '环境与安全类其他专业', '1763', '1', '810', '1');
INSERT INTO `code` VALUES ('1486', '811', 'AJ', '化工与制药类', '1764', '1', '80', '0');
INSERT INTO `code` VALUES ('1487', '8110100', 'AJ', '化学工程与工艺', '1765', '1', '811', '1');
INSERT INTO `code` VALUES ('1488', '8110200', 'AJ', '制药工程', '1766', '1', '811', '1');
INSERT INTO `code` VALUES ('1489', '8110300', 'AJ', '化工与制药', '1767', '1', '811', '1');
INSERT INTO `code` VALUES ('1490', '8114100', 'AJ', '化工分析与监测', '1768', '1', '811', '1');
INSERT INTO `code` VALUES ('1491', '8114200', 'AJ', '化学工程', '1769', '1', '811', '1');
INSERT INTO `code` VALUES ('1492', '8114300', 'AJ', '化工工艺', '1770', '1', '811', '1');
INSERT INTO `code` VALUES ('1493', '8114400', 'AJ', '高分子化工', '1771', '1', '811', '1');
INSERT INTO `code` VALUES ('1494', '8114500', 'AJ', '精细化工', '1772', '1', '811', '1');
INSERT INTO `code` VALUES ('1495', '8114600', 'AJ', '工业分析', '1773', '1', '811', '1');
INSERT INTO `code` VALUES ('1496', '8114700', 'AJ', '化学制药', '1774', '1', '811', '1');
INSERT INTO `code` VALUES ('1497', '8114800', 'AJ', '中药制药', '1775', '1', '811', '1');
INSERT INTO `code` VALUES ('1498', '8114900', 'AJ', '生物化学工程', '1776', '1', '811', '1');
INSERT INTO `code` VALUES ('1499', '8115000', 'AJ', '石油化工工艺', '1777', '1', '811', '1');
INSERT INTO `code` VALUES ('1500', '8115100', 'AJ', '精细化工工艺', '1778', '1', '811', '1');
INSERT INTO `code` VALUES ('1501', '8115200', 'AJ', '电厂燃料及工质分析', '1779', '1', '811', '1');
INSERT INTO `code` VALUES ('1502', '8115300', 'AJ', '电镀工艺', '1780', '1', '811', '1');
INSERT INTO `code` VALUES ('1503', '8115400', 'AJ', '工业分析及仪器维修', '1781', '1', '811', '1');
INSERT INTO `code` VALUES ('1504', '8115500', 'AJ', '理化测试与质量管理', '1782', '1', '811', '1');
INSERT INTO `code` VALUES ('1505', '8115600', 'AJ', '生物制药', '1783', '1', '811', '1');
INSERT INTO `code` VALUES ('1506', '8115700', 'AJ', '工业分析与环境监测', '1784', '1', '811', '1');
INSERT INTO `code` VALUES ('1507', '8115800', 'AJ', '生物化工技术', '1785', '1', '811', '1');
INSERT INTO `code` VALUES ('1508', '8115900', 'AJ', '化工与制药类其他专业', '1786', '1', '811', '1');
INSERT INTO `code` VALUES ('1509', '812', 'AJ', '交通运输类', '1787', '1', '80', '0');
INSERT INTO `code` VALUES ('1510', '8120100', 'AJ', '交通运输', '1788', '1', '812', '1');
INSERT INTO `code` VALUES ('1511', '8120200', 'AJ', '交通工程', '1789', '1', '812', '1');
INSERT INTO `code` VALUES ('1512', '8120300', 'AJ', '油气储运工程', '1790', '1', '812', '1');
INSERT INTO `code` VALUES ('1513', '8120400', 'AJ', '飞行技术', '1791', '1', '812', '1');
INSERT INTO `code` VALUES ('1514', '8120500', 'AJ', '航海技术', '1792', '1', '812', '1');
INSERT INTO `code` VALUES ('1515', '8120600', 'AJ', '轮机工程', '1793', '1', '812', '1');
INSERT INTO `code` VALUES ('1516', '8120700', 'AJ', '物流工程', '1794', '1', '812', '1');
INSERT INTO `code` VALUES ('1517', '8120800', 'AJ', '海事管理', '1795', '1', '812', '1');
INSERT INTO `code` VALUES ('1518', '8124100', 'AJ', '海洋船舶驾驶', '1796', '1', '812', '1');
INSERT INTO `code` VALUES ('1519', '8124200', 'AJ', '轮机管理', '1797', '1', '812', '1');
INSERT INTO `code` VALUES ('1520', '8124300', 'AJ', '铁道运输', '1798', '1', '812', '1');
INSERT INTO `code` VALUES ('1521', '8124400', 'AJ', '汽车运用技术', '1799', '1', '812', '1');
INSERT INTO `code` VALUES ('1522', '8124500', 'AJ', '直升机驾驶', '1800', '1', '812', '1');
INSERT INTO `code` VALUES ('1523', '8124600', 'AJ', '民航运输', '1801', '1', '812', '1');
INSERT INTO `code` VALUES ('1524', '8124700', 'AJ', '油气集输技术', '1802', '1', '812', '1');
INSERT INTO `code` VALUES ('1525', '8124800', 'AJ', '城市轨道交通', '1803', '1', '812', '1');
INSERT INTO `code` VALUES ('1526', '8124900', 'AJ', '邮政运输', '1804', '1', '812', '1');
INSERT INTO `code` VALUES ('1527', '8125000', 'AJ', '城市燃气配输', '1805', '1', '812', '1');
INSERT INTO `code` VALUES ('1528', '8125100', 'AJ', '航空港安全检查', '1806', '1', '812', '1');
INSERT INTO `code` VALUES ('1529', '8125200', 'AJ', '航空油料储运与应用', '1807', '1', '812', '1');
INSERT INTO `code` VALUES ('1530', '8125300', 'AJ', '民航特种车辆维修', '1808', '1', '812', '1');
INSERT INTO `code` VALUES ('1531', '8125400', 'AJ', '运输动力机械管理', '1809', '1', '812', '1');
INSERT INTO `code` VALUES ('1532', '8125500', 'AJ', '国际航运业务管理', '1810', '1', '812', '1');
INSERT INTO `code` VALUES ('1533', '8125600', 'AJ', '外轮理货与港口业务', '1811', '1', '812', '1');
INSERT INTO `code` VALUES ('1534', '8125700', 'AJ', '机场设备运营管理', '1812', '1', '812', '1');
INSERT INTO `code` VALUES ('1535', '8125800', 'AJ', '港口物流设备与自动控制', '1813', '1', '812', '1');
INSERT INTO `code` VALUES ('1536', '8125900', 'AJ', '储运管理', '1814', '1', '812', '1');
INSERT INTO `code` VALUES ('1537', '8126000', 'AJ', '汽车运用与维修', '1815', '1', '812', '1');
INSERT INTO `code` VALUES ('1538', '8126100', 'AJ', '交通智能控制技术', '1816', '1', '812', '1');
INSERT INTO `code` VALUES ('1539', '8126200', 'AJ', '交通运输类其他专业', '1817', '1', '812', '1');
INSERT INTO `code` VALUES ('1540', '813', 'AJ', '海洋工程类', '1818', '1', '80', '0');
INSERT INTO `code` VALUES ('1541', '8130100', 'AJ', '船舶与海洋工程', '1819', '1', '813', '1');
INSERT INTO `code` VALUES ('1542', '8130200', 'AJ', '海洋工程类其他专业', '1820', '1', '813', '1');
INSERT INTO `code` VALUES ('1543', '814', 'AJ', '轻工纺织食品类', '1821', '1', '80', '0');
INSERT INTO `code` VALUES ('1544', '8140100', 'AJ', '食品科学与工程', '1822', '1', '814', '1');
INSERT INTO `code` VALUES ('1545', '8140200', 'AJ', '轻化工程', '1823', '1', '814', '1');
INSERT INTO `code` VALUES ('1546', '8140300', 'AJ', '包装工程', '1824', '1', '814', '1');
INSERT INTO `code` VALUES ('1547', '8140400', 'AJ', '印刷工程', '1825', '1', '814', '1');
INSERT INTO `code` VALUES ('1548', '8140500', 'AJ', '纺织工程', '1826', '1', '814', '1');
INSERT INTO `code` VALUES ('1549', '8140600', 'AJ', '服装设计与工程', '1827', '1', '814', '1');
INSERT INTO `code` VALUES ('1550', '8140700', 'AJ', '食品质量与安全', '1828', '1', '814', '1');
INSERT INTO `code` VALUES ('1551', '8140800', 'AJ', '酿酒工程', '1829', '1', '814', '1');
INSERT INTO `code` VALUES ('1552', '8142200', 'AJ', '军需工程', '1830', '1', '814', '1');
INSERT INTO `code` VALUES ('1553', '8144100', 'AJ', '农业机械化', '1831', '1', '814', '1');
INSERT INTO `code` VALUES ('1554', '8144200', 'AJ', '农产品贮运与加工', '1832', '1', '814', '1');
INSERT INTO `code` VALUES ('1555', '8144300', 'AJ', '冷冻冷藏工程', '1833', '1', '814', '1');
INSERT INTO `code` VALUES ('1556', '8144400', 'AJ', '印刷技术', '1834', '1', '814', '1');
INSERT INTO `code` VALUES ('1557', '8144500', 'AJ', '烟草工程', '1835', '1', '814', '1');
INSERT INTO `code` VALUES ('1558', '8144600', 'AJ', '香料香精工艺', '1836', '1', '814', '1');
INSERT INTO `code` VALUES ('1559', '8144700', 'AJ', '食品工艺', '1837', '1', '814', '1');
INSERT INTO `code` VALUES ('1560', '8144800', 'AJ', '乳品工艺', '1838', '1', '814', '1');
INSERT INTO `code` VALUES ('1561', '8144900', 'AJ', '包装技术', '1839', '1', '814', '1');
INSERT INTO `code` VALUES ('1562', '8145000', 'AJ', '彩色印刷设备及工艺', '1840', '1', '814', '1');
INSERT INTO `code` VALUES ('1563', '8145100', 'AJ', '彩色电子制版', '1841', '1', '814', '1');
INSERT INTO `code` VALUES ('1564', '8145200', 'AJ', '印刷设备工程', '1842', '1', '814', '1');
INSERT INTO `code` VALUES ('1565', '8145300', 'AJ', '印刷图文信息处理', '1843', '1', '814', '1');
INSERT INTO `code` VALUES ('1566', '8145400', 'AJ', '化妆品与美容', '1844', '1', '814', '1');
INSERT INTO `code` VALUES ('1567', '8145500', 'AJ', '丝绸工程', '1845', '1', '814', '1');
INSERT INTO `code` VALUES ('1568', '8145600', 'AJ', '染整工程', '1846', '1', '814', '1');
INSERT INTO `code` VALUES ('1569', '8145700', 'AJ', '纺织材料及纺织品设计', '1847', '1', '814', '1');
INSERT INTO `code` VALUES ('1570', '8145800', 'AJ', '服装', '1848', '1', '814', '1');
INSERT INTO `code` VALUES ('1571', '8145900', 'AJ', '纺织工艺', '1849', '1', '814', '1');
INSERT INTO `code` VALUES ('1572', '8146000', 'AJ', '纺织品设计', '1850', '1', '814', '1');
INSERT INTO `code` VALUES ('1573', '8146100', 'AJ', '服装工艺', '1851', '1', '814', '1');
INSERT INTO `code` VALUES ('1574', '8146200', 'AJ', '化学纤维', '1852', '1', '814', '1');
INSERT INTO `code` VALUES ('1575', '8146300', 'AJ', '鞋类设计与工艺', '1853', '1', '814', '1');
INSERT INTO `code` VALUES ('1576', '8146400', 'AJ', '电子出版', '1854', '1', '814', '1');
INSERT INTO `code` VALUES ('1577', '8146500', 'AJ', '电脑图文处理与制版', '1855', '1', '814', '1');
INSERT INTO `code` VALUES ('1578', '8146600', 'AJ', '食品加工', '1856', '1', '814', '1');
INSERT INTO `code` VALUES ('1579', '8146700', 'AJ', '发酵工艺', '1857', '1', '814', '1');
INSERT INTO `code` VALUES ('1580', '8146800', 'AJ', '发酵工程', '1858', '1', '814', '1');
INSERT INTO `code` VALUES ('1581', '1', 'XL', '全日制本科及以上', '857', '1', '-1', '1');
INSERT INTO `code` VALUES ('1582', '2', 'XL', '全日制硕士研究生及以上', '858', '1', '-1', '1');
INSERT INTO `code` VALUES ('1583', '3', 'XL', '大专以上', '859', '1', '-1', '1');
INSERT INTO `code` VALUES ('1584', 'A', 'MC', '专技资格外语考试级别代码', '114', '1', '-1', '0');
INSERT INTO `code` VALUES ('1585', '1', 'MC', '大学外语专业考试', '115', '1', 'A', '0');
INSERT INTO `code` VALUES ('1586', '11', 'MC', '大学外语专业考试笔试', '116', '1', '1', '0');
INSERT INTO `code` VALUES ('1587', '111', 'MC', '大学外语专业笔试八级', '117', '1', '11', '1');
INSERT INTO `code` VALUES ('1588', '112', 'MC', '大学外语专业笔试四级', '118', '1', '11', '1');
INSERT INTO `code` VALUES ('1589', '12', 'MC', '大学外语专业考试口试', '119', '1', '1', '0');
INSERT INTO `code` VALUES ('1590', '121', 'MC', '大学外语专业口试八级', '120', '1', '12', '1');
INSERT INTO `code` VALUES ('1591', '122', 'MC', '大学外语专业口试四级', '121', '1', '12', '1');
INSERT INTO `code` VALUES ('1592', '2', 'MC', '大学非外语专业考试', '122', '1', 'A', '0');
INSERT INTO `code` VALUES ('1593', '21', 'MC', '大学非外语专业考试笔试', '123', '1', '2', '0');
INSERT INTO `code` VALUES ('1594', '212', 'MC', '大学四级', '124', '1', '21', '1');
INSERT INTO `code` VALUES ('1595', '213', 'MC', '大学六级', '125', '1', '21', '1');
INSERT INTO `code` VALUES ('1596', '22', 'MC', '大学非外语专业考试口试', '126', '1', '2', '0');
INSERT INTO `code` VALUES ('1597', '221', 'MC', '大学外语四、六级考试、口语考试A等', '127', '1', '22', '1');
INSERT INTO `code` VALUES ('1598', '222', 'MC', '大学外语四、六级考试、口语考试B等', '128', '1', '22', '1');
INSERT INTO `code` VALUES ('1599', '3', 'MC', '全国外语等级', '129', '1', 'A', '0');
INSERT INTO `code` VALUES ('1600', '301', 'MC', '全国外语等级考试五级', '130', '1', '3', '1');
INSERT INTO `code` VALUES ('1601', '302', 'MC', '全国外语等级考试四级', '131', '1', '3', '1');
INSERT INTO `code` VALUES ('1602', '303', 'MC', '全国外语等级考试三级', '132', '1', '3', '1');
INSERT INTO `code` VALUES ('1603', '304', 'MC', '全国外语等级考试二级', '133', '1', '3', '1');
INSERT INTO `code` VALUES ('1604', '305', 'MC', '全国外语等级考试一级', '134', '1', '3', '1');
INSERT INTO `code` VALUES ('1605', '306', 'MC', '全国外语等级考试一级(B)', '135', '1', '3', '1');
INSERT INTO `code` VALUES ('1606', '4', 'MC', '全国职称外语考试', '136', '1', 'A', '0');
INSERT INTO `code` VALUES ('1607', '401', 'MC', '全国职称外语考试A级', '137', '1', '4', '1');
INSERT INTO `code` VALUES ('1608', '402', 'MC', '全国职称外语考试B级', '138', '1', '4', '1');
INSERT INTO `code` VALUES ('1609', '403', 'MC', '全国职称外语考试C级', '139', '1', '4', '1');
INSERT INTO `code` VALUES ('1610', '0', 'MD', '计算机应用考试等级代码', '92', '1', '-1', '0');
INSERT INTO `code` VALUES ('1611', '1', 'MD', '办公自动化', '93', '1', '0', '1');
INSERT INTO `code` VALUES ('1612', '2', 'MD', '上海高校计算机等级', '94', '1', '0', '1');
INSERT INTO `code` VALUES ('1613', '201', 'MD', '上海高校计算机一级', '95', '1', '2', '1');
INSERT INTO `code` VALUES ('1614', '202', 'MD', '上海高校计算机二级', '96', '1', '2', '1');
INSERT INTO `code` VALUES ('1615', '203', 'MD', '上海高校计算机三级', '97', '1', '2', '1');
INSERT INTO `code` VALUES ('1616', '3', 'MD', '全国高校计算机等级', '98', '1', '0', '0');
INSERT INTO `code` VALUES ('1617', '301', 'MD', '全国高校计算机一级', '99', '1', '3', '1');
INSERT INTO `code` VALUES ('1618', '302', 'MD', '全国高校计算机二级', '100', '1', '3', '1');
INSERT INTO `code` VALUES ('1619', '303', 'MD', '全国高校计算机三级', '101', '1', '3', '1');
INSERT INTO `code` VALUES ('1620', '304', 'MD', '全国高校计算机四级', '102', '1', '3', '1');
INSERT INTO `code` VALUES ('1621', '4', 'MD', 'Ｄ级', '103', '1', '0', '1');
INSERT INTO `code` VALUES ('1622', '6', 'MD', '全国计算机技术与软件专业技术资格（水平）考试', '104', '1', '0', '0');
INSERT INTO `code` VALUES ('1623', '601', 'MD', '初级程序员级', '105', '1', '6', '1');
INSERT INTO `code` VALUES ('1624', '602', 'MD', '程序员级', '106', '1', '6', '1');
INSERT INTO `code` VALUES ('1625', '603', 'MD', '高级程序员级', '107', '1', '6', '1');
INSERT INTO `code` VALUES ('1626', '604', 'MD', '系统分析员', '108', '1', '6', '1');
INSERT INTO `code` VALUES ('1627', '7', 'MD', '全国计算机及信息高新技术培训考试', '109', '1', '0', '0');
INSERT INTO `code` VALUES ('1628', '701', 'MD', '初级', '110', '1', '7', '1');
INSERT INTO `code` VALUES ('1629', '702', 'MD', '中级', '111', '1', '7', '1');
INSERT INTO `code` VALUES ('1630', '703', 'MD', '高级', '112', '1', '7', '1');
INSERT INTO `code` VALUES ('1631', '8', 'MD', '职称计算机考试', '113', '1', '-1', '1');
INSERT INTO `code` VALUES ('1632', '01', 'XZ', '事业', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('1633', '02', 'XZ', '企业', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('1634', '0', 'GS', '未公示', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('1635', '1', 'GS', '已公示', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('1636', '01', 'FKJG', '确定参加', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('1637', '02', 'FKJG', '放弃参加', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('1638', '03', 'FKJG', '未反馈', '3', '1', '-1', '1');
INSERT INTO `code` VALUES ('1639', '0', 'SCJG', '待报', '1', '1', '-1', '1');
INSERT INTO `code` VALUES ('1640', '1', 'SCJG', '待审', '2', '1', '-1', '1');
INSERT INTO `code` VALUES ('1641', '2', 'SCJG', '通过', '3', '1', '-1', '1');
INSERT INTO `code` VALUES ('1642', '3', 'SCJG', '不通过', '4', '1', '-1', '1');
INSERT INTO `code` VALUES ('1643', '01', 'JTGX', '父亲', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1644', '02', 'JTGX', '母亲', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1645', '03', 'JTGX', '儿子', '3', '1', '0', '1');
INSERT INTO `code` VALUES ('1646', '04', 'JTGX', '女儿', '4', '1', '0', '1');
INSERT INTO `code` VALUES ('1647', '05', 'JTGX', '兄弟', '5', '1', '0', '1');
INSERT INTO `code` VALUES ('1648', '06', 'JTGX', '姐妹', '6', '1', '0', '1');
INSERT INTO `code` VALUES ('1649', '07', 'JTGX', '其他', '7', '1', '0', '1');
INSERT INTO `code` VALUES ('1650', '1', 'ZBMC', '第一组', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1651', '2', 'ZBMC', '第二组', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1652', '3', 'ZBMC', '第三组', '3', '1', '0', '1');
INSERT INTO `code` VALUES ('1653', '4', 'ZBMC', '第四组', '4', '1', '0', '1');
INSERT INTO `code` VALUES ('1654', '5', 'ZBMC', '第五组', '5', '1', '0', '1');
INSERT INTO `code` VALUES ('1655', '6', 'ZBMC', '第六组', '6', '1', '0', '1');
INSERT INTO `code` VALUES ('1656', '7', 'ZBMC', '第七组', '7', '1', '0', '1');
INSERT INTO `code` VALUES ('1657', '8', 'ZBMC', '第八组', '8', '1', '0', '1');
INSERT INTO `code` VALUES ('1658', '9', 'ZBMC', '第九组', '9', '1', '0', '1');
INSERT INTO `code` VALUES ('1659', '10', 'ZBMC', '第十组', '10', '1', '0', '1');
INSERT INTO `code` VALUES ('1660', '1', 'KGLB', '主考官', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1661', '2', 'KGLB', '固定考官', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1662', '3', 'KGLB', '监督员', '3', '1', '0', '1');
INSERT INTO `code` VALUES ('1663', '1', 'KGSX', '公务员考官', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1664', '2', 'KGSX', '其他考官', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1665', '1', 'YDZK', '未读', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1666', '2', 'YDZK', '已读', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1667', '0', 'KSJG', '待处理', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1668', '1', 'KSJG', '通过', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1669', '2', 'KSJG', '不通过', '3', '1', '0', '1');
INSERT INTO `code` VALUES ('1670', '3', 'KSJG', '无成绩', '4', '1', '0', '1');
INSERT INTO `code` VALUES ('1671', '0', 'SFHG', '无数据', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1672', '1', 'SFHG', '合格', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1673', '2', 'SFHG', '不合格', '3', '1', '0', '1');
INSERT INTO `code` VALUES ('1674', '1', 'SFTG', '通过', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1675', '2', 'SFTG', '不通过', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1676', '0', 'KSJG1', '待审', '1', '1', '0', '1');
INSERT INTO `code` VALUES ('1677', '1', 'KSJG1', '通过', '2', '1', '0', '1');
INSERT INTO `code` VALUES ('1678', '2', 'KSJG1', '不通过', '3', '1', '0', '1');

-- ----------------------------
-- Table structure for comnotice
-- ----------------------------
DROP TABLE IF EXISTS `comnotice`;
CREATE TABLE `comnotice` (
  `cmID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cmTitle` varchar(255) DEFAULT NULL COMMENT '标题',
  `cmContent` text COMMENT '内容',
  `cmFlag` varchar(50) DEFAULT NULL COMMENT '标识',
  PRIMARY KEY (`cmID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comnotice
-- ----------------------------
INSERT INTO `comnotice` VALUES ('1', '考生分组安排通知示例', '<p><span>perName</span><span>考生：</span></p><p><span>祝贺你获得</span><span></span><span>recYear</span><span>XXXXXX人才招聘的考试资格。</span><span>&nbsp;</span></p><p><span>您作为</span><span>perGroupSet</span><span>考生。现定于gstStartEnd</span><span>（考试时间），在</span><span>gstItvPlace</span><span>（考试地点）</span><span>进行考试（考试包括面试和笔试）。</span></p><p><strong><span>请带好下列证件：</span></strong></p><p><span></span></p><p><span><strong><span>&nbsp; &nbsp; 1.</span></strong><strong><span>准考证。&nbsp;&nbsp; 2.身份证原件及复印件（正反面）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 3.</span></strong><strong><span>学生证原件（应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 4.</span></strong><strong><span>学历和学位证书原件（非应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 5.</span></strong><strong><span>留学回国人员需出具教育部留学服务中心颁发的学历认证。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 6.</span></strong><strong><span>北京地区的考生，需携带来沪车票及本人银行借记卡以便给予补贴。</span></strong></span></p><p><strong><span>注意事项：</span></strong></p><p><span>1.&nbsp;</span><span>考试等候时间较长，建议考生自带书籍、报刊等纸质读物。</span></p><p><span>2.</span><span>考生不得携带任何电子产品（手机除外）。</span></p><p><span>3.地点XXXXXXX学校。</span></p><p><span>4.考试时间为一天，上下午分别进行笔试和面试。</span></p><p><span>5.请提前30分钟到达考场等候，</span><strong><span>考试开始后仍未报到者视为自动放弃。</span></strong><strong><span>&nbsp;</span></strong></p><p><span>特此通知。</span></p><p><br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>XXXXXXXXXXXX</span><span> <br></span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>gstItvStartTime</span></p>', 'flow4_step4');
INSERT INTO `comnotice` VALUES ('2', '考生体检安排通知示例', '<p><span>perName</span><span>考生：</span></p><p><span>祝贺你获得</span><span></span><span>recYear</span><span>XXXXXX人才招聘的体检资格。</span><span>&nbsp;</span></p><p><span>现定于medStartEnd</span><span>（体检时间），在medPlace</span><span>（体检地点）</span><span>进行体检。</span></p><p><strong><span>请带好下列证件：</span></strong></p><p><span></span></p><p><span><strong><span>&nbsp; &nbsp; 1.</span></strong><strong><span>准考证。&nbsp;&nbsp; 2.身份证原件及复印件（正反面）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 3.</span></strong><strong><span>学生证原件（应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 4.</span></strong><strong><span>学历和学位证书原件（非应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 5.</span></strong><strong><span>留学回国人员需出具教育部留学服务中心颁发的学历认证。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 6.</span></strong><strong><span>北京地区的考生，需携带来沪车票及本人银行借记卡以便给予补贴。</span></strong></span></p><p><br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>XXXXXXXXXXXX</span><span> <br></span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>medStartTime</span></p>', 'flow5_step1');

-- ----------------------------
-- Table structure for eduset
-- ----------------------------
DROP TABLE IF EXISTS `eduset`;
CREATE TABLE `eduset` (
  `eduID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教育经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `eduStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `eduEnd` timestamp NULL DEFAULT NULL COMMENT '终止时间',
  `eduSchool` varchar(255) NOT NULL COMMENT '在何学校',
  `eduMajor` varchar(128) DEFAULT NULL,
  `eduPost` varchar(255) DEFAULT NULL COMMENT '任职职务',
  `eduBurseHonorary` text COMMENT '奖学金及荣誉称号',
  PRIMARY KEY (`eduID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eduset
-- ----------------------------
INSERT INTO `eduset` VALUES ('1', '2', '2010-10-26 14:24:57', '2015-10-26 14:25:03', 'sasasa', '', '2112', '1212121212');
INSERT INTO `eduset` VALUES ('2', '2', '2016-10-26 14:25:23', '2017-10-26 14:25:30', 'dsds', null, 'dsds', 'dsdsds');

-- ----------------------------
-- Table structure for examiner
-- ----------------------------
DROP TABLE IF EXISTS `examiner`;
CREATE TABLE `examiner` (
  `exmID` int(11) NOT NULL AUTO_INCREMENT COMMENT '考官ID',
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `exmName` varchar(60) NOT NULL COMMENT '考官姓名',
  `exmType` int(1) DEFAULT NULL COMMENT '考官类别（1=主考官，2=固定考官，3=监督员）',
  `exmCom` varchar(255) NOT NULL COMMENT '考官所在单位',
  `exmPost` varchar(255) NOT NULL COMMENT '考官职务',
  `exmPhone` varchar(20) NOT NULL COMMENT '考官手机号码',
  `exmCertNo` varchar(60) NOT NULL COMMENT '考官证书编号',
  `exmAttr` int(1) DEFAULT NULL COMMENT '考官属性（1=公务员局考官，2=其他考官）',
  `exmTime` varchar(20) DEFAULT NULL COMMENT '到岗时间',
  PRIMARY KEY (`exmID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of examiner
-- ----------------------------
INSERT INTO `examiner` VALUES ('3', '1', '杨明', '2', '浙江大学', '大学教授', '12525252525', '001002MKJ', '2', '2017-10-31');
INSERT INTO `examiner` VALUES ('4', '1', '李生', '1', '浙江大学', '院长', '12525362362', '00100AXC', '1', '');
INSERT INTO `examiner` VALUES ('5', '1', '刘尚', '3', '上海公务员局', '招生部长', '15265869652', '001002AHY', '2', '2017-10-31');
INSERT INTO `examiner` VALUES ('6', '1', '程海', '1', '上海公务员局', '人事部长', '13285716129', '001002ASD', '1', '2017-10-31');

-- ----------------------------
-- Table structure for famset
-- ----------------------------
DROP TABLE IF EXISTS `famset`;
CREATE TABLE `famset` (
  `famID` int(11) NOT NULL AUTO_INCREMENT COMMENT '家庭成员ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `famRelation` varchar(64) NOT NULL COMMENT '成员关系',
  `famName` varchar(64) NOT NULL COMMENT '成员姓名',
  `famCom` varchar(64) DEFAULT NULL COMMENT '所在工作单位',
  `famPost` varchar(64) DEFAULT NULL COMMENT '任职岗位',
  PRIMARY KEY (`famID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of famset
-- ----------------------------

-- ----------------------------
-- Table structure for flow_job_1
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_1`;
CREATE TABLE `flow_job_1` (
  `perID` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员ID',
  `perName` varchar(255) NOT NULL COMMENT '姓名',
  `perIDCard` varchar(32) NOT NULL COMMENT '身份证号',
  `perPhone` varchar(11) NOT NULL COMMENT '手机号码',
  `perPhoto` varchar(255) NOT NULL COMMENT '照片',
  `perGender` int(1) DEFAULT NULL COMMENT '性别',
  `perNation` varchar(64) NOT NULL COMMENT '民族',
  `perOrigin` varchar(128) NOT NULL COMMENT '籍贯',
  `perPolitica` varchar(64) NOT NULL COMMENT '政治面貌',
  `perWorkPlace` varchar(255) NOT NULL COMMENT '现工作单位',
  `perMarried` varchar(64) NOT NULL COMMENT '婚姻状况',
  `perBirth` varchar(128) DEFAULT NULL COMMENT '出生年月',
  `perHeight` int(11) DEFAULT NULL COMMENT '身高',
  `perWeight` decimal(8,2) DEFAULT NULL COMMENT '体重',
  `perUniversity` varchar(255) DEFAULT NULL COMMENT '毕业院校',
  `perDegree` varchar(128) DEFAULT NULL COMMENT '学位',
  `perMajor` varchar(128) DEFAULT NULL COMMENT '专业',
  `perEducation` varchar(64) DEFAULT NULL COMMENT '学历',
  `perForeignLang` varchar(64) DEFAULT NULL COMMENT '外语水平',
  `perComputerLevel` varchar(64) DEFAULT NULL COMMENT '计算机水平',
  `perEduPlace` varchar(128) DEFAULT NULL COMMENT '毕业生生源地',
  `perEmePhone` varchar(11) DEFAULT NULL COMMENT '紧急人联系电话',
  `perEmail` varchar(128) DEFAULT NULL COMMENT '电子邮箱',
  `perPostCode` varchar(32) DEFAULT NULL COMMENT '邮政编码',
  `perAddr` varchar(255) DEFAULT NULL COMMENT '联系地址',
  `perMark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `perIndex` varchar(255) NOT NULL COMMENT '报名序号',
  `perJob` varchar(64) NOT NULL COMMENT '应聘岗位性质',
  `perTicketNo` varchar(128) NOT NULL COMMENT '准考证号',
  `perGroupSet` varchar(20) NOT NULL COMMENT '所属组别',
  `perStatus` int(1) NOT NULL DEFAULT '0' COMMENT '状态（0=待报，1=待审，2=审核通过，3=审核不通过）',
  `perCheckTime` timestamp NULL DEFAULT NULL COMMENT '审核时间',
  `perReason` varchar(255) DEFAULT NULL COMMENT '审核不通过原因',
  `perPub` int(1) NOT NULL DEFAULT '0' COMMENT '资格审查公示结果（0=未公示，1=已公示）',
  `perReResult1` varchar(64) NOT NULL DEFAULT '03' COMMENT '资格审查反馈结果(是否参加考试)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup1` varchar(255) NOT NULL COMMENT '资格审查反馈原因(是否参加考试反馈原因)',
  `perReTime1` timestamp NULL DEFAULT NULL COMMENT '资格审查反馈时间(是否参加考试反馈时间)',
  `perPub2` int(1) NOT NULL DEFAULT '0' COMMENT '考生分组及通知(是否通知【公示】)（0=未通知，1=已通知）',
  `perRead2` int(1) NOT NULL DEFAULT '1' COMMENT '考生分组及通知（通知阅读情况【1=未读，2=已读】）',
  `perReResult2` varchar(64) NOT NULL DEFAULT '03' COMMENT '考生分组及通知反馈结果【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup2` varchar(255) NOT NULL COMMENT '考生分组及通知反馈原因',
  `perReTime2` timestamp NULL DEFAULT NULL COMMENT '考生分组及通知反馈时间',
  `perViewScore` varchar(64) DEFAULT NULL COMMENT '面试成绩',
  `perPenScore` varchar(64) DEFAULT NULL COMMENT '笔试成绩',
  `perExamResult` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果【0=待处理，1=通过，2=不通过】',
  `perGradePub` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果录入及公示(成绩是否公布)（0=未公布，1=已公布）',
  `perPub3` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果录入及公示(考试结果是否公示)（0=未公示，1=已公示）',
  `perRead3` int(1) NOT NULL DEFAULT '1' COMMENT '考试结果录入及公示（通知阅读情况【1=未读，2=已读】）',
  `perReResult3` varchar(64) NOT NULL DEFAULT '03' COMMENT '考试结果录入及公示(是否参加体检)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup3` varchar(255) NOT NULL COMMENT '考生分组及通知反馈原因(是否参加体检反馈原因)',
  `perReTime3` timestamp NULL DEFAULT NULL COMMENT '考生分组及通知反馈时间(是否参加体检反馈时间)',
  `perPub4` int(1) NOT NULL DEFAULT '0' COMMENT '体检安排公示（0=未公示，1=已公示）',
  `perRead4` int(1) NOT NULL DEFAULT '1' COMMENT '体检安排（通知阅读情况【1=未读，2=已读】）',
  `perReResult4` varchar(64) NOT NULL DEFAULT '03' COMMENT '体检安排(是否参加体检)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup4` varchar(255) NOT NULL COMMENT '体检安排(是否参加体检反馈原因)',
  `perReTime4` timestamp NULL DEFAULT NULL COMMENT '体检安排(是否参加体检反馈时间)',
  `perMedCheck1` int(1) NOT NULL DEFAULT '0' COMMENT '体检结果（0=无数据，1=合格，2=不合格）',
  `perMedCheck2` int(1) NOT NULL DEFAULT '0' COMMENT '复查结果（0=无数据，1=合格，2=不合格）',
  `perMedCheck3` int(1) DEFAULT NULL COMMENT '体检最终结果（1=通过，2=不通过）',
  `perMedMark` varchar(255) NOT NULL COMMENT '体检信息备注',
  `perPub5` int(1) NOT NULL DEFAULT '0' COMMENT '体检结果录入公示（0=未公示，1=已公示）',
  `perRead5` int(1) NOT NULL DEFAULT '1' COMMENT '体检结果录入（通知阅读情况【1=未读，2=已读】）',
  `perReResult5` varchar(64) NOT NULL DEFAULT '03' COMMENT '体检结果录入(是否参加政审)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup5` varchar(255) NOT NULL COMMENT '体检结果录入(是否参加政审反馈原因)',
  `perReTime5` timestamp NULL DEFAULT NULL COMMENT '体检结果录入(是否参加政审反馈时间)',
  `perCarefulMark` varchar(255) NOT NULL COMMENT '政审备注信息',
  `perCarefulStatus` int(1) NOT NULL DEFAULT '0' COMMENT '政审结果（0=待审，1=通过，2=不通过）',
  `perPub6` int(1) NOT NULL DEFAULT '0' COMMENT '政审是否公示（0=未公示，1=已公示）',
  `perRead6` int(1) NOT NULL DEFAULT '1' COMMENT '政审通知阅读情况【1=未读，2=已读】',
  `perBack` int(1) NOT NULL DEFAULT '0' COMMENT '报名主动撤回次数（最多三次）',
  `perCarefulReson` varchar(255) DEFAULT NULL COMMENT '政审不通过原因',
  `perCarefulTime` timestamp NULL DEFAULT NULL COMMENT '政审审核时间',
  PRIMARY KEY (`perID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_1
-- ----------------------------
INSERT INTO `flow_job_1` VALUES ('4', '李建林', '362330199208122410', '13285716129', './uploadfile/image/201701/1509068601.jpeg', '1', '01', '23_230100', '10', '', '10', '2017-10-25 00:00:00', null, null, '东华理工大学', '4_401', '304_3040200', '1', '1_11', '3_301', '23_230100', '18720989539', '2319048747@qq.com', '333110', '浙江杭州', 'dsdsdsdsd', '0004', '01', '201701010004', '1', '2', '2017-10-27 20:40:48', '', '1', '01', '', '2017-10-27 20:43:55', '1', '2', '02', '临时有事', '2017-11-04 17:11:08', null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('5', 'dd', '320621199112163729', '13816591074', './uploadfile/image/201701/1509106414.jpeg', '2', '01', '31_310101', '01', '', '10', '2017-10-27', null, null, 'fdfdsfd', '1_101', '10_101', '1', '3_301', '7_701', '33_330100', '13816591074', '2319048747@qq.com', '333110', 'dsdfdf', 'asfdf是第三方', '0005', '02', '', '', '3', '2017-10-27 20:41:25', '潇洒发放', '1', '03', '', null, '0', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('6', '朱蔚云', '330522198712231025', '15250998698', './uploadfile/image/201701/1509106642.jpeg', '1', '01', '11_110100', '03', '', '10', '2007-10-27', null, null, 'we反对反对', '3_301', '101_1010100', '1', '3_301', '3_301', '12_120100', '', '2319048747@qq.com', '333110', '撒反对反对', '发送地方递四方速递', '0006', '01', '201701010006', '1', '2', '2017-10-27 20:40:48', null, '1', '01', '', '2017-11-06 09:46:39', '1', '2', '01', '', '2017-11-06 09:46:42', '90.00', '90.00', '1', '1', '1', '1', '03', '', null, '1', '1', '03', '', null, '1', '0', '1', '', '1', '1', '03', '', null, '发个非官方', '1', '1', '1', '0', '', '2017-11-09 14:15:40');
INSERT INTO `flow_job_1` VALUES ('7', '肖大鹏', '511102198012290013', '18516146044', './uploadfile/image/201701/1509106844.jpeg', '1', '01', '12_120100', '08', '', '20', '1984-10-27', null, null, 'fsdf', '4_401', '20_201', '1', '3_301', '3_301', '31_310101', '18516146044', '2319048747@qq.com', '333110', 'fdsfdsfd', '发发的规划合格机具款口干口苦个', '0007', '01', '201701010007', '2', '2', '2017-10-27 20:40:48', null, '1', '02', '自身原因', '2017-11-03 22:30:44', '1', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('8', '梅雪娇', '331022198508200022', '15821376007', './uploadfile/image/201701/1509107020.jpeg', '2', '01', '13_130100', '03', '', '21', '1992-10-27', null, null, 'fdfdf', '1_101', '10_101', '1', '22_221', '6_601', '12_120100', '15821376007', '2319048747@qq.com', '333110', '大发沙发垫付发送佛挡杀佛', '是范德萨范德萨', '0008', '02', '201701020008', '2', '2', '2017-10-27 20:40:48', null, '1', '01', '', '2017-11-03 22:31:46', '1', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('9', '多少度', '211103198302040325', '15821376007', './uploadfile/image/201701/1509107156.jpeg', '1', '01', '11_110100', '09', '', '10', '1994-10-27', null, null, '撒发放的', '4_401', '302_3020100', '1', '11_111', '6_601', '11_110100', '15821376007', '15821376007@qq.com', '333110', 'asdfdsf', '爱消除vftytyytry突然又突然一天人员突然一天', '0009', '01', '', '', '3', '2017-10-27 20:41:25', '潇洒发放', '1', '03', '', null, '0', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('10', '是', '650104199311300020', '15902195925', './uploadfile/image/201701/1509107293.jpeg', '1', '02', '12_120100', '02', '', '20', '1998-10-27', null, null, 'dsdsd', '2_201', '401_4010100', '2', '3_301', '6_601', '32_320100', '15902195925', '15902195925@qq.com', '333110', 'sdasd', '大时代撒多撒多多付多付过过过过过过过过过过过过过过过过过过', '0010', '02', '', '', '3', '2017-10-27 20:41:25', '潇洒发放', '1', '03', '', null, '0', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('11', '王晨莹', '370781199101240523', '15221879360', './uploadfile/image/201701/1509107425.jpeg', '1', '01', '31_310101', '03', '', '10', '1993-10-27', null, null, '辅导费', '2_201', '201_2010100', '3', '21_212', '6_601', '13_130100', '15221879360', '15221879360@qq.com', '333110', 'sas在线咨询', '阿萨德我问他问题', '0011', '01', '201701010011', '3', '2', '2017-10-27 20:40:48', null, '1', '03', '', null, '1', '1', '03', '', null, null, null, '0', '0', '0', '1', '03', '', null, '0', '1', '03', '', null, '0', '0', null, '', '0', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('12', '周云龙', '341181199109043017', '18811302610', './uploadfile/image/201701/1509107562.jpeg', '2', '02', '65_650100', '05', '', '23', '1995-10-27', null, null, 'dsdsds', '2_201', '101_1010100', '1', '22_221', '7_701', '12_120100', '18811302610', '18811302610@qq.com', '333110', '的发的顺丰到付大幅度', '师傅的师傅', '0012', '02', '201701020012', '3', '2', '2017-10-27 20:40:48', null, '1', '01', '', '2017-11-04 17:13:24', '1', '2', '01', '', '2017-11-04 17:13:29', '80.00', '89.00', '1', '1', '1', '2', '01', '', '2017-11-08 14:25:57', '1', '2', '01', '', '2017-11-08 14:26:01', '0', '2', '2', '', '1', '1', '03', '', null, '', '0', '0', '1', '0', null, null);
INSERT INTO `flow_job_1` VALUES ('13', '刘思思', '310101198704040029', '18017365698', './uploadfile/image/201701/1509107693.jpeg', '2', '01', '35_350100', '12', '', '10', '1996-03-27', null, null, 'dsdsd', '4_401', '303_3030100', '3', '4_401', '3_301', '54_540100', '18017365698', '18017365698@qq.com', '333110', 's陈小春宣传宣传', '参差荇菜错错错错错错错错错错错错错错', '0013', '01', '201701010013', '4', '2', '2017-10-27 20:40:48', null, '1', '01', '', '2017-11-07 14:27:03', '1', '2', '01', '', '2017-11-06 09:44:53', '90', '98', '1', '1', '1', '2', '02', '可能没有时间', '2017-11-07 14:25:33', '1', '2', '01', '', '2017-11-08 14:23:57', '0', '1', '1', '', '1', '2', '01', '', '2017-11-08 22:01:40', '', '1', '1', '1', '0', '', '2017-11-09 14:15:40');
INSERT INTO `flow_job_1` VALUES ('14', '邱祎琛', '310110199505195619', '15221652505', './uploadfile/image/201701/1509107830.jpeg', '2', '01', '23_230100', '12', '', '10', '1992-10-27', null, null, '范德萨范德萨', '1_101', '402_4020100', '2', '3_301', '3_301', '62_620100', '15221652505', '15221652505@qq.com', '333110', '防守打法的是', '的师傅的师傅', '0014', '02', '201701020014', '4', '2', '2017-10-27 20:40:48', null, '1', '01', '', '2017-11-07 14:05:50', '1', '2', '01', '', '2017-11-06 09:45:42', '88', '86', '1', '1', '1', '2', '01', '', '2017-11-07 14:23:49', '1', '2', '02', '个人原因', '2017-11-08 14:25:01', '1', '0', '1', '', '1', '2', '02', '家中有事', '2017-11-08 22:02:43', '', '2', '1', '2', '0', '放弃参加', '2017-11-09 14:16:09');

-- ----------------------------
-- Table structure for flow_job_2
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_2`;
CREATE TABLE `flow_job_2` (
  `perID` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员ID',
  `perName` varchar(255) NOT NULL COMMENT '姓名',
  `perIDCard` varchar(32) NOT NULL COMMENT '身份证号',
  `perPhone` varchar(11) NOT NULL COMMENT '手机号码',
  `perPhoto` varchar(255) NOT NULL COMMENT '照片',
  `perGender` int(1) DEFAULT NULL COMMENT '性别',
  `perNation` varchar(64) NOT NULL COMMENT '民族',
  `perOrigin` varchar(128) NOT NULL COMMENT '籍贯',
  `perPolitica` varchar(64) NOT NULL COMMENT '政治面貌',
  `perWorkPlace` varchar(255) NOT NULL COMMENT '现工作单位',
  `perMarried` varchar(64) NOT NULL COMMENT '婚姻状况',
  `perBirth` varchar(128) DEFAULT NULL COMMENT '出生年月',
  `perHeight` int(11) DEFAULT NULL COMMENT '身高',
  `perWeight` decimal(8,2) DEFAULT NULL COMMENT '体重',
  `perUniversity` varchar(255) DEFAULT NULL COMMENT '毕业院校',
  `perDegree` varchar(128) DEFAULT NULL COMMENT '学位',
  `perMajor` varchar(128) DEFAULT NULL COMMENT '专业',
  `perEducation` varchar(64) DEFAULT NULL COMMENT '学历',
  `perForeignLang` varchar(64) DEFAULT NULL COMMENT '外语水平',
  `perComputerLevel` varchar(64) DEFAULT NULL COMMENT '计算机水平',
  `perEduPlace` varchar(128) DEFAULT NULL COMMENT '毕业生生源地',
  `perEmePhone` varchar(11) DEFAULT NULL COMMENT '紧急人联系电话',
  `perEmail` varchar(128) DEFAULT NULL COMMENT '电子邮箱',
  `perPostCode` varchar(32) DEFAULT NULL COMMENT '邮政编码',
  `perAddr` varchar(255) DEFAULT NULL COMMENT '联系地址',
  `perMark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `perIndex` varchar(255) NOT NULL COMMENT '报名序号',
  `perJob` varchar(64) NOT NULL COMMENT '应聘岗位性质',
  `perBack` int(1) NOT NULL DEFAULT '0' COMMENT '报名主动撤回次数（最多三次，三次后不允许撤回）',
  `perTicketNo` varchar(128) NOT NULL COMMENT '准考证号',
  `perGroupSet` varchar(20) NOT NULL COMMENT '所属组别',
  `perStatus` int(1) NOT NULL DEFAULT '0' COMMENT '状态（0=待报，1=待审，2=审核通过，3=审核不通过）',
  `perCheckTime` timestamp NULL DEFAULT NULL COMMENT '审核时间',
  `perReason` varchar(255) DEFAULT NULL COMMENT '审核不通过原因',
  `perPub` int(1) NOT NULL DEFAULT '0' COMMENT '资格审查公示结果（0=未公示，1=已公示）',
  `perReResult1` varchar(64) NOT NULL DEFAULT '03' COMMENT '资格审查反馈结果(是否参加考试)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup1` varchar(255) NOT NULL COMMENT '资格审查反馈原因(是否参加考试反馈原因)',
  `perReTime1` timestamp NULL DEFAULT NULL COMMENT '资格审查反馈时间(是否参加考试反馈时间)',
  `perPub2` int(1) NOT NULL DEFAULT '0' COMMENT '考生分组及通知(是否通知【公示】)（0=未通知，1=已通知）',
  `perRead2` int(1) NOT NULL DEFAULT '1' COMMENT '考生分组及通知（通知阅读情况【1=未读，2=已读】）',
  `perReResult2` varchar(64) NOT NULL DEFAULT '03' COMMENT '考生分组及通知反馈结果【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup2` varchar(255) NOT NULL COMMENT '考生分组及通知反馈原因',
  `perReTime2` timestamp NULL DEFAULT NULL COMMENT '考生分组及通知反馈时间',
  `perViewScore` varchar(64) DEFAULT NULL COMMENT '面试成绩',
  `perPenScore` varchar(64) DEFAULT NULL COMMENT '笔试成绩',
  `perExamResult` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果【0=待处理，1=通过，2=不通过】',
  `perGradePub` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果录入及公示(成绩是否公布)（0=未公布，1=已公布）',
  `perPub3` int(1) NOT NULL DEFAULT '0' COMMENT '考试结果录入及公示(考试结果是否公示)（0=未公示，1=已公示）',
  `perRead3` int(1) NOT NULL DEFAULT '1' COMMENT '考试结果录入及公示（通知阅读情况【1=未读，2=已读】）',
  `perReResult3` varchar(64) NOT NULL DEFAULT '03' COMMENT '考试结果录入及公示(是否参加体检)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup3` varchar(255) NOT NULL COMMENT '考生分组及通知反馈原因(是否参加体检反馈原因)',
  `perReTime3` timestamp NULL DEFAULT NULL COMMENT '考生分组及通知反馈时间(是否参加体检反馈时间)',
  `perPub4` int(1) NOT NULL DEFAULT '0' COMMENT '体检安排公示（0=未公示，1=已公示）',
  `perRead4` int(1) NOT NULL DEFAULT '1' COMMENT '体检安排（通知阅读情况【1=未读，2=已读】）',
  `perReResult4` varchar(64) NOT NULL DEFAULT '03' COMMENT '体检安排(是否参加体检)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup4` varchar(255) NOT NULL COMMENT '体检安排(是否参加体检反馈原因)',
  `perReTime4` timestamp NULL DEFAULT NULL COMMENT '体检安排(是否参加体检反馈时间)',
  `perMedCheck1` int(1) NOT NULL DEFAULT '0' COMMENT '体检结果（0=无数据，1=合格，2=不合格）',
  `perMedCheck2` int(1) NOT NULL DEFAULT '0' COMMENT '复查结果（0=无数据，1=合格，2=不合格）',
  `perMedCheck3` int(1) DEFAULT NULL COMMENT '体检最终结果（1=通过，2=不通过）',
  `perMedMark` varchar(255) NOT NULL COMMENT '体检信息备注',
  `perPub5` int(1) NOT NULL DEFAULT '0' COMMENT '体检结果录入公示（0=未公示，1=已公示）',
  `perRead5` int(1) NOT NULL DEFAULT '1' COMMENT '体检结果录入（通知阅读情况【1=未读，2=已读】）',
  `perReResult5` varchar(64) NOT NULL DEFAULT '03' COMMENT '体检结果录入(是否参加政审)【01=确定参加，02=放弃参加，03=未反馈】',
  `perReGiveup5` varchar(255) NOT NULL COMMENT '体检结果录入(是否参加政审反馈原因)',
  `perReTime5` timestamp NULL DEFAULT NULL COMMENT '体检结果录入(是否参加政审反馈时间)',
  `perCarefulMark` varchar(255) NOT NULL COMMENT '政审备注信息',
  `perCarefulStatus` int(1) NOT NULL DEFAULT '0' COMMENT '政审结果（0=待审，1=通过，2=不通过）',
  `perCarefulReson` varchar(255) DEFAULT NULL COMMENT '政审不通过原因',
  `perCarefulTime` timestamp NULL DEFAULT NULL COMMENT '政审审核时间',
  `perPub6` int(1) NOT NULL DEFAULT '0' COMMENT '政审是否公示（0=未公示，1=已公示）',
  `perRead6` int(1) NOT NULL DEFAULT '1' COMMENT '政审通知阅读情况【1=未读，2=已读】',
  PRIMARY KEY (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_2
-- ----------------------------

-- ----------------------------
-- Table structure for flow_job_set_edu_1
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_edu_1`;
CREATE TABLE `flow_job_set_edu_1` (
  `eduID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教育经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `eduStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `eduEnd` timestamp NULL DEFAULT NULL COMMENT '终止时间',
  `eduSchool` varchar(255) NOT NULL COMMENT '在何学校',
  `eduMajor` varchar(128) DEFAULT NULL,
  `eduPost` varchar(255) DEFAULT NULL COMMENT '任职职务',
  `eduBurseHonorary` text COMMENT '奖学金及荣誉称号',
  PRIMARY KEY (`eduID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_edu_1
-- ----------------------------
INSERT INTO `flow_job_set_edu_1` VALUES ('5', '4', '2010-10-26 00:00:00', '2015-10-26 00:00:00', 'XXX学校', '304_3040100', '班长', '1212121212');
INSERT INTO `flow_job_set_edu_1` VALUES ('6', '4', '2016-10-26 00:00:00', '2017-10-26 00:00:00', '浙江大学', '304_3040100', '团委', '国家一级奖学金');
INSERT INTO `flow_job_set_edu_1` VALUES ('8', '4', '2008-10-26 00:00:00', '2015-07-26 00:00:00', '是多少', '101_1010100', '大叔大婶', '法规法规的发苟富贵sdsadsadsad');
INSERT INTO `flow_job_set_edu_1` VALUES ('10', '5', '2012-10-27 00:00:00', '2013-10-27 00:00:00', '但是反对', '10_101', '辅导费', '否第三方第三方地方地方');
INSERT INTO `flow_job_set_edu_1` VALUES ('11', '5', '2016-10-27 00:00:00', '2017-10-27 00:00:00', '佛挡杀佛', '101_1010100', '胜多负少的', '防守打法多福多寿似懂非懂');
INSERT INTO `flow_job_set_edu_1` VALUES ('12', '6', '2002-10-27 00:00:00', '2007-10-27 00:00:00', '防守打法的', '701_7010100', '丰富的', '佛挡杀佛打发打发打发');
INSERT INTO `flow_job_set_edu_1` VALUES ('13', '6', '2010-06-27 00:00:00', '2017-10-27 00:00:00', '辅导费', '813_8130100', '辅导辅导', '发的顺丰到付大幅度否');
INSERT INTO `flow_job_set_edu_1` VALUES ('14', '7', '1989-10-27 00:00:00', '2011-10-27 00:00:00', '固定发光飞碟', '30_301', '古典风格', '固定发光飞碟过分过分地方规定gfdg \nfgdfgdfg fg风格风格风格');
INSERT INTO `flow_job_set_edu_1` VALUES ('15', '7', '2007-10-27 00:00:00', '2017-10-27 00:00:00', '固定古典风格', '301_3010100', '古典风格否', '高度分工的风格的风格分割发给对方规范');
INSERT INTO `flow_job_set_edu_1` VALUES ('16', '8', '2003-10-27 00:00:00', '2010-10-27 00:00:00', '佛挡杀佛', '101_1010100', '发生的', '是非得失发光飞碟规范');
INSERT INTO `flow_job_set_edu_1` VALUES ('17', '9', '2012-10-27 00:00:00', '2014-10-27 00:00:00', '古典风格', '716_7160100', '古典风格', '古典风格的发个梵蒂冈梵蒂冈');
INSERT INTO `flow_job_set_edu_1` VALUES ('18', '10', '2004-10-27 00:00:00', '2008-10-27 00:00:00', '大时代', '201_2010100', '大叔大婶', '');
INSERT INTO `flow_job_set_edu_1` VALUES ('19', '11', '2005-10-27 00:00:00', '2008-10-27 00:00:00', '奥术大师多', '813_8130100', '大时代', '多撒大所多撒多撒的');
INSERT INTO `flow_job_set_edu_1` VALUES ('20', '12', '2004-10-27 00:00:00', '2006-10-27 00:00:00', '傻傻', '201_2010100', '', '大大是大时代');
INSERT INTO `flow_job_set_edu_1` VALUES ('21', '13', '2009-10-27 00:00:00', '2011-10-27 00:00:00', '撒大声地', '813_8130100', '撒大声地', '多撒大所多撒多撒多');
INSERT INTO `flow_job_set_edu_1` VALUES ('22', '14', '2002-10-27 00:00:00', '2011-10-27 00:00:00', '地方的发生', '715_7150100', '', '');

-- ----------------------------
-- Table structure for flow_job_set_edu_2
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_edu_2`;
CREATE TABLE `flow_job_set_edu_2` (
  `eduID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教育经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `eduStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `eduEnd` timestamp NULL DEFAULT NULL COMMENT '终止时间',
  `eduSchool` varchar(255) NOT NULL COMMENT '在何学校',
  `eduMajor` varchar(128) DEFAULT NULL,
  `eduPost` varchar(255) DEFAULT NULL COMMENT '任职职务',
  `eduBurseHonorary` text COMMENT '奖学金及荣誉称号',
  PRIMARY KEY (`eduID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_edu_2
-- ----------------------------

-- ----------------------------
-- Table structure for flow_job_set_fam_1
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_fam_1`;
CREATE TABLE `flow_job_set_fam_1` (
  `famID` int(11) NOT NULL AUTO_INCREMENT COMMENT '家庭成员ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `famRelation` varchar(64) NOT NULL COMMENT '成员关系',
  `famName` varchar(64) NOT NULL COMMENT '成员姓名',
  `famCom` varchar(64) DEFAULT NULL COMMENT '所在工作单位',
  `famPost` varchar(64) DEFAULT NULL COMMENT '任职岗位',
  PRIMARY KEY (`famID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_fam_1
-- ----------------------------
INSERT INTO `flow_job_set_fam_1` VALUES ('3', '4', '02', 'aaaaaa', 'dsdsd', 'dsdsd');
INSERT INTO `flow_job_set_fam_1` VALUES ('4', '4', '01', 'dsds', 'dsds', 'dsdsd');
INSERT INTO `flow_job_set_fam_1` VALUES ('5', '5', '01', '打发打发', '佛挡杀佛', '对对对');
INSERT INTO `flow_job_set_fam_1` VALUES ('6', '5', '02', '大幅度', '打发打发', '打发打发');
INSERT INTO `flow_job_set_fam_1` VALUES ('7', '6', '02', '辅导费', '辅导辅导', '防守打法');
INSERT INTO `flow_job_set_fam_1` VALUES ('8', '6', '01', '发的方法的', '辅导费', '大幅度');
INSERT INTO `flow_job_set_fam_1` VALUES ('9', '6', '05', '地方', ' 辅导辅导无法', '个复古风格');
INSERT INTO `flow_job_set_fam_1` VALUES ('10', '7', '04', '个地方', '古典风格', '');
INSERT INTO `flow_job_set_fam_1` VALUES ('11', '7', '01', '刚发的', ' 古典风格电饭锅发的', '个地方古典风格电饭锅否');
INSERT INTO `flow_job_set_fam_1` VALUES ('12', '8', '01', '发的', '辅导费', '地方');
INSERT INTO `flow_job_set_fam_1` VALUES ('13', '8', '02', '发生的', ' 佛挡杀佛地方', ' 范德萨范德萨发地方');
INSERT INTO `flow_job_set_fam_1` VALUES ('14', '9', '02', '苟富贵', '苟富贵', '苟富贵');
INSERT INTO `flow_job_set_fam_1` VALUES ('15', '10', '01', '大时代', ' 大时代', '大时代');
INSERT INTO `flow_job_set_fam_1` VALUES ('16', '11', '02', '但是', '是多少', '大时代');
INSERT INTO `flow_job_set_fam_1` VALUES ('17', '12', '01', '是', '多少', ' 大时代');
INSERT INTO `flow_job_set_fam_1` VALUES ('18', '12', '02', '多少', '速度', '撒大声地');
INSERT INTO `flow_job_set_fam_1` VALUES ('19', '13', '01', '防守打法', '防守打法', '');
INSERT INTO `flow_job_set_fam_1` VALUES ('20', '14', '01', '大幅度', '发的', '打发打发');

-- ----------------------------
-- Table structure for flow_job_set_fam_2
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_fam_2`;
CREATE TABLE `flow_job_set_fam_2` (
  `famID` int(11) NOT NULL AUTO_INCREMENT COMMENT '家庭成员ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `famRelation` varchar(64) NOT NULL COMMENT '成员关系',
  `famName` varchar(64) NOT NULL COMMENT '成员姓名',
  `famCom` varchar(64) DEFAULT NULL COMMENT '所在工作单位',
  `famPost` varchar(64) DEFAULT NULL COMMENT '任职岗位',
  PRIMARY KEY (`famID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_fam_2
-- ----------------------------

-- ----------------------------
-- Table structure for flow_job_set_work_1
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_work_1`;
CREATE TABLE `flow_job_set_work_1` (
  `wkID` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `wkStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `wkEnd` timestamp NULL DEFAULT NULL COMMENT '截止时间',
  `wkPost` varchar(255) NOT NULL COMMENT '所在岗位',
  `wkCom` varchar(255) NOT NULL COMMENT '所在单位',
  `wkInfo` text NOT NULL COMMENT '工作简述',
  PRIMARY KEY (`wkID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_work_1
-- ----------------------------
INSERT INTO `flow_job_set_work_1` VALUES ('4', '4', '2017-10-26 00:00:00', '2017-10-26 00:00:00', 'dssd', 'dsds', 'dsds');
INSERT INTO `flow_job_set_work_1` VALUES ('5', '4', '2016-10-26 00:00:00', '2017-10-26 00:00:00', 'fdfdf', 'dfdf', 'fdfdfggfgfgfg');
INSERT INTO `flow_job_set_work_1` VALUES ('6', '5', '2011-10-27 00:00:00', '2015-10-27 00:00:00', '辅导费', '防守打法的', '发送打发打发打发东方闪电范德萨发生地方');
INSERT INTO `flow_job_set_work_1` VALUES ('7', '5', '2014-10-27 00:00:00', '2017-10-27 00:00:00', '但是反对', '佛挡杀佛', '范德萨范德萨发打发打发打发打广告覆盖');
INSERT INTO `flow_job_set_work_1` VALUES ('8', '6', '2007-10-27 00:00:00', '2011-10-27 00:00:00', '辅导辅导', '发的顺丰到付', '辅导辅导费德国法国风格');
INSERT INTO `flow_job_set_work_1` VALUES ('9', '6', '2012-10-27 00:00:00', '2017-10-27 00:00:00', '防守打法', '防守打法地方', '范德萨范德萨发大幅度');
INSERT INTO `flow_job_set_work_1` VALUES ('10', '7', '2007-10-27 00:00:00', '2017-10-27 00:00:00', '公告', '固定', '的发个梵蒂冈梵蒂冈');
INSERT INTO `flow_job_set_work_1` VALUES ('11', '8', '2007-10-27 00:00:00', '2017-10-27 00:00:00', '地方', '防守打法', ' 是的范德萨发递四方速递的地方');
INSERT INTO `flow_job_set_work_1` VALUES ('12', '9', '2009-06-27 00:00:00', '2017-10-27 00:00:00', '东风股份', '个电饭锅的费', '规范规定发的高度分工的风格的风格');
INSERT INTO `flow_job_set_work_1` VALUES ('13', '10', '2012-10-27 00:00:00', '2017-10-27 00:00:00', '颠三倒四多', '大时代', '啥答案多多多多多多多多多多多多多多多多多多多多多多多多');
INSERT INTO `flow_job_set_work_1` VALUES ('14', '11', '2007-10-27 00:00:00', '2013-10-27 00:00:00', '大时代', '大叔大婶', '啊实打实的');
INSERT INTO `flow_job_set_work_1` VALUES ('15', '12', '2007-10-27 00:00:00', '2017-10-27 00:00:00', '大时代', '第三代', '撒大声地所');
INSERT INTO `flow_job_set_work_1` VALUES ('16', '13', '2007-10-27 00:00:00', '2015-10-27 00:00:00', '复古风格', '傻傻', '撒大声地防守打法');
INSERT INTO `flow_job_set_work_1` VALUES ('17', '14', '2013-10-27 00:00:00', '2017-10-27 00:00:00', '水电费', '防守打法', '发送地方递四方速递发');

-- ----------------------------
-- Table structure for flow_job_set_work_2
-- ----------------------------
DROP TABLE IF EXISTS `flow_job_set_work_2`;
CREATE TABLE `flow_job_set_work_2` (
  `wkID` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `wkStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `wkEnd` timestamp NULL DEFAULT NULL COMMENT '截止时间',
  `wkPost` varchar(255) NOT NULL COMMENT '所在岗位',
  `wkCom` varchar(255) NOT NULL COMMENT '所在单位',
  `wkInfo` text NOT NULL COMMENT '工作简述',
  PRIMARY KEY (`wkID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_job_set_work_2
-- ----------------------------

-- ----------------------------
-- Table structure for gstexm
-- ----------------------------
DROP TABLE IF EXISTS `gstexm`;
CREATE TABLE `gstexm` (
  `gstexmID` int(11) NOT NULL AUTO_INCREMENT,
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `gstID` int(11) NOT NULL COMMENT '组别ID',
  `exmID` int(11) NOT NULL COMMENT '考官ID',
  PRIMARY KEY (`gstexmID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gstexm
-- ----------------------------
INSERT INTO `gstexm` VALUES ('29', '1', '6', '4');
INSERT INTO `gstexm` VALUES ('31', '1', '6', '6');

-- ----------------------------
-- Table structure for medical
-- ----------------------------
DROP TABLE IF EXISTS `medical`;
CREATE TABLE `medical` (
  `medID` int(11) NOT NULL AUTO_INCREMENT COMMENT '体检安排ID',
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `medStartTime` varchar(20) NOT NULL COMMENT '体检开始时间',
  `medEndTime` varchar(20) NOT NULL COMMENT '体检截止时间',
  `medPlace` varchar(255) NOT NULL COMMENT '体检地点',
  `medStartEnd` varchar(255) DEFAULT NULL COMMENT '辅助字段',
  PRIMARY KEY (`medID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of medical
-- ----------------------------
INSERT INTO `medical` VALUES ('5', '1', '2017-11-08 00:00:00', '2017-11-09 00:00:00', '地方', '2017-11-08 00:00:00 至 2017-11-09 00:00:00');

-- ----------------------------
-- Table structure for noticemb
-- ----------------------------
DROP TABLE IF EXISTS `noticemb`;
CREATE TABLE `noticemb` (
  `ntsID` bigint(20) NOT NULL AUTO_INCREMENT,
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `ntsTitle` varchar(100) NOT NULL COMMENT '标题',
  `ntsContent` text COMMENT '内容',
  `ntsType` tinyint(1) DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`ntsID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of noticemb
-- ----------------------------
INSERT INTO `noticemb` VALUES ('1', '1', '考生考试安排', '<p><span>perName</span><span>考生：</span></p><p><span>祝贺你获得</span><span></span><span>recYear</span><span>XXXXXX人才招聘的考试资格。</span><span>&nbsp;</span></p><p><span>您作为</span><span>perGroupSet</span><span>考生。现定于gstStartEnd</span><span>（考试时间），在</span><span>gstItvPlace</span><span>（考试地点）</span><span>进行考试（考试包括面试和笔试）。</span></p><p><strong><span>请带好下列证件：</span></strong></p><p><span></span></p><p><span><strong><span>&nbsp; &nbsp; 1.</span></strong><strong><span>准考证。&nbsp;&nbsp; 2.身份证原件及复印件（正反面）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 3.</span></strong><strong><span>学生证原件（应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 4.</span></strong><strong><span>学历和学位证书原件（非应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 5.</span></strong><strong><span>留学回国人员需出具教育部留学服务中心颁发的学历认证。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 6.</span></strong><strong><span>北京地区的考生，需携带来沪车票及本人银行借记卡以便给予补贴。</span></strong></span></p><p><strong><span>注意事项：</span></strong></p><p><span>1.&nbsp;</span><span>考试等候时间较长，建议考生自带书籍、报刊等纸质读物。</span></p><p><span>2.</span><span>考生不得携带任何电子产品（手机除外）。</span></p><p><span>3.地点XXXXXXX学校。</span></p><p><span>4.考试时间为一天，上下午分别进行笔试和面试。</span></p><p><span>5.请提前30分钟到达考场等候，</span><strong><span>考试开始后仍未报到者视为自动放弃。</span></strong><strong><span>&nbsp;</span></strong></p><p><span>特此通知。</span></p><p><br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>XXXXXXXXXXXX</span><span> <br></span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>gstItvStartTime</span></p>', '1');
INSERT INTO `noticemb` VALUES ('4', '1', '考生体检安排', '<p><span>perName</span><span>考生：</span></p><p><span>祝贺你获得</span><span></span><span>recYear</span><span>XXXXXX人才招聘的体检资格。</span><span>&nbsp;</span></p><p><span>现定于medStartEnd</span><span>（体检时间），在medPlace</span><span>（体检地点）</span><span>进行体检。</span></p><p><strong><span>请带好下列证件：</span></strong></p><p><span></span></p><p><span><strong><span>&nbsp; &nbsp; 1.</span></strong><strong><span>准考证。&nbsp;&nbsp; 2.身份证原件及复印件（正反面）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 3.</span></strong><strong><span>学生证原件（应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 4.</span></strong><strong><span>学历和学位证书原件（非应届毕业生）。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 5.</span></strong><strong><span>留学回国人员需出具教育部留学服务中心颁发的学历认证。</span></strong></span></p><p><span><strong><span>&nbsp; &nbsp; 6.</span></strong><strong><span>北京地区的考生，需携带来沪车票及本人银行借记卡以便给予补贴。</span></strong></span></p><p><br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>XXXXXXXXXXXX</span><span> <br></span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>medStartTime</span></p>', '2');

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `perID` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员ID',
  `perName` varchar(255) NOT NULL COMMENT '姓名',
  `perIDCard` varchar(32) NOT NULL COMMENT '身份证号',
  `perPhone` varchar(11) NOT NULL COMMENT '手机号码',
  `perPhoto` varchar(255) NOT NULL COMMENT '照片',
  `perGender` int(1) DEFAULT NULL COMMENT '性别',
  `perNation` varchar(64) NOT NULL COMMENT '民族',
  `perOrigin` varchar(128) NOT NULL COMMENT '籍贯',
  `perPolitica` varchar(64) NOT NULL COMMENT '政治面貌',
  `perWorkPlace` varchar(255) NOT NULL COMMENT '现工作单位',
  `perMarried` varchar(64) NOT NULL COMMENT '婚姻状况',
  `perBirth` timestamp NULL DEFAULT NULL COMMENT '出生年月',
  `perHeight` decimal(4,2) DEFAULT NULL COMMENT '身高',
  `perWeight` decimal(4,2) DEFAULT NULL COMMENT '体重',
  `perUniversity` varchar(255) DEFAULT NULL COMMENT '毕业院校',
  `perDegree` varchar(128) DEFAULT NULL COMMENT '学位',
  `perMajor` varchar(128) DEFAULT NULL COMMENT '专业',
  `perEducation` varchar(64) DEFAULT NULL COMMENT '学历',
  `perForeignLang` varchar(64) DEFAULT NULL COMMENT '外语水平',
  `perComputerLevel` varchar(64) DEFAULT NULL COMMENT '计算机水平',
  `perEduPlace` varchar(128) DEFAULT NULL COMMENT '毕业生生源地',
  `perEmePhone` varchar(11) DEFAULT NULL COMMENT '紧急人联系电话',
  `perEmail` varchar(128) DEFAULT NULL COMMENT '电子邮箱',
  `perPostCode` varchar(32) DEFAULT NULL COMMENT '邮政编码',
  `perAddr` varchar(255) DEFAULT NULL COMMENT '联系地址',
  `perMark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `perJob` varchar(64) DEFAULT NULL COMMENT '应聘岗位性质',
  PRIMARY KEY (`perID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('2', '李建林', '362330199208122410', '13285716129', './uploadfile/image/201701/1509068601.jpeg', '1', '01', '23_230100', '10', '', '10', '2017-10-25 00:00:00', null, null, '东华理工大学', '4_401', '304_3040100', '1', '1_11', '3_301', '23_230100', '18720989539', '2319048747@qq.com', '333110', 'dfsdfdsfdf', 'fdfdfdf', '01');
INSERT INTO `person` VALUES ('3', 'dd', '320621199112163729', '13816591074', './uploadfile/image/201701/1509106414.jpeg', '2', '01', '31_310101', '01', '', '10', '2017-10-27 00:00:00', null, null, 'fdfdsfd', '1_101', '10_101', '1', '3_301', '7_701', '33_330100', '13816591074', '2319048747@qq.com', '333110', 'dsdfdf', 'asfdf是第三方', '02');
INSERT INTO `person` VALUES ('4', '朱蔚云', '330522198712231025', '15250998698', './uploadfile/image/201701/1509106642.jpeg', '1', '01', '11_110100', '03', '', '10', '2007-10-27 00:00:00', null, null, 'we反对反对', '3_301', '101_1010100', '1', '3_301', '3_301', '12_120100', '', '2319048747@qq.com', '333110', '撒反对反对', '发送地方递四方速递', '01');
INSERT INTO `person` VALUES ('5', '肖大鹏', '511102198012290013', '18516146044', './uploadfile/image/201701/1509106844.jpeg', '1', '01', '12_120100', '08', '', '20', '1984-10-27 00:00:00', null, null, 'fsdf', '4_401', '20_201', '1', '3_301', '3_301', '31_310101', '18516146044', '2319048747@qq.com', '333110', 'fdsfdsfd', '发发的规划合格机具款口干口苦个', '01');
INSERT INTO `person` VALUES ('6', '梅雪娇', '331022198508200022', '15821376007', './uploadfile/image/201701/1509107020.jpeg', '2', '01', '13_130100', '03', '', '21', '1992-10-27 00:00:00', null, null, 'fdfdf', '1_101', '10_101', '1', '22_221', '6_601', '12_120100', '15821376007', '2319048747@qq.com', '333110', '大发沙发垫付发送佛挡杀佛', '是范德萨范德萨', '02');
INSERT INTO `person` VALUES ('7', '多少度', '211103198302040325', '15821376007', './uploadfile/image/201701/1509107156.jpeg', '1', '01', '11_110100', '09', '', '10', '1994-10-27 00:00:00', null, null, '撒发放的', '4_401', '302_3020100', '1', '11_111', '6_601', '11_110100', '15821376007', '15821376007@qq.com', '333110', 'asdfdsf', '爱消除vftytyytry突然又突然一天人员突然一天', '01');
INSERT INTO `person` VALUES ('8', '是', '650104199311300020', '15902195925', './uploadfile/image/201701/1509107293.jpeg', '1', '02', '12_120100', '02', '', '20', '1998-10-27 00:00:00', null, null, 'dsdsd', '2_201', '401_4010100', '2', '3_301', '6_601', '32_320100', '15902195925', '15902195925@qq.com', '333110', 'sdasd', '大时代撒多撒多多付多付过过过过过过过过过过过过过过过过过过', '02');
INSERT INTO `person` VALUES ('9', '王晨莹', '370781199101240523', '15221879360', './uploadfile/image/201701/1509107425.jpeg', '1', '01', '31_310101', '03', '', '10', '1993-10-27 00:00:00', null, null, '辅导费', '2_201', '201_2010100', '3', '21_212', '6_601', '13_130100', '15221879360', '15221879360@qq.com', '333110', 'sas在线咨询', '阿萨德我问他问题', '01');
INSERT INTO `person` VALUES ('10', '周云龙', '341181199109043017', '18811302610', './uploadfile/image/201701/1509107562.jpeg', '2', '02', '65_650100', '05', '', '23', '1995-10-27 00:00:00', null, null, 'dsdsds', '2_201', '101_1010100', '1', '22_221', '7_701', '12_120100', '18811302610', '18811302610@qq.com', '333110', '的发的顺丰到付大幅度', '师傅的师傅', '02');
INSERT INTO `person` VALUES ('11', '刘思思', '310101198704040029', '18017365698', './uploadfile/image/201701/1509107693.jpeg', '2', '01', '35_350100', '12', '', '10', '1996-03-27 00:00:00', null, null, 'dsdsd', '4_401', '303_3030100', '3', '4_401', '3_301', '54_540100', '18017365698', '18017365698@qq.com', '333110', 's陈小春宣传宣传', '参差荇菜错错错错错错错错错错错错错错', '01');
INSERT INTO `person` VALUES ('12', '邱祎琛', '310110199505195619', '15221652505', './uploadfile/image/201701/1509107830.jpeg', '2', '01', '23_230100', '12', '', '10', '1992-10-27 00:00:00', null, null, '范德萨范德萨', '1_101', '402_4020100', '2', '3_301', '3_301', '62_620100', '15221652505', '15221652505@qq.com', '333110', '防守打法的是', '的师傅的师傅', '02');

-- ----------------------------
-- Table structure for qumextra
-- ----------------------------
DROP TABLE IF EXISTS `qumextra`;
CREATE TABLE `qumextra` (
  `qraID` int(11) NOT NULL AUTO_INCREMENT COMMENT '额外通知ID',
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `qraPassMsg` varchar(255) NOT NULL COMMENT '审核通过额外信息',
  `qraPassType` int(1) DEFAULT NULL COMMENT '审核通过信息显示位置（1=追加已有前面，2=追加已有后面，3=追加已有前面并换行，4=追加已有后面并换行，5=重新编辑通知信息（换行已@字符分割））',
  `qraNoPassMsg` varchar(255) NOT NULL COMMENT '审核不通过额外信息',
  `qraNoPassType` int(1) DEFAULT NULL COMMENT '审核通过信息显示位置（1=追加已有前面，2=追加已有后面，3=追加已有前面并换行，4=追加已有后面并换行，5=重新编辑通知信息（换行已@字符分割））',
  PRIMARY KEY (`qraID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qumextra
-- ----------------------------
INSERT INTO `qumextra` VALUES ('7', '1', '请于11月20号到25号查看考试安排相关通知', '2', '敬请期待下次招聘！', '4');

-- ----------------------------
-- Table structure for reback
-- ----------------------------
DROP TABLE IF EXISTS `reback`;
CREATE TABLE `reback` (
  `rbID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '反馈ID',
  `uid` bigint(20) NOT NULL COMMENT '用户ID',
  `rbContent` text COMMENT '反馈信息',
  `rbTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '反馈时间',
  `rbReadStatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已读（0=未读，1=已读，2=删除）',
  PRIMARY KEY (`rbID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reback
-- ----------------------------
INSERT INTO `reback` VALUES ('2', '2', 'dfskdfsdhfsfsdhfksdhfsdfsdf', '2017-12-05 21:38:09', '0');
INSERT INTO `reback` VALUES ('3', '2', 'fdsfsdfsdf', '2017-12-05 21:38:46', '0');
INSERT INTO `reback` VALUES ('4', '2', 'gfgfdgdfg', '2017-12-05 21:40:53', '0');
INSERT INTO `reback` VALUES ('5', '2', 'tetetert', '2017-12-05 21:41:37', '0');
INSERT INTO `reback` VALUES ('6', '2', 'gfgdfgdf', '2017-12-05 21:42:59', '0');

-- ----------------------------
-- Table structure for recruit
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
CREATE TABLE `recruit` (
  `recID` int(11) NOT NULL AUTO_INCREMENT COMMENT '招聘ID',
  `recYear` varchar(50) NOT NULL COMMENT '招聘年度',
  `recBatch` varchar(50) NOT NULL COMMENT '招聘批次',
  `recDefault` int(1) NOT NULL DEFAULT '0' COMMENT '是否进行中',
  `recStart` timestamp NULL DEFAULT NULL COMMENT '招聘起始时间',
  `recEnd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '招聘终止时间',
  `recViewPlace` varchar(255) NOT NULL COMMENT '面试地点',
  `recHealthPlace` varchar(255) NOT NULL COMMENT '体检地点',
  `recBack` int(1) DEFAULT '0' COMMENT '是否归档',
  PRIMARY KEY (`recID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------
INSERT INTO `recruit` VALUES ('1', '2017', '01', '2', '2017-10-18 00:00:00', '2017-10-26 06:00:00', '浙江大学', '浙江大学附属医院', '1');
INSERT INTO `recruit` VALUES ('2', '2017', '02', '1', '2017-10-18 00:00:00', '2017-11-10 00:00:00', '浙江大学', '武警医院', '0');

-- ----------------------------
-- Table structure for setgroup
-- ----------------------------
DROP TABLE IF EXISTS `setgroup`;
CREATE TABLE `setgroup` (
  `gstID` int(11) NOT NULL AUTO_INCREMENT COMMENT '组别ID',
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `gstItvStartTime` varchar(20) NOT NULL COMMENT '考试起始时间',
  `gstItvEndTime` varchar(20) NOT NULL COMMENT '考试截止时间',
  `gstGroup` int(11) DEFAULT NULL COMMENT '所属组别',
  `gstItvPlace` varchar(255) NOT NULL COMMENT '考试地点',
  `gstType` int(1) DEFAULT NULL COMMENT '组别人员类型（1=考官，2=考生）',
  `gstStartEnd` varchar(255) DEFAULT NULL COMMENT '辅助字段（考试起止时间）',
  PRIMARY KEY (`gstID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setgroup
-- ----------------------------
INSERT INTO `setgroup` VALUES ('2', '1', '2017-10-31 08:30', '2017-10-31 18:30', '2', '驱蚊器无', '1', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('6', '1', '2017-10-31 08:30', '2017-10-31 18:30', '1', '浙江大学', '1', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('7', '1', '2017-10-31 08:30', '2017-10-31 18:30', '3', '浙江大学', '1', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('8', '1', '2017-10-31 08:30', '2017-10-31 18:30', '4', '浙江大学', '1', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('9', '1', '2017-11-10 08:30', '2017-11-10 18:30', '1', '浙江大学', '2', '2017-11-10 08:30 至 2017-11-10 18:30');
INSERT INTO `setgroup` VALUES ('10', '1', '2017-10-31 08:30', '2017-10-31 18:30', '2', '浙江大学', '2', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('11', '1', '2017-10-31 08:30', '2017-10-31 18:30', '3', '浙江大学', '2', '2017-10-31 08:30 至 2017-10-31 18:30');
INSERT INTO `setgroup` VALUES ('12', '1', '2017-11-10 08:30', '2017-11-10 18:30', '4', '浙江大学', '2', '2017-11-10 08:30 至 2017-11-10 18:30');
INSERT INTO `setgroup` VALUES ('13', '1', '2017-10-31 08:30', '2017-10-31 18:30', '5', '浙江大学', '2', '2017-10-31 08:30 至 2017-10-31 18:30');

-- ----------------------------
-- Table structure for standartline
-- ----------------------------
DROP TABLE IF EXISTS `standartline`;
CREATE TABLE `standartline` (
  `sttID` int(11) NOT NULL AUTO_INCREMENT,
  `recID` int(11) NOT NULL COMMENT '招聘ID',
  `sttView` int(11) DEFAULT NULL COMMENT '面试成绩占比（百分比）',
  `sttPen` int(11) DEFAULT NULL COMMENT '鄙视成绩占比（百分比）',
  `sttFinalScore` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`sttID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of standartline
-- ----------------------------
INSERT INTO `standartline` VALUES ('3', '1', '70', '30', '81.00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `name` varchar(128) DEFAULT NULL COMMENT '用户名（身份证号）',
  `realName` varchar(128) DEFAULT NULL COMMENT '真实姓名',
  `password` varchar(128) DEFAULT NULL COMMENT '登录密码',
  `userType` int(1) DEFAULT NULL COMMENT '用户类别（0：管理员，1：应聘者，2：用人单位）',
  `userLoginCount` int(11) DEFAULT NULL COMMENT '登录次数',
  `userRegisterTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userLastLoginTime` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `companyID` int(11) DEFAULT NULL COMMENT '单位id',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号码',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'guanliyuan', 'fcea920f7412b5da7be0cf42b8c93759', '0', '21', '2017-10-16 09:41:05', '2017-12-03 09:56:41', '1022', '13285716129');
INSERT INTO `user` VALUES ('2', '362330199208122410', '李建林', 'fe87f294368843244db0891889aed7e9', '1', '20', '2017-10-24 17:39:56', '2017-12-05 20:48:03', null, '13285716129');
INSERT INTO `user` VALUES ('3', '320621199112163729', '张清正', 'fcea920f7412b5da7be0cf42b8c93759', '1', '1', '2017-10-27 20:03:50', '2017-10-27 20:12:41', null, '13816591074');
INSERT INTO `user` VALUES ('4', '330522198712231025', '朱蔚云', 'fcea920f7412b5da7be0cf42b8c93759', '1', '3', '2017-10-27 20:05:09', '2017-11-07 10:50:44', null, '15250998698');
INSERT INTO `user` VALUES ('5', '511102198012290013', '肖大鹏', 'fcea920f7412b5da7be0cf42b8c93759', '1', '2', '2017-10-27 20:06:50', '2017-11-03 22:30:26', null, '18516146044');
INSERT INTO `user` VALUES ('6', '331022198508200022', '梅雪娇', 'fcea920f7412b5da7be0cf42b8c93759', '1', '2', '2017-10-27 20:07:54', '2017-11-03 22:31:42', null, '15821376007');
INSERT INTO `user` VALUES ('7', '211103198302040325', '多少度', 'fcea920f7412b5da7be0cf42b8c93759', '1', '2', '2017-10-27 20:08:38', '2017-11-04 16:53:03', null, '15821376007');
INSERT INTO `user` VALUES ('8', '650104199311300020', '但是', 'fcea920f7412b5da7be0cf42b8c93759', '1', '1', '2017-10-27 20:09:55', '2017-10-27 20:28:00', null, '15902195925');
INSERT INTO `user` VALUES ('9', '370781199101240523', '王晨莹', 'fcea920f7412b5da7be0cf42b8c93759', '1', '1', '2017-10-27 20:10:20', '2017-10-27 20:30:12', null, '15221879360');
INSERT INTO `user` VALUES ('10', '341181199109043017', '周云龙', 'fcea920f7412b5da7be0cf42b8c93759', '1', '4', '2017-10-27 20:10:44', '2017-11-08 22:03:21', null, '18811302610');
INSERT INTO `user` VALUES ('11', '310101198704040029', '刘思思', 'fcea920f7412b5da7be0cf42b8c93759', '1', '5', '2017-10-27 20:11:10', '2017-11-08 21:57:23', null, '18017365698');
INSERT INTO `user` VALUES ('12', '310110199505195619', '邱祎琛', 'fcea920f7412b5da7be0cf42b8c93759', '1', '6', '2017-10-27 20:11:45', '2017-11-09 14:17:28', null, '15221652505');
INSERT INTO `user` VALUES ('15', 'lijianlin', '李建林111', 'fe87f294368843244db0891889aed7e9', '2', '0', '2017-12-03 22:23:04', null, null, '18958562545');

-- ----------------------------
-- Table structure for workset
-- ----------------------------
DROP TABLE IF EXISTS `workset`;
CREATE TABLE `workset` (
  `wkID` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作经历ID',
  `wkStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `wkEnd` timestamp NULL DEFAULT NULL COMMENT '截止时间',
  `wkPost` varchar(255) NOT NULL COMMENT '所在岗位',
  `wkCom` varchar(255) NOT NULL COMMENT '所在单位',
  `wkInfo` text NOT NULL COMMENT '工作简述',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  PRIMARY KEY (`wkID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of workset
-- ----------------------------
