-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 10 月 12 日 14:19
-- 服务器版本: 5.0.51
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `partyschool`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) NOT NULL COMMENT '主键',
  `title` varchar(80) collate utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `content` text collate utf8_unicode_ci NOT NULL COMMENT '内容',
  `publisedtime` int(10) NOT NULL COMMENT '发布文章时间',
  `imgurl` text collate utf8_unicode_ci NOT NULL COMMENT '文章图片',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学习资讯文章';

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `publisedtime`, `imgurl`) VALUES
(1, '群众路线：培育和践行社会主义核心价值观的有效路径', '<p>习近平同志指出，我们要坚持一切为了群众，一切依靠群众，从群众中来，到群众中去，把党的正确主张变为群众的自觉行动，把群众路线贯彻到治国理政全部活动之中。以“富强、民主、文明、和谐，自由、平等、公正、法治，爱国、敬业、诚信、友善”为基本内容的社会主义核心价值观，是凝聚全党全社会的价值共识，是反映人民群众价值诉求的“最大公约数”。这些论述，廓清了社会主义核心价值观与党的群众路线的内在联系，指明了培育和践行社会主义核心价值观的有效路径。</p>\r\n<p>社会主义核心价值观与党的群众路线的内在统一性</p>\r\n<p>群众路线“一切为了群众、一切依靠群众”的价值取向与社会主义核心价值观的价值本色相趋同。群众路线集中反映了我们党一切为了人民、一切依靠人民的价值取向，展现了实现好、维护好、发展好最广大人民的根本利益的价值追求，体现了执政为民的根本价值目标。践行社会主义核心价值观要坚持以人为本，尊重群众主体地位，关注人们利益诉求和价值愿望，促进人的全面发展，这些原则不仅昭示了全体人民的价值理想，而且彰显了为人民服务的价值导向。<p>\r\n<p>我们党既是中国特色社会主义文化的传承者与弘扬者，也是社会主义核心价值观的积极倡导者与弘扬者。人民群众能否认同社会主义核心价值观，在很大程度上首先要靠党员领导干部的笃行示范。践行群众路线，彰显为人民服务的价值本色，需要党员干部身体力行地践行社会主义核心价值观，“用自己的模范行为和高尚人格感召群众、带动群众”，引领社会主流价值的风向标。</p>\r\n<p>群众路线“从群众中来、到群众中去”的工作方法与社会主义核心价值观的发展过程相一致。历史和现实表明，人民群众既是社会主义国家的主人翁，又是社会主义核心价值观的实践者。社会主义核心价值观不仅是我们党领导人民群众在革命、建设及改革的过程中逐渐形成的共同价值目标及愿景，而且它只有在人民中进行宣传、教育进而成为人民的价值共识，才能保持旺盛的生命力。社会主义核心价值观的培育和践行离不开对人民的宣传教育。毛泽东同志说：“掌握思想教育，是团结全党进行伟大斗争的中心环节，如果这个任务不解决，党的一切政治任务是不能完成的”。宣传教育的目的就是促使社会主义核心价值观从抽象深奥的理论性语言成为通俗易懂具体的指导方法，从“知其然而不知其所以然”到“春风化雨润物细无声”的过程。</p>\r\n<p>群众路线“接地气”的实践品格与培育和践行社会主义核心价值观的理论逻辑相契合。马克思主义社会意识理论认为社会心理是连结社会政治、经济关系与意识形态之间的中介。任何意识形态反作用于社会存在必须通过一定的方式使意识形态凝结积淀为社会心理，才能变为人们行动的理想信念。社会主义核心价值观从属于意识形态的范畴，它要积淀为人们的社会心理，最终化为实现中国梦的强大精神力量，就必须通过一系列的中间环节来实现，这就需要通过细致、艰辛的群众工作不断探索具体的方式如教育引导、舆论宣传、文化熏陶、实践养成、制度保障等才能完成。</p>\r\n<p>在群众路线中培育和践行社会主义核心价值观的三个原则</p>\r\n<p>社会主义核心价值观既不是远离尘世的空中楼阁，也非虚无缥缈的海市蜃楼。它只有深深扎根于群众的土壤，才能枝繁叶茂、生机勃勃。对于通过群众路线来培育践行社会主义核心价值观而言，也有其基本遵循，应该坚持贴近群众、运用群众话语、创新群众活动形式的原则。</p>\r\n<p>贴近群众，强化社会主义核心价值观的价值认同。马克思说：“人们为之奋斗的一切，都同他们的利益有关”，“‘思想’一旦离开‘利益’，就一定会使自己出丑”。只有追踪群众的根本利益，才能捕捉到普通百姓的心理动向。这就要求社会主义核心价值观必须贴近群众，回归民众的现实生活场域，回答及解决群众关心的各种民生问题。社会主义核心价值观应以党的群众路线为载体，调和党群、干群利益冲突，协调国家整体利益、群体利益及个人利益之间的关系，捍卫和维护民众的个人利益，从而在民众权利的切实落实及利益的满足中，取得人民大众的心理认同。</p>\r\n<p>运用群众话语，营造良好的社会主义核心价值观传播舆论环境。法国哲学家米歇尔·福柯说：“话语是权力，人通过话语赋予自己权力”。群众话语是开启群众心扉的锁钥，是表达自身权利的扬声器。在坚持群众路线中，社会主义核心价值观的宣传及传播应诉诸群众话语。其一，要“曲高和众”。社会主义核心价值观不应一味采取政治性、理论性的话语或口号，而应从中华传统文化和现实生活中，挖掘出群众喜闻乐见的通俗话语，增强其吸引力、感召力。其二，要“双管齐下”。在宣传社会主义核心价值观时，不仅应注重传统媒体如电视、广播、报纸的作用，更应关注手机、微博、微信等群众聚焦的网络新兴媒体。用能吸引大众眼球，激发兴趣的精神文化产品来讲好中国故事、传播好中国声音，传递社会正能量，达到以文育人、化人的效果。</p>\r\n<p>创新群众活动形式，深化社会主义核心价值观的实践养成。习近平同志指出，“一种价值观要真正发挥作用，必须融入社会生活，让人们在实践中感知它、领悟它。”社会主义核心价值观要真正内化于群众的观念，转变为他们的信仰追求，就必须探索出切实可行、操作性强、形式多样、常态化的群众实践活动形式，使之更细、更小、更实。更细，“一屋不扫，何以扫天下”，应该着眼于每个行业、每个场合，发挥基层党组织的模范带头作用，开展各种主题实践活动，如围绕社会主义核心价值观的基本内容开展各类公益活动，加深党群感情。更小，“不积跬步，无以至千里”，引导人们从小事做起，从细微处使劲，防微杜渐，学习身边的凡人善举，道德标兵。更实，不做“语言的巨人，行动的矮子”，在日常生活管理中，制定法律规范保证社会主义核心价值观的落实，建立奖惩机制，给予先进个人和集体适当的物质和精神奖励，对背离社会主义核心价值观的行为予以惩治。</p>\r\n<p>（作者单位：武汉大学马克思主义学院）</p>', 1410905123, '/images/2.jpg'),
(2, '近千个基层团建创新案例在人民网集中展播', '<p>中国共产党新闻网北京9月25日电 （朱书缘）今年以来，由共青团中央组织部指导，人民网·中国共产党新闻网、中央团校、中国青年网联合举办的“全国基层团建创新典型案例征集展示活动”得到全国各地广大基层团组织的热情响应和积极参与。</p>\r\n\r\n<p>在活动网上征集阶段，全国各地基层团组织通过人民网开辟的专区上传图文资料，踊跃留言互动。同时，活动主办发还派出200多位案例寻访员到全国各省进行案例挖掘。目前，案例征集已结束，据初步统计，通过网上、线下征集，主办方共收到各地团组织提交的案例近千个。案例征集同时，主办方对部分案例单位进行了回访。</p>\r\n\r\n<p>为进一步宣传推广基层团建经验、营造重视基层团建的浓厚氛围，主办方应各地基层团组织的要求，活动征集时间延长至8月底，网上评选和专家评审顺延至10月进行。人民网将从今日起在网上展播此次征集的典型案例。</p>', 1411605123, '/images/0.jpg'),
(3, '习主席谈古说今论文化', '<p>“有朋自远方来，不亦乐乎。”这是《论语》的开篇之语。今天，习近平主席就用它做欢迎50多个国家的嘉宾及专家学者的第一句话。</p>\r\n<p> “半部论语治天下，”中国传统文化里，有哪些需要汲取的精华？中国传统文化为何如此重要？仔细分析习近平主席的讲话全文，请看精华摘要——</p>\r\n<p>【国虽大，好战必亡】<p>\r\n<p>这次大会主题是“儒学：世界和平与发展”。演讲一开始，习近平主席就为这主题“点赞”说，“体现了关注世界前途、人类命运的人文情怀，是一个很有现实意义的题目。”</p>\r\n<p>那么，和平与儒学有什么关系？习近平主席说，中华民族历来是一个爱好和平的民族，爱好和平在儒家思想中有很深的渊源。他细数了中国人自古就推崇的和平思想包括：“协和万邦”、“亲仁善邻，国之宝也”、“四海之内皆兄弟”、“远亲不如近邻”、“亲望亲好，邻望邻好”“国虽大，好战必亡”。 </p>\r\n<p>习近平主席重提和平的重要性：和平对人类就像阳光和空气一样重要，没有阳光和空气，万物就不能生存生长。</p>\r\n<p> “爱好和平的思想深深嵌入了中华民族的精神世界，今天依然是中国处理国际关系的基本理念。”他说。</p>\r\n<p>【“古”为“今”用】</p>\r\n<p>儒学等传统文化在现今可以发挥什么作用？习近平主席点出，要解决当代人类面临的许多突出难题，不仅需要运用人类今天发现和发展的智慧和力量，而且需要运用人类历史上积累和储存的智慧与力量。</p>\r\n<p>哪些优秀传统文化思想能“古”为“今”用？习近平主席一口气为在座的国际友人们列出了15种：道法自然、天人合一；天下为公、大同世界；自强不息、厚德载物；以民为本、安民富民乐民；为政以德、政者正也；苟日新日日新又日新、革故鼎新、与时俱进；脚踏实地、实事求是；经世致用、知行合一、躬行实践；集思广益、博施众利、群策群力；仁者爱人、以德立人；以诚待人、讲信修睦；清廉从政、勤勉奉公；俭约自守、力戒奢华；中和、泰和、求同存异、和而不同、和谐相处；安不忘危、存不忘亡、治不忘乱、居安思危。</p>\r\n<p>习近平主席总结道：“中国优秀传统文化的丰富哲学思想、人文精神、教化思想、道德理念等，可以为人们认识和改造世界提供有益启迪，可以为治国理政提供有益启示，也可以为道德建设提供有益启发。”</p>\r\n<p>【文化基因】</p>\r\n<p> “要认识今天的中国、今天的中国人，就要深入了解中国的文化血脉，准确把握滋养中国人的文化土壤。”习近平主席说，“研究孔子、研究儒学，是认识中国人的民族特性、认识当今中国人精神世界历史来由的一个重要途径。”</p>\r\n<p>习近平主席说，虽然后来儒家思想在中国思想文化领域长期取得了主导地位，但中国思想文化依然是多向多元发展的。这些思想文化体现着中华民族世世代代在生产生活中形成和传承的世界观、人生观、价值观、审美观等，其中最核心的内容已经成为中华民族最基本的文化基因。这些最基本的文化基因，是中华民族和中国人民在修齐治平、尊时守位、知常达变、开物成务、建功立业过程中逐渐形成的有别于其他民族的独特标识。</p>\r\n<p> “只有不断发掘和利用人类创造的一切优秀思想文化和丰富知识，我们才能更好认识世界、认识社会、认识自己、才能更好开创人类社会的未来。”习近平主席说。</p>\r\n<p>习近平主席对传统文化的深入剖析令人震撼。也许平时没有意识到，但博大精深的传统文化就流淌在我们的血液中。关于传统文化，习近平主席还有大幅阐述，由于篇幅所限，不一一列举了，但请关注新华社今天播发的演讲全文，相信你收获满满！（新华网北京９月２４日电 记者梁淋淋、杨依军）</p>', 1410905123, '/image/1.jpg'),
(4, '傅兴国：考准考实干部须处理好三个关系', '<p>立政之道，察吏为先。干部考察考核是选准用好干部的基础和关键。习近平同志在全国组织工作会议上提出了新时期好干部标准，并多次就如何识别考察和考核评价干部作出重要阐述，为干部工作提供了遵循、指明了方向。我们必须以对党的事业高度负责的态度，切实改进干部考察考核工作，正确把握考准考实干部的方式方法，把好干部及时发现出来、合理使用起来。</p>\r\n\r\n<p>处理好任前考察与平时考核的关系。“试玉要烧三日满，辨材须待七年期”。选干部是阶段性工作，察干部则是经常性任务。以往干部考察，重定期考察、轻日常和长效考察，“不提拔不考察”“不换届不考察”“不调整不考察”等现象普遍存在。新修订的《党政领导干部选拔任用工作条例》明确提出，要对考察对象的一贯表现进行相互比较、相互印证。这就要求我们将考察置于干部成长全过程，对干部情况胸有成竹，“知根知底”“知长知短”。应整合规范各类考核，建立健全任前考察、年度考核和经常性考察考核相结合的考核机制，完善干部实绩公示、定性分析、部门协商、责任追究等平时考核配套机制，全面掌握干部在平时工作中的表现，真实具体地观察干部、评价干部，避免“走过场”“拍快照”。应建立考核档案，将班子、干部的目标考核和政绩考核结果整理记录在案，与干部档案管理、干部监督等工作结合起来，建立内容完备、分类科学的干部信息库，作为班子建设和干部管理使用的重要依据。为此，宁夏制定了《关于加强公务员平时考核的意见》，综合分析干部的一贯表现、德才素质以及人岗相适情况等。石嘴山市推行干部“干事档案”，每季度组织干部职工对履行职责、重点工作、创新工作完成情况以及奖惩情况、未完成的工作任务和存在的问题等进行记载并逐级审核点评，以日常考核管人察人用人，取得了良好效果。</p>\r\n\r\n<p>处理好听取群众意见与近距离接触干部的关系。考察干部就像交朋友，不仅要从外围了解干部的声誉口碑，多听取群众意见；更要近距离接触干部，观察干部的一言一行。通过近距离接触干部，观察干部对重大问题的思考，看其见识见解；观察干部对群众的感情，看其品质情怀；观察干部对待名利的态度，看其境界格局；观察干部处理复杂问题的过程和结果，看其能力水平。听取群众意见时，应按照增强代表性、知情度和关联度的原则，经常听取“他管的”“他服务的”“他身边的”知情者的意见建议，准确掌握第一手资料，在群众口碑中了解干部品行，在实际工作中考察干部得失，在街坊邻里间掌握干部生活、社交表现。近距离接触干部时，应多打交道、多谈心、多沟通，面对面了解干部的真实情况，实事求是作出判断评价。比如，这次党的群众路线教育实践活动专题民主生活会就是直接了解干部的好机会，从中可以看出一个干部敢不敢于批评与自我批评、能不能提出明确可行的整改措施。近距离接触干部时，应改进谈心谈话技巧，引导干部讲真话，尽量避免“谈与不谈一个样”等情况发生。应建立实地考察工作机制，定期到单位了解情况、参与工作监督，多角度观察干部对重大问题的思考、对群众的感情、对名利的态度，以及处理复杂问题的过程和结果。宁夏研究制定了组织干部与党员干部“双向约谈、深入走访”制度，加强与干部近距离接触，为选准用好干部奠定了基础。</p>\r\n\r\n<p>处理好重小节与重主流本质的关系。识别干部不但要看小节，更要看其主流、把握本质。这就要求我们全面地、历史地、辩证地看干部，否则就会出现知人不深、识人不准现象，甚至会出现用人不当、用人失误问题。考察识别一名干部，应通过对条件、环境、工作实绩等客观因素和品格、能力、个人努力等主观因素进行综合分析，做到透过现象看本质、立足长远看发展，避免就事论事，把小纰漏当大问题。比如，“德”的考核不仅要看其家庭美德、个人私德、社会公德，更要重点看其政治品行，看其在大是大非面前是否立场坚定、态度鲜明、敢于担当，是否顾全大局、令行禁止。宁夏作为民族地区，不仅要看干部遵守和执行党的政治纪律情况，还要把维护民族团结、宗教和顺作为衡量干部的重要政治标准。应突出精神状态、实际作为和担当精神考察，不仅看其一时一事，更要重点看其在推动科学发展方面是否勤勉务实、积极作为，在推进重大决策、重大部署时是否敢于创新、勇于突破，在特殊时期、关键时刻是否能挺身而出、勇于负责。此外，应充分尊重干部的个性，对有棱角的干部，评价要实事求是，切不可人云亦云或主观臆断。</p>\r\n\r\n<p>（作者为宁夏回族自治区党委常委、组织部部长）</p> ', 1410905123, '/image/4.jpg'),
(5, '杨健燕：构建践行群众路线长效机制', '<p>群众路线是党的生命线和根本工作路线，体现党的领导作风和工作方法。新形势下，党面临的执政考验、改革开放考验、市场经济考验、外部环境考验是长期的、复杂的、严峻的，精神懈怠危险、能力不足危险、脱离群众危险、消极腐败危险更加尖锐地摆在全党面前。只有植根人民、造福人民，党才能始终立于不败之地；只有居安思危、勇于进取，党才能始终走在时代前列。开展党的群众路线教育实践活动，是保持党的先进性和纯洁性、巩固党的执政基础和执政地位的必然要求。面对世情、国情、党情的深刻变化，我们要清醒地看到，一些党员干部身上仍然存在形式主义、官僚主义、享乐主义和奢靡之风的“四风”问题，影响了党同人民群众的血肉联系，损害了党的形象，削弱了党的战斗力凝聚力。为了更好地践行党的群众路线，有必要加大工作力度、建立长效机制。</p>\r\n\r\n　　<p>突出宗旨意识，完善思想保障机制。应着力解决群众意识淡薄问题，教育引导党员干部坚持党的群众观点和群众路线不动摇，牢固树立全心全意为人民服务的根本宗旨。紧紧围绕“为了谁、依靠谁”这一根本问题，深入进行唯物史观和党的性质、宗旨教育，使广大党员干部真正确立马克思主义群众路线的基本观点，深刻认识人民群众在历史发展中的作用，切实把人民的主体地位落到实处，贯穿到经济、政治、文化、社会、生态文明建设的各个方面，尊重人民首创精神，保障人民各项权益，实现发展成果人民共享，促进人的全面发展和社会和谐。使广大党员干部提高在新的时代条件下坚持群众路线的自觉性，切实认识到“人民至上”是一种价值原则和政治信念，只有相信和依靠人民群众，全心全意为人民服务，做人民群众利益的忠实代表，并通过正确的路线、方针、政策来实施科学决策和正确领导，才能赢得人民群众的真心拥护和支持，为实现中国梦提供坚强保证。</p>\r\n\r\n　　<p>加强制度建设，健全行为引导机制。只有加强贯彻群众路线的制度建设，健全行为引导机制，党员干部素质能力的提高、工作作风的转变才能长久、稳定。有效的制度建设可以克服随意性，解决好贯彻群众路线中存在的不想、不能、不愿问题。制度带有根本性、全局性、稳定性和长期性，是治本之策。应着力推进制度建设，健全行为引导机制，把群众路线贯彻落实到工作的方方面面。如落实党员干部定期走访基层群众制度，建立党员干部与人民群众的利益关联机制；完善领导干部选拔任用制度，建立群众测评机制；完善群众工作制度体系，建立党员干部与群众良性互动机制；等等。</p>\r\n\r\n　　<p>完善惩治体系，强化党内监督机制。中国梦归根到底是人民的梦，必须紧紧依靠人民来实现。我们党自身面临着“四大危险”“四大考验”，一些党员干部存在“四风”问题，必须经常照镜子、正衣冠、洗洗澡、治治病。践行群众路线，要以党章为核心，建立和完善惩治脱离群众的各项法纪规定。建立党委统一领导、组织部门牵头抓总、各部门积极配合的践行党的群众路线常态化工作格局，健全践行群众路线责任制。严把党员“入口”关，建立健全入党机制；疏通党员“出口”关，建立健全不合格党员清退机制；规范党员“程序”关，建立健全党的组织生活机制。坚持严谨求实、分类实施、公开公正、群众满意的考评原则，不断完善考评体系。建立健全党员监督制约机制，切实健全党内民主监督制度和程序，进一步拓宽和完善党内民主监督渠道，逐步建立和完善党务公开制度、党内情况通报制度、重大决策征求意见制度等。</p>\r\n\r\n　　<p>（作者为河南财经政法大学党委书记）</p>', 1410605123, '/image/5.jpg'),
(6, '协商民主：中国特色社会主义新篇章', '<p>习近平总书记在庆祝中国人民政治协商会议成立65周年大会上的重要讲话，着眼于完善和发展中国特色社会主义制度、推进国家治理体系和治理能力现代化的总目标，从全面认识社会主义协商民主是中国社会主义民主政治的特有形式和独特优势这一重大判断，深刻把握社会主义协商民主是中国共产党的群众路线在政治领域的重要体现这一基本定性，切实落实推进协商民主广泛多层制度化发展这一战略任务三个方面，科学回答了社会主义协商民主何以必要、何以重要、何以有效等重大理论和实践问题，是中国特色社会主义实践和理论的新篇章。</p>\r\n\r\n　　<p>从保证和支持人民当家作主看协商民主何以必要</p>\r\n\r\n　　<p>人民民主的实质，就是人民当家作主。中国共产党执政，不是代替人民当家作主，而是保证和支持人民当家作主，以实实在在的民主形式，在国家政治生活和社会生活之中，保证人民依法有效行使管理国家事务、管理经济和文化事业、管理社会事务的权力。</p>\r\n\r\n　　<p>习近平总书记指出：“人民是否享有民主权利，要看人民是否在选举时有投票的权利，也要看人民在日常政治生活中是否有持续参与的权利；要看人民有没有进行民主选举的权利，也要看人民有没有进行民主决策、民主管理、民主监督的权利。”选举投票是人民的权利，包括民主决策、民主管理、民主监督在内的政治参与也是人民的权利，而且是必不可少的权利。要把“实现人民最广泛、最有效的政治参与”作为最大追求，在我国，就要保障人民民主权利是持续行使，而不是一时一事的。习近平总书记指出：“保证和支持人民当家作主，通过依法选举、让人民的代表来参与国家生活和社会生活的管理是十分重要的，通过选举以外的制度和方式让人民参与国家生活和社会生活的管理也是十分重要的。”选举民主是人民通过选举出自己代表进行授权委托参与国家和社会生活的管理，是间接性的而非直接性的政治参与。而且选举民主具有阶段性的特点，用政治学的术语讲是一种起点民主或断点民主。由此就会产生在投票之后或非选举期间人民如何行使权利问题，也就是习近平总书记所指出的“人民只有在投票时被唤醒、投票后就进入休眠期”的问题。协商民主则能使人民持续而直接地进行政治参与。</p>\r\n\r\n　　<p>从坚持贯彻党的群众路线看协商民主何以重要</p>\r\n\r\n　　<p>“一切为了群众，一切依靠群众，从群众中来，到群众中去”的群众路线，是党的生命线。社会主义协商民主，是党的群众路线在政治领域的重要体现。回顾中国共产党的历史和新中国的历程，我们之所以能够取得事业的成功，靠的是始终保持同人民群众的血肉联系、靠的是“跟人民商量办事”的好传统。“商量办事”曾经被毛泽东称为“新民主主义的议事精神”，今天，“在中国社会主义制度下，有事好商量，众人的事情由众人商量，找到全社会意愿和要求的最大公约数，是人民民主的真谛”。商量是个好东西，于事多有补，于民更有益。当然，现在人们思想活动的独立性、选择性、多样性、差异性明显增强，人民群众需求的多层次、多方面、多样化的特征更加明显，今天要商量办事复杂起来了。这就要更耐烦、更细致、更频繁、更深入地商量。涉及全国各族人民利益的事情，要在全体人民和全社会中广泛商量；涉及一个地方人民群众利益的事情，要在这个地方的人民群众中广泛商量；涉及一部分群众利益、特定群众利益的事情，要在这部分群众中广泛商量；涉及基层群众利益的事情，要在基层群众中广泛商量。</p>\r\n\r\n　　<p>中国共产党来自人民、服务人民，党的人民性决定了党必须紧紧依靠人民治国理政、管理社会。习近平总书记指出：“全心全意为人民服务，始终代表最广大人民根本利益，是我们能够实行和发展协商民主的重要前提和基础。”执政长了，最大的危险就是脱离群众。“为官”久了，最易忽略的就是群众的呼声。对于群众正常、合理、善意的批评和监督，不论多么尖锐，我们都要欢迎，不仅“忠言不能逆耳”，更要“敏于行”。作为执政者，我们政治智慧的增长、治国理政本领的增强，无不源于人民群众的实践。坚持把实现好、维护好、发展好最广大人民根本利益，作为我们一切工作的出发点和落脚点。重大工作和重大决策识民情、接地气，以人民群众利益为重、以人民群众期盼为念，知民情、解民忧、纾民怨、暖民心，这些都离不开多商量、会商量。</p>\r\n\r\n　　<p>从推进协商民主广泛多层制度化发展看协商民主何以有效</p>\r\n\r\n　　<p>协商民主要切实管用、作用实在，就要上下互动、左右相联，形成多样化、立体化、程序合理、环节完整的体系。习近平总书记强调：“社会主义协商民主，应该是实实在在的、而不是做样子的，应该是全方位的、而不是局限在某个方面的，应该是全国上上下下都要做的、而不是局限在某一级的。”</p>\r\n\r\n　　<p>如何使社会主义协商民主实实在在推进，习近平总书记强调了三点：一是坚持协商于决策之前和决策实施之中的重要原则。“协商就要真协商，真协商就要协商于决策之前和决策之中，根据各方面的意见和建议来决定和调整我们的决策和工作。”凡事预则立，决策之前进行协商，有利于集中民智，实现决策的科学化、合理化，使决策的效益覆盖全体社会成员。决策实施之中进行协商，有利于集中民力，保证决策的完整性、可操作性，使决策更具有执行效力。二是坚持使协商成果真正有用的制度保障。“从制度上保障协商成果落地，使我们的决策和工作更好顺乎民意、合乎实际。”三是坚持在全社会开展广泛协商的发展方向。“要通过各种途径、各种渠道、各种方式就改革发展稳定重大问题特别是事关人民群众切身利益的问题进行广泛协商，既尊重多数人的意愿，又照顾少数人的合理要求，广纳群言、广集民智，增进共识、增强合力。”</p>\r\n\r\n　　<p>如何使社会主义协商民主全方位展开，习近平总书记强调了三点：一是拓宽协商渠道，将十八届三中全会概括的五种渠道细化为中国共产党、人民代表大会、人民政府、人民政协、民主党派、人民团体、基层组织、企事业单位、社会组织、各类智库等十种协商渠道。二是丰富协商类型，深入开展政治协商、立法协商、行政协商、民主协商、社会协商、基层协商等多种协商。三是建立健全协商方式，包括提案、会议、座谈、论证、听证、公示、评估、咨询、网络等多种方式，不断提高协商民主的科学性和实效性。</p>\r\n\r\n　　<p>如何使协商民主真正落实，切实“落地”，习近平总书记强调了基层民主协商的工作重点，指出：“涉及人民群众利益的大量决策和工作，主要发生在基层。要按照协商于民、协商为民的要求，大力发展基层协商民主，重点在基层群众中开展协商。”涉及群众切身利益的实际问题大多是在基层发生的，群众利益无小事，协商民主如果不从基层搞起来，就难显现出它的作用，获得广泛的民意基础，保持持久的生命力。协商民主是人民群众的民主权利。宪法规定的公民言论自由的基本权利，党的十八大报告提出保障人民“表达权”，都应落实到人民群众在协商活动中的发言权。</p>\r\n\r\n　　<p>如何开展基层民主协商？习总书记强调三点：一是凡是涉及群众切身利益的决策都要充分听取群众意见，通过各种方式、在各个层级、各个方面同群众进行协商。二是要完善基层组织联系群众制度，加强议事协商，做好上情下达、下情上传工作，保证人民依法管理好自己的事务。三是要推进权力运行公开化、规范化，完善党务公开、政务公开、司法公开和各领域办事公开制度，让人民监督权力，让权力在阳光下运行。</p>\r\n\r\n　　<p>推进协商民主广泛多层制度化发展，要坚持发挥人民政协在发展协商民主中的重要作用。习近平总书记指出：“人民政协以宪法、政协章程和相关政策为依据，以中国共产党领导的多党合作和政治协商制度为保障，集协商、监督、参与、合作于一体，是社会主义协商民主的重要渠道。”人民政协是我国专门协商机构，在推进协商民主广泛多层制度化、构建我国协商民主体系中发挥着不可或缺的重要作用。人民政协具有巨大覆盖面的组织架构，可以为构建我国协商民主体系提供基础性的组织作用；人民政协丰富的协商民主经验，可以为在党的领导下在全社会开展广泛协商提供有力的实践支持；人民政协比较成熟的协商议事规则和比较完备的制度体系，可以为构建程序合理、环节完整的协商民主体系提供坚实的制度基础；人民政协的政治协商，可以对其他协商渠道起到配合支持作用；人民政协长期形成的平等、宽容、友善的民主氛围，可以对发展社会主义协商起精神引领作用。按照习近平总书记对人民政协提出的新要求，人民政协把协商民主贯穿履行职能全过程，推进政治协商、民主监督、参政议政制度建设，建立健全协商议题提出、活动组织、成果采纳落实和反馈机制，更加灵活、更为经常开展专题协商、对口协商、界别协商、提案办理协商，探索网络议政、远程协商等新形式，提高协商实效，努力营造既畅所欲言、各抒己见，又理性有度、合法依章的良好协商氛围，人民政协必将在谱写社会主义协商民主新篇章的伟大事业中有所作为、大有作为。</p>\r\n\r\n　　<p>中国特色社会主义实践和理论的新篇章</p>\r\n\r\n　　<p>中国特色社会主义推动中国快速发展，已是“高峡出平湖，当惊世界殊”。但西方有人还是在不断责难，好像西方制度总是比我们多了点“民主”。</p>\r\n\r\n　　<p>此论谬也。民主是个好东西。中国的社会主义，物质财富不能少，民主也一点不能少。中国特色社会主义特就特在，唯有这个主义、这个制度、这条道路，既能在一个最大的发展中国家更有效地发展经济，也能更有效地实现民主。1980年邓小平同志在《党和国家领导制度的改革》中指出：“我们进行社会主义现代化建设，是要在经济上赶上发达的资本主义国家，在政治上创造比资本主义国家的民主更高更切实的民主。”“高”在哪里，“实”在何处？习近平总书记说，“‘名非天造，必从其实。’实现民主的形式是丰富多样的，不能拘泥于刻板的模式，更不能说只有一种放之四海而皆准的评判标准。人民是否享有民主权利，要看人民是否在选举时有投票的权利，也要看人民在日常政治生活中是否有持续参与的权利；要看人民有没有进行民主选举的权利，也要看人民有没有进行民主决策、民主管理、民主监督的权利。”中国特色社会主义的民主建设，有完整的制度程序，也有完整的参与实践，使人民当家做主“具体地、现实地体现到中国共产党执政和国家治理上来，具体地、现实地体现到中国共产党和国家机关各个方面、各个层级的工作上来，具体地、现实地体现到人民对自身利益的实现和发展上来”。</p>\r\n\r\n　　<p>因此，我们的民主不是比西方“少一点”，而是比西方更高明、更切实，更“多一点”。“中国社会主义协商民主丰富了民主的形式、拓展了民主的渠道、加深了民主的内涵。”这集中体现在，“人民通过选举、投票行使权利和人民内部各方面在重大决策之前进行充分协商，尽可能就共同性问题取得一致意见，是中国社会主义民主的两种重要形式。在中国，这两种民主形式不是相互替代、相互否定的，而是相互补充、相得益彰的，共同构成了中国社会主义民主政治的制度特点和优势”。</p>\r\n\r\n　　<p>优势所在：一是达成共识的优势，可以广泛达成决策和工作的最大共识，有效克服党派和利益集团为自己的利益相互竞争甚至相互倾轧的弊端；二是畅通渠道的优势，可以广泛畅通各种利益要求和诉求进入决策程序的渠道，有效克服不同政治力量为了维护和争取自己的利益固执己见、排斥异己的弊端；三是纠错机制的优势，可以广泛形成发现和改正失误和错误的机制，有效克服决策中情况不明、自以为是的弊端；四是群众广泛参与的优势，可以广泛形成人民群众参与各层次管理和治理的机制，有效克服人民群众在国家政治生活和社会治理中无法表达、难以参与的弊端；五是凝心聚力的优势，可以广泛凝聚全社会推进改革发展的智慧和力量，有效克服各项政策和工作共识不高、无以落实的弊端。</p>\r\n\r\n　　<p>协商民主之所以是中国特色社会主义的民主政治中独特的、独有的、独到的民主形式，在于它独具“天时、地利、人和”，有深厚的文化、理论、实践、制度基础。它来源于中华民族长期形成的天下为公、兼容并蓄、求同存异等优秀政治文化，来源于在马克思主义与中国实际相结合、中国共产党领导人民进行革命、建设、改革的长期实践积累的丰富经验，来源于新中国成立后在政治制度上实现的伟大创造和改革开放以来在政治体制上的不断创新。因此中国社会主义的协商民主，可以“天行健，君子以自强不息；地势坤，君子以厚德载物”。</p>\r\n\r\n　　<p>学习习近平总书记有关社会主义协商民主的系统阐述，我们看到了中国特色社会主义实践和理论的新篇章。</p>\r\n\r\n　　<p>（叶小文，中央社会主义学院党组书记、第一副院长；张峰，中央社会主义学院副院长）</p>\r\n', 1411605123, '/image/1.jpg'),
(7, '坚守核心价值体系和核心价值观', '<p>党的十六届六中全会提出了建设社会主义核心价值体系的重大战略任务，党的十八大进一步提出培育和践行“三个倡导”的社会主义核心价值观。社会主义核心价值体系与核心价值观内在一致，核心价值观是对核心价值体系的高度凝练和集中表达。今年以来，习近平总书记在多个重要场合阐述了社会主义核心价值观问题。《习近平总书记系列重要讲话读本》的第六章“创造中华文化新的辉煌——关于建设社会主义文化强国”，首先强调并论述了“坚守我们的核心价值体系和核心价值观”。</p>\r\n\r\n<p>凝魂聚气、强基固本的基础工程。社会主义核心价值体系和核心价值观，是国家建构的在社会精神生活领域占主导地位的价值观念体系和行为规范体系，体现了中国特色社会主义意识形态的本质要求。它是中国特色社会主义的“领航仪”，从价值层面鲜明表达了社会主义的本质特征、目标愿景和发展方向，为决策部署、制度设计、法律制定提供根本的价值遵循，坚定人们对中国特色社会主义的“三个自信”；是凝聚共识、维系和谐的“稳定器”，能够在社会深刻变革、思想深刻变化的背景下发挥共有价值的精神纽带作用，避免社会分化可能造成的思想混乱与对立，引领整合形成使社会有序运转的强大精神正能量；是深化改革、攻坚克难的“主心骨”，面对全面深化改革的艰巨繁重任务，以共有的思想基础和坚定的理想信念激励人们勇于啃硬骨头、涉深水区。习近平总书记指出：“人类社会发展的历史表明，对一个民族、一个国家来说，最持久、最深层的力量是全社会共同认可的核心价值观。”确立反映全国各族人民共同认同的价值观“最大公约数”，关乎国家前途命运，关乎人民幸福安康。总书记因而强调要把培育和弘扬社会主义核心价值观作为凝魂聚气、强基固本的基础工程，作为一项根本任务，切实抓紧抓好。</p>\r\n\r\n<p>加强教育引导和宣传普及。培育社会主义核心价值观首先要得到全社会的普遍认知认同，只有入脑入心，才能自觉践行。做好教育引导和宣传普及是基础性工作。要把“三个倡导”的内容阐释清楚，引导人们牢牢把握富强、民主、文明、和谐的国家层面的价值目标，深刻理解自由、平等、公正、法治的社会层面的价值取向，自觉遵守爱国、敬业、诚信、友善的公民层面的价值准则，并与中国梦的宣传教育有机结合起来。核心价值观的宣传教育必须注重榜样的力量。要充分发挥党员领导干部的示范带头作用，运用“最美”先进人物的高尚人格感召群众，激励社会精英名流引领坚守正道和弘扬正气的风尚。宣传教育要从娃娃抓起、从学校抓起，使青少年从小就接受社会主义核心价值观的沐泽熏陶，系好人生的第一粒扣子。同时宣传教育要做到春风化雨、润物无声，充分运用多种文化形式、网络及新媒体、大众化语言等，在打动群众心扉和潜移默化上下功夫。广东近年开展的“我们的价值观·我们的中国梦”主题教育实践活动、“广东好人”“最美街坊”宣传活动、建立道德楷模先进事迹视频库等，生动具体地体现了真善美，切实有效地弘扬了核心价值观。</p>\r\n\r\n<p>融入社会生活，落实于治理工作。习近平总书记强调，要切实把社会主义核心价值观贯穿于社会生活方方面面，让人们在实践中感知它、领悟它。为此，要做好“融”字文章，着力落细、落小、落实。中山市开展的“全民修身行动”，正是积极探索将核心价值观与日常生活紧密结合的有益实践，有利于人们对核心价值观的追求变成“日用而不觉”的习惯。同时还应注重把践行核心价值观落实到制度建设和治理工作中，各种政策制度、法律法规、社会治理都要体现、彰显核心价值观，如习近平总书记所要求的：“要用法律来推动核心价值观建设。各种社会管理要承担起倡导社会主义核心价值观的责任，注重在日常管理中体现价值导向，使符合核心价值观的行为得到鼓励，违背核心价值观的行为受到制约”。《广东省见义勇为人员奖励和保障条例》、“广东关爱好人基金”的设立实施，正是对习近平总书记指示精神的有力响应。<p>\r\n\r\n<p>立足中华优秀传统文化。数千年厚重的历史文化是我们民族的根和魂，中华优秀传统文化是社会主义核心价值观的源头活水。习近平总书记强调，培育和弘扬社会主义核心价值观，必须立足中华优秀传统文化。要系统梳理传统文化资源，认真汲取其中的思想精华和道德精髓，结合时代要求加以延伸阐发，并进行创新性转化和发展，使优秀传统文化不断发扬光大。广泛开展中华优秀传统文化的宣传普及活动，增加国民教育中优秀传统文化课程内容，重视民族传统节日的思想熏陶和文化育人功能，促进优秀传统文化成为涵养社会主义核心价值观的深厚源泉，坚守核心价值体系和核心价值观的重要支撑。</p>\r\n\r\n<p>作者系广东省社会科学院副院长、研究员</p>', 1410606123, '/image/7.jpg');
INSERT INTO `article` (`id`, `title`, `content`, `publisedtime`, `imgurl`) VALUES
(8, '关于中华民族精神的思考', '<p>中国正处在一个新的历史起点。</p>\r\n\r\n<p>在这个起点上，中国梦是个标志。如果说前三十年的改革开放奠定了中国强大的基础，那么今后三十年中华民族将在中国梦的引领下走向民族复兴，走向现代化。</p>\r\n\r\n<p>中国梦是中华民族伟大复兴之梦，是一代又一代中国人梦寐以求的现代化之梦。实现中国梦需要战略上的总体设计，战术上的具体操作，需要全党的奋斗和国民的共同努力。同时还需要具备两大支撑：一是国力的支撑，这是圆梦的硬件基础，二是文化特别是精神力量的支撑，这是圆梦的软件基础。而中华民族精神正是软件的核心。</p>\r\n\r\n<p>何谓“中华民族精神”</p>\r\n\r\n<p>从历史上看，民族精神的形成是有条件的，一是历史比较久，二是文化积淀比较厚，三是在世界历史演变过程中发挥过重要作用，四是得到了世人的认同。</p>\r\n\r\n<p>作为文化的高级形态，民族精神是一个民族文化的灵魂，集中地反映了民族的价值追求和民族个性，它是一个民族区别其他民族的根本性标识，也是一个民族凝聚力和强大战斗力的内在基因。</p>\r\n\r\n<p>在中华大地上诞生的中华文明是世界几大古文明中唯一没有中断的文明，在五千多年的发展过程中，逐步形成了一整套优秀文化传统。共同的历史记忆、共同的文化认可、共同的政治归属把我们的祖先紧紧联系在一起，其中共同的文化认同就是源远流长、一脉相承的“中华民族精神”。</p>\r\n\r\n<p>那么，中华民族精神有哪些内涵呢？择其要之，可以用四句话来概括，即：自强不息、仁义博厚、爱国统一、和合天下。</p>\r\n\r\n<p>自强不息</p>\r\n\r\n<p>《周易·乾卦》载：“天行健，君子以自强不息；地势坤，君子以厚德载物”。天道如此，人间也是这样，君子的动力在于自身，中华民族的动力也在于自身，来自于全民族每个成员的奋斗和不懈追求。在国家民族发展顺利时，自强不息的精神鼓励人们建功立业，在国家民族生死存亡的紧急关头，自强不息的精神又激励着人们救亡图存。自强不息是中华民族薪火相传、自立于世界民族之林的精神支撑，正是这种支撑，创造了中华民族五千年生生不息的历史，创造了五千年中华文明连绵不断的奇迹。</p>\r\n\r\n<p>仁义博厚</p>\r\n\r\n<p>“仁”是中华民族精神的象征，它既是传统规范，又是区别善恶的标准。纵向上看，几千年来，从深层次影响中国人立世标准的是儒家学说。在儒家的思想体系里，仁是诸多思想理论的基础，是国人做人处事所遵循的主流。横向上看，仁的精神讲究将心比心，它可以成为当今世界解决各类社会矛盾的化解剂。1993年《走向全球伦理宣言》中说：“己所不欲，勿施于人”，这一原则还赫然写在联合国的墙上，说明“仁”完全可以成为沟通不同文化的世界性语言。</p>\r\n\r\n<p>“义”是仁的精神的延伸，是仁的具体化。“博”是仁的精神的扩展，表示博大的胸怀与宽容。</p>\r\n\r\n<p>“厚”是仁的精神的积淀，表示厚重，厚德，厚道。</p>\r\n\r\n<p>爱国统一</p>\r\n\r\n<p>爱国主义是中华民族文明的核心，是中华民族精神的主题。自中华民族形成以来，爱国主义就深深熔铸于中国传统文化和中华民族每一分子的血液中，成为一种最朴素的情感，最珍贵的归属，每当国家有难，外敌入侵之时，民众就会跃身而起，“国家兴亡，匹夫有责”的精神使中华民族虽历经磨难而不衰，饱经艰辛而不屈，久经风雨而愈强。</p>\r\n\r\n<p>爱国必然要求统一，在中华民族历史中，自古就有大一统思想，无论是皇帝还是平民，都有追求国家统一的心理特质。这也是几千年的中国历史有分有合，最终都会走向统一的精神力量。</p>\r\n\r\n<p>和合天下</p>\r\n\r\n<p>“和”是中华民族精神的特质。“和”是和平、和解、和睦、和谐之意。在中国各个领域、各类学科中，都以“和”为主流，为最高境界。“和合”更是体现在人与自然、人与人、中华民族与外民族的各种关系上，不仅是和谐，更是包容。不仅重视各民族及其文化的独特性，而且重视其融合性，统一性。和合精神深刻地积淀在中华民族的心理深处，深深地滋养着炎黄子孙的人生追求，从而使中华民族表现出强大的凝聚力和包容性。/<p>\r\n\r\n<p>“中华民族精神”与“中国梦”有着天然联系</p>\r\n\r\n<p>“中华民族精神”是中华文明的集中体现，是中华民族的灵魂，“中国梦”是中华民族追求的目标，是中华文明的未来展现，二者之间有着天然的联系。</p>\r\n\r\n<p>同是中华民族传统文化的产物</p>\r\n\r\n<p>1840年鸦片战争后，中国正常的历史进程被列强打断，中国的传统文化遭受了严重的挑战，中国逐步从“天朝之国”沦为半殖民地半封建社会，中国梦也就在此时应运而生。为实现民族独立和国家富强，仁人志士们进行了各种形式的救国尝试。其中，魏源提出“师夷长技以制夷”的思想，康有为阐释了“大同世界”，孙中山创办了兴中会，辛亥革命成就了他的“共和梦”。我们共产党人更是为此付出了巨大的努力并取得了新民主主义革命的胜利。新中国成立后的60年经历了由民族独立、人民解放到国家建设、和平崛起的发展全过程，也经历了中国梦的展开过程。而中国梦形成热词并成为复兴中华民族的动员令，是2012年11月29日习近平总书记参观国家博物馆《复兴之路》展览之后，习近平总书记讲：“我以为，实现中华民族伟大复兴，就是中华民族近代以来最伟大的梦想。”此后，实现中国梦逐渐成为中国社会各界的共识。</p>\r\n\r\n<p>由此看来，中国梦不是别的梦，它是中华民族的梦，是爱国主义传统主导下的梦，其动力来自于百年屈辱，其自信来自于百年奋斗，其主要根源之一正是自强不息、爱国统一的“中华民族精神”。</p>\r\n\r\n<p>同是中华民族的追求</p>\r\n\r\n<p>“中华民族精神”是中华民族的内在特质，它的基本特征是价值追求。中国梦是中华民族的外在愿景，它的基本特征是目标追求。</p>\r\n\r\n<p>从中国梦的发展轨迹看，中国梦是一个动态系统。新中国成立之初，我们做的是工业强国梦，主要任务是建设一个强大的社会主义工业化国家。改革开放以后，我们做的是“小康社会梦”，主要任务是把贫困的中国建设成小康的中国。现在，我们做的是“民族复兴梦”，主要任务是实现中华民族的伟大复兴，建设繁荣、富强、文明的社会主义现代化强国。尽管不同时代的梦有着不同的内容，但有一点是共同的，那就是始终贯穿着自强不息的精神，始终高扬着爱国主义的旗帜，始终把握着以人为本、和合天下的方针，从而使中国梦的目标追求与“中华民族精神”的价值追求在实践中达到了统一。</p>\r\n\r\n<p>同被中华民族所认可</p>\r\n\r\n<p>中国梦代表了不同历史阶段中国人民的主要利益，道出了中国人民的共同心声，因而得到了中国人民乃至全世界华人的广泛赞同。自从习近平总书记阐释了中国梦后，海内外积极响应，社会各界热情探讨，在很短的时间内，中国梦已成为全国人民为国家富强、民族复兴而奋斗的动员令。和中国梦一样，中华民族精神在五千年的历史沉淀中，也早已深深地植入了中国人的潜意识，融化在中国人的骨子里，成为民族自觉的价值追求，成为每一个民族成员内心深处的强大声音，并在实际生活中发挥着巨大的作用。中国近代以来虽然屡遭西方列强的侵略和瓜分，但中华民族始终保持着国土的基本统一，保持了中华文明的历史连续性，表现出了强大的民族凝聚力和战斗力，这不能不归功于“自强不息、爱国统一”为主导的文化精神的整合和凝聚。</p>\r\n\r\n<p>“中华民族精神”是实现中国梦的强大支撑</p>\r\n\r\n<p>精神是一种强大的内生力量，这种力量潜移默化而无处不在。作为文化根基，它是一个民族凝聚力的精神纽带；作为一种目标导向，它能够指引民族前行；作为一种动力激励，它能够激发人民团结奋斗，投身发展大业，创造人间奇迹。</p>\r\n\r\n<p>中国梦是中国人民的梦，实现中国梦的根本条件在于中国人民的努力和奋斗，而自强不息、爱国统一的中华民族精神正是推动中国人民奋发有为的精神源泉。从历史经验来看，中国梦的实现不是一个短时间的过程。我们党有三步走的发展战略，到本世纪中叶达到中等国家发展水平之后，还只是基本实现现代化，还没有完全实现现代化；还只是达到中等发达国家水平，还没有达到发达国家水平。因此，实现中华民族伟大复兴，实现完全的现代化，还需要我们几代人甚至十几代人坚持不懈的努力奋斗，更需要秉承和发扬中华民族薪火相传、自强不息的奋斗精神。</p>\r\n\r\n<p>中国梦也是全世界华人的梦，中国梦实现的重要条件是全体中华儿女力量的集结。毫无疑义，在这方面，中华民族精神的作用是无可替代的。在实现中国梦的历史进程中，我们不仅要团结大陆范围内一切可以团结的力量，而且要团结几千万港澳同胞、台湾同胞和海外侨胞，共同为实现中华民族的伟大复兴而奋斗。虽然他们所处的社会环境不同，政治理念、生活方式也会有所不同，但作为中华儿女的身份不会改变，对祖国的感情与血脉不会改变，源远流长的中华文化和精神永远是维系港澳同胞、台湾同胞和海外华人华侨与祖国血肉联系的根和魂。</p>\r\n\r\n<p>历史证明，一个开明而开放的社会，多元文化的存在是必然的，但主流精神和核心价值观的主体地位不可动摇。没有主流精神和核心价值观的主导，多元社会就会走向紊乱。所以，习近平总书记指出，核心价值观是文化软实力的灵魂、文化软实力建设的重点。培育和弘扬社会主义核心价值观必须立足中华优秀传统文化。抛弃传统、丢掉根本，就等于割断了自己的精神命脉。站在这样的历史高度上来把握文化传统和民族精神，问题就看得更透，中华民族的振兴需要中国梦，实现中国梦需要弘扬中华民族精神。当前我们要做的紧要的事情，就是在对传统文化去粗取精、去伪存真的基础上，总结提炼中华民族精神的本质内涵，实现中华传统文化的深化和创造性发展，切实发挥出中华文化内化于心、外化于行的巨大功能和当代价值。</p>\r\n\r\n<p>“中华民族精神”的研究应当引起重视</p>\r\n\r\n<p>实现中国梦，必须强化中华民族的价值系统，准确确立中华民族的精神主流。十八大以来，习近平总书记在各种场合一再强调社会主义核心价值观，一再强调中国优秀传统文化的重大作用，其战略意义正在于此。</p>\r\n\r\n<p>“中华民族精神”的研究应当重视，因为它是中华民族主流精神和社会主义价值观体系的基石。“中华民族精神”的研究、弘扬应当坚持政府、高校及科研部门和社会力量三管齐下的方针，科学总结、准确提炼、面向未来、多措并举，共同致力于“中华民族精神”的研究和弘扬。一是党委或政府挂帅，组织专门人员，成立专门机构对“中华民族精神”进行系统归纳、高度提炼，明确研究方向和重点，并把它作为中华文明的核心价值观和社会主义核心价值观有机部分进行规划研究。二是发挥学术机构和高等院校的主体作用，激励广大社科研究人员为研究、弘扬“中华民族精神”而努力。三是广泛动员社会力量积极参与“中华民族精神”的研究和弘扬，力求在较短的时间内收到成效。</p>\r\n\r\n<p>研究和弘扬“中华民族精神”就要对中华文化进行护根、承脉、铸魂、补钙。护根，就是保护、涵养梳理中华民族优秀传统文化；承脉，是要传承和弘扬中华民族文化的血脉，就是习近平总书记讲的文化现代化；铸魂是要提炼中华文化和社会主义核心价值观之魂；补钙，就是筑牢理想信念，强化民族气节，进补中华文明的精神之钙。</p>\r\n\r\n<p>研究的目的在于弘扬，弘扬中华民族精神的基础在国内，在教育。“中华民族精神”一旦研究成熟并确定之后应纳入国民教育、融入家庭教育、引入社会教育，采取多种措施夯实国民教育的基础，使之成为民族发展的坚固基石，成为中华民族伟大复兴的持久动力。同时“中华民族精神”的弘扬也应放眼世界。“中华民族精神”的目标理想之一是和合天下。从全球的视野看，有影响的民族无一例外都有自己的精神。美国是个移民国家，历史较短，难以用民族的概念来概括其精神，但它突出的是国家精神：“崇尚自由，开放创新”；法国精神体现于“自由、平等、博爱”；英国精神集中于“礼貌与担当”；德国精神体现于“思辨与科学、严谨与纪律”。从这些“精神”中，我们也可以感受到中华民族的文化使命和担当。因此，加强对“中华民族精神”的研究，科学输出和弘扬“中华民族精神”，既是当前中国融入世界的需要，也是未来中国为世界文明做出贡献的应有责任；既有利于展示中国的软实力与和平发展的理念，也有利于开创和平、发展、合作、共赢的世界新局面、新格局。</p>\r\n<p>（课题组组长、执笔人：夏林 成员：周峰杨柳刘蓉刘宝东）</p>', 1410915123, '/image/8.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` smallint(6) NOT NULL,
  `classtype` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '班级类别',
  `periodsnum` tinyint(3) NOT NULL COMMENT '外键（期数）',
  `teachername` varchar(5) collate utf8_unicode_ci NOT NULL COMMENT '班主任名',
  `depid` tinyint(2) NOT NULL COMMENT '外键（连接学院机构）',
  `campus` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT '校区',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='班级';

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` tinyint(1) NOT NULL auto_increment,
  `coursename` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT '课程名字',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='课程' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `depid` tinyint(2) NOT NULL auto_increment,
  `depname` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '学院（机构）名称',
  PRIMARY KEY  (`depid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学院（机构）' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`depid`, `depname`) VALUES
(1, '工大学子'),
(2, '管理学院');

-- --------------------------------------------------------

--
-- 表的结构 `partystu`
--

CREATE TABLE IF NOT EXISTS `partystu` (
  `stno` bigint(10) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `sex` enum('男','女') collate utf8_unicode_ci NOT NULL,
  `depname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `major` varchar(20) collate utf8_unicode_ci NOT NULL,
  `classname` varchar(30) collate utf8_unicode_ci NOT NULL,
  `phonenum` bigint(11) NOT NULL,
  `grade` tinyint(1) NOT NULL,
  `isgood` tinyint(1) NOT NULL,
  `idgraduate` tinyint(1) NOT NULL,
  PRIMARY KEY  (`stno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='数据库学员表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `periodset`
--

CREATE TABLE IF NOT EXISTS `periodset` (
  `periodnum` tinyint(3) NOT NULL auto_increment,
  `enrollstart` date NOT NULL COMMENT '报名开始时间',
  `able_test_start` date NOT NULL COMMENT '可考试开始时间',
  `sum_start` date NOT NULL COMMENT '总结开始时间',
  `enrollend` date NOT NULL COMMENT '报名结束时间',
  `able_test_end` date NOT NULL COMMENT '可考试结束时间',
  `sum_end` date NOT NULL COMMENT '总结结束时间',
  `testtime` tinyint(4) NOT NULL COMMENT '抽取题目后考试时间',
  PRIMARY KEY  (`periodnum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='基本设置参数表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qeid` smallint(6) NOT NULL auto_increment,
  `qetitle` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '题目描述',
  `ansA` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT '答案A',
  `ansB` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT '答案B',
  `ansC` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT '答案C',
  `ansD` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT '答案D',
  `ansY` varchar(5) collate utf8_unicode_ci NOT NULL COMMENT '答案Y',
  PRIMARY KEY  (`qeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='题目' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`qeid`, `qetitle`, `ansA`, `ansB`, `ansC`, `ansD`, `ansY`) VALUES
(3, '马克思主义具有（）的理论品质', '（A）解放思想', '（B）实事求是', '（C） 与时俱进', '（D）持续稳定', '（C）'),
(4, '中国共产党是中国工人阶级的先锋队，同时是中国人民和（  ）的先锋队。', '（A）全体人民', '（B）中华民族', '（C）社会主义 ', '（D）各族人民', '（B）'),
(5, '党的最高理想和（）是实现共产主义。', '（A）长远目标', '（B）伟大目标', '（C）最终目标', '（D）最大目标', '（C）'),
(6, '中国共产党以马列主义、毛泽东思想、邓小平理论和“三个代表”重要思想作为自己的（）。', '（A）行动指南', '（B）行动纲领', '（C）行动指导', '（D）行动动力', '（A）'),
(7, '马克思列宁主义揭示了人类社会发展的历史规律，它的基本原理是正确的，具有强大的（）。', '（A）生命力        ', '（B）战斗力', '（C）凝聚力  ', '（D）推动力', '（A）'),
(8, '社会主义制度的（）和完善是一个长期的历史过程。', '（A）建立 ', '（B）改革', '（C）完善 ', '（D）发展', '（D）'),
(9, '社会主义（）需要上百年时间。', '（A）初级阶段', '（B）发展阶段', '（C）建设阶段', '（D）奋斗阶段', '（A）'),
(10, '（）的提出是党的十六届三中全会。', '（A）和谐社会', '（B）党的执政能力建设', '（C）新农村建设', '（D）科学发展观', '（D）'),
(11, '党的十七届三中全会讨论的是（）问题。', '（A）推进农村改革发展', '（B）推进城市改革发展', '（C）推进社会改革发展 ', '（D）推进高校改革发展', '（A）'),
(12, '中国共产党的根本（）是全心全意为人民服务。', '（A）路线', '（B）思想', '（C）方法', '（D）宗旨', '（D）'),
(13, '中国共产党的根本（）原则是民主集中制。', '（A）组织', '（B）思想', '（C）理论 ', '（D）作风', '（A）'),
(14, '中国共产党永远是（）的普通一员。', '（A）工人阶级', '（B）中国人民', '（C）劳动人民', '（D）中华民族', '（C）'),
(15, '社会和谐是中国特色社会主义的（）属性。    ', '（A）重要', '（B）基本', '（C）本质', '（D）关键', '（C）'),
(16, '党除了（）和最广大人民群众的利益，没有自己特殊利益。', '（A）工人阶级', '（B）农民阶级 ', '（C）社会阶层', '（D）知识分子', '（A）'),
(17, '发展党员必须经过党的支部 ，坚持（）的原则。', '（A）少数服从多数', '（B）个别吸收', '（C）集体讨论', '（D）举手表决', '（B）'),
(18, '中国共产党的党性是工人阶级的（）的最高表现。', '（A）党性', '（B）先进性', '（C）革命性', '（D）阶级性', '（D）');

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `stno` varchar(10) collate utf8_unicode_ci NOT NULL,
  `courseid` tinyint(1) NOT NULL,
  `testscore` tinyint(3) NOT NULL COMMENT '前台提交的测试成绩',
  `totalscore` tinyint(3) NOT NULL COMMENT '管理员提交的成绩'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='成绩';

-- --------------------------------------------------------

--
-- 表的结构 `selectedquestion`
--

CREATE TABLE IF NOT EXISTS `selectedquestion` (
  `id` smallint(6) NOT NULL auto_increment,
  `periodsnum` tinyint(3) NOT NULL COMMENT '外键（期数）',
  `qeid` smallint(6) NOT NULL COMMENT '外键（题库id）',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='抽取的题目' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `stuclass`
--

CREATE TABLE IF NOT EXISTS `stuclass` (
  `stno` bigint(10) NOT NULL,
  `classid` smallint(6) NOT NULL COMMENT '党校班级id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='班级和学生联系表';

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stno` int(10) NOT NULL auto_increment COMMENT '学号',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '姓名',
  `sex` enum('男') collate utf8_unicode_ci NOT NULL COMMENT '性别',
  `depname` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '学院',
  `major` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '专业',
  PRIMARY KEY  (`stno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学员' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` tinyint(4) NOT NULL auto_increment COMMENT '主键',
  `username` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '用户名',
  `realname` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '真实名',
  `pw` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '密码',
  `depid` tinyint(2) NOT NULL COMMENT '外键（学院）',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `realname`, `pw`, `depid`) VALUES
(6, 'sqliang', '梁士全', '123', 2),
(4, 'houjingrui', '侯景瑞', '123', 1),
(5, 'ycy', '喻彩云', '123', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
